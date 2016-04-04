<?php

require("config.php");

/**
 * Connects to database by provided credentials
 *
 * @return resource MySQL link
 */
function getDb() {
    global $cfg;

    return mysqli_connect($cfg["dbHost"], $cfg["dbUser"], $cfg["dbPass"], $cfg["dbBase"]);
}

/**
 * Translates string in language provided by GET parameter
 *
 * @param  string $word word to translate
 * @return string       translated string
 */
function __($word) {
    if (isset($_GET['lang'])) {
        include("langs/".$_GET['lang'].".php");
    }
    else {
        include("langs/en.php");
    }

    return isset($translations[$word]) ? $translations[$word] : $word;
}

/**
 * Translate wrapper with echo functionality
 *
 * @param  string $word word to translate
 * @return null         instead of return it echoes the result
 */
function _e($word) {
    echo __($word);
}


/**
 * Gets query for insert to database
 *
 * @param  string $table       name of table
 * @param  array  $insertArray array of values
 * @return string              query
 */
function getInsertQuery($table, $insertArray) {
    return  sprintf("INSERT INTO `%s`(`%s`) VALUES('%s')",
            $table,
            implode("`,`", array_keys($insertArray)),
            implode("','", $insertArray));
}

function suggestAuthor() { 
    $result = mysqli_query(getDb(), "SELECT `firstname`, `lastname` FROM `authors`");       
    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
        echo "<option>". $row['firstname']. " ". $row['lastname']."</option>";
    }  
}