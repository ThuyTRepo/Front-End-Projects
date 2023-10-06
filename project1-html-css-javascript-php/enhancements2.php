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
    <div class="container-4" id="enhance2">
        <h3 class="enhance-h3">1. Implement a timer so that the user has 10 minutes to complete the
            application </h3>
        <p>Use the timer for limited time to complete the application</p>
        <ol class="enhance-ol">
            <li>Go to page <a href="apply.php">Application</a></li>
            <li>Check enhancement.js file, we will see setInterval function</li>
        </ol>

        <h3 class="enhance-h3">2. Dynamic display data </h3>
        <p>Use some jobs written and dynamically display the data in the jobs page</p>
        <ol class="enhance-ol">
            <li>Go to page <a href="jobs.php">Jobs</a></li>
            <li>Check enhancement.js file, we will display jobs dynamically</li>
        </ol>
    </div>

    <?php 
        include_once("footer.inc");
    ?>

</body>

</html>