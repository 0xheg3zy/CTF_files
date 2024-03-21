<?php
 ini_set("error_reporting", 0);
 ini_set("short_open_tag", "Off");

 if(isset($_GET['source'])) {
     highlight_file(__FILE__);
 }

 include "flag.php";

 $input = $_GET['input'];

 if(preg_match('/[^\x21-\x7e]/', $input)) {
     die("Illegal characters detected!");
 }

$filter = array("<?php", "<? ", "?>", "echo", "var_dump", "var_export", "print_r", "FLAG");
$filter = array("<?php", "<? ", "?>","*", "/", "var_dump", "var_export", "print_r", "FLAG");
foreach($filter as &$keyword) {
    if(str_contains($input, $keyword)) {
        die("PHP code detected!\n");
    }
} 
eval("?>" . $input);

echo "\n";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Flavel Challenge</h1>
    <p>to get source , <a href="index.php?source">click here</a></p>
</body>
</html>