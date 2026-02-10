<?php
// เช็ค Login (ถ้าไม่มีข้อมูล Login ให้ดีดกลับไปหน้าแรก)
if (!isset($_POST['user']) || $_POST['user'] !== 'admin' || $_POST['pass'] !== '1234') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เขียนอีเมลใหม่</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; padding: 2rem; background: #f0f2f5; }
        .container { max-width: 650px; margin: auto; background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); position: relative; }
        h2 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; }
        
        /* สไตล์ปุ่มล็อกเอาต์ */
        .logout-btn { 
            position: absolute; top: 20px; right: 20px; 
            background: #6c757d; color: white; text-decoration: none; 
            padding: 5px 15px; border-radius: 5px; font-size: 0.8rem; 
        }
        .logout-btn:hover { background: #dc3545; }

        label { display: block; margin-top: 15px; margin-bottom: 5px; font-weight: bold; color: #555; }
        input, textarea { width: 100%; padding: 0.8rem; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; font-size: 1rem; }
        button.send-btn { background: #28a745; color: white; border: none; padding: 1rem 2rem; border-radius: 6px; cursor: pointer; font-size: 1rem; font-weight: bold; width: 100%; margin-top: 20px; }
        button.send-btn:hover { background: #218838; }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="logout-btn">ออกจากระบบ</a>

        <h2>📧 เขียนอีเมลใหม่</h2>
        <form action="send_handler.php" method="POST">
            <label>ถึง (อีเมลผู้รับ):</label>
            <input type="email" name="to_email" placeholder="ตัวอย่าง: somchai@gmail.com" required>
            
            <label>หัวข้อเรื่อง:</label>
            <input type="text" name="subject" placeholder="ระบุหัวข้ออีเมล" required>
            
            <label>ข้อความ:</label>
            <textarea name="message" rows="8" placeholder="พิมพ์ข้อความของคุณที่นี่..."></textarea>
            
            <button type="submit" class="send-btn">ส่งอีเมลเดี๋ยวนี้</button>
        </form>
    </div>
</body>
</html>