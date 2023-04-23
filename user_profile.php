<!DOCTYPE set="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Page</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="icon" id="icon" type="image/png" href="/images/MedLinkAnimatedFavicon1.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>

    <style>
    @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style: none;
    font-family: 'Josefin Sans', sans-serif;   
}

body
{
    background: #f3f3f3f3;
}

.round {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background-color: #ccc;
  margin-right: 10px;
  transform: scale(1.3);
}

.round i.fa-pencil {
  font-size: 14px;
}

.btn-warning {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background-color: #ffc107;
  color: #fff;
  border: none;
  padding: 20px;
  border-radius: 5px;
  cursor: pointer;
}

.btn-warning i.fa-upload {
  margin-right: 5px;
}

.fa-pencil {
    color: #fff;
    margin-top: 7px;
    font-size: 0.6em;
}

.wrapper
{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    display: flex;
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08)
}

.wrapper .top
{
    width:  130%;
    height: 30%;
    background: linear-gradient(to right, #01a9ac, #01dbdf);
    padding: 30px 25px;
    border-top-left-radius: 5px;
    text-align: center;
    color: #fff;   
}

.upload
{
    width: 100px;
    position: relative;
    margin: auto;
}

.upload img
{
    border-radius: 100%;
    border: 6px solid #eaeaea;
}

.upload .round
{
    position: absolute;
    bottom: 0;
    right: 0;
    background: linear-gradient(to right, #01a9ac, #01dbdf);
    line-height: 33px;
    text-align: center;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    overflow: hidden;
    position: absolute;
    transform: scale(2);
    opacity: 1;
    cursor: pointer;
}

.btn-warning
{
    position: relative;
    padding: 11px 16px;
    font-size: 15px;
    line-height: 1.5;
    border-radius: 3px;
    color: #fff;
    background-color: #ffc100;
    border: 0;
    overflow: hidden;
    transition: 0.2s;
    cursor: pointer;
    position: absolute;
    left: 0%;
    top: 0%;
    transform: scale(5);
    opacity: 0;
}

.btn-warning:hover
{
    background: #d9a400;
}

.wrapper .top h4
{
    margin-top: 10px;
    margin-bottom: 10px;
}

.wrapper .top p
{
    font-size: 12px;
}

.wrapper .bottom
{
    position: absolute;
    bottom: 0;
    height: 70%;
    width: 100%;
    background: #fff;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    padding: 30px 25px;
}

.wrapper .bottom .info
{
    margin-bottom: 25px;
}

.wrapper .bottom .info h3
{
    margin-bottom: 15px;
    padding-bottom: 5px;
    border-bottom: 1px solid #e0e0e0;
    color: #353c4e;
    text-transform: uppercase;
    letter-spacing: 5px;
}

.wrapper .bottom .info_data
{
    display: flex;
    justify-content: space-between;
}

.wrapper .bottom .info_data .data
{
    width: 45%;
}

.wrapper .bottom .info_data .data h4
{
    color: #353c4e;
    margin-bottom: 5px;
}
.wrapper .bottom .info_data .data p
{
    font-size: 13px;
    margin-bottom: 50px;
    color: #919aa3;
}
    </style>

    <body>
        <div class="wrapper">
            <div class="top">
                <div class="upload">
                    <img src="/images/profile.png" width="120" height="120" >
                    <div class="round">
                        <i class="fa-solid fa-pencil"></i>
                        <button type="button" class="btn-warning">
                            <i class="fa fa-upload"></i>Upload File
                        </button>
                    </div>
                </div>
                <h4>Dr. Sarah Williams</h4>
                <p>Head Surgeon, Orthopaedic Department</p>
            </div>

            <div class="bottom">
                <div class="info">
                    <h3>Information</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Username</h4>
                            <p>sarahwilliams</p>
                        </div>

                        <div class="data">
                            <h4>Email</h4>
                            <p>smw@medlinksupport.com</p>
                        </div>
                    </div>

                    <div class="info_data">
                        <div class="data">
                            <h4>About Me</h4>
                            <p>Fake identity created by one of the MedLink Internet Forum Developers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>