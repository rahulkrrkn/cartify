import mysql2 from "mysql2/promise";
import mongoose from "mongoose";


// Create SQL connection
export const sqlConn = async () => {
    try {
        const connection = await mysql2.createConnection({ user: process.env.SQL_USER, host: process.env.SQL_HOST, database: process.env.SQL_DATABASE, password: process.env.SQL_PASSWORD });
        console.log("✅ SQL Connection successful");
        return connection;
    } catch (err) {
        console.error("❌ SQL Connection failed:", err.message);
        throw err; // Rethrow so the app knows
    }
};

// Create MongoDB connection
export const mongoDbConn = async () => {
    try {
        await mongoose.connect(process.env.MONGO_DB);
        console.log("✅ Mongoose Connection successful");
        return mongoose.connection;
    } catch (err) {
        console.error("❌ Mongoose Connection failed:", err.message);
        throw err; // Rethrow for consistency
    }
};
