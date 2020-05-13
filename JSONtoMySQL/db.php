<?php

    /* Database connection information */
    $hostname = "50.87.249.20:3306";
    $username = "rickyman_rmm429";
    $password = "rmm429";
    $database = "rickyman_aramark";
    $table = "FullMenu_TEST";

    /* Establish timeout duration and attempt to make connection */
    $timeout = 10; // 10 seconds for timeout
    $link = mysqli_init();
    $link->options( MYSQLI_OPT_CONNECT_TIMEOUT, $timeout ) ||
    die( 'ERROR: ' . $link->error . PHP_EOL);
    $link->real_connect($hostname,  $username, $password, $database) ||
    die( 'ERROR: ' . $link->error . PHP_EOL);

    /* Confirm established connection */
    echo "Success: A proper connection to MySQL was made!" . PHP_EOL;
    echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL . PHP_EOL;