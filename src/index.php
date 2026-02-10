<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - Email Server</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background: #f0f2f5; margin: 0; }
        form { background: white; padding: 2.5rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 320px; }
        h2 { text-align: center; color: #333; margin-bottom: 1.5rem; }
        input { display: block; width: 100%; margin-bottom: 1.2rem; padding: 0.8rem; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        button { width: 100%; padding: 0.8rem; background: #007bff; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 1rem; font-weight: bold; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
    <form action="mail_form.php" method="POST">
        <h2>เข้าสู่ระบบ</h2>
        <input type="text" name="user" placeholder="ชื่อผู้ใช้งาน" required>
        <input type="password" name="pass" placeholder="รหัสผ่าน" required>
        <button type="submit">ล็อกอิน</button>
    </form>
</body>
</html>