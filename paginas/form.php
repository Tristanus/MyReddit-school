<!DOCTYPE HTML>

<html>
<head>
    <title>My reddit</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <script>
  (function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#myform").validate({
                rules: {
                    author: "required",
                    title: {
                        required: true,
                    minlength: 10
                    },
                    url: {
                        required: true,
                        url: true
                    },
                    summary: {
                        required: true,
                        minlength: 100
                    },
                },
                messages: {
                    author: "Please enter your username",
                    title: {
                        required: "Please provide a title",
                        minlength: "Your title must be at least 10 characters long"
                    },
                    url: {
                        required: "Please provide a url",
                        url2: "please give a valid url"
                    },
                    summary: {
                        required: "Please provide a summary",
                        minlength: "The summary must be aleast 100 characters long"
                    },
                  
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }
    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
})(jQuery, window, document);
    
    </script>
</head>

<body>
    
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
       $author = mysqli_real_escape_string($connection,$author);
   }
   if (empty($_POST["title"])) {
     $titleErr = "Title is required";
     $title = mysqli_real_escape_string($connection,$title);   
   } else{
       $title = $_POST["title"];
   }
   
  if (empty($_POST["url"])) {
     $urlErr = "URL is required";
     $url = mysqli_real_escape_string($connection,$url);
   } else{
       $url = $_POST["url"];
  }
   
   if (empty($_POST["summary"])) {
     $summaryErr = "Summary is required";
     $summary = mysqli_real_escape_string($connection,$summary);   
   }else{
       $summary = $_POST["summary"];
   }
}
   
?>   
    
<img src="../afbeeldingen/reddit.png">

<div class="content">
<h2>Artikel toevoegen...</h2>
    <a href="http://localhost/Werkbonnen/Werkbon%201/paginas/"><img class="homeform" src="../afbeeldingen/home.png"></a>
<p class="text"><span class="error">* = required field.</span></p>
<form id="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <p class="text">
   Username: <input class="username" type="text" name="author" value="">
   <br><br>
   Title: <input type="text" name="title" value="">
   <br><br>
   URL: <input type="text" name="url" value="">
   <br><br>
   Summary: <textarea class="sum" name="summary" rows="6" cols="50"></textarea>
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
