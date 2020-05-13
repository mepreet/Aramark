# JSONtoMySQL
Decodes a JSON file and stores the appropriate data in a MySQL table.

## Files
This project utilizes two PHP files and a JSON file located in the `json/` directory.

### main.php
Decodes the JSON file and stores the appropriate data in respective variables, which are then inserted into the MySQL table.  This file depends on `db.php` to make a connection to the database and the JSON file located in the `json/` directory.

### db.php
Establishes a connection to the MySQL database.

### json/FullMenu_response.json
Includes the JSON data required for insertion to the MySQL table.

### json/FullMenu_response.txt
A plain-text version of `FullMenu_response.json`.

___

Updated 05/13/2020
