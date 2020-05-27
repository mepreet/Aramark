# JSONtoMySQL
Decodes a JSON file and stores the appropriate data in a MySQL table.

## Files
This project contains five PHP files – three essential and two helper – and a JSON file located in the `json/` directory.

### db.php
Establishes a connection to the MySQL database.

### insert.php
Decodes the JSON file and stores the appropriate data in respective variables, which are then inserted into the MySQL table.  This file depends on `db.php` to make a connection to the database and the JSON file located in the `json/` directory.

#### Note
The function `determineNullOrFalse()` takes a variable and sets it to -1 if NULL or 0 if FALSE.  If the value of the variable is neither, it will remain unchanged.  This is due to the fact that the data from the decoded JSON file stores both NULL and FALSE values as 0, which is evaluated in PHP as NULL, even though the underlying data type is still either NULL or FALSE.  As of such, this function provides a clear distinction between these two values.

### select.php
Reads from the MySQL table, converts values to a specific data type, and creates a JSON from the data.  This file depends on `db.php` to make a connection to the database.

#### Notes
The function `determineNull()` takes a variable and sets it to NULL if -1.  If the value of the variable is neither, it will remain unchanged.  This is due to the way data is stored in the table via the `select.php` file.

The function `determineNullOrBool()` takes an int variable and sets it to NULL if -1, FALSE if 0, or TRUE if 1.  If the value of the variable is neither, it will remain unchanged.  Similar to the `determineNull()` function, this is due to the way data is stored in the table via the `select.php` file.  However, this specific function is necessary due to the fact that fields containing booleans can also be NULL, so evaluation of a boolean checks for both NULL and boolean values within the underlying int to ensure a clear distinction.

### select_plain.php
Reads from the MySQL table and forms the data into a JSON.  This file depends on `db.php` to make a connection to the database.

#### Note
Unlike `select.php`, this file will not convert values read from the table to a specific data type.  Rather, all values will be returned as strings ("plain" values).

### truncate.php
Clears all values from the MySQL table.  This file depends on `db.php` to make a connection to the database.

### json/FullMenu_response.json
Includes the JSON data required for insertion to the MySQL table.

### json/FullMenu_response.txt
A plain-text version of `FullMenu_response.json`.

### json/FullMenu_response-Formatted.json
An easy-to-read hierarchical version of `FullMenu_response.json`

### json/FullMenu_response-Formatted.txt
A plain-text version of `FullMenu_response-Formatted.json`.

___

_Updated 05/27/2020_
