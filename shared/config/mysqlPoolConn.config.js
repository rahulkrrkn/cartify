// v 0.0.0
import mysql2 from "mysql2/promise";

// Create SQL Pool
export default mysql2.createPool({
    host: process.env.SQL_HOST || "localhost",
    user: process.env.SQL_USER || "root",
    password: process.env.SQL_PASSWORD || "Abcde@12345",
    database: process.env.SQL_DB || "cartify",
    waitForConnections: true,  // queue queries if all conns busy
    connectionLimit: 10,       // max simultaneous connections
    queueLimit: 0              // unlimited queued queries
});

// Simple test function
export const testSqlPoolConnection = async (sqlPool) => {
    try {
        const conn = await sqlPool.getConnection();
        console.log("✅ SQL Pool connection success");
        conn.release(); // release back to pool
    } catch (err) {
        console.error("❌ SQL Pool connection failed:", err.message);
    }
}