<?php
ini_set("error_reporting", 0);

if(isset($_GET['source'])) {
    highlight_file(__FILE__);
}

include "/var/www/html/flag.php";

function sanitize_path($p) {
        return 
str_replace(array("\0","\r","\n","\t","\x0B",'..','./','.\\','//','\\\\',),'',trim($p, 
"\x00..\x1F"));
}
$path = $_GET['path'];
if(isset($path) && str_contains($path, "/var/www/html/static/")) {
    die(file_get_contents(sanitize_path($path)));
}

?>

<html>
    <head>
        <title>Traversaller</title>
    </head>
    <body>
        <h1>Traversaller</h1>
        <p>To view the source code, <a href="/?source">click here.</a>
        <script src="/?path=/var/www/html/static/flag.js"></script>
    </body>
</html>

