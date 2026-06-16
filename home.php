<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Jaffar ali" content="Author">
    <meta name="description" content="This is a website for beriyani">
    <title>Home</title>
    <style>
    .welcome{
        background-color:blue;
        color:white;
        padding:10px 25px;
        border-radius:25px;
        display: inline-block;
        font-weeight:bold;
    }
        ul{
    list-style-type: none;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
li{

    margin: 2rem;
    display: inline-block;
}
li a{
    text-deceration: none;
    color:white;

}
li a:hover, li a:focus{
text-decoration: underline;
color:gold;
}
br{
    padding:0 px;
    margin:0 px;
}
#h1{
    background-color:teal;
 }
#h2{
    background-color:darkcyan;
}
#s1{
    background-color:darkmagenta;
}
#s1 :hover{
     background-color: blue;
}

#s2{
    background-color: black;
}
#footer{
    background-color: cyan;
}

    </style>
</head>

<body>
    <div class="welcome">
    Hi!<?php echo $_SESSION['username'];?>
    </div>
    <header id="h1">
        <nav>
            <ul>
                <h2>
                    <font color="white">Khalids Non-vegetarian Restaurant</font>
                </h2>
                <li ><a href="sign.html">Sign-in</a></li>
                <li><a href="home.html">Home</a></li>
                <li><a href="menu.html">About</a></li>
                <li><a href="order.html">Order</a></li>
                <li><a href="login.html">Administration panel</a></li>
                <li><a href="feedback.php">Feedback</a></li>
            </ul>
        </nav>
    </header>
    <header id="h2">
        <center>
            <hr>
            <Address>
                <h2>
                    <font color="white">Bagalur housing board Avalapali Hosur-635110<br>
                        Phone: 044 28551951
                    </font>
                </h2>
            </Address>
            <hr>
        </center>
    </header>
    <main>
        <section id="s1">
            <h2>
                <font color="red">We establised in 2020</font>
            </h2>
            <u>
                <b>
                    <h3>
                        <font color="white">Mr.Abdul Rahman is the founder of khalids biryani restaurant since 2020.
                            Non-veg food cooked with care is a Authantic Arabian, Indian style biryani.
                            It is 100% Halal and good taste.It was prepared by our best biryani chef.
                            The price of all food can be Justified based on quality and quantities of Food.
                            Based on oder of Hosur peoples we do home delevery with their satisfications.
                        </font>
                    </h3>
                </b>
            </u>
        </section>
        <marquee>
            <img src="images\chicken.png" height="400" width="350">
            <img src="images\hid.jfif" height="400" width="350">
            <img src="images\mutton.jpg" height="400" width="350">
            <img src="images\vanjiram.jpg" height="400" width="350">
            <img src="images\prawn.jpg" height="400" width="350">
            <img src="images\thandoori_chicken.jpeg" height="400" width="350">
            <img src="images\sekabab.jpeg" height="400" width="350">
            <img src="images\kolambu.jpg" height="400" width="350">
            <img src="images\fish.jpg" height="400" width="350">
        </marquee>
        <section id="s2">
            <h2>
                <b>
                    <font color="white">
                        khalids biryani restaurants image.
                    </font>
                </b>
            </h2>
            <img src="images\shop.jpg" height="700" width="1350">
            <br>
        </section>
    </main>
    <footer id="footer">
        <center>
            <h2>
                Khalids Non-vegetarian Restaurant
            </h2>
            <b>
            since 2020
            </b>
            <b>
                <h3>All Day :10a.m - 9p.m</h3>
            </b>
            <b>
                <H2>Reservations</H2>
            </b>
            <b>FOR RESERVATION PLEASE CALLUS AT +91 6379335007 OR MAKE AN ONLINE RESERVATION.</b><br>
            <B>Thanking you for your support</B>
        </center>
    </footer>
</body>
</html>