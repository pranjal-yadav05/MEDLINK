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
        <link href="styles.css" rel="stylesheet">
        <link rel="icon" id="icon" type="image/png" href="/images/MedLinkAnimatedFavicon1.png">

        <!--<script src="favicon.js"></script>-->

        <title>Add Post</title>
    </head>

    <style>
        h1 {
        text-align:center;
        font-family: 'Oswald', sans-serif;
        font-size: 6vh;
        margin-right: 0;
        }

        body {
            background-image: url("/images/tablet-medical-equipment.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        font-family: Arial, Helvetica, sans-serif;
    
        /*
        object-fit: cover;
    
        background-size: contain;
        */

        /*
        background-image: url("img.jpg");
        */
        }

        .sub {
            background-color:blue;
            color:whitesmoke;
        }

        .sub:active {
            background-color:black;
            color:white;
        }

        .new {
            text-align:center;
            font-size:3.5vh;
            font-family: 'IBM Plex Sans', sans-serif;
        }

        .inp,.pst {
            font-size:2.5vh;
            padding:2px;
            border-radius:5px;
        
        }

        .sub a {
            background-color:blue;
            color:whitesmoke;
        }

        .sub a:active {
            background-color:black;
            color:white;
            text-decoration:none;
        }
 
        h2 {
            text-align:center;
            font-family: 'IBM Plex Sans', sans-serif;
        }

        .sub {
            font-size:2vh;
        }

        .design {
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

        <!-- HTML form to accept data -->
        <div class="design"><h2>Posting as <u>*username*</u><h2>
        <form class="new" autocomplete="off" method="POST">
            Name : <input type="text" name="name" placeholder="Enter your name" class="inp"><br><br>
            Title: <input type="text" name="title" placeholder="Enter post title" class="inp"><br><br>
            Post: <br><textarea type="text" name="post" rows="6" placeholder="Write your post" class="pst"></textarea><br>
            <br><button type="submit" name="Submit" class="form-btn" class="anchor">Submit</button>&nbsp<button class="form-btn"><a class="anchor"href="index.php">Back</a></button>
        </form>

        </div>

        <?php
            // Establish connection to the database
            $conn = mysqli_connect('localhost', 'root', '12345678', 'MedLink');

            // Check if form has been submitted
            if(isset($_POST['submit'])){
        
                // Sanitize and retrieve form data
                $title = mysqli_real_escape_string($conn, $_POST['title']);
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $post = mysqli_real_escape_string($conn, $_POST['post']);
                $post = str_replace("\r\n", "\n", $post); // replace Windows-style newlines with Unix-style
                $post = nl2br($post); // convert newlines to <br> tags
                $post = stripslashes($post); // Remove any slashes from the input


                date_default_timezone_set('Asia/Kolkata');
                $date = date("Y-m-d H:i:s");

                // Prepare the SQL query
                $stmt = $conn->prepare("INSERT INTO posts (post_name, post_user, post, post_date) VALUES (?, ?, ?, ?)");

                // Bind the sanitized input to the prepared statement
                $stmt->bind_param("ssss", $title, $name, $post, $date);

                // Execute the statement to insert the data into the table
                $stmt->execute();
                }
            ?>
    </body>
</html>

<!-- Commented Code begins...
<h2>Hey! you can enter new post here:<h2>
/*$date=date("h:i a, d/m/y");*/
/*$date = date("d-m-Y s:i:H");*/

*HTML form to accept data*
<form method="POST" action="">
    <input type="text" name="title" placeholder="Enter post title">
    <input type="text" name="name" placeholder="Enter your name">
    <textarea name="post" placeholder="Write your post"></textarea>
    <button type="submit" name="submit">Submit</button>
</form>
    ...Commented Code ends-->