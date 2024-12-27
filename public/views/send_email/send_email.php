<?php
// Include the Composer autoloader
require '../../../vendor/autoload.php';

// Instansiasi objek PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

// Mengatur SMTP untuk mengirimkan email
$mail->isSMTP();
$mail->Host = 'smtp.office365.com'; // Ganti dengan SMTP server yang Anda gunakan
$mail->SMTPAuth = true;
$mail->Username = 'mes.it2@jne.co.id'; // Ganti dengan alamat email Anda
$mail->Password = 'j8BP6qAd3P'; // Ganti dengan password email Anda
$mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587; // Port yang digunakan (biasanya 587 atau 465 untuk SSL)

// Mengatur email pengirim
$mail->setFrom('mes.it2@jne.co.id', 'Budiman'); // Ganti dengan alamat dan nama Anda
$mail->addAddress('mes.it1@jne.co.id', 'Gema'); // Ganti dengan alamat email penerima

// Mengatur subjek dan isi email
$mail->Subject = 'Cancel Resi Orion Hybrid';
$mail->Body    = 'Resi 1 Resi 2';

// Mengecek apakah pengiriman berhasil
if ($mail->send()) {
    echo 'Pesan telah terkirim';
} else {
    echo 'Pesan gagal dikirim. Error: ' . $mail->ErrorInfo;
}
