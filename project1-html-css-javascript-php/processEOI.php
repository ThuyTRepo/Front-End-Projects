<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Home page of the company" />
  <meta name="keywords" content="HTML, CSS, JavaScript" />
  <meta name="author" content="Thi Thanh Thuy Tran" />
  <link rel="stylesheet" type="text/css" href="styles/style2.css">
  <title>processEOI Me</title>
</head>

<body>
    <div class="processEOI">
        <h2>Form application request</h2>
        <?php
        require_once "settings.php";
        // Create a connection to the MySQL database
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db) or die("Connection failed: " . mysqli_connect_error());;
        // Check if the request is a POST request
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            // Not a POST request, redirect to the apply.php page
            header("Location: apply.php");
            exit; // Terminate the script to prevent further execution
        }
        // Function check if table EOI exist & if not create table
        checkTable($conn);
        // Function adds an EOI record to the table
        executeInsertQuery($conn);
        mysqli_close($conn);


        function checkTable($conn)
        {
            // $tableName = "EOI";
            $isExistTableQuery = "SHOW TABLES LIKE 'EOI'";
            $result = mysqli_query($conn, $isExistTableQuery);
            // Check if the query was successful
            if ($result) {
                $isExistTable = mysqli_num_rows($result) > 0;
                //Case table exist
                if ($isExistTable) {
                    // echo "<h2>Table EOI exists in the database.</h2>";
                } else {
                    //Case table is not exist -> create table
                    echo "<h2>Table EOI does not exist in the database.</h2>";
                    createTable($conn);
                }
            } else {
                echo "<h2>Error checking table existence: " . mysqli_error($conn) . " </h2>";
            }
        }


        function createTable($conn)
        {
            //Create Table 
            $createTableQuery = "CREATE TABLE EOI ( eoi_id INT AUTO_INCREMENT PRIMARY KEY, 
                                job_ref VARCHAR(5) NOT NULL, fname VARCHAR(20) NOT NULL, 
                                lname VARCHAR(20) NOT NULL, street VARCHAR(40), suburb VARCHAR(40), 
                                state ENUM('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'), 
                                postcode CHAR(4) NOT NULL, skills VARCHAR(255) NOT NULL, 
                                email VARCHAR(255) NOT NULL, phone_number VARCHAR(12) NOT NULL, 
                                otherSkills TEXT, Status ENUM('New', 'Current', 'Final') DEFAULT 'New');";
            $createResult = mysqli_query($conn, $createTableQuery);
            if ($createResult) {
                // echo "<h2>Create table successful</h2>";
            } else {
                echo "<h2>Error checking creating table: " . mysqli_error($conn) . " </h2>";
            }
        }

        // Function to sanitize and validate field
        function validateField($input)
        {
            if (empty($input)) {
                // Display error message and redirect back to the form page
                // header("Location: apply.php?error=required_fields");
                echo "<h2>All fields must not be empty <a href='apply.php'>click here</a> to go back to re-apply</h2> ";
                exit();
            }
            // Sanitize leading/trailing spaces, backslashes, and HTML control characters
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }

        function getSanitizedData()
        {
            $jobRef = validateField($_POST['job_ref']); // Apply validateField() to job_ref field
            $firstName = validateField($_POST['first_name']);
            $lastName = validateField($_POST['last_name']);
            $street = validateField($_POST['address']);
            $suburb = validateField($_POST['suburb']);
            $state = validateField($_POST['state']);
            $postcode = validateField($_POST['postcode']);
            $email = $_POST['email'];
            $phoneNumber = $_POST['phone_number'];
            $skills = implode(', ', $_POST['Skill']);
            // $otherSkills = "";
            // if (in_array('Otherskills', $_POST['Skill'])) {
            //     $otherSkills = validateField($_POST['other-skills-input']);
            // }
            $otherSkills = $_POST['other-skills-input'];
            $data = array(
                'jobRef' => $jobRef,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'street' => $street,
                'suburb' => $suburb,
                'state' => $state,
                'postcode' => $postcode,
                'email' => $email,
                'phoneNumber' => $phoneNumber,
                'skills' => $skills,
                'otherSkills' => $otherSkills
            );
            return $data;
        }

        function getInsertQuery()
        {
            //santized data
            $data = getSanitizedData();
            // validate data
            $errorMsg = validateForm($data);
            $errorMsgString = '';
            if (!empty($errorMsg)) {
                foreach ($errorMsg as $error) {
                    $errorMsgString .= "<h3>$error</h3>";
                }
            }
            if (!empty($errorMsgString)) {
                echo $errorMsgString;
                echo "<h2> <a href='apply.php'>click here</a> to go back to re-apply</h2> ";
                exit();
            }
            $insertQuery = "INSERT INTO EOI (job_ref, fname, lname, street, suburb, state, postcode, skills, email, phone_number, otherSkills)
                VALUES ('" . $data['jobRef'] . "', '" . $data['firstName'] . "', '" . $data['lastName'] . "', '" . $data['street'] . "', '" . $data['suburb'] . "', '" . $data['state'] . "', '" . $data['postcode'] . "', '" . $data['skills'] . "', '" . $data['email'] . "', '" . $data['phoneNumber'] . "', '" . $data['otherSkills'] . "')";
            return $insertQuery;
        }


        function executeInsertQuery($conn)
        {
            $insertQuery = getInsertQuery();
            $result = mysqli_query($conn, $insertQuery);
            if ($result) {
                // Get the auto-generated EOInumber
                $eoiNumber = mysqli_insert_id($conn);
                echo "<h2>Expression of Interest submitted successfully. Your EOInumber is: $eoiNumber</h2>";
            } else {
                // Display an error message if the INSERT query fails
                echo "<h2>Error: " . mysqli_error($conn) . "</h2>";
            }
        }

        function validateForm($data)
        {
            $errors = array();
            // Job Reference number - exactly 5 alphanumeric characters
            if (!preg_match('/^[a-zA-Z0-9]{5}$/', $data['jobRef'])) {
                $errors[] = "Job Reference number must be exactly 5 alphanumeric characters.";
            }

            // First name - max 20 alpha characters
            if (strlen($data['firstName']) > 20 || !preg_match('/^[a-zA-Z]+$/', $data['firstName'])) {
                $errors[] = "First name must be maximum 20 alphabetical characters.";
            }

            // Last name - max 20 alpha characters
            if (strlen($data['lastName']) > 20 || !preg_match('/^[a-zA-Z]+$/', $data['lastName'])) {
                $errors[] = "Last name must be maximum 20 alphabetical characters.";
            }

            // Street address - max 40 characters
            if (strlen($data['street']) > 40) {
                $errors[] = "Street address must be maximum 40 characters.";
            }

            // Suburb/town - max 40 characters
            if (strlen($data['suburb']) > 40) {
                $errors[] = "Suburb/Town must be maximum 40 characters.";
            }

            // State - One of VIC,NSW,QLD,NT,WA,SA,TAS,ACT
            $validStates = array('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT');
            if (!in_array($data['state'], $validStates)) {
                $errors[] = "Invalid state selection.";
            }

            // Postcode - exactly 4 digits – matches state
            if (!preg_match('/^\d{4}$/', $data['postcode'])) {
                $errors[] = "Postcode must exactly 4 digits.";
            }

            //validate Postcode
            if (!validatePostcode($data['postcode'], $data['state'])) {
                $errors[] = "With state " . $data['state'] . ", the postcode must start with " . implode(' OR ', getValidPostcode($data['state']));
            }

            // Email address - validate format
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email address.";
            }

            // Phone number - 8 to 12 digits, or spaces
            if (!preg_match('/^[0-9 ]{8,12}$/', $data['phoneNumber'])) {
                $errors[] = "Invalid phone number.";
            }

            // Other skills - Text description not empty if checkbox selected
            if (in_array('Otherskills', $_POST['Skill']) && empty($data['otherSkills'])) {
                $errors[] = "Other skills description is required.";
            }

            return $errors;
        }

        function validatePostcode($postcode, $state)
        {
            $validDigits = getValidPostcode($state);
            $firstDigit = substr($postcode, 0, 1);
            return in_array($firstDigit, $validDigits);
        }
        function getValidPostcode($state)
        {
            switch ($state) {
                case "VIC":
                    return array(3, 8);
                case "NSW":
                    return array(1, 2);
                case "QLD":
                    return array(4, 9);
                case "NT":
                    return array(0);
                case "WA":
                    return array(6);
                case "SA":
                    return array(5);
                case "TAS":
                    return array(7);
                case "ACT":
                    return array(0);
                default:
                    return array();
            }
        }

        ?>
    </div>
</body>

</html>