let i = 1;
  function addRowCat() {
      const newRow_Cat = `
          <tr id="row${i}">
              <td><input type="text" name="txtNamaCat[]" class="border-0 w-100 bg-transparent p-0 m-0" style="color: grey; box-sizing: border-box;" placeholder="Isi Nama Category..."></td>
              <td><button class="btn btn-circle btn-sm btn-danger mx-2 remove-row" name="remove" id="${i}" type="button"><i class="fas fa-trash"></i></button></td>
          </tr>
      `;
      i++;
      $(".cat_input").append(newRow_Cat); 
  }
  
  function removeRowCat() {
      var button_id = $(this).attr("id");
      $(`#row${button_id}`).remove();
  }
// penggunaan ajax php sql - Cat
  $(document).ready(function() {
      // Menambah baris
      $("#add-row").click(addRowCat);
      // Menghapus baris
      $(document).on("click", ".remove-row", removeRowCat);
  
      // Setelah upload, reset form kembali ke satu baris
      $('#submit_kategori').click(function() {
           // Validasi input
          let isValid = true;
          const existingNames = []; // Array untuk melacak nama-nama kategori yang sudah ada
  
          $("input[name='txtNamaCat[]']").each(function() {
              const inputVal = $(this).val().trim();
              if (inputVal === "") {
                  isValid = false;
                  return false; // Keluar dari loop jika ada input kosong
              }
  
              const lowerInputVal = inputVal.toLowerCase();
              if (existingNames.includes(lowerInputVal)) {
                  isValid = false;
                  alert("Nama Kategori '" + inputVal + "' sudah ada dalam daftar.");
                  return false; // Keluar dari loop jika ada nama yang sama
              }
  
              existingNames.push(lowerInputVal);
          });
  
          if (!isValid) {
              return;
          }            
          $.ajax({  
              url: "php/function_php/kategori_insert.php",  
              method: "POST",  
              data: $('#add_kategori').serialize(),  
              success: function(data)  
              {  
                  alert("Selamat data kamu telah berhasil di masukkan");
                      window.location.reload(); // Ini akan memuat ulang halaman  
                      $('#add_kategori')[0].reset();
                      $(".cat_input tr:not(:first)").remove();
                      // Mengatur ulang nilai i menjadi 0
                      i = 0;
                      const defaultRow = `
                      <tr id="row_input">
                          <td><input type="text" name="txtNamaCat[]" class="border-0 w-100 bg-transparent p-0 m-0" style="color: grey; box-sizing: border-box;" placeholder="Isi Nama Kategori..."></td>
                          <td><button class="btn btn-circle btn-sm btn-primary mx-2" id="add-row" type="button"><i class="fas fa-plus"></i></button></td>
                      </tr>
                      `;
                      $(".cat_input tbody").append(defaultRow);
                      i++; // Menambah i karena default row baru ditambahkan
  
                      // Menambah baris
                      $("#add-row").click(addRowCat);
                      // Menghapus baris
                      $(document).on("click", ".remove-row", removeRowkategori);
              }  
          });  
      });
      // menghapus data tambahkan button di bawah saja pasang di table category
    //   <button class="btn btn-danger btn-circle btn-sm delete-cat" data-id_cat="<?php echo $row['kode_kategori']; ?>"><i class="fas fa-trash"></i></button>
      $(document).on("click", ".delete-cat", function() {
          var CatToDelete = $(this).data("id_cat"); // Mendapatkan id_cat_BRND dari atribut data
          var $rowToDelete = $(this).closest("tr"); // Mendapatkan elemen baris yang akan dihapus
          $.ajax({
              url: "php/function_php/kategori_hapus.php", // Ganti dengan URL yang sesuai
              method: "POST",
              data: { CatToDelete: CatToDelete },
              success: function(data) {
                  alert("Data berhasil dihapus");
                  // Lakukan tindakan lain yang Anda perlukan, seperti menghapus baris dari tabel atau me-refresh tampilan
                  $rowToDelete.remove(); // Menghapus baris dari tabel
                  location.reload(); // Me-refresh halaman setelah penghapusan data
              }
          });
      });
      //edit
      $(document).on("click", ".edit-save-cat", function() {
        var $row = $(this).closest("tr");
        var id_cat = $(this).data("id_cat");
        var $namaCell = $row.find(".editable-cell[data-column='NamaKategori']");
        var isEditing = $row.hasClass("editing");

        if (isEditing) {
            // Simpan perubahan
            // Periksa apakah nama yang dimasukkan tidak kosong
            var updatedNamaKategori = $namaCell.text().trim();
            if (updatedNamaKategori === "") {
                alert("Nama Kategori tidak boleh kosong");
                return;
            }

            $.ajax({
                url: "php/function_php/kategori_update.php", // Ganti dengan URL yang sesuai
                method: "POST",
                data: { id_catToEdit: id_cat, updatedNamaKategori: updatedNamaKategori },
                success: function(data) {
                    if (data === "Kategori sudah ada di database") {
                        alert(data);
                    } else {
                        alert("Kategori berhasil diperbarui");
                        location.reload(); // Me-refresh halaman setelah penyimpanan data
                    }
                }
            });
        } else {
            // Aktifkan mode edit
            $row.addClass("editing");
            $namaCell.attr("contenteditable", true);
            $(this).removeClass("btn-primary").addClass("btn-success").html('<i class="fas fa-check"></i>');
            $row.find(".cancel-edit-cat").show(); // Tampilkan tombol Cancel
            
        }
    });
    // Tambahkan event handler untuk tombol "Cancel"
    $(document).on("click", ".cancel-edit-cat", function() {
    var $row = $(this).closest("tr");
    $row.removeClass("editing");
    var $namaCell = $row.find(".editable-cell[data-column='NamaKategori']");
    $namaCell.attr("contenteditable", false);
    $row.find(".edit-save-cat").removeClass("btn-success").addClass("btn-primary").html('<i class="fas fa-pen"></i>');
    $(this).hide(); // Sembunyikan tombol Cancel
    // Reset nilai dalam sel ke nilai asli sebelum edit
    $namaCell.text($namaCell.data("original-value"));
});

// Inisialisasi tombol "Cancel" menjadi tersembunyi saat memuat halaman
$(".cancel-edit-cat").hide();

  });
// penutupan ajax php sql - kategori