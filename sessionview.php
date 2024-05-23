<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sessionview</title>
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
    <a href='/onlinetutor/session.php' class="add">New Add</a>
    
    <div class="text-center">

      <center><h2 class="list">INFORMATION IN DATABASE</h2></center>
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th> Sessions ID</th>
            <th>User ID</th>
            <th>Session Type</th>
            <th>Make At</th>
            <th colspan="2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
         include "dbconnection.php";
          
          $sql = "SELECT * FROM sessions";
          $result = $connection->query($sql);
          if (!$result) {
            die("Invalid query: " . $connection->error);
          }
          while ($row = $result->fetch_assoc()) {
            echo "
              <tr>
                <td>{$row['session_id']}</td>
                <td>{$row['user_id']}</td>
                <td>{$row['session_type']}</td>
                <td>{$row['makeAt']}</td> 
                
                 
                <td>
                  <a href='/onlinetutor/sessionedit.php?session_id={$row['session_id']}' class='btn btn-primary'>Edit</a>
                </td>
                <td>
                  <a href='/onlinetutor/sessiondelete.php?session_id={$row['session_id']}' class='btn btn-danger'>Delete</a>
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
