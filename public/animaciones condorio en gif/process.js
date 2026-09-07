const { GifUtil, GifFrame, GifCodec } = require('gifwrap');

(async () => {
    try {
        console.log("Reading GIF...");
        const gif = await GifUtil.read('condorio bailando fondo verde.gif');
        console.log("Frames: " + gif.frames.length);

        for (let frame of gif.frames) {
            // frame.bitmap is a Jimp bitmap (width, height, data)
            const width = frame.bitmap.width;
            const height = frame.bitmap.height;
            const data = frame.bitmap.data;
            
            for (let i = 0; i < data.length; i += 4) {
                const r = data[i];
                const g = data[i + 1];
                const b = data[i + 2];
                
                // If it's a bright green, make it transparent
                // The green in the previous scan was around R:14, G:156, B:45
                // Let's use a loose tolerance
                if (g > 100 && r < 80 && b < 80) {
                    data[i + 3] = 0; // Alpha 0
                }
            }
        }

        console.log("Saving new GIF...");
        await GifUtil.write('condorio_bailando_verde_tr.gif', gif.frames, gif);
        console.log("Done!");
    } catch (e) {
        console.error(e);
    }
})();
