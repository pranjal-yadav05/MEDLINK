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

        <title> MedLink | Patient Care </title>
    </head>
    <body>
        <div class="header">
            <nav>
                <div class="title-container"><h1>MEDLINK</h1></div>
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
            <?php
                echo '<div class="plus"><a class="plus" href="add.php"><i class="fa fa-plus" style="font-size:50px"></i></a><br><br></div>';

                // Establish connection to the database
                $conn = mysqli_connect('localhost', 'root', '12345678', 'MedLink');

                // Retrieve data from the database
                $result=mysqli_query($conn,"SELECT * FROM `posts`");

                // Display data in HTML format
                while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="fetch">' .
                     '<div class="title">' . htmlspecialchars(stripslashes($row['post_name'])) . '<br><hr>' .
                     '</div>' . nl2br(htmlspecialchars(stripslashes($row['post']))) . '<br><br>' .
                     '<img src="profile.png" height="15px" width="15px"> &nbsp' .
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
    <button name="home" class="but"><a class="anchor" href="index.php">Home</a></button>
    <button name="fit" class="but"><a class="anchor" href="fitness.php">Fitness</a></button>
    <button name="news" class="but"><a class="anchor" href="news.php">Med-news</a></button>
    <button name="assist" class="but"><a class="anchor" href="assist.php">Assist</a></button>
    ...Commented Code ends-->