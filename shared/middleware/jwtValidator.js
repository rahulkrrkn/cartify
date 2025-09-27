import { sendError, verifyJwtToken } from "./../utils/commonFn.utils.js";

export const jwtValidator = (keyName, tokenName) => {
    return (req, res, next) => {
        console.log(req.body)
        const token = req.cookies?.[tokenName] || req.headers['authorization']?.split(' ')[1];
        if (!token) return sendError(res, "Invalid request");

        const tokenData = verifyJwtToken(keyName, token);
        if (!tokenData?.data) return sendError(res, "Session expired");

        req.validatedJwt = tokenData.data; // pass user/seller info to next middleware
        next();
    };
};
