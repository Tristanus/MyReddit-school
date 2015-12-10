<?php
  $connection = mysqli_connect('localhost', 'root');
	
  mysqli_select_db($connection, 'werkbon');
?>

<html>
    <head>
        <title>My Reddit Voetbal</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
    
        <img src="../afbeeldingen/reddit.png">
        <a href="http://localhost/Werkbonnen/Werkbon%201/paginas/"><img class="home" src="../afbeeldingen/home.png"></a>
        
        <div class="content"> 
        
       
        
        <?php

            $query = "select * from tabel";
            $id = $_GET['id'];
            $result = mysqli_query($connection, "SELECT * FROM tabel WHERE id=" . $id);
 
            while ($row = mysqli_fetch_assoc($result))
            {
            $reddit_id = $row["id"];
            $reddit_date = $row["date"];
            $reddit_title = $row["title"];
            $reddit_url = $row["url"];
            $reddit_summary = $row["summary"];
            $reddit_author = $row["author"];
            
            echo "
                    <h2>$reddit_title</h2>
                    
                    <p class='detail'>$reddit_summary</p>
                    
                    <p class='lees'><a target='_blank' href='$reddit_url'>Lees meer...</a></p>
                    
                    <p class='detail2'>Gepost op $reddit_date, door $reddit_author</p>
                  
                  
                    

            
            \n";
            
            }
            
        ?>
    </div>       
          
    </body>

</html>