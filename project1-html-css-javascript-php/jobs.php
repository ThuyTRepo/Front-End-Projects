<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Jobs recruitment of the company" />
    <meta name="keywords" content="HTML, CSS, JavaScript" />
    <meta name="author" content="Thi Thanh Thuy Tran" />
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Position Descriptions</title>
    <script src="./scripts/jobs.js"></script>
    <script src="./scripts/enhancement.js"></script>
</head>
<body>
    <?php
    include_once("header.inc");
    ?>
    <section class="search">
        <h1>Find your dream job</h1>
        <form action="/action_page.php" class="search-bar">
            <input type="text" id="search" placeholder="Search by job title" name="q">
            <button type="submit"><img src="images/search.png" alt="search icon"></button>
        </form>
    </section>

    <h2 class="job-h2">Jobs we offer:</h2>

    <?php
    require_once "settings.php";

    // Create a connection to the MySQL database
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create the job table if it doesn't exist
    $sql_create_table = "CREATE TABLE IF NOT EXISTS JOB (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    job_ref VARCHAR(5) NOT NULL,
    salary VARCHAR(100) NOT NULL,
    img VARCHAR(250) NOT NULL,
    description TEXT NOT NULL,
    requirements TEXT NOT NULL,
    responsibilities TEXT NOT NULL
)";

    if (!mysqli_query($conn, $sql_create_table)) {
        echo "Error creating table: " . mysqli_error($conn);
        mysqli_close($conn);
        exit;
    }

    // Insert job data into the table
    // Check if data exists
    $sql_select = "SELECT * FROM JOB";
    $result = mysqli_query($conn, $sql_select);

    if (mysqli_num_rows($result) <= 0) {
        $sql_insert = "INSERT INTO JOB (title,job_ref, salary, img, description, requirements, responsibilities) VALUES 
        ('DevOps Engineer','22312', 'Full time | $100000 - $120000 p.a', 'images/devops.png','You will be responsible for the construction and development of the pipeline, taking this product to new heights across the national landscape. This role is focused on giving you a lot of autonomy and continuous learning opportunities as the DevOps space is constantly changing and expanding.', 'Bachelor\'s degree in Computer Science, Information Technology, or related field\nExtensive experience with Azure services such as Storage Accounts, APIM, Azure Front Door, Azure Functions, Azure Web Apps, Azure Service Bus\nExperience with Docker and Managed Kubernetes Service\nExperience with infrastructure as code and CI/CD pipelines', 'Developing complex programs and scripts to support CI/CD processes\nProvide release management, database and application support\nGet involved in API debugging and development\nProvide guidance for other engineers'),
        ('Cloud Engineer', '12225','Full time | $120000 - $150000 p.a','images/cloud.jpeg', 'Due to our continued success, we are expanding and are looking for talented individuals to join us as Cloud Engineers. We look for strong technical performance, experience across multiple technology areas and solutions, customer obsession, a positive attitude, and a willingness to challenge and learn.', 'Bachelor\'s degree in Computer Science, Information Technology, or related field\n5+ years of experience in cloud engineering, with a focus on AWS/GCP\nExtensive knowledge of Golang and Python, and experience developing cloud-native applications\nExcellent communication skills with the ability to communicate complex technical concepts to non-technical stakeholders', 'Technical support and troubleshooting for a variety of exciting technologies (AWS, Microsoft)\nCommunication with customers on technical issues\nManage, troubleshoot, and resolve incidents, service requests, events, and problem tickets\nProvide a superior customer service experience')
        ";
    
        if (!mysqli_query($conn, $sql_insert)) {
            echo "Error inserting data: " . mysqli_error($conn);
            mysqli_close($conn);
            exit;
        }
    }

    // Retrieve job data from the table
    // Generate the HTML content dynamically
    $html = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '
        <aside>
            <img class="job-img" src="'.$row['img'].'" alt="">
        </aside>
        <a href="./apply.php?jobId='.$row['job_ref'].'" class="job-description-hyperlink">
        <section class="job">
            <h2>' . $row['title'] . '(#'. $row['job_ref'].')</h2>
            <h3>' . $row['salary'] . '</h3>
            <ol class="job-ol">
            <li>Description
            <p>' . $row['description'] . '</p>
            </li>
            <li>Key responsibilities
            <ul>';
            $responsibilities = explode("\n", $row['responsibilities']);
            foreach ($responsibilities as $responsibility) {
                $html .= '<li>' . $responsibility . '</li>';
            }

            $html .= '</ul>
                    </li>
                    <li>Technical Requirements
                        <ul>
                            <li>' . $row['requirements'] . '</li>
                        </ul>
                    </li>
                </ol>
            </section></a>';
        }
    } else {
        $html = '<p>No jobs available at the moment.</p>';
    }
    echo $html;
    // Close the database connection
    mysqli_close($conn);
    ?>
    
    <?php
    include_once("footer.inc");
    ?>

</body>
<script>
    onLoadJobDocument();
</script>
</html>