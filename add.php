<?php error_reporting(0); ?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link href="index.css" rel="stylesheet">
    <title>Add Post</title>
</head>
<style>
    h1{
    text-align:center;
    font-family: 'Oswald', sans-serif;
    font-size: 6vh;
    margin-right: 0;
    }
    body{
        background-image: url("img.jpg");
    }
    .sub{
        background-color:blue;
        color:whitesmoke;
    }
    .sub:active{
        background-color:black;
        color:white;
    }
    .new{
        text-align:center;
        font-size:3.5vh;
        font-family: 'IBM Plex Sans', sans-serif;
    }
    .inp,.pst{
        font-size:2.5vh;
        padding:2px;
        border-radius:5px;
        
    }
    .sub a{
        background-color:blue;
        color:whitesmoke;
    }
    .sub a:active{
        background-color:black;
        color:white;
        text-decoration:none;
    }
 
    h2{
        text-align:center;
        font-family: 'IBM Plex Sans', sans-serif;
    }
    .sub{
        font-size:2vh;
    }
    .design{
        background-color: black;
        opacity:0.5;
        color:white;
        width:auto;
        margin:auto;
        width:fit-content;
        height:fit-content;
        align-self:center;
        padding:50px;
        border-radius:20px;
    }
</style>
<body>
<h1>MEDLINK</h1> 
<br>
<div class="design">
<h2>Hey! you can enter new post here:<h2>
<form class="new" autocomplete="off" method="post">
Name : <input type="text" name="nam" class="inp"><br><br>
Title: <input type="text" name="titl" class="inp"><br><br>
Post: <br><textarea type="text" name="posst" rows="6" class="pst"></textarea><br>
<br><button name="butt" class="sub">Submit</button>&nbsp<button class="sub"><a href="index.php">back</a></button>
</form>
</div>
<?php
$conn=mysqli_connect('localhost','root','','medlink');
$title=($_POST['titl']);
$name=($_POST['nam']);
$post=($_POST['posst']);
date_default_timezone_set('Asia/Kolkata');

$dat=date("h:i a, d/m/y");
 if(isset($_POST['butt'])){
    $query="INSERT INTO posts(post_id,post_name,post_user,post,post_date) VALUES('','$title','$name','$post','$dat')";
    $result=mysqli_query($conn,$query);
}
?>

</body>
</html>