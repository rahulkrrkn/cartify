import Joi from "joi";

// Joi schema
const joiEmailValidator = Joi.object({
    email: Joi.string()
        .email({ tlds: { allow: false } })
        .required()
        .messages({
            "string.email": "Please enter a valid email address",
            "string.empty": "Email cannot be empty",
            "any.required": "Email is required",
        }),
});


export function emailValidator(rawEmail) {
    if (!rawEmail || typeof rawEmail !== "string") {
        return { success: false, error: "Email is required" };
    }

    // Trim and lowercase
    let email = rawEmail.trim().toLowerCase();

    // Validate using Joi
    const { error, value } = joiEmailValidator.validate({ email });
    if (error) {
        return { success: false, error: error.details[0].message };
    }

    email = value.email;

    // Gmail normalization
    const parts = email.split("@");
    if (parts.length !== 2) {
        return { success: false, error: "Invalid email format" };
    }

    const [local, domain] = parts;

    if (domain === "gmail.com") {
        // Remove dots in local part
        let normalizedLocal = local.replace(/\./g, "");
        // Remove +tag
        normalizedLocal = normalizedLocal.split("+")[0];
        email = `${normalizedLocal}@gmail.com`;
    }

    return { success: true, data: { email }, error: null };
}
