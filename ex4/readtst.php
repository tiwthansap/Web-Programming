<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read textfile</title>
</head>
<body>
    <h1>ข้อมูลชื่อ ใช้ fread</h1>
<?php
$myfile = fopen("myname.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("myname.txt"));
fclose($myfile);
?>
<h1>ข้อมูลชื่อ ใช้ fgets</h1>
<?php
$myfile = fopen("myname.txt", "r") or die("Unable to open file!");
echo fgets($myfile);
fclose($myfile);
?>

<h1>ข้อมูลชื่อ ใช้ fgets ร่วมกับ feof</h1>

<?php
$myfile = fopen("myname.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
?>

</body>
</html>