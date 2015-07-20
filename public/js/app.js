$(document).ready(function () {
  $('.ace-editor').each(function(){
    var editor = ace.edit(this);
    var $textarea = $(this).siblings('textarea');

    editor.getSession().setValue($textarea.val());

    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/html");

    editor.getSession().on('change', function(){
      $textarea.val(editor.getSession().getValue());
    });
  });
});