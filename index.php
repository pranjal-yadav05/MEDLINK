<?php error_reporting(0); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="styles.css" rel="stylesheet">
        <link rel="icon" id="icon" href="/images/MedLinkAnimatedFavicon1.png">

        <!--<script src="favicon.js"></script>-->

        <title> MedLink | Home </title>
    </head>
    <body>
        <div class="header">
            <div class="title-container">
                <h1 class="title"><a class="title-link" href="index.php">MEDLINK</a></h1>
            </div>
            <div id="set" class="set-menu">
                <ol class="set-menu">
                    <!-- Inbox Label -->
                    <li><i id="f25" class="fa fa-envelope" style="font-size:30px"></i></li>
                    <!-- Archive Label -->
                    <li><i id="f25" class="fa fa-inbox" style="font-size:34px"></i></li>
                    <!-- Authentication Label -->
                    <li><a type="button" id="userProfileId" class="login-modal-btn p-relative" aria-expanded="false" data-expandable="false" href="login.php">Sign In</a></li>
                </ol>
            </div>
        </div>

        <div class="nav-bar">
            <nav>
                &nbsp &nbsp    
                <a class="anchor navElement" href="index.php">Home</a>
                <a class="anchor navElement" href="patientcare.php">Patient Care</a>
                <a class="anchor navElement" href="cliresearch.php">Clinical Research</a>
                <a class="anchor navElement" href="hospops.php">Hospital Operations</a>
                &nbsp &nbsp
            </nav>
        </div>

        <div class="content">
            <center><div class="plus" id="myBtn"><i class="fa fa-plus" style="font-size:50px"></i></div></center>

            <!-- The modal container -->
            <div id="myModal" class="modal">
                <div class="design">
                    <h2 class="post-header">Posting as <u>*username*</u><h2>
                    <form class="new" method="POST">
                        Name : <input type="text" name="name" autocomplete="on" placeholder="Enter your name" class="input"><br><br>
                        Title: <input type="text" name="title" autocomplete="off" placeholder="Enter post title" class="input"><br><br>
                        Post: <br><textarea type="text" name="post" rows="6" autocomplete="off" placeholder="Write your post" class="post"></textarea><br>
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
                
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
            </script>

            <?php
                // Connection parameters
                $servername = "localhost";
                $username = "root";
                $password = "12345678";
                $database = "MedLink";

                // Establish connection to the database
                $conn = mysqli_connect($servername, $username, $password, $database);

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                //echo "Connected successfully";

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
                $result=mysqli_query($conn,"SELECT * FROM posts ORDER BY post_id DESC");

                // Display data in HTML format
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="fetch">
                            <div class="original-poster">
                                <a href="user_profile.php"><div class="pfp-preview"><img src="/images/profile.png" height="40px width="40px"></div></a> &nbsp'
                                . htmlspecialchars(stripslashes($row['post_user'])) . 
                            '</div><br><br>
                            <hr>
                            <div class="post_title">'
                                . htmlspecialchars(stripslashes($row['post_name'])) .
                            '</div><br>
                            <div class="post_content">'
                                . nl2br(htmlspecialchars(stripslashes($row['post']))) . 
                            '</div><br>
                            <div class="post_date">'
                                . htmlspecialchars(stripslashes($row['post_date'])) . 
                            '</div></div><br>';
                }
            ?>
        </div>
        
        <footer class="site-footer">
            <br>
            <div style="text-align: center;" class="scrolling-text-container">
                <p class="scrolling-text"><font size="+2.5" style="font-family: Oswald; vertical-align: middle;">MedLink Visit Count &nbsp : &nbsp
	            <script type="text/javascript" src="https://services.webestools.com/cpt_visits/23312-8-9.js"></script></font></p>
            </div>
            
            <strong>&#169; 2023 MedLink</strong></br>
            <i>Credits </i>: Background Image by 
            <a class="whlink" href="https://www.freepik.com/free-photo/tablet-medical-equipment_1315149.htm#page=25&query=medical%20phone&position=20&from_view=keyword&track=ais">
                Freepik
            </a>
        </footer>

        <script>
            //script for responsivity

            var mediaQuery = window.matchMedia("(max-width: 767px)");
            var element = document.getElementById("set");

            function handleViewportChange(mediaQuery) {
            if (mediaQuery.matches) {
                element.style.display = "none";
            } else {
                element.style.display = "block"; // Or any other desired display value
            }
            }

            mediaQuery.addListener(handleViewportChange); // Add listener to handle changes on viewport width
            handleViewportChange(mediaQuery); // Call the function initially to set the initial state
        </script>
    </body>
</html>

<!-- Commented Code begins...
'localhost', 'root', '12345678', 'MedLink'
'sql105.epizy.com', 'epiz_34148914', 'de2tDe3J2YEt', 'epiz_34148914_medlink'
error_reporting(E_ALL);
ini_set('display_errors', 1);
    ...Commented Code ends-->