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
        
        <div class="addpage">
            
            <a class="voegtoe" href="http://localhost/Werkbonnen/Werkbon%201/paginas/form.php">Add              post...</a>
        
        </div>
        
        
    <div class="content"> 

        <h1>My Reddit - Voetbal</h1>
        
        <table>
            <tr>
                <th>Titel</th>  <th>Datum</th>  <th>Auteur</th>
            
            </tr>
        
        <?php
            
            

            $query = "select * from tabel ORDER BY id DESC"; 
            
  
            $result = mysqli_query($connection, $query);
 
            while ($row = mysqli_fetch_assoc($result))
            {
            $reddit_id = $row["id"];
            $reddit_date = $row["date"];
            $reddit_title = $row["title"];
            $reddit_url = $row["url"];
            $reddit_summary = $row["summary"];
            $reddit_author = $row["author"];
                
            $small = substr($reddit_summary, 0 , 100);
            
            echo "<tr>
                    <td><a href='detail.php?id= $reddit_id'>$reddit_title</a></td>
                    <td>$reddit_date</td>
                    <td>$reddit_author</td>
                  </tr>
                    <td>$small...</td>
            
            \n";
            
            }
            
        ?>
                 
        </table>
    </div>       
          
    </body>

</html>