<?php 
// Include the file containing database connection
include "dbconnection.php";

// Initialize variables to store error message and form data
$errorMessage = "";
$student_id = $tutor_id = $subject_id = $duration = $lesson_status = $lesson_id = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check if lesson_id is set in GET parameters
    if (!isset($_GET["lesson_id"])) {
        header("Location: lessonview.php");
        exit;
    }
    $lesson_id = $_GET["lesson_id"];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM lessons WHERE lesson_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $lesson_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $student_id = $row['student_id'];
        $tutor_id = $row['tutor_id'];
        $subject_id = $row['subject_id'];
        $duration = $row['duration'];
        $lesson_status = $row['lesson_status'];
    } else {
        header("Location: lessonview.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from POST parameters
    $lesson_id = $_POST['lesson_id'];
    $student_id = $_POST['student_id'];
    $tutor_id = $_POST['tutor_id'];
    $subject_id = $_POST['subject_id'];
    $duration = $_POST['duration'];
    $lesson_status= $_POST['lesson_status'];

    // Check for empty fields
    if (empty($lesson_id) || empty($student_id) || empty($tutor_id) || empty($subject_id) || empty($duration) || empty($lesson_status)) {
        $errorMessage = "All fields are required!";
    } else {
        // Use prepared statements to prevent SQL injection
        $sql = "UPDATE lessons SET student_id = ?, tutor_id = ?, subject_id = ?, duration = ?,lesson_status = ?  WHERE lesson_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssii", $student_id, $tutor_id, $subject_id, $duration, $lesson_status, $lesson_id);

        // Execute the SQL query
        if ($stmt->execute()) {
            header("Location: lessonview.php");
            exit;
        } else {
            $errorMessage = "Error updating record: " . $connection->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update About lesson </title>
    <script>
        function confirmUpdate() {
            return confirm('Do you want to update this record?');
        }
    </script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="menustyle.css">
    <style>
        /* Add your CSS styles here */
        body {
            background-color: #0073ff;
            font-family: Arial, sans-serif;
        }
        
        center {
            margin-top: 50px;
        }
        
        h1 {
            color: #333;
        }
        
        form {
            width: 400px;
            background-color: #008080;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        label {
            font-weight: bold;
            color: yellow;
            padding: 15px;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-weight: bold;
        }
        
        input[type="submit"] {
            padding: 15px 20px;
            background-color: #007bff;
            color: yellow;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        
        .he {
            color: white;
            background-color: blue;
            width: 400px;
            border-radius: 8px;
        }
        
        .em {
            color: black;
        }
        
        .tu {
            color: yellow;
        }
    </style>
</head>
<body>
<header>
	<div class="menu_bar">
  <img class="logo" src="online.jpg" alt="Logo">
   
		<ul>
			<li><a href="menu.php"> Home</a></li>
			<li><a href="about"> About Us</a></li>
			<li><a href="contact.php"> Contact Us</a></li>
			<li><a href="payment.php"> Payments</a></li>
			<li><a href="subjectview.php"> Subject</a></li>
			<li><a href="#"> Forms<i class="fas fa-caret-down"></i></a>
				<div class="dropdown_menu">
					<ul>
						<li><a href="subject.php">Subjects<i class="fas fa-caret-right"></i></a>
						<li><a href="booking.php">Booking</a></li>
						<li><a href="lesson.php">Lesson</a></li>
						<li><a href="tutor.php">Tutor </a></li>
						<li><a href="notification.php">Notification<i class="fas fa-caret-right"></i></a></li>
						<li><a href="student.php">Student </a></li>
						<li><a href="review.php">Review </a></li>
            <li><a href="session.php">Session </a></li>
            <li><a href="lesson.php">Lesson </a></li>
					</ul>
				</div>
        <li><a href="#"> Tables<i class="fas fa-caret-down"></i></a>
				<div class="dropdown_menu">
					<ul>
          <li><a href="tutorview.php">Tutor View</a></li>
						<li><a href="bookingview.php">Bookings<i class="fas fa-caret-right"></i></a>
						<li><a href="sessionview.php">View Session</a></li>
						<li><a href="notificationview.php">Notification view</a></li>
						<li><a href="subjectview.php">Subject View</a></li>
						<li><a href="reviewdata.php">riview information<i class="fas fa-caret-right"></i></a></li>
						<li><a href="studentview.php">Student View</a></li>
						<li><a href="paymentview.php">Payment View</a></li>
            <li><a href="lessonview.php">lesson View</a></li>
					</ul>
				</div>
			
			<li><a href="#"> Setting</a>
				<div class="dropdown_menu">
					<ul>
          <li><a href="user.php">Register</a></li>
            <li><a href="userview.php">Edit Profile</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
					
				</div>

			</li>
		</ul>
	</div>
	</header>
    <center>
        <div>
            <h1 class="he">Update Information About Students</h1>
        </div>
        <br><br>
        <form method="POST" onsubmit="return confirmUpdate();">
            <input type="hidden" name="lesson_id" value="<?php echo $lesson_id; ?>">
            <div>
                <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
            </div>
            <div>
                <input type="hidden" name="tutor_id" value="<?php echo $tutor_id; ?>">
            </div>
            <div>
                <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>">
            </div>
            <div>
                <label for="duration">Duration</label>
                <input class="em" type="text" name="duration" value="<?php echo $duration ; ?>" placeholder="Enter Duration">
            </div>
            <div>
                <label for="lesson_status">lesson_status</label>
                <input class="em" type="text" name="lesson_status" value="<?php echo $lesson_status ; ?>" placeholder="Enter lesson_status">
            </div>
            <div>
                <input type="submit" value="Update">
                <span class="error"><?php echo $errorMessage; ?></span>
            </div>
        </form>
    </center>
    <footer>
        <p style="color: white; text-align: center; margin-top: 40px; background-color: none; height: 40px;">
            <marquee>&copy; Copy_2024 &reg; Designed By Jackson_222010127_GrpA_BIT</marquee>
        </p>
    </footer>
</body>
</html>
