// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});

var totalData = 0; // Initialize totalData at the top level
  function updateTotalDataCount() {
    var totalData = $('#brand_table tbody tr').length;
    $('#total-data').text(totalData);
}
$(document).ready(function() {
  $('#brand_table').DataTable();

  $('#add-brand-btn').on('click', function() {
      var brandName = $('#new-brand-name').val();
      if (brandName.trim() === "") {
        alert("Nama Brand harus diisi!");
        return;
    }
    var skuPrefix = 'BRND';
        totalData++; // Increment totalData
        var newSku = skuPrefix + totalData;
        var currentDate = moment().format('DD-MM-YYYY');


      var newRow = '<tr>' +
                       '<td><input type="hidden" name="sku_brand" class="form-control border-0 bg-transparent" value="' + newSku + '" readonly><span class="sku">' + newSku + '</span></td>' +
                      '<td><input type="hidden" name="txtNamaBrand" value="' + brandName + '">' + brandName + '</td>' +
                      '<td><input type="hidden" name="tanggal_post" value="' + currentDate + '">' + currentDate + '</td>' +
                      '<td>' +
                          '<button class="btn rounded-circle btn-sm mx-2 btn-danger delete-brand"><i class="fas fa-trash"></i></button>' +
                      '</td>' +
                   '</tr>';

      $('#brand_table tbody').append(newRow);

      $('#new-brand-name').val('');
      updateTotalDataCount();
  });

  // Event handler untuk tombol delete-brand
  $(document).on('click', '.delete-brand', function() {
      $(this).closest('tr').remove();
      totalData--;
      updateTotalDataCount();
  });
});