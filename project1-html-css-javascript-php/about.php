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
  <title>About Me</title>

</head>

<body class="about-body">
  <?php 
    include_once("header.inc");
  ?>

  <h1 class="about-h1">About me</h1>
  <div class="container-3">
    <img src="images/profile.jpg" alt="Profile Photo" class="profile">
    <dl>
      <dt>Name:</dt>
      <dd>Thi Thanh Thuy Tran</dd>
      <dt>Student Number:</dt>
      <dd>103514782</dd>
      <dt>Tutor's Name:</dt>
      <dd>Jingwen Zhou</dd>
      <dt>Course:</dt>
      <dd>Master of Data Science</dd>
    </dl>

    <div class="clearfix"></div>

    <table>
      <caption>University Timetable</caption>
      <thead>
        <tr>
          <th>Day</th>
          <th>Time</th>
          <th>Class</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Monday</td>
          <td>9:00am - 11:00am</td>
          <td>COS60004</td>
        </tr>
        <tr>
          <td>Tuesday</td>
          <td>1:00pm - 3:00pm</td>
          <td>COS60008</td>
        </tr>
        <tr>
          <td>Wednesday</td>
          <td>9:00am - 11:00am</td>
          <td>COS60009</td>
        </tr>
        <tr>
          <td>Thursday</td>
          <td>1:00pm - 3:00pm</td>
          <td>COS60010</td>
        </tr>
        <tr>
          <td>Friday</td>
          <td>9:00am - 11:00am</td>
          <td>COS60008</td>
        </tr>
      </tbody>
    </table>
    <p>If you have any questions or comments, feel free to <a href="mailto:103514782@swin.edu.au"
        class="about-email">send me an email</a>.</p>
  </div>

   
  <?php 
        include_once("footer.inc");
  ?>
  
</body>

</html>