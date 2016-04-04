<?php

require("functions.php");

if (isset($_POST['publication']) && count($_POST['publication'])) {
    $db = getDb();
    validate($_POST['publication'], $db);

    $query = getInsertQuery("publications", $_POST['publication']);
    if (mysqli_query($db, $query)) {
        $location = $_SERVER["HTTP_REFERER"];
        // $location.= (strpos($_SERVER["HTTP_REFERER"], "success=1") === false) ? "&success=1" : "";
        // header("Location: $location");
        exit();
    } else {
        echo $query.PHP_EOL;
        echo mysqli_error($db);
    }
}

function validate(&$postParams, &$db) {
    foreach ($postParams as $field => &$value) {
        $value = mysqli_real_escape_string($db, $value);
        switch ($field) {
            case 'isbn':
            case 'title':
                if (filter_var($value, FILTER_SANITIZE_STRING) === false) {
                    $error = "$value musi byt string";
                    break 2;
                }
                break;
            case 'edition':
            case 'numpages':
                if (filter_var($value, FILTER_VALIDATE_INT) === false) {
                    $error = "$value musi byt int";
                    break 2;
                }
                break;
        }
    }

    if (isset($error)) {
        die($error);
    }
}

echo "error occurred";