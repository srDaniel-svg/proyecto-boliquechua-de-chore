<?php
function removeBackground($inputPath, $outputPath, $tolerance = 50) {
    echo "Processing $inputPath...\n";
    $img = imagecreatefromjpeg($inputPath);
    if (!$img) { echo "Failed to load image.\n"; return; }
    
    $width = imagesx($img);
    $height = imagesy($img);
    
    $out = imagecreatetruecolor($width, $height);
    imagealphablending($out, false);
    imagesavealpha($out, true);
    $transColor = imagecolorallocatealpha($out, 0, 0, 0, 127);
    imagefill($out, 0, 0, $transColor);
    
    // Check corners to determine background color
    $corners = [
        imagecolorat($img, 0, 0),
        imagecolorat($img, $width - 1, 0),
        imagecolorat($img, 0, $height - 1),
        imagecolorat($img, $width - 1, $height - 1)
    ];
    
    $r_sum = $g_sum = $b_sum = 0;
    foreach ($corners as $c) {
        $r_sum += ($c >> 16) & 0xFF;
        $g_sum += ($c >> 8) & 0xFF;
        $b_sum += $c & 0xFF;
    }
    
    $bg_r = $r_sum / 4;
    $bg_g = $g_sum / 4;
    $bg_b = $b_sum / 4;
    
    echo "Detected background: ($bg_r, $bg_g, $bg_b)\n";
    
    // Create a visited map for flood fill
    // In PHP, doing a manual queue-based flood fill on 2000x2000 image can exceed memory or time limit easily.
    // Let's use a simpler approach: process row by row from outside in, or just global replacement with a slight feathering.
    
    for ($y = 0; $y < $height; $y++) {
        for ($x = 0; $x < $width; $x++) {
            $rgb = imagecolorat($img, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;
            
            $dist = sqrt(pow($r - $bg_r, 2) + pow($g - $bg_g, 2) + pow($b - $bg_b, 2));
            
            if ($dist < $tolerance) {
                // Background -> Transparent
                imagesetpixel($out, $x, $y, $transColor);
            } else if ($dist < $tolerance + 15) {
                // Feathering edge
                $alpha = (int)(127 * (1 - (($dist - $tolerance) / 15)));
                $color = imagecolorallocatealpha($out, $r, $g, $b, $alpha);
                imagesetpixel($out, $x, $y, $color);
            } else {
                // Foreground
                $color = imagecolorallocatealpha($out, $r, $g, $b, 0);
                imagesetpixel($out, $x, $y, $color);
            }
        }
    }
    
    imagepng($out, $outputPath);
    imagedestroy($img);
    imagedestroy($out);
    echo "Saved to $outputPath\n";
}

$files = glob("public/imagenes_botones/*.jpg");
foreach ($files as $file) {
    $outPath = str_replace('.jpg', '.png', $file);
    removeBackground($file, $outPath);
}
