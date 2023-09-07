<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $senderMail = $_POST["senderMail"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    // Nomor WhatsApp penerima
    $phoneNumber = "6285341746323"; // Ganti dengan nomor tujuan Anda
    
    // Pesan yang akan dikirimkan
    $whatsappMessage = "Nama: $name\nEmail: $senderMail\nSubject: $subject\nPesan: $message";
    
    // URL untuk mengirim pesan WhatsApp
    $url = "https://api.whatsapp.com/send?phone=$phoneNumber&text=" . urlencode($whatsappMessage);
    
    // Redirect ke URL WhatsApp
    header("Location: $url");
    exit;
}
?>
