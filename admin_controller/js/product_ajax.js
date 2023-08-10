$(document).ready(function() {
    var deleteId;

// Menangkap id saat tombol delete di klik
$('.delete-btn').on('click', function() {
    deleteId = $(this).data('id');
});

// Mengarahkan ke halaman produk_delete.php dengan ID yang ingin dihapus
$('#deleteButton').on('click', function() {
    $.ajax({
        url: 'php/function_php/produk_delete.php?id=' + deleteId,
        type: 'GET',
        success: function(response) {
            $('#Hapus').modal('hide'); // Menutup modal
            $('tr[data-id="' + deleteId + '"]').remove(); // Menghapus baris dari tabel
            location.reload();
        }
    });
});
});



