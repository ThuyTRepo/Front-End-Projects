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
    <h1 class="enhance-h1">PHP Enahncements</h1>
    <div class="container-4" id="enhance2">
        <h3 class="enhance-h3">1. Store job descriptions in a database table and have the HTML dynamically created by PHP </h3>
        <p>Use the timer for limited time to complete the application</p>
        <ol class="enhance-ol">
            <li>Create table JOB </li>
            <li>Insert job descriptions to table JOB </li>
            <li>Retrieve job data from the table</li>
            <li>Generate the HTML content dynamically in <a href="jobs.php">Jobs page</a> </li>
        </ol>

        <h3 class="enhance-h3">2. Sort EOIs by Field </h3>
        <p>Provide the manager with the ability to select the field on which to sort the order in which the EOI records are displayed.</p>
        <ol class="enhance-ol">
            <li>Go to page <a href="manage.php">Management</a></li>
            <li>Admin can see the records of EOIs sorted by EOI ID, Job Reference, First Name, Last Name or Status</li>
        </ol>
    </div>
    <?php 
        include_once("footer.inc");
    ?>
</body>

</html>