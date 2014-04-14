<html>
<head>

</head>
<body>
<title>Voter</title>
<?php include("header.php");
include ("connection.php");
$urlsSql = "SELECT url FROM image_urls";
$results=mysqli_query($link,$urlsSql);
echo (!$results?die(mysqli_error($link)."<br>".$sql):"");
//list($url)=mysqli_fetch_array($results);
$count = mysqli_num_rows($results);
while(list($url) =  mysqli_fetch_array($results)) {

   echo $url."<br>";
}

?>
<table style="width:100%">
    <tr>
        <td style="width: 50%; padding: 2px;">
            <div class="panel panel-primary" class="votePanel">
                <div class="panel-heading">
                    <h3 class="panel-title">Subject A</h3>
                </div>
                <div class="panel-body">
                    Load Content Here
                </div>
            </div>
        </td>
        <td style="width: 50%; padding: 2px;">
            <div class="panel panel-primary" class="votePanel">
                <div class="panel-heading">
                    <h3 class="panel-title">Subject B</h3>
                </div>
                <div class="panel-body">
                    Load Content Here
                </div>
            </div>
        </td>
    </tr>
</table>

Here we have the vote engine...elo ranking...or other<br />
<a href="index.php">Back to the index page</a>



<?php include("footer.php") ?>
</body>
</html>