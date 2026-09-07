import cv2
from PIL import Image
import numpy as np
import sys

def video_to_transparent_gif(input_path, output_path, bg_threshold=60, skip_frames=2):
    """
    Converts an MP4 video to an animated GIF with transparent background.
    bg_threshold: pixels darker than this value (0-255) will be transparent.
    skip_frames: take 1 frame every N frames to reduce file size.
    """
    cap = cv2.VideoCapture(input_path)
    fps = cap.get(cv2.CAP_PROP_FPS)
    
    frames = []
    frame_count = 0
    
    print(f"Reading video at {fps:.1f} FPS...")
    
    while True:
        ret, frame = cap.read()
        if not ret:
            break
        
        if frame_count % skip_frames != 0:
            frame_count += 1
            continue
        
        # Convert BGR (OpenCV) -> RGB
        frame_rgb = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
        
        # Convert to RGBA
        pil_frame = Image.fromarray(frame_rgb).convert("RGBA")
        data = np.array(pil_frame)
        
        r, g, b, a = data[:,:,0], data[:,:,1], data[:,:,2], data[:,:,3]
        
        # Pixels where all channels are below threshold = background -> transparent
        # Also handle slight variations (dark grays)
        max_channel = np.maximum(np.maximum(r.astype(int), g.astype(int)), b.astype(int))
        bg_mask = max_channel < bg_threshold
        
        data[:,:,3] = np.where(bg_mask, 0, 255)
        
        result = Image.fromarray(data, 'RGBA')
        frames.append(result)
        
        frame_count += 1
    
    cap.release()
    
    if not frames:
        print("ERROR: No frames extracted!")
        return
    
    print(f"Extracted {len(frames)} frames. Saving GIF...")
    
    # Calculate duration per frame in ms (accounting for skipped frames)
    duration_ms = int((1000 / fps) * skip_frames)
    
    frames[0].save(
        output_path,
        save_all=True,
        append_images=frames[1:],
        loop=0,
        duration=duration_ms,
        disposal=2  # Clear previous frame (important for transparency)
    )
    
    print(f"Done! Saved to: {output_path}")

if __name__ == '__main__':
    input_file = sys.argv[1] if len(sys.argv) > 1 else "llamin hablando.mp4"
    output_file = sys.argv[2] if len(sys.argv) > 2 else "llamin hablando_tr.gif"
    threshold = int(sys.argv[3]) if len(sys.argv) > 3 else 60
    skip = int(sys.argv[4]) if len(sys.argv) > 4 else 2
    
    video_to_transparent_gif(input_file, output_file, threshold, skip)
