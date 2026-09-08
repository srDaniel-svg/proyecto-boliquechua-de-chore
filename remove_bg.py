from PIL import Image
import numpy as np
import sys

def remove_white_bg(input_path, output_path, tolerance=220):
    try:
        img = Image.open(input_path).convert("RGBA")
        data = np.array(img)
        
        # Get r, g, b, a channels
        r, g, b, a = data.T
        
        # Define the white areas (R, G, B all > tolerance)
        white_areas = (r >= tolerance) & (g >= tolerance) & (b >= tolerance)
        
        # Set alpha to 0 for white areas
        data[..., 3][white_areas.T] = 0
        
        new_img = Image.fromarray(data)
        new_img.save(output_path, "PNG")
        print(f"Success: Saved to {output_path}")
    except Exception as e:
        print(f"Error: {e}")
        sys.exit(1)

if __name__ == "__main__":
    remove_white_bg('public/nuevo icono.png', 'public/nuevo_icono_transparent.png')
