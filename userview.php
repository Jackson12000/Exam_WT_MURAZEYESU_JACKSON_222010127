<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Userview</title>
  <link rel="stylesheet" href="subjectview.css">
  <link rel="stylesheet" type="text/css" href="menustyle.css">
</head>
<body>
<header>
	<div class="menu_bar">
  <img class="logo" src="online.jpg" alt="Logo">
   
		<ul>
			<li><a href="menu.php"> Home</a></li>
			<li><a href="about"> About Us</a></li>
			<li><a href="contact.php"> Contact Us</a></li>
			<li><a href="payment.php"> Pyments</a></li>
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
					</ul>
				</div>

			</li>
			<li><a href="#"> Setting</a>
				<div class="dropdown_menu">
					<ul>
						<li><a href="account.php">Register</a></li>
						<li><a href="#">Edit Profile</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
					
				</div>

			</li>
		</ul>
	</div>
	</header>
  <div class="container">
    <a href='/onlinetutor/user.php' class="add">New Add</a>
    
    <div class="text-center">

      <center><h2 class="list">INFORMATION IN DATABASE</h2></center>
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th> User ID</th>
            <th>First Names </th>
            <th>Last Names </th>
            <th>DOB</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Registration Date</th>
            
            <th colspan="2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
         include "dbconnection.php";
          
          $sql = "SELECT * FROM users";
          $result = $connection->query($sql);
          if (!$result) {
            die("Invalid query: " . $connection->error);
          }
          while ($row = $result->fetch_assoc()) {
            echo "
              <tr>
                <td>{$row['user_id']}</td>
               
                <td>{$row['firstname']}</td>
                <td>{$row['lastname']}</td>
                <td>{$row['dob']}</td> 
                <td>{$row['email']}</td> 
                <td>{$row['username']}</td>
                <td>{$row['password']}</td> 
                <td>{$row['registrationDate']}</td> 
                <td>
                  <a href='/onlinetutor/useredit.php?user_id={$row['user_id']}' class='btn btn-primary'>Edit</a>
                </td>
                <td>
                  <a href='/onlinetutor/userdelete.php?user_id={$row['user_id']}' class='btn btn-danger'>Delete</a>
                </td>
              </tr>
            ";
          }
          ?>
        </tbody>
      </table>
      
    </div>
    <h2><marquee class="bu">WELCOME TO ONLINE TUTOR MARKETPLACE</marquee></h2>
  </div>
</body>
</html>
