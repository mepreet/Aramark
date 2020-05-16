<?php

    // Connect to the database
    require_once 'db.php';

    // Array that will store the MySQL data
    $result_array = [];

    /* Perform query to retrieve all rows from the MySQL table */
    if ($result = $link -> query("SELECT * FROM {$table}")) {

        /* Push each row of data from the table into the array */
        while($row = $result -> fetch_assoc()) {
            $tempArray = $row;
            array_push($result_array, $tempArray);
        }

    }

    // Encode the array containing the table data to a JSON
    echo json_encode($result_array);

    // Free result set
    $result -> free_result();

    // Close the connection */
    $link->close();
