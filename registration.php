<?php
	require 'config.php';
	
	
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTOVERSE-REGISTRATION</title>
    <link rel="stylesheet" href="regstyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
	<script>
	</script>
<div class="wrapper">
		<form name="regform" action="registration.php" method="post">
			<?php
			if(isset($_POST['regsubmit'])){
				$nam = $_POST['nam'];
				$unam = $_POST['unam'];
				$email = $_POST['email'];
				$phone = $_POST['phn'];
				$pword =$_POST['pword'];
				$cpword = $_POST['cpword'];
				$duplicate = mysqli_query($conn, "SELECT * from userstable where username = '$unam' OR email = '$email'" );
			
				if(mysqli_num_rows($duplicate)>0){
					echo "<script>alert('duplicate email or username');</script>";
				}
				else{
					if($pword==$cpword){
						try{
						$query = "INSERT INTO userstable VALUES ('','$nam','$unam','$pword','$email','$phone')";
						mysqli_query($conn,$query);
						echo "<script>alert('Registered successfully');</script>";
						echo "<h1>SUCCESS</h1>";
						sleep(2);
						header("Location: login.php");
						}
						catch(Exception){
							echo "<script>alert('some db/php error');</script>";
							echo "<h1>DB/PHP error</h1>";
						}
					}
					else{
						echo "<script>alert('passwords dont match');</script>";
						echo "<h1>Passwords dont match</h1>";
					}
				}
			
				}
			?>
            <h1>Registration</h1>
            <div class="input-box">
                <div class="input-field">
                    <input type="text" name="nam" id="nam" placeholder="FullName" required><i class='bx bxs-user'></i>
                </div>
                <div class="input-field">
                    <input type="text" name="unam" id="unam" placeholder="UserName" required><i class='bx bxs-user'></i>
                </div>
            </div> 
            <div class="input-box">
                <div class="input-field">
                    <input type="text" name="email" id="email" placeholder="Email" required><i class='bx bx-envelope'></i>
                </div>
                <div class="input-field">
                    <input type="number" name="phn" id="phn" placeholder="Phonenumber" required><i class='bx bxs-phone'></i>
                </div>
            </div> 
            <div class="input-box">
                <div class="input-field">
                    <input type="password" name="pword" id="pword" placeholder="Password" required><i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-field">
                    <input type="password" name="cpword" id="cpword" placeholder="Confirm Password" required><i class='bx bxs-lock-alt'></i>
                </div>
            </div>
            <label><input type="checkbox">I hereby declare that the above information provided is true and correct</label>

            <input type="submit" name="regsubmit" value="Register" class="btn">
			
            <a href="index.php">Return to Home</a><br>
			<a href="login.php">already registered? login</a>
        </form>
    </div>
	
	<script>
    // Regex patterns
    const patterns = {
      nam: {
        regex: /^[a-zA-Z\s]{2,}$/,
        message: "Please enter a valid name (only letters and spaces, min 2 characters)."
      },
      unam: {
        regex: /^[a-zA-Z0-9_]{3,16}$/,
        message: "Username must be 3–16 characters, using letters, numbers, or underscores."
      },
      pword: {
        regex: /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/,
        message: "Password must be at least 6 characters and include a letter and a number."
      },
      email: {
        regex: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        message: "Please enter a valid email address."
      },
      phn: {
        regex: /^\+?\d{10,15}$/,
        message: "Phone number must be 10–15 digits, optionally starting with '+'."
      }
    };

    function validateField(fieldId) {
      const field = document.getElementById(fieldId);
      const { regex, message } = patterns[fieldId];
      const isValid = regex.test(field.value);

      field.classList.toggle("valid", isValid);
      field.classList.toggle("invalid", !isValid);

      if (!isValid) {
        alert(message);
      }

      return isValid;
    }

    // Attach onchange validation
    Object.keys(patterns).forEach(id => {
      const field = document.getElementById(id);
      field.addEventListener("change", () => validateField(id));
    });

    // Prevent form submission on invalid fields
    document.getElementById("regform").addEventListener("submit", function (e) {
      let isFormValid = true;

      Object.keys(patterns).forEach(id => {
        const valid = validateField(id);
        if (!valid) isFormValid = false;
      });

      if (!isFormValid) {
        e.preventDefault(); // prevent submission
      }
    });
  </script>

<!-- <form name="regform" action="registration.php" method="post">
	<div>
	Name: <input type="text" name="nam" id="nam" placeholder="name">
	Username: <input type="text" name="unam" id="unam" placeholder="username">
	</div>
	<br><br>
	<div>
	Email: <input type="text" name="email" id="email" placeholder="email">
	Phone: <input type="number" name="phn" id="phn" placeholder="phone number">
	</div>
	<br><br>
	<div>
	Password:<input type="password" name="pword" id="pword" placeholder="Password" required>
	Confirm Password:<input type="password" name="cpword" id="cpword" placeholder="Confirm Password" required>
	</div>
	<br><br>
	<input type="submit" name="regsubmit" value="register">
<br><br>
	
</form>
<p id="rdisp" name="rdisp">display results here</p>
<a href="login.php">already registered? login</a> -->


</body>
</html>