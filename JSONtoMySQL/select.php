<?php

    // Connect to the database
    require_once 'db.php';

    // Array that will store the MySQL data
    $json_array = array();

    /* Perform query to retrieve all rows from the MySQL table */
    if ($result = $link -> query("SELECT * FROM {$table}")) {

        /* Push each row of data from the table into the array */
        while($row = $result -> fetch_assoc()) {

            $ID = determineNull((int)$row['ID']);
            $LocationId = determineNull((int)$row['LocationId']);
            $MenuDate = determineNull($row['MenuDate']);
            $MealPeriod = determineNull($row['MealPeriod']);
            $StationId = determineNull((int)$row['StationId']);
            $StationName = determineNull($row['StationName']);
            $StationSort = determineNull((int)$row['StationSort']);
            $SubCatName = determineNull($row['SubCatName']);
            $SubCatSort = determineNull((int)$row['SubCatSort']);
            $ProductId = determineNull($row['ProductId']);
            $ProductImage = determineNull($row['ProductImage']);
            $ProductName = determineNull($row['ProductName']);
            $ShortDescription = determineNull($row['ShortDescription']);
            $DietaryInfo = determineNull($row['DietaryInfo']);
            $Serving = determineNull($row['Serving']);
            $Calories = determineNull((int)$row['Calories']);
            $CaloriesFromFat = determineNull((int)$row['CaloriesFromFat']);
            $TotalFat = determineNull($row['TotalFat']);
            $SaturatedFat = determineNull($row['SaturatedFat']);
            $TransFat = determineNull($row['TransFat']);
            $Cholesterol = determineNull($row['Cholesterol']);
            $Sodium = determineNull($row['Sodium']);
            $TotalCarbs = determineNull($row['TotalCarbs']);
            $DietaryFiber = determineNull($row['DietaryFiber']);
            $Sugars = determineNull($row['Sugars']);
            $Protein = determineNull($row['Protein']);
            $Ingredients = determineNull($row['Ingredients']);
            $error = determineNull($row['error']);
            $HideFromDigitalSignage = determineNullOrBool((int)$row['HideFromDigitalSignage']);
            $ProductSort = determineNull((int)$row['ProductSort']);
            $Price = determineNull((float)$row['Price']);
            $IsVegan = determineNullOrBool((int)$row['IsVegan']);
            $IsVegetarian = determineNullOrBool((int)$row['IsVegetarian']);
            $IsKosher = determineNullOrBool((int)$row['IsKosher']);
            $IsHalal = determineNullOrBool((int)$row['IsHalal']);
            $IsGlutenFree = determineNullOrBool((int)$row['IsGlutenFree']);
            $ContainsShellfish = determineNullOrBool((int)$row['ContainsShellfish']);
            $ContainsPeanuts = determineNullOrBool((int)$row['ContainsPeanuts']);
            $ContainsTreeNuts = determineNullOrBool((int)$row['ContainsTreeNuts']);
            $ContainsMilk = determineNullOrBool((int)$row['ContainsMilk']);
            $ContainsWheat = determineNullOrBool((int)$row['ContainsWheat']);
            $ContainsSoy = determineNullOrBool((int)$row['ContainsSoy']);
            $ContainsEggs = determineNullOrBool((int)$row['ContainsEggs']);
            $ContainsFish = determineNullOrBool((int)$row['ContainsFish']);
            $IsDeemphasized = determineNullOrBool((int)$row['IsDeemphasized']);
            $Allergens = determineNull($row['Allergens']);
            
            $item = array("ID" => $ID, "LocationId" => $LocationId, "MenuDate" => $MenuDate, "MealPeriod" => $MealPeriod, "StationId" => $StationId, "StationName" => $StationName, "StationSort" => $StationSort, "SubCatName" => $SubCatName, "SubCatSort" => $SubCatSort, "ProductId" => $ProductId,
                "ProductImage" => $ProductImage, "ProductName" => $ProductName, "ShortDescription" => $ShortDescription, "DietaryInfo" => $DietaryInfo, "Serving" => $Serving, "Calories" => $Calories, "CaloriesFromFat" => $CaloriesFromFat, "TotalFat" => $TotalFat, "SaturatedFat" => $SaturatedFat,
                "TransFat" => $TransFat, "Cholesterol" => $Cholesterol, "Sodium" => $Sodium, "TotalCarbs" => $TotalCarbs, "DietaryFiber" => $DietaryFiber, "Sugars" => $Sugars, "Protein" => $Protein, "Ingredients" => $Ingredients, "error" => $error, "HideFromDigitalSignage" => $HideFromDigitalSignage,
                "ProductSort" => $ProductSort, "Price" => $Price, "IsVegan" => $IsVegan, "IsVegetarian" => $IsVegetarian, "IsKosher" => $IsKosher, "IsHalal" => $IsHalal, "IsGlutenFree" => $IsGlutenFree, "ContainsShellfish" => $ContainsShellfish, "ContainsPeanuts" => $ContainsPeanuts,
                "ContainsTreeNuts" => $ContainsTreeNuts, "ContainsMilk" => $ContainsMilk, "ContainsWheat" => $ContainsWheat, "ContainsSoy" => $ContainsSoy, "ContainsEggs" => $ContainsEggs, "ContainsFish" => $ContainsFish, "IsDeemphasized" => $IsDeemphasized, "Allergens" => $Allergens);

            array_push($json_array, $item);

        }

    }

    // Encode the array containing the table data to a JSON
    echo json_encode($json_array);

    // Free result set
    $result -> free_result();

    // Close the connection */
    $link->close();

    /**
     * Determine if a variable is NULL set it appropriately
     * @param $var mixed The variable to evaluate
     * @return null|mixed The new value of the variable
     */
    function determineNull($var) {

        /* Set a variable to NULL if -1 or empty string, otherwise leave it unchanged */
        if ( $var === -1 || (int)$var === -1 || $var === "" ) {
            return NULL;
        } else {
            return $var;
        }

    }

    /**
     * Determine if a specific int variable is NULL, FALSE, or TRUE and set it appropriately
     * @param $var int The int to evaluate
     * @return null|bool|mixed The new value of the variable
     */
    function determineNullOrBool($var) {

        /* Set a variable to NULL if -1, FALSE if 0, or TRUE if 1, otherwise leave it unchanged */
        if ( $var === -1 || (int)$var === -1 || $var === "" ) {
            return NULL;
        } else if ( $var === 0|| (int)$var === 0 ) {
            return FALSE;
        } else if ( $var === 1 || (int)$var === 1 ) {
            return TRUE;
        } else {
            return $var;
        }

    }
