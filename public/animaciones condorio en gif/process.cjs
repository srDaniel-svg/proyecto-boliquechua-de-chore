const { GifUtil, GifFrame, GifCodec } = require('gifwrap');

(async () => {
    try {
        console.log("Reading GIF...");
        const gif = await GifUtil.read('celebracion final condorio.gif');
        console.log("Frames: " + gif.frames.length);

        for (let frame of gif.frames) {
            const data = frame.bitmap.data;
            for (let i = 0; i < data.length; i += 4) {
                if (data[i] < 30 && data[i+1] < 30 && data[i+2] < 30) {
                    data[i+3] = 0; // Alpha 0
                }
            }
            
            // Re-quantize the frame to generate a proper palette with transparency
            GifUtil.quantizeSorokin(frame, 256);
            
            if (frame.delayCentisecs > 0) {
                frame.delayCentisecs *= 2;
            } else {
                frame.delayCentisecs = 20;
            }
        }

        console.log("Saving new GIF...");
        await GifUtil.write('celebracion final condorio_py.gif', gif.frames, gif);
        console.log("Done!");
    } catch (e) {
        console.error(e);
    }
})();
