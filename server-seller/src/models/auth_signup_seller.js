
import sqlPool from "../../../shared/config/mysqlPoolConn.config.js"
import mongoose from "mongoose";




const runQuery = async (query, value) => {
    try {
        const [rows] = await sqlPool.query(query, value);
        return rows;
    } catch (error) {
        console.error("DB Error:", error);
        throw error;
    }
};

const sellerSignup = {
    findUser: async (data) => {
        const sql = `SELECT user_id,email, phone, first_name, last_name FROM users WHERE email = ?`
        const values = [data.email];
        return await runQuery(sql, values);
    },
    createUser: async (data) => {
        const sql = `
            INSERT INTO users 
            (email, phone, first_name, last_name)
            VALUES (?, ?, ?, ?)
        `;
        const values = [
            data.email,
            data.phone,
            data.firstName,
            data.lastName,
        ];
        return await runQuery(sql, values);


    },
    updateUser: async (data) => {
        const sql = `UPDATE users SET phone =?, first_name =?, last_name =? WHERE email = ?`;
        const values = [
            data.phone,
            data.firstName,
            data.lastName,
            data.email,
        ];
        return await runQuery(sql, values);
    },
    updateMongoId: async (data) => {
        const sql = `UPDATE users SET mongo_id =? WHERE email = ?`;
        const values = [
            data.mongoId,
            data.email,
        ];
        return await runQuery(sql, values);
    },
    findSeller: async (data) => {
        const sql = "SELECT seller_id , user_id FROM sellers WHERE user_id = ?"
        const values = [data.user_id];
        return await runQuery(sql, values);
    },
    createSeller: async (data) => {
        const sql = ` INSERT INTO sellers  (user_id, store_name, store_email, store_phone, gst_number, shop_pincode, full_address, store_logo, owner_pan, owner_pan_image, bank_account_no, ifsc_code, upi_id, name_on_upi, status, kyc_status, store_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;

        const values = [
            data.user_id,
            data.store_name,
            data.email,
            data.phone,
            data.store_gst_number || null,
            data.store_pincode,
            data.store_full_address,
            data.store_logo,
            data.owner_pan || null,
            data.pan_image || null,
            data.bank_account_no || null,
            data.ifsc_code || null,
            data.upi_id || null,
            data.name_on_upi || null,
            data.status || "pending",
            data.kyc_status || "pending",
            data.store_type || "individual"
        ];


        return await runQuery(sql, values);
    }


};

export default sellerSignup;







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
        user_id: {
            type: Number,
            required: true,
            unique: true,
            trim: true,
        }
    },
    {
        versionKey: false,
    }
);

export const User = mongoose.model("User", userSchema);


