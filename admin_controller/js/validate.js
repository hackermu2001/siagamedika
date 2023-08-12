history.pushState(null, null, location.href);
  window.onpopstate = function () {
      history.go(1);
  };

// Disable right-click context menu
window.addEventListener('contextmenu', function (e) {
  e.preventDefault();
});

// Disable F12 key and Ctrl+Shift+I
window.addEventListener('keydown', function (e) {
  if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && e.key === 'I')) {
      e.preventDefault();
  }
});

$(document).ready(function() {
    $('#numHarga').on('input', function() {
        var value = parseFloat($(this).val());

        if (isNaN(value) || value <= 0) {
            $(this).get(0).setCustomValidity('Harga harus diisi dengan angka positif.');
        } else {
            $(this).get(0).setCustomValidity('');
        }
    });
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
 