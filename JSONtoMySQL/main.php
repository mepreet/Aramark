<?php

    /* Retrieve and decode the JSON file */
    $json = file_get_contents('./json/FullMenu_response.txt');
    $obj = json_decode($json,true);

    // Connect to the database
    require_once 'db.php';

    /* Properties for the INSERT query */
    $columns = "(`LocationId`, `MenuDate`, `MealPeriod`, `StationId`, `StationName`, `StationSort`, `SubCatName`, `SubCatSort`, ProductId, 
            `ProductImage`, `ProductName`, `ShortDescription`, `DietaryInfo`, `Serving`, `Calories`, `CaloriesFromFat`, TotalFat, `SaturatedFat`, 
            `TransFat`, `Cholesterol`, `Sodium`, `TotalCarbs`, `DietaryFiber`, `Sugars`, `Protein`, `Ingredients`, `error`, `HideFromDigitalSignage`, 
            `ProductSort`, `Price`, `IsVegan`, `IsVegetarian`, `IsKosher`, `IsHalal`, `IsGlutenFree`, `ContainsShellfish`, `ContainsPeanuts`, 
            `ContainsTreeNuts`, `ContainsMilk`, `ContainsWheat`, `ContainsSoy`, `ContainsEggs`, `ContainsFish`, `IsDeemphasized`, `Allergens`)"; // Table columns
    $types = "issisisissssssiisssssssssssiidiiiiiiiiiiiiiis"; // Data types
    $makers = "(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; // Variable placeholders

    /* Create the INSERT query and prepare it for execution */
    $query = "INSERT INTO `{$table}` {$columns} VALUES {$makers}";
    $stmt = $link->prepare($query);

    /* Bind the variable placeholders with actual variables */
    $stmt->bind_param($types, $LocationId, $MenuDate, $MealPeriod, $StationId, $StationName, $StationSort, $SubCatName, $SubCatSort, $ProductId,
        $ProductImage, $ProductName, $ShortDescription, $DietaryInfo, $Serving, $Calories, $CaloriesFromFat, $TotalFat, $SaturatedFat,
        $TransFat, $Cholesterol, $Sodium, $TotalCarbs, $DietaryFiber, $Sugars, $Protein, $Ingredients, $error, $HideFromDigitalSignage,
        $ProductSort, $Price, $IsVegan, $IsVegetarian, $IsKosher, $IsHalal, $IsGlutenFree, $ContainsShellfish, $ContainsPeanuts,
        $ContainsTreeNuts, $ContainsMilk, $ContainsWheat, $ContainsSoy, $ContainsEggs, $ContainsFish, $IsDeemphasized, $Allergens) ||
    die( 'ERROR: ' . $stmt->error . PHP_EOL);

    /* Store JSON data in variables */
    $LocationId = determineNullOrFalse($obj['LocationId']);
    $MenuDate = determineNullOrFalse($obj['MenuDate']);

    foreach($obj['MealPeriods'] as $MealPeriods) {

        $MealPeriod = determineNullOrFalse($MealPeriods['MealPeriod']);

        foreach($MealPeriods['Stations'] as $Stations) {

            $StationId = determineNullOrFalse($Stations['Id']);
            $StationName = determineNullOrFalse($Stations['Name']);
            $StationSort = determineNullOrFalse($Stations['Sort']);

            foreach($Stations['SubCategories'] as $SubCats) {

                $SubCatName = determineNullOrFalse($SubCats['Name']);
                $SubCatSort = determineNullOrFalse($SubCats['Sort']);

                foreach($SubCats['Items'] as $Items) {

                    $ProductId = determineNullOrFalse($Items['ProductId']);
                    $ProductImage = determineNullOrFalse($Items['ProductImage']);
                    $ProductName = determineNullOrFalse($Items['ProductName']);
                    $ShortDescription = determineNullOrFalse($Items['ShortDescription']);
                    $DietaryInfo = determineNullOrFalse($Items['DietaryInformation']);
                    $Serving = determineNullOrFalse($Items['Serving']);
                    $Calories = determineNullOrFalse($Items['Calories']);
                    $CaloriesFromFat = determineNullOrFalse($Items['CaloriesFromFat']);
                    $TotalFat = determineNullOrFalse($Items['TotalFat']);
                    $SaturatedFat = determineNullOrFalse($Items['SaturatedFat']);
                    $TransFat = determineNullOrFalse($Items['TransFat']);
                    $Cholesterol = determineNullOrFalse($Items['Cholesterol']);
                    $Sodium = determineNullOrFalse($Items['Sodium']);
                    $TotalCarbs = determineNullOrFalse($Items['TotalCarbohydrates']);
                    $DietaryFiber = determineNullOrFalse($Items['DietaryFiber']);
                    $Sugars = determineNullOrFalse($Items['Sugars']);
                    $Protein = determineNullOrFalse($Items['Protein']);
                    $Ingredients = determineNullOrFalse($Items['Ingredients']);
                    $error = determineNullOrFalse($Items['error']);
                    $HideFromDigitalSignage = determineNullOrFalse($Items['HideFromDigitalSignage']);
                    $ProductSort = determineNullOrFalse($Items['Sort']);
                    $Price = determineNullOrFalse($Items['Price']);
                    $IsVegan = determineNullOrFalse($Items['IsVegan']);
                    $IsVegetarian = determineNullOrFalse($Items['IsVegetarian']);
                    $IsKosher = determineNullOrFalse($Items['IsKosher']);
                    $IsHalal = determineNullOrFalse($Items['IsHalal']);
                    $IsGlutenFree = determineNullOrFalse($Items['IsGlutenFree']);
                    $ContainsShellfish = determineNullOrFalse($Items['ContainsShellfish']);
                    $ContainsPeanuts = determineNullOrFalse($Items['ContainsPeanuts']);
                    $ContainsTreeNuts = determineNullOrFalse($Items['ContainsTreeNuts']);
                    $ContainsMilk = determineNullOrFalse($Items['ContainsMilk']);
                    $ContainsWheat = determineNullOrFalse($Items['ContainsWheat']);
                    $ContainsSoy = determineNullOrFalse($Items['ContainsSoy']);
                    $ContainsEggs = determineNullOrFalse($Items['ContainsEggs']);
                    $ContainsFish = determineNullOrFalse($Items['ContainsFish']);
                    $IsDeemphasized = determineNullOrFalse($Items['IsDeemphasized']);
                    $Allergens = determineNullOrFalse($Items['Allergens']);

                    /* Execute the INSERT query */
                    $stmt->execute() ||
                    die( 'ERROR: ' . $stmt->error . PHP_EOL);

                }

            }

        }

    }

    /* Denote successful query and close the connection */
    echo "Records created successfully!";
    $link->close();

    /**
     * Determine if a variable is null or false and set it appropriately
     * @param $var The variable to evaluate
     * @return int The new value of the variable
     */
    function determineNullOrFalse($var) {

        /* Set a variable to -1 if null and 0 if false, otherwise leave it unchanged */
         if (is_null($var) || $var === NULL) {
            return -1;
        } else if ($var === false) {
             return 0;
        } else {
            return $var;
        }

    }