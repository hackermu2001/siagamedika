$(document).ready(function() {
    const $tagInput = $('#tagInput');
    const $inputTagsList = $('#inputTagsList');
  
    // Default tags
    const defaultTags = [
      "Distributor alat kesehatan",
      "Alat medis terbaik",
      "Distributor peralatan kesehatan",
      "Peralatan medis berkualitas",
      "Alat kesehatan profesional",
      "Supplier alat medis terpercaya",
      "Peralatan kesehatan canggih",
      "Distributor alat diagnosa",
      "Alat medis modern",
      "Distributor alat bedah"
    ];
  
    // Adding default tags
    defaultTags.forEach(function(tag) {
      addTag(tag);
    });
  
    $tagInput.on('keydown', function(event) {
      if (event.key === 'Enter' || event.key === ',') {
        event.preventDefault();
        addTag($tagInput.val().trim());
        $tagInput.val('');
      }
    });
  
    function addTag(tagText) {
      if (tagText === '') return;
  
      const $badge = $('<span>', {
        class: 'badge badge-info',
        style: 'margin: 2px 5px; cursor: pointer;'
      }).append(
        tagText,
        $('<i>', {
          class: 'fas fa-times text-white',
          style: 'margin-left: 3px;'
        }).on('click', function() {
          $(this).closest('.badge').remove();
        })
      );
  
      $inputTagsList.append($badge);
    }
  });
  