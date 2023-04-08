<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital@1&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet">
    <link rel="icon" href="head.png">
    <title>Medlink</title>
</head>
<body>
<div class="header">
<nav class="top">
    <h1>MEDLINK</h1>  

    <i id="f25" class="fa fa-envelope" style="font-size:30px"></i>
    <i id="f25" class="fa fa-inbox" style="font-size:35px"></i>
</nav>
    <div class="navi">
    <nav class="bar">
    <form method="post">
    
    <button name="home" class="but"><a class="anchor" href="index.php">Home</a></button>
    <button name="fit" class="but"><a class="anchor" href="fitness.php">Fitness</a></button>
    <button name="news" class="but"><a class="anchor" href="news.php">Med-news</a></button>
    <button name="assist" class="but"><a class="anchor" href="assist.php">Assist</a></button>
    </form>
    </nav>
    </div>
</div>
    <div class="content">
    <?php
    $conn=mysqli_connect('localhost','root','','medlink');
    $result=mysqli_query($conn,"SELECT * FROM `posts`");
    while($row=mysqli_fetch_assoc($result))
    {   
        echo 
        '<div class="fetch">'.
        '<div class="title">'.$row['post_name'].'<br><hr>'.
        '</div>'.$row['post'].'<br><br>'.
        '<img src="profile.png" height="15px" width="15px"> &nbsp'.
        $row['post_user'].'<br>'.
        $row['post_date'].'</div><br>';     
    }
    
    ?>
    <div class="plus">  
    <?php
    echo "<a class='plus' href='add.php'><i class='fa fa-plus' style='font-size:50px'></i></a><br><br>";
    ?>
    </div>  
</div>
<div  class="learn">
   
    <div name="more" class="lm">	&#169; copyright 2023, all rights reserved</div>
</div>
</body>
</html>