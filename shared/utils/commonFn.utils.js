import jwt from "jsonwebtoken";

export const asyncWrap = (fn) => {
    return function err(req, res, next) {
        fn(req, res, next).catch((err) => next(err));
    }
}
// ----Centralized response utility

export function sendSuccess(res, message, data = {}, code = 200) {
    return res.status(code).json({
        status: "success",
        code,
        message,
        data,
        error: null
    });
}

export function sendError(res, message, errorDetails = {}, code = 400) {
    return res.status(code).json({
        status: "error",
        code,
        message,
        data: null,
        error: errorDetails
    });
}

// ----for internal return

export function returnSuccess(data = {}, message = "Success") {
    return {
        success: true,
        message,
        data,
        error: null
    };
}

export function returnError(message = "Error", errorDetails = {}) {
    return {
        success: false,
        message,
        data: null,
        error: errorDetails
    };
}


// ----JWT
export const generateJwtToken = (keyName, data = {}, expiresInDays = 7) => {
    const secret = process.env[keyName];
    if (!secret) throw new Error(`${keyName} is not defined in environment variables`);
    if (typeof expiresInDays !== "number") throw new Error("expiresIn must be a number");

    return jwt.sign({ data }, secret, { expiresIn: `${expiresInDays}d` });
};

export const verifyJwtToken = (keyName, token) => {
    const secret = process.env[keyName];
    if (!secret) throw new Error(`${keyName} is not defined in environment variables`);

    try {
        return jwt.verify(token, secret);
    } catch (err) {
        return null; // invalid or expired token
    }
};
