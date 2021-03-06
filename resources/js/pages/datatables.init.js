/*
Template Name: Skote - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Datatables Js File
*/

$(document).ready(function() {
    var custom_table = $('#datatable').DataTable({
        "ordering": false,
        "language": {
            "url": datatable_json
        },
        responsive: false,
        "autoWidth": false,
        "scrollX": true,
      });
    
      $('#datatable-bullettin').DataTable({
        "ordering": false,
        "language": {
            "url": datatable_json
        },
        responsive: flase,
        "autoWidth": false,
        "scrollX": true,
        "searching": true,
      })
      $('#datatable').css( 'display', 'table' );
      $('#datatable-bullettin').css( 'display', 'table' );
    custom_table.responsive.recalc();
    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

    $(".dataTables_length select").addClass('form-select form-select-sm');
});