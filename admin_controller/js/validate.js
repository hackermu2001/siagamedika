history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };

$(document).ready(function() {
    $('#productForm').submit(function(e) {
        var namaProduk = $('#NamaProduk').val();
        var kategori = $('#Kategori').val();
        var deskripsi = $('#Deskripsi').val();
        var linkGambar = $('#LinkGambar').val();
        var harga = $('#numHarga').val();
        var brand = $('#Brand').val();
        
        if (namaProduk === "" || kategori === "" || deskripsi === "" || linkGambar === "" || harga === "" || brand === "0") {
            alert("Please fill in all required fields.");
            e.preventDefault();
        }
        
        if (isNaN(harga) || parseInt(harga) < 0) {
            alert("Please enter a valid positive number for the price.");
            e.preventDefault();
        }
        
        if (!linkGambar.startsWith("https://i.imgur.com/")) {
            alert("Image link should start with 'https://i.imgur.com/'.");
            e.preventDefault();
        }
    });
});
