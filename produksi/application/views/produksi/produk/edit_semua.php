
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Manajemen Produk</li>
              <li class="active">Produk</li>
            </ul><!-- /.breadcrumb -->

            
          </div>

          <div class="page-content">
            <div class="ace-settings-container" id="ace-settings-container">
              <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="ace-icon fa fa-cog bigger-130"></i>
              </div>

              <div class="ace-settings-box clearfix" id="ace-settings-box">
                <div class="pull-left width-50">
                  <div class="ace-settings-item">
                    <div class="pull-left">
                      <select id="skin-colorpicker" class="hide">
                        <?php echo $theme_option ?>
                        
                        
                        
                      </select>
                    </div>
                    <span>&nbsp; Choose Skin</span>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                    <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                    <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                    <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
                    <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                    <label class="lbl" for="ace-settings-add-container">
                      Inside
                      <b>.container</b>
                    </label>
                  </div>
                </div><!-- /.pull-left -->

                <div class="pull-left width-50">
                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                    <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                    <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                    <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                  </div>
                </div><!-- /.pull-left -->
              </div><!-- /.ace-settings-box -->
            </div><!-- /.ace-settings-container -->

            <div class="page-header">
              <h1>
                Edit Semua Produk
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/handsontable.full.min.css">
                <br>

                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-12">
                      <div id="resultcode"></div>
                    </div>
                </div>

                <div class="row" style="margin-bottom: 10px">
                  <div class="col-md-3">
                    <input type="text" name="cariproduk" class="form-control" placeholder="Cari ...">
                    <span id="searchresult"></span>
                  </div>
                  <div class="col-md-3">
                    <select multiple="" class="chosen-select form-control" data-placeholder="Pilih Kolom">
                      <option value="1">Barcode</option>
                      <option value="2">Nama Produk</option>
                      <option value="3">Kategori</option>
                      <option value="4">Deskripsi</option>
                      <option value="5">H. produksi</option>
                      <option value="6">H. Res Kecil</option>
                      <option value="7">H. Res Besar</option>
                      <option value="8">H. Agen Kecil</option>
                      <option value="9">H. Agen Besar</option>
                      <option value="10">H. Online</option>
                    </select>
                  </div>
                  <div class="col-md-6 text-right">
                  </div>
                </div>

                <div id="hot" style="font-size:16px;margin-bottom: 10px"></div>

                <div>
                  <ul class="pagination" id="pagination">
                  </ul>
                </div>

                <a href="<?php echo base_url() ?>produksi/produk_retail" class="btn btn-default"><< Kembali</a>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<style>
.chosen-container-multi .chosen-choices {
    position: relative;
    overflow: hidden;
    margin: 0;
    padding: 2px;
    width: 100%;
    height: auto!important;
    height: 1%;
    border: 1px solid #aaa;
    background-color: #fff;
    background-image: -webkit-gradient(linear,50% 0,50% 100%,color-stop(1%,#eee),color-stop(15%,#fff));
    background-image: -webkit-linear-gradient(#eee 1%,#fff 15%);
    background-image: -moz-linear-gradient(#eee 1%,#fff 15%);
    background-image: -o-linear-gradient(#eee 1%,#fff 15%);
    background-image: linear-gradient(#eee 1%,#fff 15%);
    cursor: text;
}

.handsontable.listbox td, .handsontable.listbox th, .handsontable.listbox tr:first-child td, .handsontable.listbox tr:first-child th, .handsontable.listbox tr:last-child th {
    border-color: #FFC107;
    background-color: #ffd3c4;
}

.handsontable thead th {
  transform: rotate(270deg)!important;
  height: 100px;
}

.handsontable thead th .colHeader {
  white-space: nowrap;
}
</style>
<script src="<?php echo base_url() ?>assets/js/handsontable.full.min.js" type="text/javascript"></script>
<script>
jQuery(function($){
  $("#navbar").hide();
  $("#sidebar").hide();
  $(".page-header").hide();
  $(".footer").hide();
  $("div").removeClass('main-container');
  $("div").removeClass('main-content');
  if(!ace.vars['touch']) {
    $('.chosen-select').chosen({allow_single_deselect:true}); 
  }
<?php 
  $data = array(); $i = 0;
  foreach ($data_kategori as $key):
    $data[$i] = $key->nama_kategori;
  $i++; endforeach;
  $data_sat = array(); $i2 = 0;
  foreach ($data_satuan as $key_satuan):
    $data_sat[$i2] = $key_satuan->satuan;
  $i2++; endforeach;
  ?>
  function negativeValueRenderer(instance, td, row, col, prop, value, cellProperties) {
    if (col==3 || col==4) {
      Handsontable.renderers.DropdownRenderer.apply(this, arguments);
    } else {
      Handsontable.renderers.TextRenderer.apply(this, arguments);
    }
    if (col==6||col==7||col==8||col==9||col==10||col==11) {
      td.className = 'htRight';
    }
    var harga_beli = instance.getDataAtCell(row, 9)*1;
    if (col==6||col==7||col==8) {
      if (value < harga_beli) {
        td.className = 'htRight';
        td.style.backgroundColor = 'red';
        td.style.color = '#FFF';
      }
    }
  }
  Handsontable.renderers.registerRenderer('negativeValueRenderer', negativeValueRenderer);
  var debounceFn = Handsontable.helper.debounce(function (colIndex, val) {
    var filtersPlugin = hot.getPlugin('filters');
    filtersPlugin.removeConditions(1);
    filtersPlugin.removeConditions(2);
    filtersPlugin.removeConditions(3);
    filtersPlugin.removeConditions(4);
    filtersPlugin.removeConditions(5);
    filtersPlugin.removeConditions(6);
    filtersPlugin.removeConditions(7);
    filtersPlugin.removeConditions(8);
    filtersPlugin.removeConditions(9);
    filtersPlugin.removeConditions(10);
    filtersPlugin.removeConditions(11);
    filtersPlugin.addCondition(colIndex, 'contains', [val]);
    filtersPlugin.filter();
  }, 100);

  var data_kategori = <?php echo json_encode($data) ?>;
  var data_satuan = <?php echo json_encode($data_sat) ?>;
  var dataObjects = [{}];
  var hotElement = document.querySelector('#hot');
  var hotElementContainer = hotElement.parentNode;
  var autosaveNotification;
  var hotSettings = {
    data: dataObjects,
    search: true,
    filters: true,
    colWidths: 100,
    columns: [
      {
        data: 'id_produk_2',
        type: 'numeric',
        readOnly: true,
        editor: false,
        width: 1,
      },
      {
        data: 'barcode',
        type: 'text',
        readOnly: true,
        editor: false
      },
      {
        data: 'nama_produk',
        type: 'text'
      },
      {
        data: 'nama_kategori',
        type: 'dropdown',
        source: data_kategori
      },
      {
        data: 'satuan',
        type: 'dropdown',
        source: data_satuan
      },
      {
        data: 'deskripsi',
        type: 'numeric'
      },
      {
        data: 'harga_1',
        type: 'numeric',
        numericFormat: {
          pattern: '0'
        }
      },
      {
        data: 'harga_2',
        type: 'numeric',
        numericFormat: {
          pattern: '0'
        }
      },
      {
        data: 'harga_3',
        type: 'numeric',
        numericFormat: {
          pattern: '0'
        }
      },
      {
        data: 'harga_4',
        type: 'numeric',
        numericFormat: {
          pattern: '0'
        }
      },
      {
        data: 'harga_5',
        type: 'numeric',
        numericFormat: {
          pattern: '0'
        }
      },
      {
        data: 'harga_6',
        type: 'numeric',
        numericFormat: {
          pattern: '0'
        }
      },
    ],
    stretchH: 'all',
    //width: 806,
    autoWrapRow: true,
    //height: 487,
    //maxRows: 22,
    rowHeaders: true,
    colHeaders: [
      'ID',
      'Barcode',
      'Nama Produk',
      'Kategori',
      'Satuan',
      'Deskripsi',
      'H. produksi',
      'H. Res. Kecil',
      'H. Res. Besar',
      'H. Agen Kecil',
      'H. Agen Besar',
      'H. Online',
    ],
    manualRowResize: true,
    manualColumnResize: true,
    manualRowMove: true,
    manualColumnMove: true,
    //contextMenu: true,
    mergeCells: true,
    columnSorting: true,
    sortIndicator: true,
    autoColumnSize: {
      samplingRatio: 23
    },
    //fixedRowsTop: 2,
    fixedColumnsLeft: 4,
    afterChange: function (change, source) {
      if (source === 'loadData') {
        return;
      }
      clearTimeout(autosaveNotification);
      for (var i = 0; i < change.length; i++) {
        var id = this.getDataAtCell(change[i][0],0);
        change[i][0] = id*1;
      }
      saveData(change, function(response){
        $('#resultcode').html('Menyimpan (' + change.length + ' ' + 'cell' + (change.length > 1 ? 's' : '') + ')');
        autosaveNotification = setTimeout(function() {
          $('#resultcode').html('Perubahan akan langsung tersimpan');
        }, 1000);
      });
    },
    cells: function (row, col) {
      var cellProperties = {};
      cellProperties.renderer = "negativeValueRenderer"; // uses lookup map
      return cellProperties;
    }
  };
  var hot = new Handsontable(hotElement, hotSettings);
  function searching(){
    var value = $('input[name="cariproduk"]').val();
    var pilih = $(".chosen-select").val();
    if (pilih!=null) {
      for (var i = 0; i < pilih.length; i++) {
        debounceFn(pilih[i], value);
      }
    } else {
      var filtersPlugin = hot.getPlugin('filters');
      filtersPlugin.removeConditions(1);
      filtersPlugin.removeConditions(2);
      filtersPlugin.removeConditions(3);
      filtersPlugin.removeConditions(4);
      filtersPlugin.removeConditions(5);
      filtersPlugin.removeConditions(6);
      filtersPlugin.removeConditions(7);
      filtersPlugin.removeConditions(8);
      filtersPlugin.removeConditions(9);
      filtersPlugin.removeConditions(10);
      filtersPlugin.removeConditions(11);
      filtersPlugin.filter();
      hot.render();
      if (value.length > 0) {
        $('#resultcode').html('Silahkan pilih kolom tersedia');
      }
    }
  }
  $('input[name="cariproduk"]').on('keyup', function(event){
    searching();
  });
  $('.chosen-select').on('change', function(event){
    searching();
  });
  function loadData(data) {
    $.ajax({
      url: '<?php echo base_url() ?>produksi/produk_retail/json',
      type: 'get',
      success: function(response){
        data(response.data);
      }
    });
  }
  var limit = 100;
  loadData(function(data){
    hot.loadData(data);
    var getData = (function(){
      return function () {
        var page  = parseInt(window.location.hash.replace('#', ''), 10) || 1;
        var row   = page > 1 ? limit*(page-1) : 0;
        var count = (row + limit);
        var part  = [];
        for (var i = row; i < count; i++) {
          if (typeof(data[i])!=='undefined') {
            part.push(data[i]);
          }
        }
        return part;
      }
    })();
    var total_page = Math.ceil(data.length/limit);
    var apage = '';
    for (var i = 1; i <= total_page; i++) {
      if (i==1) {
        apage += '<li class="active"><a href="#'+i+'" id="page">'+i+'</a></li>';
      } else {
        apage += '<li><a href="#'+i+'" id="page">'+i+'</a></li>';
      }
    }
    $("#pagination").html(apage);
    $('a[id*="page"]').click(function(e){
      e.stopImmediatePropagation();
      $('a[id*="page"]').parent().removeClass('active');
      $(this).parent().addClass('active');
      setTimeout(function(){
        searching();
        hot.loadData(getData());
      }, 100);
    });
    hot.loadData(getData());
  });
  function saveData(data, result) {
    $.ajax({
      url: '<?php echo base_url() ?>produksi/produk_retail/simpan_semua_produk',
      type: 'post',
      data: 'data='+JSON.stringify(data),
      success: function(response){
        result(response);
      }
    });
  }
  setTimeout(function(){
    $("#hot-display-license-info").hide();
  }, 50);
});
</script>

