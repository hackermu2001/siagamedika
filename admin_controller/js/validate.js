history.pushState(null, null, location.href);
  window.onpopstate = function () {
      history.go(1);
  };

// // Disable right-click context menu
// window.addEventListener('contextmenu', function (e) {
//   e.preventDefault();
// });

// // Disable F12 key and Ctrl+Shift+I
// window.addEventListener('keydown', function (e) {
//   if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && e.key === 'I')) {
//       e.preventDefault();
//   }
// });

$(document).ready(function() {
    $('#numHarga').on('input', function() {
        var value = parseFloat($(this).val());
        var errorMessage = "Harga harus diisi dengan angka positif.";

        if (isNaN(value) || value <= 0) {
          $(this).get(0).setCustomValidity(errorMessage);
          $(this).addClass("is-invalid");
          $(this).siblings(".invalid-feedback").text(errorMessage);
        } else {
          $(this).get(0).setCustomValidity("");
          $(this).removeClass("is-invalid");
          $(this).siblings(".invalid-feedback").text("");
        }
    });
});


$(document).ready(function() {
    $("#NamaProduk").on("input", function() {
        var namaProduk = $(this).val();
        var charCount = namaProduk.replace(/\s/g, '').length; // Menghitung jumlah huruf tanpa spasi
        var errorMessage = "Nama Produk harus diisi dengan minimal 20 huruf.";
        var successMessage = "Nama produk sudah terisi dengan minimal 20 huruf.";

        if (charCount < 20) {
            $("#submitButton").prop("disabled", true);
            $(this).addClass("is-invalid");
            $(this).removeClass("is-valid");
            $(this).siblings(".invalid-feedback").text(errorMessage);
        } else {
          $("#submitButton").prop("disabled", false);
            $(this).addClass("is-valid");
            $(this).removeClass("is-invalid");
            $(this).siblings(".invalid-feedback").text("");
            $(this).siblings(".valid-feedback").text(successMessage);
        }
    });
    $("#productForm").submit(function() {
      var namaProduk = $("#NamaProduk").val();
      var charCount = namaProduk.replace(/\s/g, '').length; // Menghitung jumlah huruf tanpa spasi
  
      if (charCount < 20) {
          return false; // Menghentikan pengiriman formulir
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
 