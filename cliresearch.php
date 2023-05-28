<?php session_start(); ?>
<?php error_reporting(0); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="styles.css" rel="stylesheet">
        <link rel="icon" id="icon" href="/images/MedLinkAnimatedFavicon1.png">

        <!--<script src="favicon.js"></script>-->

        <title> MedLink | Clinical Research </title>
    </head>
    <body>
        <div class="header">
            <div class="title-container">
                <h1><a class="title-link" href="index.php">MEDLINK</a></h1>
            </div>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div id="set" class="set-menu">
                <ol class="set-menu">
                    <!-- Inbox Label -->
                    <li><i id="f25" class="fa fa-envelope" style="font-size:30px"></i></li>
                    <!-- Archive Label -->
                    <li><i id="f25" class="fa fa-inbox" style="font-size:34px"></i></li>
                        <li>
                            <?php
                                if(isset($_SESSION['username'])) {
                                  echo  
                                      "<button type='submit' name='signout' id='userProfileId' class='login-modal-btn p-relative'>
                                        Sign Out
                                       </button>";
                                }
                                else {
                                echo 
                                    "<a type='button' id='userProfileId' class='login-modal-btn p-relative' aria-expanded='false' data-expandable='false' href='login.php'>
                                        Sign In
                                    </a>";
                                }
                            ?>
                        </li>
                 </ol>
            </div>
            </form>
            <?php 
                if(isset($_POST['signout'])){ 
                    session_destroy(); 
                    header("Location: ".$_SERVER['PHP_SELF']); 
                }
            ?>
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
            <?php
                if(isset($_SESSION['username'])) {
                    echo    '<center>
                                <div class="plus" id="myBtn">
                                    <i class="fa fa-plus" style="font-size:50px"></i>
                                </div>
                            </center>';
                } else {
                    echo '<br><center><strong style="font-family: Oswald;">'."Sign In to Add Post".'</strong></center><br>';
                }
            ?>

            <!-- The modal container -->
            <div id="myModal" class="modal">
                <div class="design">
                    <h2 class="post-header">Posting as 
                        <?php
                            echo $_SESSION['username'];
                        ?>
                    <h2>
                    <form class="new" method="POST">
                        Title: <input type="text" name="title" autocomplete="off" placeholder="Enter post title" class="input"><br><br>
                        Post: <br><textarea type="text" name="post" rows="6" autocomplete="off" placeholder="Write your post" class="post"></textarea><br>
                        <br><button type="submit" name="submit" class="form-btn" id="submit-btn" formaction="cliresearch.php">Submit</button>
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
                    if ($_POST['title'] == '' || $_POST['post'] == '') {
                        echo "<script>
                                alert('Type something to post');
                              </script>";
                    } else {
                        // Sanitize and retrieve form data
                        $name = $_SESSION['username'];
                        $title = mysqli_real_escape_string($conn, $_POST['title']);
                        $post = mysqli_real_escape_string($conn, $_POST['post']);
                        $post = str_replace("\\r\\n", "\n", $post);

                        date_default_timezone_set('Asia/Kolkata');
                        $date = date("Y-m-d H:i:s");

                        // Prepare the SQL query
                        $stmt = $conn->prepare("INSERT INTO cliresearch (post_name, post_user, post, post_date) VALUES (?, ?, ?, ?)");

                        // Bind the sanitized input to the prepared statement
                        $stmt->bind_param("ssss", $title, $name, $post, $date);

                        // Execute the statement to insert the data into the table
                        $stmt->execute();
                    }
                }

                // Retrieve data from the database
                $result=mysqli_query($conn,"SELECT * FROM cliresearch ORDER BY post_id DESC");

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
	            <script type="text/javascript" src="https://services.webestools.com/cpt_visits/23317-10-9.js"></script></font></p>
            </div>
            
            <strong>&#169; 2023 <a class="whlink" href="about_us.php">MedLink</a></strong>
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

    ...Commented Code ends-->