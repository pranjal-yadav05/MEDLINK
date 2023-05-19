<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
     <head>
        <mata charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Page</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="icon" id="icon" href="/images/MedLinkAnimatedFavicon1.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <style>
body
{
    margin: 0;
    padding: 0;
    background-image: url("/images/healthcare.jpg");
    background-size: cover;
}

.wrapper
{
    height: 150px;
    width: 150px;
    position: relative;
    bottom: 80px;
    border: 5px solid gray;
    border-radius: 50%;
    background: url("/images/photo.png");
    background-size: 100% 100%;
    margin: 100px auto;
    overflow: hidden;
}

.my_file
{
    position: absolute;
    bottom: 0px;
    outline: none;
    color: transparent;
    width: 100%;
    box-sizing: border-box;
    padding: 15px 120px;
    cursor: pointer;
    transition: 0.5s;
    background: rgba(0, 0, 0, 0.5);
    opacity: 0;
}

.my_file::-webkit-file-upload-button
{
    visibility: hidden;
}

.my_file::before
{
    content: '\f030';
    font-family: fontAwesome;
    font-size: 22px;
    margin: -58px;
    color: #fff;
    display: inline-block;
    -webkit-user-select: none;
}

.my_file::after
{
    content: 'Update';
    font-family: 'arial';
    font-weight: bold;
    color: #fff;
    display: block;
    top: 30px;
    left: 51px;
    font-size: 14px;
    position: absolute;
}

.my_file:hover
{
    opacity: 1;
}

h1
{
    position: relative;
    bottom: 175px;
    text-align: center;
}

.content
{
    width: 102%;
    height: 150px;
    position: relative;
    bottom: 185px;
    right: 30px;
    margin-left: 23px;
    border: 2px solid black;
    border-radius: 10px;
    background-color: black;
    opacity: 0.8;
    color: #fff;
}

#change
{
    width: 210px;
    height: 50px;
    position: relative;
    bottom: 285px;
    left: 43%;
    border-radius: 20px;
}

button :hover
{
    cursor: pointer;
}
    </style>

    <body>
        <div class="wrapper">
        <input type="file" class="my_file">
        </div>
        
        <br><br><br>
        <div class="content">
            <center>
                Username: 
                <?php
                    echo $_SESSION['username'];
                ?>
            </center>
        </div><a href=""><button id="change">Change Information</button></a>
    </body>
</html>