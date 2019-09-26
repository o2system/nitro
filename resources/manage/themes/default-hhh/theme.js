/*
 * This file is part of the O2System PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 *  @copyright      Copyright (c) Steeve Andrian Salim
 */
// ------------------------------------------------------------------------
import Espresso from 'o2system-espresso';
window.Swal = require("sweetalert2");
require("o2system-venus-admin");
require("./assets/js/Search");
require("./assets/js/Sidebar");

$('.datatables-basic, .datatables-fixed, .datatables-unorder').prop('width', '100%');
var printCounter = 0;
var datatablesUnorder = $('.datatables-unorder').DataTable({
    "searching": false,
    "lengthChange": false,
    "scrollX": true,
    "ordering": false,
    //dom: 'Bfrtip',
    buttons: [
        { 
            extend: 'copy', 
            className: 'btn btn-default'
        },
        { 
            extend: 'excel', 
            className: 'btn btn-default',
            footer: true,
            messageTop: function () {
                var headerPeriode = $('.header-periode').text();
                return headerPeriode;
            },
            
            messageBottom: function () {
                
                var footerPrint = $('.footer-print').text();

                return footerPrint;
            },
        },
        { 
            extend: 'csv', 
            className: 'btn btn-default' 
        },
        { 
            extend: 'pdf', 
            className: 'btn btn-default',
            footer: true,
            messageTop: function () {
                printCounter++;
                
                var headerPrint = $('.header-print').html();
                var headerPeriode = $('.header-periode').html();
                if ( printCounter === 1 ) {
                    return headerPrint+headerPeriode+'This is the first time you have printed this document.';
                }
                else {
                    return headerPrint+headerPeriode+'You have printed this document '+printCounter+' times';
                } 
            },
            
            messageBottom: function () {
                
                var footerPrint = $('.footer-print').html();

                return footerPrint;
            },
            
        },
        { 
            extend: 'print', 
            className: 'btn btn-default',
            footer: true,
            messageTop: function () {
                printCounter++;
                
                var headerPrint = $('.header-print').html();
                var headerPeriode = $('.header-periode').html();
                if ( printCounter === 1 ) {
                    return headerPrint+headerPeriode+'This is the first time you have printed this document.';
                }
                else {
                    return headerPrint+headerPeriode+'You have printed this document '+printCounter+' times';
                } 
            },
            
            messageBottom: function () {
                
                var footerPrint = $('.footer-print').html();

                return footerPrint;
            },
        },
    ],
    drawCallback: function (settings) {
        $('[data-toggle="tooltip"]').tooltip();
    }
});

datatablesUnorder.buttons().container().appendTo( $('.col-md-6:eq(0)', datatablesUnorder.table().container() ) );

$(function() {
	$('.input-daterange-datepicker-empty').daterangepicker({
		buttonClasses: ['btn', 'btn-sm'],
		applyClass: 'btn-success',
		cancelClass: 'btn-light',
		autoUpdateInput: false,
		locale: {
			cancelLabel: 'Clear'
		}
	});

	$('.input-daterange-datepicker-empty').on('apply.daterangepicker', function(ev, picker) {
		$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
	});

	$('.input-daterange-datepicker-empty').on('cancel.daterangepicker', function(ev, picker) {
		$(this).val('');
    });
});