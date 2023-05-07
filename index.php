<?php error_reporting(0); ?>

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

        <link href="styles.css" rel="stylesheet">
        <link rel="icon" id="icon" type="image/png" href="/images/MedLinkAnimatedFavicon1.png">

        <!--<script src="favicon.js"></script>-->

        <title> MedLink | Home </title>
    </head>
    <body>
        <div class="header">
            <nav>
                <div class="title-container"><h1><a class="link" href="index.php">MEDLINK</a></h1></div>
                <div class="set-menu">
                    <ol class="set-menu">
                        <!-- Inbox Label -->
                        <li><i id="f25" class="fa fa-envelope" style="font-size:30px"></i></li>
                        <!-- Archive Label -->
                        <li><i id="f25" class="fa fa-inbox" style="font-size:34px"></i></li>
                        <li><a type="button" id="userProfileId" class="login-modal-btn p-relative" aria-expanded="false" data-expandable="false" href="login.php">Sign In</a></li>
                    </ol>
                </div>
                </nav>
        </div>

        <div class="nav-bar">
            <nav>
                <form method="post">
                    <button name="Home" class="Button"><a class="anchor" href="index.php">Home</a></button>
                    <button name="PC" class="Button"><a class="anchor" href="patientcare.php">Patient Care</a></button>
                    <button name="CR" class="Button"><a class="anchor" href="cliresearch.php">Clinical Research</a></button>
                    <button name="HospOps" class="Button"><a class="anchor" href="hospops.php">Hospital Operations</a></button>
                </form>
            </nav>
        </div>

        <div class="content">
            <div class="plus"><a class="plus" id="myBtn" href="#"><i class="fa fa-plus" style="font-size:50px"></i></a><br><br></div>

            <!-- The modal container -->
            <div id="myModal" class="modal">
                <div class="design">
                    <h2 class="post-header">Posting as <u>*username*</u><h2>
                    <form class="new" autocomplete="off" method="POST">
                        Name : <input type="text" name="name" placeholder="Enter your name" class="input"><br><br>
                        Title: <input type="text" name="title" placeholder="Enter post title" class="input"><br><br>
                        Post: <br><textarea type="text" name="post" rows="6" placeholder="Write your post" class="post"></textarea><br>
                        <br><button type="submit" name="submit" class="form-btn" id="submit-btn" formaction="index.php">Submit</button>
                    </form>
                </div>
            </div>

            <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // When the user clicks the button, open the modal
                btn.onclick = function() {
                    modal.style.display = "block";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>

            <?php
                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                // Establish connection to the database
                $conn = mysqli_connect('localhost', 'root', '12345678', 'MedLink');

                // Check if form has been submitted
                if(isset($_POST['submit'])){
    
                    // Sanitize and retrieve form data
                    $name = mysqli_real_escape_string($conn, $_POST['name']);
                    $title = mysqli_real_escape_string($conn, $_POST['title']);
                    $post = mysqli_real_escape_string($conn, $_POST['post']);
                    $post = str_replace("\\r\\n", "\n", $post);
                    
                    date_default_timezone_set('Asia/Kolkata');
                    $date = date("Y-m-d H:i:s");

                    // Prepare the SQL query
                    $stmt = $conn->prepare("INSERT INTO posts (post_name, post_user, post, post_date) VALUES (?, ?, ?, ?)");

                    // Bind the sanitized input to the prepared statement
                    $stmt->bind_param("ssss", $title, $name, $post, $date);

                    // Execute the statement to insert the data into the table
                    $stmt->execute();
                }

                // Retrieve data from the database
                $result=mysqli_query($conn,"SELECT * FROM `posts`");

                // Display data in HTML format
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="fetch">' .
                         '<div class="title">' . htmlspecialchars(stripslashes($row['post_name'])) . '<br><hr>' .
                         '</div>' . nl2br(htmlspecialchars(stripslashes($row['post']))) . '<br><br>' .
                         '<img src="/images/profile.png" height="15px" width="15px"> &nbsp' .
                         htmlspecialchars(stripslashes($row['post_user'])) . '<br>' .
                         htmlspecialchars(stripslashes($row['post_date'])) . '</div><br>';
                }
            ?>
        </div>
        
        <footer class="site-footer">
                <strong>&#169; 2023 MedLink</strong></br>
                <i>Credits</i>: Background Image by 
                <a class="whlink" href="https://www.freepik.com/free-photo/tablet-medical-equipment_1315149.htm#page=25&query=medical%20phone&position=20&from_view=keyword&track=ais">
                    Freepik
                </a>
        </footer>
    </body>
</html>

<!-- Commented Code begins...

    ...Commented Code ends-->