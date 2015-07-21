
/* GENERAL */

// setup csrf-token
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

/* FORM FIELDS */

// codeField
$(document).ready(function () {
  console.log('woah!');
  $('.ace-editor').each(function(){
    var editor = ace.edit(this);
    editor.getSession().setMode("ace/mode/php");
  });
});

/* SORTABLE */
var changePosition = function(requestData){
  $.ajax({
    'url': '/sort',
    'type': 'POST',
    'data': requestData,
    'success': function(data) {
      if (data.success) {
        console.log('Saved!');
      } else {
        console.log(data.errors);
      }
    },
    'error': function(){
      console.log('Something wrong on server!');
    }
  });
};

$(document).ready(function(){
  var $sortableTable = $('.sortable');
  console.log($sortableTable);
  if ($sortableTable.length > 0) {
    $sortableTable.sortable({
      handle: '.sortable-handle',
      axis: 'y',
      update: function(a, b){
        var entityName = $(this).data('entityname');
        var $sorted = b.item;
        var $previous = $sorted.prev();
        var $next = $sorted.next();
        if ($previous.length > 0) {
          changePosition({
            parentId: $sorted.data('parentid'),
            type: 'moveAfter',
            entityName: entityName,
            id: $sorted.data('itemid'),
            positionEntityId: $previous.data('itemid')
          });
        } else if ($next.length > 0) {
          changePosition({
            parentId: $sorted.data('parentid'),
            type: 'moveBefore',
            entityName: entityName,
            id: $sorted.data('itemid'),
            positionEntityId: $next.data('itemid')
          });
        } else {
          console.log('Something wrong on client!');
        }
      },
      cursor: "move"
    });
  }
  //$('.sortable td').each(function(){
  //  $(this).css('width', $(this).width() +'px');
  //});
});