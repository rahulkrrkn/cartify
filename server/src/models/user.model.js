import { sqlPool } from "./../config/db.js";
import mongoose from "mongoose";


// Check if user exists by email in MySQL
export const checkUserEmail = async (email) => {
    try {
        const [rows] = await sqlPool.execute(
            `SELECT user_id, email, mongo_id FROM users WHERE email = ? LIMIT 1`,
            [email]
        );
        return rows.length > 0 ? rows[0] : null;
    } catch (error) {
        console.error("DB error in checkUserEmail:", error.message);
        throw new Error("Database query failed");
    }
};

// Create user in MySQL (optionally store Mongo ID)
export const createUserWithEmail = async (email, mongoId = null) => {
    console.log("user DEtail :", email, mongoId.toString())
    const [result] = await sqlPool.execute(
        `INSERT INTO users (email, mongo_id) VALUES (?, ?)`,
        [email, mongoId]
    );
    return { id: result.insertId, email, mongoId };
};



// Mongoose schema for users
const userSchema = new mongoose.Schema(
    {
        email: {
            type: String,
            required: true,
            unique: true,
            lowercase: true,
            trim: true,
        },
        createdAt: {
            type: Date,
            default: Date.now,
        },
    },
    {
        versionKey: false,
    }
);

const User = mongoose.model("User", userSchema);

export default User;
