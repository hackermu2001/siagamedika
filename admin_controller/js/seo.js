$(document).ready(function() {
    const $descriptionTextarea = $('#Description');

    $descriptionTextarea.on('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevent the default behavior of Enter key
        }
    });
});

$(document).ready(function() {
  const $tagInput = $('#tagInput');
  const $inputTagsList = $('#inputTagsList');
  const $hiddenFokusKeyword = $('#hiddenFokusKeyword'); // hidden input element

  $tagInput.on('keydown', function(event) {
      if (event.key === 'Enter' || event.key === ',') {
          event.preventDefault();
          addTag($tagInput.val().trim());
          $tagInput.val('');
      }
  });

  const defaultKeywordsText = `
      Distributor alat kesehatan,
      Alat medis terbaik,
      Distributor peralatan kesehatan,
      Peralatan medis berkualitas,
      Alat kesehatan profesional,
      Supplier alat medis terpercaya,
      Peralatan kesehatan canggih,
      Distributor alat diagnosa,
      Alat medis modern,
      Distributor alat bedah
  `;

  const defaultKeywords = defaultKeywordsText.split(',').map(keyword => keyword.trim());

  // Add default tags when the page loads
  defaultKeywords.forEach(keyword => addTag(keyword));

  function addTag(tagText) {
      if (tagText === '') return;

      // Remove spaces from the tag text
      // tagText = tagText.replace(/\s/g, '');

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
              updateHiddenInput(); // Update the hidden input value when badge is removed
          })
      );

      $inputTagsList.append($badge);
      updateHiddenInput(); // Update the hidden input value when new badge is added
  }

  function updateHiddenInput() {
      const badgeTexts = $inputTagsList.find('.badge').map(function() {
          return $(this).text().trim(); // Remove leading and trailing spaces
      }).get();
      const joinedKeywords = badgeTexts.join(', ');
      $hiddenFokusKeyword.val(joinedKeywords);
  }
});

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
