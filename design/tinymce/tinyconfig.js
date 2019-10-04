tinymce.init({
    selector:   "textarea",
    language:   "fr_FR",
    width:      '100%',
    height:     320,
});

// Prevent bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
    e.stopImmediatePropagation();
  }
});

$('#open').click(function() {
  $("#dialog").modal({
    width: 800
  });
});