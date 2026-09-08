<?php
$inputFile = 'public/nuevo icono.png';
$outputFile = 'public/nuevo_icono_transparent.png';
$tolerance = 220; // 0-255, what counts as "white"

if (!file_exists($inputFile)) {
    die("Error: File not found.\n");
}

$img = imagecreatefrompng($inputFile);
if (!$img) {
    die("Error: Could not load PNG.\n");
}

// Enable alpha blending
imagealphablending($img, false);
imagesavealpha($img, true);

$width = imagesx($img);
$height = imagesy($img);

for ($x = 0; $x < $width; $x++) {
    for ($y = 0; $y < $height; $y++) {
        $color = imagecolorat($img, $x, $y);
        $rgba = imagecolorsforindex($img, $color);
        
        // If it's white or near-white
        if ($rgba['red'] > $tolerance && $rgba['green'] > $tolerance && $rgba['blue'] > $tolerance) {
            // Make it fully transparent
            $transparent = imagecolorallocatealpha($img, 0, 0, 0, 127);
            imagesetpixel($img, $x, $y, $transparent);
        }
    }
}

if (imagepng($img, $outputFile)) {
    echo "Success: Saved to $outputFile\n";
} else {
    echo "Error: Could not save PNG.\n";
}
imagedestroy($img);
?>
