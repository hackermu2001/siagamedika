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

    fetch(form.getAttribute('action'), {
      method: 'POST',
      body: formData,
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
    })
      .then(response => {
        if (response.ok) {
          loadingMessage.classList.remove('d-block'); // Hide loading message
          successMessage.textContent = "Message has been sent successfully.";
          successMessage.classList.add('d-block');
          form.reset(); // Reset the form fields

          // Reload the page after a short delay
          setTimeout(function () {
            location.reload();
          }, 1000); // Delay in milliseconds before reloading (3 seconds in this example)
        } else {
          loadingMessage.classList.remove('d-block'); // Hide loading message
          errorMessage.innerHTML = "An error occurred while sending the email.";
          errorMessage.classList.add('d-block');
        }
      });
  });
});
