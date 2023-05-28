<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="styles.css" rel="stylesheet">
        <link rel="icon" id="icon" type="image/png" href="/images/MedLinkAnimatedFavicon1.png">

        <!--<script src="favicon.js"></script>-->

        <title> MedLink | Sign Up </title>
    </head>
    <style>
        @media (max-width:605px) {
            .box-input {
                font-size:15px;
            }
            .box {
                font-size:18px;
            }
        }
        .outer {
            display:flex;
            margin:auto;
            background-image:url("/images/tablet-medical-equipment.jpg");
            padding:50px;
            border-radius:20px;
            background-size: cover;
            background-attachment: fixed;
        }
        .outer-left {
            height:350px;
            width:350px;
            background-image:url("/images/tablet-medical-equipment.jpg");
            align-self:center;
            background-size: cover;
            background-attachment: fixed;
            margin:0;
        }
        .box {
            background-color:black;
            color:white;
            opacity:0.9;
            margin:0;
            align-self:center;
            padding:10px;
            border-radius:5px;
            font-size:25px;
        }
        .box input {
            font-size:22px;
        }
        .parent-box {
            display:flex;
        }

        .left {
            margin-right:20px;
        }

        .bottom {
            text-align:center;

        }
        .bottom i {
            font-size:25px;
        }
    </style>
    <body>
        <div class="header">
            <div class="title-container">
                    <h1><a class="title-link" href="index.php">MEDLINK</a></h1>
            </div>
        </div>

        <div class="outer">
            <form autocomplete="off" method="post" class="box">
                <div class="parent-box">
                    <div class="left">
                        Username : <br><br>
                        Email : <br><br>
                        Password : <br><br>
                        Confirm Password : <br><br>
                    </div>
                    <div class="right">
                        <input type="text" id="u1" name="username" placeholder=" Enter new username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" autofocus><br><br>
                        <input type="email" id="m1" name="mail" placeholder=" Enter your email" value="<?php echo isset($_POST['mail']) ? $_POST['mail'] : ''; ?>"><br><br>
                        <input type="password" id="p1" name="passwd" placeholder=" ********" value="<?php echo isset($_POST['passwd']) ? $_POST['passwd'] : ''; ?>"><br><br>
                        <input type="password" id="p2" name="pVerif" placeholder=" ********" value="<?php echo isset($_POST['pVerif']) ? $_POST['pVerif'] : ''; ?>"><br><br>
                    </div>
                </div>

                <div class="bottom">
                    <button type="submit" id="b1" class="form-btn" name="submit">Submit</button><br><br><hr>
                     <i>Existing user? <a class="whlink" href="login.php">Sign In</a></i>
                </div>
            </form>

            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Connection parameters
                    $servername = "localhost";
                    $uName = "root";
                    $password = "12345678";
                    $database = "MedLink";

                    // Get the email and password from the user

                    if (isset($_POST['username'])) {
                        // Access the form data
                        $username = $_POST['username'];
                        // Use the value as needed
                    } else {
                        // Handle the case when the 'username' key doesn't exist / is not present in the form data
                        $username = '';
                        echo "Kindly resubmit the form.";
                    }
                
                    if (isset($_POST['mail'])) {
                        // Access the form data
                        $email = $_POST['mail'];
                        // Use the value as needed
                    } else {
                        // Handle the case when the 'mail' key doesn't exist / is not present in the form data
                        $email = '';
                        echo "Kindly resubmit the form.";
                    }

                    if (isset($_POST['passwd'])) {
                        if (isset($_POST['pVerif'])) {
                            if($_POST['passwd'] == $_POST['pVerif']) {
                                // Access the form data
                                $passwd = $_POST['passwd'];
                                // Use the value as needed
                            } else {
                                // Handle the case when both entries of password do not match
                                echo "<script>
                                        alert('Password entries do not match');
                                    </script>";

                            }
                        } else {
                            // Handle the case when the 'pVerif' key doesn't exist / is not present in the form data
                            $passwd = '';
                            echo "Kindly resubmit the form";
                        }
                    } else {
                        // Handle the case when the 'passwd' key doesn't exist / is not present in the form data
                        $passwd = '';
                        echo "Kindly resubmit the form";
                    }
    
                    // Establish connection to the database
                    $conn = mysqli_connect($servername, $uName, $password, $database);

                    // Check the connection
                    if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                    }

                    session_start();

                    // Check if the username already exists in the login_data table
                    $usernameExistsQuery = "SELECT * FROM login_data WHERE username = ?";
                    $usernameExistsStmt = $conn->prepare($usernameExistsQuery);
                    $usernameExistsStmt->bind_param("s", $username);
                    $usernameExistsStmt->execute();
                    $usernameExistsResult = $usernameExistsStmt->get_result();

                    if ($usernameExistsResult->num_rows > 0) {
                        echo "<script>
                            alert('Username already exists. Please choose a different username.');
                        </script>";
                    } else {
                        // Check if the email already exists in the login_data table
                        $emailExistsQuery = "SELECT * FROM login_data WHERE email = ?";
                        $emailExistsStmt = $conn->prepare($emailExistsQuery);
                        $emailExistsStmt->bind_param("s", $email);
                        $emailExistsStmt->execute();
                        $emailExistsResult = $emailExistsStmt->get_result();

                        if ($emailExistsResult->num_rows > 0) {
                            echo "<script>
                                alert('Email already exists. Please use a different email.');
                            </script>";
                        } else {
                            // Proceed with sign-up
                            if($username == '' || $email == '' || $passwd == '')
                            {
                                echo "<script>
                                        alert('Enter your credentials again.');
                                    </script>";
                            } else {
                                // Prepare and execute the query
                                $signupQuery = "INSERT INTO login_data (username, email, password) VALUES (?, ?, ?)";
                                $signupStmt = $conn->prepare($signupQuery);
                                $signupStmt->bind_param("sss", $username, $email, $passwd);
                                $signupStmt->execute();

                                // Check if the sign-up was successful
                                if ($signupStmt->affected_rows > 0) {
                                    $_SESSION['username'] = $username;
                                    echo "<script>window.location.href='index.php'</script>";
                                } else {
                                    echo "<script>
                                        alert('Sign-up failed. Please try again.');
                                    </script>";
                                }

                                // Close the sign-up statement
                                $signupStmt->close();
                            }
                        }
                    }

                    // Close the username exists statement
                    $usernameExistsStmt->close();

                    // Close the email exists statement
                    $emailExistsStmt->close();

                    // Close the database connection
                    $conn->close();
                }
            ?>
            

        </div>
    </body>
    <script>
        var uName = document.getElementById("u1");
        var mail = document.getElementById("m1");
        var pass = document.getElementById("p1");
        var pass2 = document.getElementById("p2");
        var button = document.getElementById("b1");

        uName.addEventListener("keydown", function(event) {
    
        if(event.keyCode == 13){
            event.preventDefault();
            mail.focus();
        }
        })

        mail.addEventListener("keydown", function(event) {
    
        if(event.keyCode == 13){
            event.preventDefault();
            pass.focus();
        }
        })

        pass.addEventListener("keydown", function(event) {
        if(event.keyCode == 13){
            event.preventDefault();
            pass2.focus();
         }
        })

        pass2.addEventListener("keydown", function(event) {
        if(event.keyCode == 13){
            event.preventDefault();
            button.click();
         }
        })
    </script>
</html>

<!-- Commented Code begins...

    ...Commented Code ends-->