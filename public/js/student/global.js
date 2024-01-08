$(function() {
  'use strict';

  var btnOther = $('#btnOther'),
    fixedBottomRight = $('#fixedBottomRight');

  btnOther.click(function() {
    fixedBottomRight.toggleClass('show');
  });

});