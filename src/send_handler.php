<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 1. ดึง Library PHPMailer มาใช้งาน (ต้องอยู่ในโฟลเดอร์ src/vendor)
require 'vendor/autoload.php';

// ตั้งค่า Header ให้รองรับภาษาไทย
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        // --- 2. การตั้งค่า Server Gmail SMTP ---
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        
        // 🟢 แก้ไขตรงนี้: ใส่ Gmail และ App Password ของคุณ
        $mail->Username   = 'popcoat123coatpop@gmail.com'; 
        $mail->Password   = 'yvxo vchd opnj fbmy'; 
        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8'; // ทำให้ส่งภาษาไทยได้ไม่เป็นภาษาต่างดาว

        // --- 3. ตั้งค่าผู้ส่งและผู้รับ ---
        $mail->setFrom('popcoat123coatpop@gmail.com', 'ระบบส่งเมล PHP');
        $mail->addAddress($_POST['to_email']); 

        // --- 4. เนื้อหาอีเมล ---
        $mail->isHTML(true); // ส่งเป็นรูปแบบ HTML
        $mail->Subject = $_POST['subject'];
        
        // รับค่าข้อความและแปลงการกด Enter เป็น <br> ใน HTML
        $message_body = nl2br(htmlspecialchars($_POST['message']));
        $mail->Body    = "
            <div style='font-family: sans-serif; border: 1px solid #ddd; padding: 20px; border-radius: 10px;'>
                <h2 style='color: #007bff;'>คุณมีข้อความใหม่จากระบบ</h2>
                <hr>
                <p><strong>ข้อความ:</strong></p>
                <p>$message_body</p>
            </div>
        ";

        // --- 5. สั่งส่งเมล ---
        $mail->send();
        
        // แสดงหน้าจอสำเร็จแบบสวยงาม
        echo "
        <div style='text-align:center; padding-top: 50px; font-family: sans-serif;'>
            <div style='display:inline-block; padding: 40px; border-radius: 15px; background: #e6fffa; border: 1px solid #38b2ac;'>
                <h1 style='color: #2c7a7b; margin-bottom: 10px;'>✅ ส่งอีเมลสำเร็จ!</h1>
                <p style='color: #4a5568;'>อีเมลของคุณถูกส่งไปยัง <b>{$_POST['to_email']}</b> เรียบร้อยแล้ว</p>
                <br>
                <a href='mail_form.php' style='text-decoration:none; background:#3182ce; color:white; padding:10px 25px; border-radius:5px; font-weight:bold;'>กลับไปหน้าส่งเมล</a>
            </div>
        </div>";

    } catch (Exception $e) {
        // แสดงหน้าจอเมื่อเกิดข้อผิดพลาด
        echo "
        <div style='text-align:center; padding-top: 50px; font-family: sans-serif;'>
            <div style='display:inline-block; padding: 40px; border-radius: 15px; background: #fff5f5; border: 1px solid #feb2b2;'>
                <h1 style='color: #c53030; margin-bottom: 10px;'>❌ เกิดข้อผิดพลาด</h1>
                <p style='color: #4a5568;'>ไม่สามารถส่งเมลได้: {$mail->ErrorInfo}</p>
                <br>
                <a href='javascript:history.back()' style='text-decoration:none; background:#718096; color:white; padding:10px 25px; border-radius:5px;'>กลับไปแก้ไข</a>
            </div>
        </div>";
    }
} else {
    // ถ้าพยายามเข้าหน้านี้โดยตรงโดยไม่ผ่านฟอร์ม ให้ดีดกลับไปหน้า Login
    header("Location: index.php");
    exit();
}