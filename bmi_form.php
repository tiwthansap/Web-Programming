<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำนวณค่า BMI</title>
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
    <h1>คำนวณค่า BMI</h1>

    <form action="bmi.php" method="POST">
        <label for="firstname">ชื่อ</label>
        <input type="text" name="firstname" id="firstname" placeholder="กรอกชื่อ" required>

        <label for="lastname">นามสกุล</label>
        <input type="text" name="lastname" id="lastname" placeholder="กรอกนามสกุล" required>

        <label for="age">อายุ</label>
        <input type="text" name="age" id="age" placeholder="กรอกอายุ" required>

        <label for="weight">น้ำหนัก (kg)</label>
        <input type="text" name="weight" id="weight" placeholder="กรอกน้ำหนัก" required>

        <label for="height">ส่วนสูง (cm)</label>
        <input type="text" name="height" id="height" placeholder="กรอกส่วนสูง" required>

        <input type="submit" value="คำนวณ BMI">
        <input type="reset" value="รีเซ็ต" class="reset-btn">
    </form>
    
    <div class="form-footer">
        <p>กรุณากรอกข้อมูลให้ครบถ้วน</p>
    </div>
</div>

</body>
</html>