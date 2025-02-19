<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $isValid = true; // ใช้ตัวแปรตรวจสอบว่าข้อมูลถูกต้องหรือไม่

  if (empty($_POST["name"])) {
    $nameErr = "กรุณากรอกชื่อ";
    $isValid = false;
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "อนุญาตให้ใช้เฉพาะตัวอักษรและช่องว่างเท่านั้น";
      $isValid = false;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "กรุณาระบุอีเมล";
    $isValid = false;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "รูปแบบอีเมลไม่ถูกต้อง";
      $isValid = false;
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
      $websiteErr = "URL ไม่ถูกต้อง";
      $isValid = false;
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "กรุณาระบุเพศ";
    $isValid = false;
  } else {
    $gender = test_input($_POST["gender"]);
  }

  // หากข้อมูลถูกต้อง ให้เพิ่มข้อมูลในไฟล์
  if ($isValid) {
    $myfile = fopen("studen.txt", "a") or die("Unable to open file!");
    $txt = "Name: $name\n Email: $email\n Website: $website\n Gender: $gender\n Comment: $comment\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    $successMessage = "บันทึกข้อมูลลงในไฟล์สำเร็จ!";
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
if (!empty($successMessage)) {
    echo "<h3 style='color: green;'>$successMessage</h3>";
}
?>

<h2>Your Input:</h2>
<?php
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</body>
</html>
