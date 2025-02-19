<?php
// เริ่มต้นเซสชัน
session_start();

// สร้าง CSRF Token หากยังไม่มี
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// ฟังก์ชันกรองข้อมูลผู้ใช้
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// ตัวแปรสำหรับเก็บข้อความแจ้งเตือน
$message = "";

// ประมวลผลเมื่อมีการส่งฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ตรวจสอบ CSRF Token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF token validation failed.");
    }

    // รับและกรองข้อมูลจากฟอร์ม
    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $message_content = sanitize_input($_POST['message']);

    // ตรวจสอบความถูกต้องของข้อมูล
    if (empty($name) || empty($email) || empty($message_content)) {
        $message = "กรุณากรอกข้อมูลให้ครบถ้วน";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "กรุณากรอกอีเมลให้ถูกต้อง";
    } else {
        // ข้อมูลผ่านการตรวจสอบ
        $message = "ส่งข้อมูลเรียบร้อยแล้ว!";
        // *** อาจเพิ่มการบันทึกลงฐานข้อมูลหรือส่งอีเมลที่นี่ ***
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มที่ปลอดภัย</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form label {
            font-weight: bold;
        }
        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        form button:hover {
            background-color: #45a049;
        }
        .message {
            margin-top: 20px;
            padding: 15px;
            background-color: #ffdddd;
            border-left: 6px solid #f44336;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>แบบฟอร์มที่ปลอดภัย</h1>
    <form method="POST" action="">
        <label for="name">ชื่อ:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">อีเมล:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">ข้อความ:</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <!-- CSRF Token -->
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <button type="submit">ส่งข้อมูล</button>
    </form>

    <?php if (!empty($message)): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>
</div>
</body>
</html>
