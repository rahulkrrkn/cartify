
import sqlPool from "../../../shared/config/mysqlPoolConn.config.js"

const runQuery = async (query, value) => {
    try {
        const [rows] = await sqlPool.query(query, value);
        return rows;
    } catch (error) {
        console.error("DB Error:", error);
        throw error;
    }
};

export const findEmailAccount = async (email) => {

    const sql = `SELECT UR.user_id,UR.email, UR.mongo_id,SE.seller_id FROM users AS UR LEFT JOIN sellers AS SE ON UR.user_id = SE.user_id  WHERE UR.email = ?`
    const values = [email];
    return await runQuery(sql, values);
}