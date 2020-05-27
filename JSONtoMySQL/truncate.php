<?php

    // Connect to the database
    require_once 'db.php';

    // Clear the existing table
    $link -> query("TRUNCATE `{$table}`");

    // Close the connection
    $link->close();