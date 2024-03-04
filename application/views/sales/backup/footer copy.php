
      <div class="footer">
        <div class="footer-inner">
          <div class="footer-content">
            <span class="bigger-120">
            AIPOS Retail & Restaurant &copy; DIENG CYBER SYSTEM 2019
            </span>
          </div>
        </div>
      </div>

      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div><!-- /.main-container -->

    <!--[if IE]>
<script src="<?php echo base_url() ?>assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->

    <!-- titik pada nomor -->
    <script src="<?php echo base_url() ?>assets/js/my.js" type="text/javascript"></script>
    <!-- titik pada nomor -->

    <!--[if lte IE 8]>
      <script src="<?php echo base_url() ?>assets/js/excanvas.min.js"></script>
    <![endif]-->
    <!-- page specific plugin scripts -->
    <script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.ui.touch-punch.min.js"></script>

    
    <!-- page specific plugin scripts -->
    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/dataTables.select.min.js"></script>
    
    <script src="<?php echo base_url() ?>assets/js/jquery-ui.custom.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/chosen.jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/spinbox.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/daterangepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.knob.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/autosize.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.inputlimiter.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.maskedinput.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-tag.min.js"></script>
    
    <script src="<?php echo base_url() ?>assets/js/tree.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.nestable.min.js"></script>

    <!-- ace scripts -->
    <script src="<?php echo base_url() ?>assets/js/ace-elements.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/ace.min.js"></script>

    <script>
      const numberWithCommas = (x) => {
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        return parts.join(",");
      }
      function jNumber(nums) {
        if (typeof(nums)!=='undefined') {
          return nums.toString().split(' ').join('').split('.').join('').split(',').join('.');
        } else {
          return 0;
        }
      }
      if(!ace.vars['touch']) {
        $('select.form-control').chosen({allow_single_deselect:true}); 
        //resize the chosen on window resize
    
        $(window)
        .off('resize.chosen')
        .on('resize.chosen', function() {
          $('select.form-control').each(function() {
             var $this = $(this);
             $this.next().css({'width': '100%'}); // $this.parent().width()
          })
        }).trigger('resize.chosen');
        //resize chosen on sidebar collapse/expand
        $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
          if(event_name != 'sidebar_collapsed') return;
          $('select.form-control').each(function() {
             var $this = $(this);
             $this.next().css({'width': '100%'}); // $this.parent().width()
          });
        });
        $('#chosen-multiple-style .btn').on('click', function(e){
          var target = $(this).find('input[type=radio]');
          var which = parseInt(target.val());
          if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
           else $('#form-field-select-4').removeClass('tag-input-style');
        });
      }
      function number_format(num, decimal_places, decimal_separator, thousand_separator) {    
         var result = num.toFixed(decimal_places);    
         var snum = result.split(".");
         var fnum = "";
         for (i=0; i<snum[0].length; i++) {
           if ((snum[0].length-i)%3==0) {
             if(i!=0){
               //alert(i);
               fnum += thousand_separator;
             }     
           }
           fnum += snum[0].charAt(i);
         }
         var rnum = fnum ;
         return rnum;
      }
    </script>
    

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
      jQuery(function($) {
        
        $("#datepicker1").datepicker({
          showOtherMonths: true,
          selectOtherMonths: false,
          dateFormat: "dd-mm-yy",
          //isRTL:true,
          
          changeMonth: true,
          changeYear: true,
          
          showButtonPanel: true,
          beforeShow: function() {
            //change button colors
            var datepicker = $(this).datepicker( "widget" );
            setTimeout(function(){
              var buttons = datepicker.find('.ui-datepicker-buttonpane')
              .find('button');
              buttons.eq(0).addClass('btn btn-xs');
              buttons.eq(1).addClass('btn btn-xs btn-success');
              buttons.wrapInner('<span class="bigger-110" />');
            }, 0);
          }

        });
      
        $("#datepicker2").datepicker({
          showOtherMonths: true,
          selectOtherMonths: false,
          dateFormat: "dd-mm-yy",
          //isRTL:true,
          
          changeMonth: true,
          changeYear: true,
          
          showButtonPanel: true,
          beforeShow: function() {
            // change button colors
            var datepicker = $(this).datepicker("widget");
            setTimeout(function(){
              var buttons = datepicker.find('.ui-datepicker-buttonpane')
              .find('button');
              buttons.eq(0).addClass('btn btn-xs');
              buttons.eq(1).addClass('btn btn-xs btn-success');
              buttons.wrapInner('<span class="bigger-110" />');
            }, 0);
          }

        });
      
        $("#datepicker3").datepicker({
          showOtherMonths: true,
          selectOtherMonths: false,
          dateFormat: "dd-mm-yy",
          //isRTL:true,
          
          changeMonth: true,
          changeYear: true,
          
          showButtonPanel: true,
          beforeShow: function() {
            //change button colors
            var datepicker = $(this).datepicker( "widget" );
            setTimeout(function(){
              var buttons = datepicker.find('.ui-datepicker-buttonpane')
              .find('button');
              buttons.eq(0).addClass('btn btn-xs');
              buttons.eq(1).addClass('btn btn-xs btn-success');
              buttons.wrapInner('<span class="bigger-110" />');
            }, 0);
          }

        });

        //initiate dataTables plugin
        var myTable = 
        $('#dynamic-table')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
          bAutoWidth: false,
          "aoColumns": [
            { "bSortable": false },
            null, null,null, null, null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          
          
          //"bProcessing": true,
              //"bServerSide": true,
              //"sAjaxSource": "http://127.0.0.1/table.php" ,
      
          //,
          //"sScrollY": "200px",
          //"bPaginate": false,
      
          //"sScrollX": "100%",
          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element
      
          //"iDisplayLength": 50
      
      
          select: {
            style: 'multi'
          }
          } );
      
        
        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.dataTable.Buttons( myTable, {
          buttons: [
            {
            "extend": "colvis",
            "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
            "className": "btn btn-white btn-primary btn-bold",
            columns: ':not(:first):not(:last)'
            },
            {
            "extend": "copy",
            "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "excel",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: false,
            message: 'This print was produced using the Print button for DataTables'
            }     
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container') );
        
        //style the message box
        var defaultCopyAction = myTable.button(1).action();
        myTable.button(1).action(function (e, dt, button, config) {
          defaultCopyAction(e, dt, button, config);
          $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
        });
        
        
        var defaultColvisAction = myTable.button(0).action();
        myTable.button(0).action(function (e, dt, button, config) {
          
          defaultColvisAction(e, dt, button, config);
          
          
          if($('.dt-button-collection > .dropdown-menu').length == 0) {
            $('.dt-button-collection')
            .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
            .find('a').attr('href', '#').wrap("<li />")
          }
          $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
        });
      
        ////
      
        setTimeout(function() {
          $($('.tableTools-container')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);
        
        
        
        
        
        myTable.on( 'select', function ( e, dt, type, index ) {
          if ( type === 'row' ) {
            $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
          }
        } );
        myTable.on( 'deselect', function ( e, dt, type, index ) {
          if ( type === 'row' ) {
            $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
          }
        } );
      
      
      
      
        /////////////////////////////////
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
        
        //select/deselect all rows according to table header checkbox
        $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header
          
          $('#dynamic-table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) myTable.row(row).select();
            else  myTable.row(row).deselect();
          });
        });
        
        //select/deselect a row when the checkbox is checked/unchecked
        $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
          var row = $(this).closest('tr').get(0);
          if(this.checked) myTable.row(row).deselect();
          else myTable.row(row).select();
        });
      
      
      
        $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
          e.stopImmediatePropagation();
          e.stopPropagation();
          e.preventDefault();
        });
        
        
        
        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header
          
          $(this).closest('table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
            else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
          });
        });
        
        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
          var $row = $(this).closest('tr');
          if($row.is('.detail-row ')) return;
          if(this.checked) $row.addClass(active_class);
          else $row.removeClass(active_class);
        });
      
        
      
        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        
        //tooltip placement on right or left
        function tooltip_placement(context, source) {
          var $source = $(source);
          var $parent = $source.closest('table')
          var off1 = $parent.offset();
          var w1 = $parent.width();
      
          var off2 = $source.offset();
          //var w2 = $source.width();
      
          if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
          return 'left';
        }
        
        
        
        
        /***************/
        $('.show-details-btn').on('click', function(e) {
          e.preventDefault();
          $(this).closest('tr').next().toggleClass('open');
          $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        });
        /***************/
        
        
        
        
        
        /**
        //add horizontal scrollbars to a simple table
        $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
          {
          horizontal: true,
          styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
          size: 2000,
          mouseWheelLock: true
          }
        ).css('padding-top', '12px');
        */
      
      
      
      })
    </script>
<!-- </body></html> -->
  </body>
</html>
