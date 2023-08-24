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

    // Retrieve the initial values from the hidden input and generate badges
    const initialKeywords = $hiddenFokusKeyword.val().split(',').map(keyword => keyword.trim());
    initialKeywords.forEach(keyword => addTag(keyword));

    $tagInput.on('keydown', function(event) {
        if (event.key === 'Enter' || event.key === ',') {
            event.preventDefault();
            const enteredTags = $tagInput.val().trim();
            const tagsArray = enteredTags.split(',').map(tag => tag.trim());
            tagsArray.forEach(tag => addTag(tag));
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
                updateHiddenInput();
            })
        );

        $inputTagsList.append($badge);
        updateHiddenInput();
    }

    function updateHiddenInput() {
        const badgeTexts = $inputTagsList.find('.badge').map(function() {
            return $(this).text().trim();
        }).get();
        const joinedKeywords = badgeTexts.join(', ');
        $hiddenFokusKeyword.val(joinedKeywords);
    }
});

(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
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
