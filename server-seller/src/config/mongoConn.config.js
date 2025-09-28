// v 0.0.0
import mongoose from "mongoose";

// Create MongoDB connection
export default async () => {
    try {
        await mongoose.connect(process.env.MONGO_DB);
        console.log("✅ Mongoose Connection success");
        return mongoose.connection;
    } catch (err) {
        console.error("❌ Mongoose Connection failed:", err.message);
        throw err; // Rethrow for consistency
    }
};

