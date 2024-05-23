<?php
include 'dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student</title>
	<link rel="stylesheet" type="text/css" href="student.css">
  <link rel="stylesheet" type="text/css" href="menustyle.css">
 
  <script>
    function confirmInsert() {
      return confirm('do you want to record?'); 
    }
</script>

 
  
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
  <div class="container">
    <div class="form-box">
      <form action="studentadd.php" method="POST" name="Formfill" onsubmit="return validation" onsubmit=" return confirmInsert()">
        <h2 class="hi">Student</h2>
        <p id="result"></p>
        <div class="input-box">
        <label class="leb" for="year">Names</label> 

          <input type="text" required  name="name" placeholder="Enter names" >
        </div>
        <div class="input-box">
        <label class="leb" for="year">Email</label>
          <input type="email" required name="email" placeholder="Enter email" >
        </div>
        <div class="input-box">
        <label class="leb" for="year">Grade Level</label>
          <input type="text" required name="grade_level" placeholder="Enter grade level" >
        </div>
				<div class="input-box">
				<label class="label">Subject Id</label><br>
<select name="subject_id" id="subject_id" class="input"> 
<?php
$query = "SELECT subject_id,name FROM subjects";
$result = $connection->query($query);

if ($result && $result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$subject_id = $row['subject_id'];
$name=$row['name'];
echo "<option value=\"$subject_id\">$subject_id $name</option>";
}
}
?>
</select><br>

				</div>

       
        <div class="button">
          <input type="submit" value="Record" onclick="validation()" class="btn"> <br> <br>
          <input type="reset" value="Reset" onclick="validation()" class="btn">
        </div>
         
      </form>
    </div>
    
  </div>
  
</body>
</html>