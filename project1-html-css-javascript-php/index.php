<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Home page of the company" />
    <meta name="keywords" content="HTML, CSS, JavaScript" />
    <meta name="author" content="Thi Thanh Thuy Tran" />
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home page</title>
</head>

<body>
    <?php 
        include_once("header.inc");
    ?>

    <main>
        <div class="image">
            <img class="index-img" src="images/greentech.jpeg" alt="">
            <div class="center">
                <h1>Together At GreenTech</h1>
                <h3>Join Our Talent Community</h3>
            </div>
        </div>


        <div id="aboutus">
            <div class="part-1">
                <h2>About us</h2>
                <p>The world-class talents creating largest ecosystem connect people and businesses at the intersection
                    of technology and humanity.</p>
            </div>
            <div class="container-1">
                <div>
                    <span class="iconAboutUs"><i class="fa fa-laptop"></i></span>
                    <h3>What we do?</h3>
                    <p>Improving everyday life while creating a more sustainable world.
                        We views the location of your home as a privilege. We want to welcome our customers by solving
                        everyday problems with convenient, secure, and shelf-stable solutions.</p>
                </div>
                <div>
                    <span class="iconAboutUs"><i class="fa fa-cloud"></i></span>
                    <h3>Why choose us?</h3>
                    <p>We provide smart home solutions that enable positive actions for the planet.
                        We put your privacy at the heart of our product, our two-factor authentication system and data
                        encryption keep your personal information safe.</p>
                </div>
                <div>
                    <span class="iconAboutUs"><i class="fa fa-home"></i></span>
                    <h3>Where are we?</h3>
                    <p>We don't innovate just for the sake of innovation. Instead, we're reinventing everyday life in
                        ways that challenge the status quo beyond simple improvements. We strive. We want to change the
                        way we interact with smart home technology.</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

    </main>

    <?php 
        include_once("footer.inc");
    ?>

</body>

</html>