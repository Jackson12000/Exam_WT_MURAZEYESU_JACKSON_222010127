<?php
include "dbconnection.php";

// Initialize variables
$id = $firstname = $lastname = $dob = $email = $username = $password = $errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method: show the data of the subject
    if (!isset($_GET["user_id"])) {
        header("location: /onlinetutor/useredit.php");
        exit;
    }
    $id = $_GET["user_id"];

    // Read the row of the selected subject from the database
    $sql = "SELECT * FROM users WHERE user_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $dob = $row["dob"];
        $email = $row["email"];
        $username = $row["username"];
        $password = $row["password"];
    } else {
        header("location: /onlinetutor/user.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // POST method: update the data of the subject
    $id = $_POST["user_id"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if any field is empty
    if (empty($id) || empty($firstname) || empty($lastname) || empty($dob) || empty($email) || empty($username) || empty($password)) {
        $errorMessage = "All fields are required";
    } else {
        $sql = "UPDATE users SET firstname=?, lastname=?, dob=?, email=?, username=?, password=? WHERE user_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssssi", $firstname, $lastname, $dob, $email, $username, $password, $id);
        if ($stmt->execute()) {
            header("location: /onlinetutor/userview.php");
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
    <title>User Update</title>
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
        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
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
        
        input[type="submit"]:hover,
        input[type="reset"]:hover {
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
                    </ul>
                </div>
            </li>
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

    <div>
        <h1 class="he">UPDATE INFORMATION ABOUT SUBJECT</h1>
    </div>
    <br><br>
    <form method="POST">
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($id); ?>">
        <div>
            <label for="firstname">First Name</label>
            <div>
                <input class="em" type="text" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>" placeholder="Enter First Name">
            </div>
        </div>
        <div>
            <label for="lastname">Last Name</label>
            <div>
                <input class="em" type="text" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>" placeholder="Enter Last Name">
            </div>
        </div>
        <div>
            <label for="dob">Date of Birth</label>
            <div>
                <input class="em" type="text" name="dob" value="<?php echo htmlspecialchars($dob); ?>" placeholder="Enter Date of Birth">
            </div>
        </div>
        <div>
            <label for="email">Email</label>
            <div>
                <input class="em" type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Enter Email">
            </div>
        </div>
        <div>
            <label for="username">Username</label>
            <div>
                <input class="em" type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" placeholder="Enter Username">
            </div>
        </div>
        <div>
            <label for="password">Password</label>
            <div>
                <input class="em" type="password" name="password" value="<?php echo htmlspecialchars($password); ?>" placeholder="Enter Password">
            </div>
        </div>
        <div>
            <input class="submit" type="submit" value="UPDATE">
            <span class="error"><?php echo $errorMessage; ?></span>
        </div>
    </form>

</body>

</html>
