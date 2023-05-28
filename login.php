<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="styles.css" rel="stylesheet">
        <link rel="icon" id="icon" type="image/png" href="/images/MedLinkAnimatedFavicon1.png">

        <!--<script src="favicon.js"></script>-->

        <title> MedLink | Sign In </title>
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
            font-size: 22px;
        }
        .parent-box {
            display: flex;
        }

        .left {
            margin-right: 20px;
        }

        .bottom {
            text-align: center;

        }
        .bottom i {
            font-size: 25px;
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
                        Email : <br><br>
                        Password : <br><br>
                    </div>
                    <div class="right">
                        <input type="email" id="m1" name="mail" placeholder=" Enter your email" value="<?php echo isset($_POST['mail']) ? $_POST['mail'] : ''; ?>" autofocus><br><br>
                        <input type="password" id="p1" name="passwd" placeholder=" ********" value="<?php echo isset($_POST['passwd']) ? $_POST['passwd'] : ''; ?>"><br><br>
                    </div>
                </div>

                <div class="bottom">
                    <button type="submit" id="b1" class="form-btn" name="submit">Submit</button><br><br><hr>
                     <i>New here? <a class="whlink" href="signup.php">Create an account</a></i>
                </div>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Connection parameters
                $servername = "localhost";
                $username = "root";
                $password = "12345678";
                $database = "MedLink";

                // Get the email and password from the user
                
                if (isset($_POST['mail'])) {
                    // Access the form data
                    $email = $_POST['mail'];
                    // Use the value as needed
                } else {
                    // Handle the case when the key doesn't exist
                    echo "The key 'mail' is not present in the form data.";
                }

                if (isset($_POST['passwd'])) {
                    // Access the form data
                    $passwd = $_POST['passwd'];
                    // Use the value as needed
                } else {
                    // Handle the case when the key doesn't exist
                    echo "The key 'passwd' is not present in the form data.";
                }

                // Establish connection to the database
                $conn = mysqli_connect($servername, $username, $password, $database);

                // Check the connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                } else {
                    session_start();

                    // Prepare and execute the query
                    $stmt = $conn->prepare("SELECT * FROM login_data WHERE email = ? AND password = ?");
                    $stmt->bind_param("ss", $email, $passwd);
                    $stmt->execute();

                    // Fetch the result
                    $result = $stmt->get_result();

                    if($email == '' || $passwd == '') {
                        echo "<script>
                                alert('Enter your credentials again.');
                              </script>";
                    } else {
                        // Check if the email and password exist in the table
                        if ($result->num_rows > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $name = $row['email'];

                            $results=mysqli_query($conn,"SELECT email FROM login_data WHERE email = '$email'");
                            $rows=$results;
                            $user_name=$row['username'];
                            $_SESSION['username'] = $user_name;
                            // mysqli_query($conn,"INSERT INTO `session`(`name`) VALUES ('$name')");
                            echo "<script>window.location.href='index.php'</script>";
                        } else {
                            echo "<script>
                                    alert('Invalid Email or Password.');
                                  </script>";
                        }
                    }                    

                    // Close the prepared statement and the database connection
                    $stmt->close();
                    $conn->close();
                }
            }
            ?>
            

        </div>
    </body>
    <script>
        var mail = document.getElementById("m1");
        var pass = document.getElementById("p1");
        var button = document.getElementById("b1");

        mail.addEventListener("keydown", function(event) {
    
        if(event.keyCode==13){
            event.preventDefault();
            pass.focus();
        }
        })
        pass.addEventListener("keydown", function(event) {
        if(event.keyCode == 13){
            event.preventDefault();
            button.click();
         }
        })

    </script>
</html>

<!-- Commented Code begins...
    <div  class="header">
        <h1><a class="link" href="index.php">MEDLINK</a></h1>
    </div
        <form method="POST" action="">
            <input type="text" name="email" placeholder="Enter your email">
            <input type="password" name="passwd" placeholder="********">
            <button type="submit" class="form-btn" name="submit">Submit</button>
        </form>
    ...Commented Code ends-->