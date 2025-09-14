import express from "express";
const app = express();
import dotenv from "dotenv";
dotenv.config();
import { mongoDbConn, sqlConn } from "./config/db.js"

// constant define
const PORT = process.env.PORT || 5000;

// database connection check and start server
async function serverStart() {
    try {
        // DB Connection
        await mongoDbConn();
        const sqlconn = await sqlConn();
        sqlconn.end();

        // Start server
        app.listen(PORT, () => {
            console.log("Server Started at port " + process.env.PORT);
        });

    } catch (err) {
        console.error("Failed to start server:", err);
        process.exit(1);
    }

}
serverStart();




// Routes
app.use("/", (req, res) => {
    res.send("Welcome");
});


