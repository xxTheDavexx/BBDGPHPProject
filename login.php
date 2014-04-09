<?php include("header.php") ?>

<?php

$referer = $_SERVER["HTTP_REFERER"];

echo "Here we will login...After login redirect to <a href='$referer'>$referer</a> (the referer)";

?>

<?php include("footer.php") ?>