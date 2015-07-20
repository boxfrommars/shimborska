$(document).ready(function () {
  console.log('woah!');
  $('.ace-editor').each(function(){
    var editor = ace.edit(this);
    editor.getSession().setMode("ace/mode/php");
  });
});