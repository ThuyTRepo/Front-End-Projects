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
    <h1>EOI Management</h1>
    <div class="container">
        <form method="post" action="manage.php">
            <h2>Search EOIs by Job Reference/Name</h2>
            <input type="text" name="search" placeholder="Search">
            <button type="submit">Search</button>
        </form>
        <!-- Delete All EOIs by job reference -->
        <form method="post" action="manage.php">
            <h2>Delete All EOIs with Job Reference Number</h2>
            <input type="text" name="job_reference" placeholder="Job Reference Number">
            <button type="submit" name="delete_all">Delete All</button>
        </form>
    </div>
    <!-- Sorting EOIs -->
    <form method="post" action="">
        <h2>Sort EOIs by Field</h2>
        <select name="sort_by">
            <option value="eoi_id">EOI ID</option>
            <option value="job_reference">Job Reference</option>
            <option value="first_name">First Name</option>
            <option value="last_name">Last Name</option>
            <option value="status">Status</option>
        </select>
        <button type="submit">Sort</button>
    </form>
    <?php
    // Database connection
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    require_once "settings.php";
    // Create a connection
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db) or die("Connection failed: " . mysqli_connect_error());

    // Function to display the EOIs in a table
    function displayEOIs($displayAllEOIs,$result)
    {
        if ($displayAllEOIs && mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>EOI ID</th><th>Job Ref</th><th>First Name</th><th>Last Name</th>
        <th>Street</th><th>Suburb</th><th>State</th><th>Postcode</th><th>Email</th>
        <th>Phone Number</th><th>Skills</th><th>OtherSkills</th><th>Status</th><th>Action</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["eoi_id"] . "</td>";
                echo "<td>" . $row["job_ref"] . "</td>";
                echo "<td>" . $row["fname"] . "</td>";
                echo "<td>" . $row["lname"] . "</td>";
                echo "<td>" . $row["street"] . "</td>";
                echo "<td>" . $row["suburb"] . "</td>";
                echo "<td>" . $row["state"] . "</td>";
                echo "<td>" . $row["postcode"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone_number"] . "</td>";
                echo "<td>" . $row["skills"] . "</td>";
                echo "<td>" . $row["otherSkills"] . "</td>";
                echo "<td>" . $row["Status"] . "</td>";
                echo "<td>";
                echo "<form method='post' action='manage.php'>";
                echo "<input type='hidden' name='action' value='delete'>";
                echo "<input type='hidden' name='eoi_id' value='" . $row["eoi_id"] . "'>";
                echo "<button type='submit'>Delete</button>";
                echo "</form>";
                echo "<form method='post' action='manage.php'>";
                echo "<input type='hidden' name='action' value='change_status'>";
                echo "<input type='hidden' name='eoi_id' value='" . $row["eoi_id"] . "'>";
                echo "<select name='new_status'>
                    <option value='New'>New</option>
                    <option value='Current'>Current</option>
                    <option value='Final'>Final</option>
                </select>";
                echo "<button type='submit'>Change Status</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } 
    }

    // Perform actions based on query parameters or form submissions
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sorting EOIs
        if (isset($_POST['sort_by'])) {
            $sortBy = $_POST['sort_by'];
            $sortQuery = '';

            // Determine the column to sort based on the selected field
            switch ($sortBy) {
                case 'job_reference':
                    $sortQuery = 'job_ref';
                    break;
                case 'first_name':
                    $sortQuery = 'fname';
                    break;
                case 'last_name':
                    $sortQuery = 'lname';
                    break;
                case 'status':
                    $sortQuery = 'Status';
                    break;
                default:
                    $sortQuery = 'eoi_id'; // Default sorting by EOI ID
                    break;
            }
            // Query: Sort EOIs based on the selected field
            $sql = "SELECT * FROM EOI ORDER BY $sortQuery";
            $result = mysqli_query($conn, $sql);

            // Display the sorted EOIs in a table
            displayEOIs(true, $result);
        }

        // Search by job reference number or name
        if (isset($_POST['search'])) {
            $searchTerm = $_POST['search'];

            // Query: Search EOIs by job reference number or name
            $sql = "SELECT * FROM EOI WHERE job_ref LIKE '%$searchTerm%' OR fname LIKE '%$searchTerm%' OR lname LIKE '%$searchTerm%'";
            $result = mysqli_query($conn, $sql);

            // Display the search results in a table
            displayEOIs(true,$result);
        }
        
         // Delete an EOI
         if ($_POST['action'] == 'delete' && isset($_POST['eoi_id'])) {
            $eoiID = $_POST['eoi_id'];

            // Query: Delete the EOI with
            // Query: Delete the EOI with the specified ID
            $sql = "DELETE FROM EOI WHERE eoi_id = '$eoiID'";
            if (mysqli_query($conn, $sql)) {
                echo "EOI deleted successfully.";
            } else {
                echo "Error deleting EOI: " . mysqli_error($conn);
            }
        }

        // Change the status of an EOI
        if ($_POST['action'] == 'change_status' && isset($_POST['eoi_id']) && isset($_POST['new_status'])) {
            $eoiID = $_POST['eoi_id'];
            $newStatus = $_POST['new_status'];

            // Query: Update the status of the EOI with the specified ID
            $sql = "UPDATE EOI SET Status = '$newStatus' WHERE eoi_id = '$eoiID'";
            if (mysqli_query($conn, $sql)) {
                echo "EOI status changed successfully.";
            } else {
                echo "Error changing EOI status: " . mysqli_error($conn);
            }
        }
    }


    // Delete all EOIs with a specified job reference number
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_all'])) {
        $jobRef = $_POST['job_reference'];

        // Validate job reference number (you may need to modify this validation according to your requirements)
        if (empty($jobRef)) {
            echo "Job reference number is required.";
        } else {
            // Query: Delete all EOIs with the specified job reference number
            $sql = "DELETE FROM EOI WHERE job_ref = '$jobRef'";
            if (mysqli_query($conn, $sql)) {
                echo "All EOIs with job reference number $jobRef have been deleted successfully.";
                // header("Location: manage.php"); // Redirect the user to the same page
                // exit; // Terminate the script to prevent further execution
            } else {
                echo "Error deleting EOIs: " . mysqli_error($conn);
            }
        }
    }

    // Query: List all EOIs
    $sql = "SELECT * FROM EOI";
    $result = mysqli_query($conn, $sql);

    // Display all EOIs in a table
    $displayAllEOIs = true; // Flag to control table visibility

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search']) || $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sort_by'])) {
        // If a search was performed, hide the table displaying all EOIs
        $displayAllEOIs = false;
    }

    displayEOIs($displayAllEOIs,$result);


    // Close the database connection
    mysqli_close($conn);
    ?>

</body>

</html>