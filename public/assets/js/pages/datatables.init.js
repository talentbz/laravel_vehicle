/******/ (function() { // webpackBootstrap
/*!***********************************************!*\
  !*** ./resources/js/pages/datatables.init.js ***!
  \***********************************************/
/*
Template Name: Skote - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Datatables Js File
*/
$(document).ready(function () {
  //$('#datatable').DataTable(); //Buttons examples
  var custom_table = $('#datatable').DataTable({
    "ordering": false,
    "language": {
        "url": datatable_json
    }
  });
  $('#datatable-bullettin').DataTable({
    "ordering": false,
    "language": {
        "url": datatable_json
    }
  })
  $('#datatable').css( 'display', 'table' );
  custom_table.responsive.recalc();
  var table = $('#datatable-buttons').DataTable({
    lengthChange: false,
    buttons: ['copy', 'excel', 'pdf', 'colvis']
  });
  table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
  $(".dataTables_length select").addClass('form-select form-select-sm');
});
/******/ })()
;