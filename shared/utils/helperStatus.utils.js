import { returnSuccess, returnError } from "./commonFn.utils.js";


// Validate mobile no
export const emailNormalization = (rawEmail) => {
    if (!rawEmail || typeof rawEmail !== "string") {
        return returnError("Email is required")
    }
    let email = rawEmail.trim().toLowerCase();
    // Gmail normalization
    const parts = email.split("@");
    if (parts.length !== 2) {
        return returnError("Invalid email format")
    }
    const [local, domain] = parts;
    if (domain === "gmail.com") {
        // Remove dots in local part
        let normalizedLocal = local.replace(/\./g, "");
        // Remove +tag
        normalizedLocal = normalizedLocal.split("+")[0];
        email = `${normalizedLocal}@gmail.com`;
    }
    return returnSuccess({ email })
}