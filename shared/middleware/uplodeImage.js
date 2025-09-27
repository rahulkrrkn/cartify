import multer from "multer";
import { getStorage } from "./../config/uplodeFile.js";

export const createUploader = (folder = "uploads", maxSizeMB = 5) => {
    const uplode = `./../shared/uplodes/${folder}`
    const storage = getStorage(uplode);

    const fileFilter = (req, file, cb) => {
        if (file.mimetype.startsWith("image/")) {
            cb(null, true);
        } else {
            cb(new Error("Only image files are allowed!"), false);
        }
    };

    return multer({
        storage,
        fileFilter,
        limits: { fileSize: maxSizeMB * 1024 * 1024 }, // convert MB → bytes
    });
};
