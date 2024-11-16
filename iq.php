    <?php
    // Database connection
    $servername = "localhost"; // Change this to your MySQL server hostname
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = "tests"; // Change this to your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["Name"];
        $age = $_POST["Age"];
        $mobile = $_POST["Mobile"];
        // Assuming your form has 3 questions with names q1, q2, and q3
        $score = 0;
        if ($_POST["q1"] == "10") $score++;
        if ($_POST["q2"] == "Scalene") $score++;
        if ($_POST["q3"] == "6") $score++;
        if ($_POST["q4"] == "Mars") $score++;
        if ($_POST["q5"] == "3") $score++;
        if ($_POST["q6"] == "Paris") $score++;
        if ($_POST["q7"] == "H2O") $score++;
        if ($_POST["q8"] == "7") $score++;
        if ($_POST["q9"] == "13") $score++;
        if ($_POST["q10"] == "26") $score++;
        if ($_POST["q11"] == "Fleeting") $score++;
        if ($_POST["q12"] == "12") $score++;
        if ($_POST["q13"] == "17") $score++;
        if ($_POST["q14"] == "2:45") $score++;
        if ($_POST["q15"] == "Canberra") $score++;
        if ($_POST["q16"] == "William_Shakespeare") $score++;
        if ($_POST["q17"] == "Jupiter") $score++;
        if ($_POST["q18"] == "Au") $score++;
        if ($_POST["q19"] == "212 F") $score++;
        if ($_POST["q20"] == "Bureaucracy") $score++;
        if ($_POST["q21"] == "48") $score++;
        if ($_POST["q22"] == "$5") $score++;
        if ($_POST["q23"] == "25") $score++;
        if ($_POST["q24"] == "yes") $score++;
        if ($_POST["q25"] == "2.5") $score++;
        if ($_POST["q26"] == "2_hour") $score++;
        if ($_POST["q27"] == "78") $score++;
        if ($_POST["q28"] == "67") $score++;
        if ($_POST["q29"] == "1") $score++;
        if ($_POST["q30"] == "180") $score++;
        $incorrectAnswers = 30 - $score;
        $timeTaken = $_POST["TimeTaken"];

        // Insert data into database
        $sql = "INSERT INTO iq_table (Name, Age, Mobile, Score, IncorrectAnswers, TimeTaken)
        VALUES ('$name', '$age', '$mobile', '$score', '$incorrectAnswers', '$timeTaken')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close connection
    $conn->close();
    ?>
