<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>About Us</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');

body
{
    background-image: url("/images/blur_healthcare.jpg");
    background-size: cover;
    overflow: hidden;
}

.person1
{
    width: 430px;
    height: 160px;
    position: relative;
    top: 25px;
    left: 25px;
}


.person2
{
    width: 430px;
    height: 160px;
    position: relative;
    left: 550px;
    bottom: 135px;
}

.person3
{
    width: 430px;
    height: 160px;
    position: relative;
    left: 1125px;
    bottom: 295px;
}

h3
{
    position: relative;
    left: 165px;
    bottom: 165px;
    font-family: 'Kanit', sans-serif;
    font-size: 35px;
}

img
{
    height: 150px;
    width: 150px;
    border: 5px solid rgb(81, 80, 80);
    border-radius: 50%;

}

.quary
{
    height: 500px;
    width: 700px;
    position: relative;
    bottom: 250px;
    left: 450px;
    background-image: linear-gradient(to right, #010100, #1a1a1a, #1e1e1e, #2c2c2c, #3c3b3b);
    opacity: 0.5;
}

p
{
    font-size: 40px;
    color: #fff;
    /* font-family: 'Kanit', sans-serif; */
}

.name
{
    position: relative;
    top: 25px;
    left: 100px;
}

#name
{
    height: 25px;
    width: 350px;
    position: relative;
    left: 220px;
    bottom: 52px;

}

.email
{
    position: relative;
    bottom: 50px;
    left: 100px;
}

#email
{
    height: 25px;
    width: 350px;
    position: relative;
    left: 220px;
    bottom: 128px;

}

.message
{
    position: relative;
    bottom: 125px;
    left: 56px;
}

#message
{
    height: 200px;
    width: 350px;
    position: relative;
    left: 220px;
    bottom: 196px;

}

:placeholder-shown
{
    padding-left: 5px;
    font-size: 20px;
}

button
{
    position: relative;
    bottom: 145px;
    right: 60px;
    font-size: 25px;
}
</style>
<body>
    <div class="person1">
        <img src="/images/photo.png">
        <h3>Megh Sharma</h3>
        <a href="https://www.instagram.com/princeoffantasies/" style="position: relative; left: 170px; bottom: 180px; font-size: 25px;"><i class="fa-brands fa-instagram fa-2xl"></i></a>
        <a href="https://github.com/sharmamegh" style="position: relative; left: 200px; bottom: 180px; font-size: 25px;"><i class="fa-brands fa-github fa-2xl"></i></a>
        <a href="https://www.linkedin.com/in/meghsharma/" style="position: relative; left: 230px; bottom: 180px; font-size: 25px;"><i class="fa-brands fa-linkedin fa-2xl"></i></a>
    </div>

    <div class="person2">
        <img src="/images/photo.png">
        <h3>Pranjal Yadav</h3>
        <a href="https://www.instagram.com/pranjal__yadav__05/" style="position: relative; left: 170px; bottom: 180px; font-size: 25px;"><i class="fa-brands fa-instagram fa-2xl"></i></a>
        <a href="https://github.com/pranjal-yadav05" style="position: relative; left: 200px; bottom: 180px; font-size: 25px;"><i class="fa-brands fa-github fa-2xl"></i></a>
        <a href="#" style="position: relative; left: 230px; bottom: 180px; font-size: 25px;"><i class="fa-brands fa-linkedin fa-2xl"></i></a>
    </div>

    <div class="person3">
        <img src="/images/photo.png">
        <h3>Vatsal Ranpariya</h3>
        <a href="https://www.instagram.com/_vatsal.ranpariya_99/" style="position: relative; left: 170px; bottom: 180px; font-size: 25px;"><i class="fa-brands fa-instagram fa-2xl"></i></a>
        <a href="https://github.com/vatsal-939" style="position: relative; left: 200px; bottom: 180px; font-size: 25px;"><i class="fa-brands fa-github fa-2xl"></i></a>
        <a href="https://www.linkedin.com/in/vatsal-ranpariya-2507a4269/" style="position: relative; left: 230px; bottom: 180px; font-size: 25px;"><i class="fa-brands fa-linkedin fa-2xl"></i></a>
    </div>

    <div class="quary">
        <p class="name">Name:</p>
        <textarea name="name" id="name" cols="30" rows="10" placeholder="Username"></textarea>
        <p class="email">Email:</p>
        <textarea name="email" id="email" cols="30" rows="10" placeholder="Email-Id"></textarea>
        <p class="message">Message:</p>
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message."></textarea>
        <button type="submit">Submit</button>
    </div>
</body>
</html>