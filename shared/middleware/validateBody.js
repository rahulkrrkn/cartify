import { sendError } from "../utils/commonFn.utils.js";
export const validateBody = (schema) => {
    return (req, res, next) => {
        const { error, value } = schema.validate(req.body, { abortEarly: false });
        if (error) {
            return sendError(
                res,
                error.message,
                error.details.map((err) => err.message).join(", ")
            );
        }
        req.validatedBody = value; // pass validated data
        next();
    };
};





