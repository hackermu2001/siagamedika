(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
    
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

  let i = 1;
  function addRow() {
      const newRow = `
          <tr id="row${i}">
              <td><input type="text" name="txtNamaBrand[]" class="border-0 w-100 bg-transparent p-0 m-0" style="color: grey; box-sizing: border-box;" placeholder="Isi Nama Brand..."></td>
              <td><button class="btn btn-circle btn-sm btn-danger mx-2 remove-row" name="remove" id="${i}" type="button"><i class="fas fa-trash"></i></button></td>
          </tr>
      `;
      i++;
      $(".brand_input").append(newRow);
  }
  
  function removeRow() {
      var button_id = $(this).attr("id");
      $(`#row${button_id}`).remove();
  }
  $(document).ready(function() {
      // Menambah baris
      $("#add-row").click(addRow);
      // Menghapus baris
      $(document).on("click", ".remove-row", removeRow);
  
      // Setelah upload, reset form kembali ke satu baris
      $('#submit_brand').click(function() {
           // Validasi input
          let isValid = true;
          const existingNames = []; // Array untuk melacak nama-nama brand yang sudah ada
  
          $("input[name='txtNamaBrand[]']").each(function() {
              const inputVal = $(this).val().trim();
              if (inputVal === "") {
                  isValid = false;
                  return false; // Keluar dari loop jika ada input kosong
              }
  
              const lowerInputVal = inputVal.toLowerCase();
              if (existingNames.includes(lowerInputVal)) {
                  isValid = false;
                  alert("Nama brand '" + inputVal + "' sudah ada dalam daftar.");
                  return false; // Keluar dari loop jika ada nama yang sama
              }
  
              existingNames.push(lowerInputVal);
          });
  
          if (!isValid) {
              return;
          }            
          $.ajax({  
              url: "php/function_php/brand_insert.php",  
              method: "POST",  
              data: $('#add_brand').serialize(),  
              success: function(data)  
              {  
                  alert("Selamat data kamu telah berhasil di masukkan");
                      window.location.reload(); // Ini akan memuat ulang halaman  
                      $('#add_brand')[0].reset();
                      $(".brand_input tr:not(:first)").remove();
                      // Mengatur ulang nilai i menjadi 0
                      i = 0;
                      const defaultRow = `
                      <tr id="row_input">
                          <td><input type="text" name="txtNamaBrand[]" class="border-0 w-100 bg-transparent p-0 m-0" style="color: grey; box-sizing: border-box;" placeholder="Isi Nama Brand..."></td>
                          <td><button class="btn btn-circle btn-sm btn-primary mx-2" id="add-row" type="button"><i class="fas fa-plus"></i></button></td>
                      </tr>
                      `;
                      $(".brand_input tbody").append(defaultRow);
                      i++; // Menambah i karena default row baru ditambahkan
  
                      // Menambah baris
                      $("#add-row").click(addRow);
                      // Menghapus baris
                      $(document).on("click", ".remove-row", removeRow);
              }  
          });  
      });
      // menghapus data
      $(document).on("click", ".delete-brand", function() {
          var skuToDelete = $(this).data("sku"); // Mendapatkan SKU_BRND dari atribut data
          var $rowToDelete = $(this).closest("tr"); // Mendapatkan elemen baris yang akan dihapus
          $.ajax({
              url: "php/function_php/brand_hapus.php", // Ganti dengan URL yang sesuai
              method: "POST",
              data: { skuToDelete: skuToDelete },
              success: function(data) {
                  alert("Data berhasil dihapus");
                  // Lakukan tindakan lain yang Anda perlukan, seperti menghapus baris dari tabel atau me-refresh tampilan
                  $rowToDelete.remove(); // Menghapus baris dari tabel
                  location.reload(); // Me-refresh halaman setelah penghapusan data
              }
          });
      });
      //edit
      $(document).on("click", ".edit-save-brand", function() {
          var $row = $(this).closest("tr");
          var sku = $(this).data("sku");
          var $namaCell = $row.find(".editable-cell[data-column='NamaBrand']");
          var isEditing = $row.hasClass("editing");
  
          if (isEditing) {
              // Simpan perubahan
              // Periksa apakah nama yang dimasukkan tidak kosong
              var updatedNamaBrand = $namaCell.text().trim();
              if (updatedNamaBrand === "") {
                  alert("NamaBrand tidak boleh kosong");
                  return;
              }
  
              $.ajax({
                  url: "php/function_php/brand_update.php", // Ganti dengan URL yang sesuai
                  method: "POST",
                  data: { skuToEdit: sku, updatedNamaBrand: updatedNamaBrand },
                  success: function(data) {
                      if (data === "Brand sudah ada di database") {
                          alert(data);
                      } else {
                          alert("Brand berhasil diperbarui");
                          location.reload(); // Me-refresh halaman setelah penyimpanan data
                      }
                  }
              });
          } else {
              // Aktifkan mode edit
              $row.addClass("editing");
              $namaCell.attr("contenteditable", true);
              $(this).removeClass("btn-primary").addClass("btn-success").html('<i class="fas fa-check"></i>');
          }
      });
      $(".editable-cell").attr("contenteditable", false);
  
  
  });

})(jQuery); // End of use strict
