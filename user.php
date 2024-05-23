<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
 
  <script>
    function confirmInsert() {
      return confirm('do you want to record?'); 
    }
</script>

  <link rel="stylesheet" href="style.css">
  
</head>
<body>
  <div class="container">
    <div class="form-box">
      <form action="useradd.php"  method="POST" name="Formfill" onsubmit="return validation" onsubmit=" return confirmInsert()">
        <h2 class="re">Register</h2>
        <p id="result"></p>
        <div class="input-box"> 
          <label class="leb" for="year">First Name</label>
          <i class='bx bxs-user'></i>

          <input type="text" name="firstname" placeholder="firstname" >
        </div>
        <div class="input-box">
        <label class="leb" for="lastname">Last name</label>
          <i class='bx bxs-user'></i>
          <input type="text" name="lastname" placeholder="lastname" >
        </div>
        <div class="input-box">
          <label class="leb" for="year">Select Year of Birth:</label>
         <select class="se" name="dob" id="dob" style="  width: 100%; height: 45px;" >
             <?php
             // Get the current year
             $currentYear = date('Y');
 
             // Loop through years from 1990 to the current year
             for ($year = 1990; $year <= $currentYear; $year++) {
                 echo "<option value=\"$year\">$year</option>";
             }
             ?>
         </select>
 </div>
        <div class="input-box">
           <label class="leb" for="email">Email</label>
          <i class='bx bxs-envelope'></i>
          <input type="email" name="email" placeholder="Email " >
        </div>
        <div class="input-box">
        <label class="leb" for="username">User name</label>
          <i class='bx bxs-user'></i>
          <input type="text" name="username" placeholder="Username" >
        </div>
        <div class="input-box">
        <label class="leb" for="year">Password</label>
        <i class="fa-regular  Eyecon"></i>
          <i class='bx bxs-lock-alt'></i>
          <input type="password" name="password" placeholder="password" >
        </div>
       
        <div class="button">
          <input type="submit" value="Register" onclick="validation()" class="btn">
        </div> <br>
        <div class="group">
          <span><a class="fo" href="#">Forget-password</a></span>
          <span><a href="index.php">Login</a></span>
        </div> 
      </form>
    </div>
    <div class="popup" id="popup">
      <ion-icon name="checkmark-circle-outline"></ion-icon>
    <h2>Thank your!</h2>
    <p>Your were Registration sucessfully. Thank!</p>
    <a href="#"> <button>Ok</button></a>
    <a href="#" onclick="closeSlide()"></a>
    </div>
  </div>
  
</body>
</html>