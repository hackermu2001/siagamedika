document.addEventListener('DOMContentLoaded', function () {
  let form = document.querySelector('.php-email-form');
  let loadingMessage = form.querySelector('.loading');
  let errorMessage = form.querySelector('.error-message');
  let successMessage = form.querySelector('.sent-message');

  form.addEventListener('submit', function (event) {
    event.preventDefault();

    loadingMessage.classList.add('d-block'); // Show loading message
    errorMessage.classList.remove('d-block'); // Hide error message

    let formData = new FormData(form);

    // Ambil nilai dari formulir
    let name = formData.get('name');
    let senderMail = formData.get('senderMail');
    let subject = formData.get('subject');
    let message = formData.get('message');

    // Nomor WhatsApp penerima
    let phoneNumber = '6285341746323'; // Ganti dengan nomor tujuan Anda

    // Pesan yang akan dikirimkan
    let whatsappMessage = `Nama: ${name}\nEmail: ${senderMail}\nSubject: ${subject}\nPesan: ${message}`;

    // URL untuk mengirim pesan WhatsApp
    let url = `https://api.whatsapp.com/send?phone=${phoneNumber}&text=${encodeURIComponent(whatsappMessage)}`;

    // Buka URL WhatsApp di tab baru
    window.open(url, '_blank');

    // Tampilkan pesan sukses atau reset formulir jika diperlukan
    loadingMessage.classList.remove('d-block'); // Hide loading message
    successMessage.textContent = "Message has been sent successfully.";
    successMessage.classList.add('d-block');
    form.reset(); // Reset the form fields
  });
});
