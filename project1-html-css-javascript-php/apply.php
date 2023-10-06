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
    <title>Application</title>
    <script src="./scripts/apply.js"></script> 
    <script src="./scripts/enhancement.js"></script>
</head>

<body class="apply-body">
    <?php
    include_once("header.inc");
    ?>

    <div class="apply-container">
        <div class="apply_box">
            <h1>
                Job Application
            </h1>
            <div class="job-reference-counter">You have <span id="count-timer"></span> left to complete the application</div>
            <div id="error-msg"></div>
            <form method="post" id="form-apply" enctype="multipart/form-data" action="processEOI.php" target="_blank" novalidate=”novalidate”>
                <div class="form_container">
                    <div class="form_control">
                        <label for="first_name"> First Name </label>
                        <input id="first_name" name="first_name" required="required" maxlength="20" placeholder="Enter First Name..." />
                    </div>
                    <div class="form_control">
                        <label for="last_name"> Last Name </label>
                        <input id="last_name" name="last_name" required="required" maxlength="20" placeholder="Enter Last Name..." />
                    </div>
                    <div class="form_control">
                        <label for="dob">Date of Birth</label>
                        <input type="text" id="dob" name="dob" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}" required>
                    </div>
                    <div class="form_control">
                        <label for="email"> Email </label>
                        <input type="email" id="email" name="email" required placeholder="Enter Email..." />
                    </div>
                    <div class="form_control">
                        <label for="job_ref"> Job Reference Number </label>
                        <input id="job_ref" name="job_ref" required="required" pattern="^\d{5}$" placeholder="Enter Job Ref..." />
                    </div>
                    <fieldset class="form_control">
                        <legend>Gender</legend>
                        <span>
                            <input type="radio" name="gender" id="female" value="female" checked>
                            <label for="female">Female</label>
                        </span>
                        <span>
                            <input type="radio" name="gender" id="male" value="male">
                            <label for="male">Male</label>
                        </span>
                    </fieldset>
                    <div class="form_control">
                        <label for="phone_number"> Phone Number </label>
                        <input id="phone_number" name="phone_number" pattern="^[ \d]{8,12}$" required placeholder="Enter Phone Number..." />
                    </div>
                    <div class="textarea_control">
                        <label for="address"> Address </label>
                        <textarea id="address" name="address" maxlength="40" required placeholder="Enter Address"></textarea>
                    </div>
                    <div class="textarea_control">
                        <label for="suburb"> Suburb/Town </label>
                        <textarea id="suburb" name="suburb" maxlength="40" required placeholder="Enter Surbub/Town"></textarea>
                    </div>
                    <div class="form_control">
                        <label for="state"> State </label>
                        <select id="state" name="state" required="required">
                            <option value="">Select state</option>
                            <option value="VIC">VIC</option>
                            <option value="NSW">NSW</option>
                            <option value="QLD">QLD</option>
                            <option value="NT">NT</option>
                            <option value="WA">WA</option>
                            <option value="SA">SA</option>
                            <option value="TAS">TAS</option>
                            <option value="ACT">ACT</option>
                        </select>
                    </div>

                    <div class="form_control">
                        <label for="postcode"> Postcode </label>
                        <input id="postcode" name="postcode" pattern="^\d{4}$" required placeholder="Enter Postcode..." />
                    </div>

                    <fieldset class="form_control">
                        <legend>Skill list</legend>
                        <p><label for="Java/Python/C">Java/Python/C</label>
                            <input type="checkbox" id="Java/Python/C" name="Skill[]" value="Java/Python/C" />
                        </p>
                        <p><label for="Cloud/AWS">Cloud/AWS</label>
                            <input type="checkbox" id="Cloud/AWS" name="Skill[]" value="Cloud/AWS" />
                        </p>
                        <p><label for="JavaScript">JavaScript</label>
                            <input type="checkbox" id="JavaScript" name="Skill[]" value="JavaScript" />
                        </p>
                        <p><label for="MySQL/NoSQL">MySQL/NoSQL</label>
                            <input type="checkbox" id="MySQL/NoSQL" name="Skill[]" value="MySQL/NoSQL" />
                        </p>
                        <p>
                            <label for="other-skills">Other skills...</label>
                            <input type="checkbox" id="other-skills" name="Skill[]" value="Otherskills" />
                        </p>
                        <p>
                            <textarea id="other-skills-input" name="other-skills-input" placeholder="Enter your other skills"></textarea>
                        </p>
                    </fieldset>



                    <div class="form_control">
                        <label for="upload"> Upload Your CV </label>
                        <input type="file" id="upload" name="upload" />
                    </div>
                </div>
                <div class="button_container">
                    <input type="submit" id="submit-form" value="Apply Now" />
                </div>
            </form>
        </div>
    </div>


    <?php
    include_once("footer.inc");
    ?>

</body>

<script>
    onLoadDocumentApplyPage();
</script>

</html>