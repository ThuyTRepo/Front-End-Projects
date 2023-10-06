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
    <title>Enhancements</title>
</head>

<body>
    <?php 
    include_once("header.inc");
  ?>

    <h1 class="enhance-h1">Enhancements</h1>
    <div class="container-4">
        <h3 class="enhance-h3">1. Icons</h3>
        <p>Icons are used in <a href="index.php">Home Page</a> and <a href="#footer">footer</a> . Here are
            steps to implement icons in an HTML file using the Font Awesome CDN:</p>
        <ol class="enhance-ol">
              <li>Go to the Font Awesome website and find the CDN link under the "Get started with Font
                Awesome"
                section.</li>
            <li>Copy the CDN link provided for the version of Font Awesome you want to use. In this case,
                we'll use
                version 4.7.0.</li>
            <li>In your HTML file, add a link to the Font Awesome CSS file in the head section using the CDN
                link</li>
            <li>To use an icon, add an HTML tag with the class "fa" followed by the name of the icon you want
                to use.
            </li>
        </ol>        

        <h3 class="enhance-h3">2. Responsive web</h3>
        <p> Approach to designing web pages that allows them to adapt to different screen sizes and devices</p>
        <figure>
            <img src="images/res1.png" alt="Responsive Photo" class="responsive-pic">
            <figcaption>Responsive web for screen width >960px</figcaption>
        </figure>
        <figure>
            <img src="images/res2.png" alt="Responsive Photo" class="responsive-pic">
            <figcaption>Responsive web for screen width &lt; 960px </figcaption>
        </figure>

        

    </div>

    <?php 
        include_once("footer.inc");
    ?>

</body>

</html>


