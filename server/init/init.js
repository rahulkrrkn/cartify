import { createUsersTable, createAddressesTable, showTables, createSellerTable } from "./init_schema_and_table.js";


export async function initNewWebsite() {
    await createUsersTable();
    await createAddressesTable();
    await createSellerTable();
    await showTables();
}
