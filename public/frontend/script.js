$(document).ready(function () {

  /* добавляем подсказки для шорткеев в пейджере */
  $('#center-bottom-nav').prev().not('.first').append('<span class="shortkey">(ctrl + ←)</span>');
  $('#center-bottom-nav').next().not('.last').append('<span class="shortkey">(ctrl + →)</span>');

  // назад
  $(document).bind('keydown', 'ctrl+left', function () {
    var href = $('#center-bottom-nav').prev().not('.first').children('a').attr('href');
    location.href = href ? href : '/';
  });

  // обложка
  $(document).bind('keydown', 'ctrl+down', function () {
    location.href = '/';
  });

  // содержание
  $(document).bind('keydown', 'ctrl+up', function () {
    location.href = '#content';
  });

  // вперёд
  $(document).bind('keydown', 'ctrl+right', function () {
    var href = $('#center-bottom-nav').next().not('.last').children('a').attr('href');
    location.href = href ? href : '/';
  });

  delete Hammer.defaults.cssProps.userSelect;

  var contentTable = $('[data-remodal-id="content-table"]').remodal();
  var hammertime = new Hammer($('body').get(0));

  hammertime.on('swipe', function(e) {
    if (e.pointerType === 'touch') {
      if (contentTable.getState() === 'closed' || contentTable.getState() === 'closing') {
        contentTable.open();
      } else {
        contentTable.close();
      }
    }

  });

  $(window).on('resize', function(){
    console.log($(window).outerWidth(true));
  })


});