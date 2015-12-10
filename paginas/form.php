<!DOCTYPE HTML>

<html>
<head>
    <title>My reddit</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    
<img src="../afbeeldingen/reddit.png">
    
<div id="content">
<?php
  $connection = mysqli_connect('localhost', 'root');
	
  mysqli_select_db($connection, 'werkbon');
// define variables and set to empty values
$authorErr = $titleErr = $urlErr = $summaryErr = "";
$author = $title = $url = $summary = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["author"])) {
     $authorErr = "Username is required";
       
   }else{
       $author = $_POST["author"];
   }
   if (empty($_POST["title"])) {
     $titleErr = "Title is required";
   } else{
       $title = $_POST["title"];
   }
   
  if (empty($_POST["url"])) {
     $urlErr = "URL is required";
   } else{
       $url = $_POST["url"];
  }
   
   if (empty($_POST["summary"])) {
     $summaryErr = "Summary is required";
   }else{
       $summary = $_POST["summary"];
   }
}
   
?>

<div class="content">
<h2>Artikel toevoegen...</h2>
    <a href="http://localhost/Werkbonnen/Werkbon%201/paginas/"><img class="homeform" src="../afbeeldingen/home.png"></a>
<p class="text"><span class="error">* = required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <p class="text">
   Username: <input class="username" type="text" name="author" value="">
   <span class="error">* <?php echo $authorErr;?></span>
   <br><br>
   Title: <input type="text" name="title" value="">
   <span class="error">* <?php echo $titleErr;?></span>
   <br><br>
   URL: <input type="text" name="url" value="">
   <span class="error">* <?php echo $urlErr;?></span>
   <br><br>
   Summary: <textarea class="sum" name="summary" rows="6" cols="50"></textarea>
   <span class="error">* <?php echo $summaryErr;?></span>
   <br><br>
    <input type="submit" name="submit" value="Submit"> 
    </p>    
</form>


<?php
 if (isset($_POST['submit'])){
   $required = array('author', 'title', 'url', 'summary');
// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}
if ($error) {
  echo "All fields are required.";
} else {
$sql = "INSERT INTO tabel (author, title, url, summary)
VALUES ('$author', '$title', '$url', '$summary')";
    echo "Post added";
   header("Location: index.php");
    if ($connection->query($sql) === TRUE) {
   echo "Post added";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

}
    
     }
?>
    
    </div>

</body>
</html>

</div>
</body>
</html>
