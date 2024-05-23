<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>forget</title>
  <link rel="stylesheet" href="foget.css">
</head>
<body>
  <div class="container">
    <div class="form-box">
      <form action="" name="Formfill" onsubmit="return validation">
        <h2 class="re">Login In</h2>
        <p id="result"></p> 
       
        <div class="input-box">
        <label class="leb" for="year">Email</label>
          <i class='bx bxs-envelope'></i>
          <input type="email" name="email" placeholder="Email " >
        </div>
        
        <div class="input-box">
        <label class="leb">Re-Type Password</label>
          <i class='bx bxs-lock-alt'></i>
          <input type="password" name="password" placeholder="password" >
        </div>
        <div class="button">
          <input type="submit" value="Change" onclick="validation()" class="btn">
        </div> 
       
      </form>
    </div> 
</body>
</html>