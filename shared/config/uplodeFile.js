import multer from "multer";
import path from "path";
import fs from "fs";

// Create folder if it doesn't exist
const ensureFolderExists = (folder) => {
    if (!fs.existsSync(folder)) {
        fs.mkdirSync(folder, { recursive: true });
    }
};

// Local storage with temporary filename
export const getStorage = (folder) => {
    ensureFolderExists(folder);

    return multer.diskStorage({
        destination: (req, file, cb) => cb(null, folder),
        filename: (req, file, cb) => {
            // temporary name → timestamp + original extension
            const ext = path.extname(file.originalname);
            const tempName = `temp-${Date.now()}${ext}`;
            cb(null, tempName);
        }
    });
};
