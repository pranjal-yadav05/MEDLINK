<html>
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

        <title> MedLink | Sign In </title>
    </head>

    <style>
    .outer{
        display:flex;
        margin:auto;
        background-image:url("/images/tablet-medical-equipment.jpg");
        padding:50px;
        border-radius:20px;
        background-size: cover;
        background-attachment: fixed;
    }
    .outer-left{
        height:350px;
        width:350px;
        background-image:url("/images/tablet-medical-equipment.jpg");
        align-self:center;
        background-size: cover;
        background-attachment: fixed;
        margin:0;
    }
    .box{
        background-color:black;
        color:white;
        opacity:1;
        margin:0;
        align-self:center;
        padding:30px;
        border-radius:20px;
        font-size:25px;
    }
    .box input{
        font-size:22px;
    }
    .parent-box{
        display:flex;
    }
    .login_logo{
        text-align:center;
    }
    .left{
        margin-right:20px;
    }
    .head{
        text-align:center;
        background-image:url("/images/background.jpg");
        background-size: cover;
        background-attachment: fixed;
    }
    .bottom{
        text-align:center;

    }
    .bottom i{
        font-size:25px;
    }
    body{
        background-color:url("/images/background_new.jpg");
    }
    </style>

    <body>
        <div  class="head">
            <h1 class="login_logo"><a class="link" href="index.php">MEDLINK</a></h1>
        </div>

        <div class="outer">
            <form autocomplete="off" method="POST" action="" class="box">
                <div class="parent-box">
                    <div class="left">
                        Email : <br><br>
                        Password : <br><br>
                    </div>
                    <div class="right">
                        <input type="text" name="email" autocomplete="email" placeholder=" Enter your email"><br><br>
                        <input type="password" name="passwd" autocomplete="on" placeholder=" ********"><br><br>
                    </div>
                </div>

                <div class="bottom">
                    <button type="submit" class="form-btn" name="submit">Submit</button><br><br><hr>
                     <i>New here? Create an account <a href="#">here</a></i>
                </div>
            </form>
        </div>
    </body>
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