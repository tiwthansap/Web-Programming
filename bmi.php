<?php
// ฟังก์ชันคำนวณ BMI
function calculateBMI($weight, $height) {
    $heightInMeters = $height / 100; // แปลงความสูงเป็นเมตร
    return $weight / ($heightInMeters * $heightInMeters);
}

// ฟังก์ชันแปลผล BMI และคำแนะนำ
function interpretBMI($bmi) {
    if ($bmi < 18.5) {
        return ["น้ำหนักน้อยกว่ามาตรฐาน", "ควรรับประทานอาหารที่มีประโยชน์ให้มากขึ้นและปรึกษาแพทย์หากจำเป็น"];
    } elseif ($bmi >= 18.5 && $bmi < 24.9) {
        return ["น้ำหนักปกติ", "ควรรักษาน้ำหนักและออกกำลังกายอย่างสม่ำเสมอ"];
    } elseif ($bmi >= 25 && $bmi < 29.9) {
        return ["น้ำหนักเกิน", "ควรควบคุมอาหาร ออกกำลังกาย และปรึกษาแพทย์เพื่อคำแนะนำเพิ่มเติม"];
    } else {
        return ["โรคอ้วน", "ควรรีบปรึกษาแพทย์และเริ่มแผนการควบคุมน้ำหนักอย่างเหมาะสม"];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลลัพธ์การคำนวณ BMI</title>
    <style>
       body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(to right, #6a82fb, #fc5c7d);
    color: #333;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 450px;
    padding: 30px;
    box-sizing: border-box;
    text-align: center;
    border: 2px solid #6a82fb;
}

h1 {
    font-size: 28px;
    color: #3b7bec;
    margin-bottom: 20px;
    font-weight: bold;
}

label {
    font-size: 14px;
    color: #555;
    margin-bottom: 8px;
    display: block;
    text-align: left;
}

input[type="text"] {
    width: 100%;
    padding: 15px;
    margin: 8px 0 16px 0;
    border: 2px solid #00aaff;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s;
}

input[type="text"]:focus {
    border-color: #3b7bec;
    outline: none;
}

input[type="submit"], input[type="reset"] {
    background: #6a82fb;
    color: white;
    padding: 14px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    width: 48%;
    margin: 10px 1%;
    transition: background 0.3s ease-in-out;
}

input[type="submit"]:hover, input[type="reset"]:hover {
    background: #3b7bec;
}

.reset-btn {
    background: #b3d7ff;
}

.reset-btn:hover {
    background: #6a82fb;
}

.form-footer {
    margin-top: 20px;
    font-size: 13px;
    color: #777;
}

    </style>
</head>
<body>
<div class="container">
    <h1>ผลลัพธ์การคำนวณ BMI</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];

        // เรียกใช้ฟังก์ชันคำนวณ BMI
        $bmi = calculateBMI($weight, $height);

        // เรียกใช้ฟังก์ชันแปลผล BMI
        list($bmiResult, $bmiAdvice) = interpretBMI($bmi);

       // แสดงผลลัพธ์
    echo "<div class='result'>";
    echo "<p>ชื่อ: $firstname $lastname</p>";
    echo "<p>อายุ: $age ปี</p>";
    echo "<p>น้ำหนัก: $weight กิโลกรัม</p>";
    echo "<p>ส่วนสูง: $height เซนติเมตร</p>";
    echo "<p>BMI: " . number_format($bmi, 2) . "</p>";
    echo "<p class='category'>ผลการประเมิน: $bmiResult</p>";
    echo "<p style='color: #777; font-size: 14px;'>คำแนะนำ: $bmiAdvice</p>";
    echo "</div>";
    } else {
        echo "<p>กรุณากรอกข้อมูลในฟอร์มเพื่อคำนวณ BMI</p>";
    }
    ?>

    <a href="bmi_form.php" class="back-link">กลับไปหน้าคำนวณ BMI</a>
</div>
</body>
</html>
