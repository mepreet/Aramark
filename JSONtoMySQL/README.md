# JSONtoMySQL
Decodes a JSON file and stores the appropriate data in a MySQL table.

## Files
This project utilizes two PHP files and a JSON file located in the `json/` directory.

### db.php
Establishes a connection to the MySQL database.

### main.php
Decodes the JSON file and stores the appropriate data in respective variables, which are then inserted into the MySQL table.  This file depends on `db.php` to make a connection to the database and the JSON file located in the `json/` directory.

#### Note
The function `determineNullOrFalse()` takes a variable and sets it to -1 if null or 0 if false.  If the value of the variable is neither, it will remain unchanged.  This is due to the fact that the data from the decoded JSON file stores both null and false values as empty strings, even though the underlying data type is still either null or false.  As of such, this function provides a clear distinction between these two values.

### service.php
Reads from the MySQL table and forms the data into a JSON.  This file depends on `db.php` to make a connection to the database.

### json/FullMenu_response.json
Includes the JSON data required for insertion to the MySQL table.

### json/FullMenu_response.txt
A plain-text version of `FullMenu_response.json`.

### json/FullMenu_response-Formatted.json
An easy-to-read hierarchical version of `FullMenu_response.json`

### json/FullMenu_response-Formatted.txt
A plain-text version of `FullMenu_response-Formatted.json`.

___

Updated 05/16/2020
