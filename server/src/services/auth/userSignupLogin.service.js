import User, { createUserWithEmail, checkUserEmail } from "../../models/user.model.js"
import jwt from "jsonwebtoken";
import dotenv from "dotenv";
dotenv.config();
import { returnSuccess, returnError } from "../../utils/commonFn.utils.js";
import SendEmail from "../../utils/email.utils.js";
export const loginOrSignupUser = async (email) => {
    const userData = await checkUserEmail(email)

    if (userData) {
        const token = generateToken({ userId: userData.user_id, mongoId: userData.mongo_id, email: userData.email });
        return returnSuccess(token, "Login Success");
    } else {
        const user = new User({ email });
        await user.save();
        // SQL user Create
        const { id, mongoId } = await createUserWithEmail(email, user._id.toString())
        if (id) await SendEmail.single(email, "Welcome to cartify", `Welcome to cartify`, `Welcome to cartify`);
        const token = generateToken({ userId: id, mongoId: mongoId, email: email });
        return returnSuccess(token, "Login Success");
    }

};


const generateToken = (user) => {
    return jwt.sign(
        {
            userId: user.userId,         // SQL user ID
            mongoId: user.mongoId,
            email: user.email,
            role: user.role || "user"
        },
        process.env.JWT_SECRET,
        { expiresIn: "7d" }    // token valid for 7 days
    );
};

