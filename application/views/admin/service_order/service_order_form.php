<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="#">Home</a>
        </li>
        <li class="active">Service</li>
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
              <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar"
                autocomplete="off" />
              <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
            </div>

            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar"
                autocomplete="off" />
              <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
            </div>

            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs"
                autocomplete="off" />
              <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
            </div>

            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
              <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
            </div>

            <div class="ace-settings-item">
              <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container"
                autocomplete="off" />
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
          <!-- <?php echo $j ?> -->
        </h1>
      </div><!-- /.page-header -->

      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <form action="<?php echo $action; ?>" method="post">
            <input type="hidden" name="id" id="" value="<?= $id ?>">
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="varchar">Tgl Masuk
                    <?php echo form_error('tgl_masuk') ?>
                  </label>
                  <input type="text" class="form-control" name="tgl_masuk" id="datepicker1" placeholder="dd-mm-yyyy"
                    value="<?php echo $tgl_masuk; ?>" />
                </div>
                <div class="form-group">
                  <label for="varchar">
                    Service
                    <?php echo form_error('id_service') ?>
                  </label>
                  <select class="form-control" name="id_service" id="id_service">
                    <option value="" selected disabled>--Pilih--</option>
                    <?php foreach ($service as $key): ?>
                      <?php if ($key->id == $id_service) { ?>
                        <option selected value="<?php echo $key->id ?>" nom="<?php echo $key->harga ?>">
                          <?php echo $key->nama ?>
                        </option>
                      <?php } else { ?>
                        <option value="<?php echo $key->id ?>" nom="<?php echo $key->harga ?>">
                          <?php echo $key->nama ?>
                        </option>
                      <?php } ?>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="varchar">Biaya Service (belum termasuk sparepart)
                    <?php echo form_error('harga_awal') ?>
                  </label>
                  <input type="text" class="form-control nominal-awal" name="harga" id="harga"
                    value="<?php echo $harga_awal; ?>" readonly />
                </div>
                <div class="form-group">
                  <label for="varchar">Nama Pelanggan
                    <?php echo form_error('nama') ?>
                  </label>
                  <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama; ?>"
                    placeholder="Nama Pelanggan" />
                </div>
                <div class="form-group">
                  <label for="varchar">Alamat
                    <?php echo form_error('alamat') ?>
                  </label>
                  <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $alamat; ?>"
                    placeholder="Alamat" />
                </div>
                <div class="form-group">
                  <label for="varchar">No Hp
                    <?php echo form_error('no_hp') ?>
                  </label>
                  <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?php echo $no_hp; ?>"
                    placeholder="No Hp" />
                </div>
              </div>
              <div class="col-xs-6">


                <div class="form-group">
                  <label for="varchar">
                    Mekanik
                    <?php echo form_error('mekanik') ?>
                  </label>
                  <select class="form-control" name="id_mekanik" id="id_mekanik">
                    <option value="" selected disabled>--Pilih--</option>
                    <?php foreach ($mekanik as $key): ?>
                      <?php if ($key->id_users == $id_mekanik) { ?>
                        <option selected value="<?php echo $key->id_users ?>">
                          <?php echo $key->first_name . " " . $key->last_name ?>
                        </option>
                      <?php } else { ?>
                        <option value="<?php echo $key->id_users ?>">
                          <?php echo $key->first_name . " " . $key->last_name ?>
                        </option>
                      <?php } ?>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="varchar">
                    Status
                    <?php echo form_error('status') ?>
                  </label>
                  <select class="form-control" name="status" id="status">
                    <option value="" selected disabled>--Pilih--</option>


                    <option value="1" <?php if ($status == 1) {
                      echo "selected";
                    } ?>>
                      Belum Selesai
                    </option>

                    <option value="2" <?php if ($status == 2) {
                      echo "selected";
                    } ?>>
                      Selesai
                    </option>


                  </select>
                </div>

                <div class="form-group">
                  <label for="varchar">Keterangan
                    <?php echo form_error('keterangan') ?>
                  </label>
                  <textarea class="form-control" name="keterangan" id="keterangan"
                    placeholder="Keterangan"><?php echo $keterangan ?></textarea>
                </div>
                <div class="form-group">
                  <label for="">Sparepart</label>
                  <input type="text" name="" id="id_sparepart" class="form-control" placeholder="Barcode Imei">
                </div>
                <div id="search_results"></div>
                <table id="tabel" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <td>No</td>
                    <td>Nama Produk</td>
                    <td>Harga</td>
                    <td>Jumlah</td>
                    <td>Aksi</td>
                  </tbody>
                </table>


                <!-- <div class="form-group">
                  <label for="varchar">
                    Sparepart
                    <?php echo form_error('sparepart') ?>
                  </label>
                  <select class="form-control" name="id_sparepart[]" id="id_sparepart" multiple>
                    <?php foreach ($sparepart as $key): ?>
                      <?php if ($key->id_produk_2 == $id_sparepart) { ?>
                        <option selected value="<?php echo $key->id_produk_2 ?>">
                          <?php echo $key->nama_produk ?>
                        </option>
                      <?php } else { ?>
                        <option value="<?php echo $key->id_produk_2 ?>">
                          <?php echo $key->nama_produk ?>
                        </option>
                      <?php } ?>
                    <?php endforeach ?>
                  </select>
                </div> -->
                <!-- <div class="form-group">
                  <label for="varchar">Total Harga
                    <?php echo form_error('harga') ?>
                  </label>
                  <input type="text" class="form-control nominal-awal" name="harga" id="harga"
                    value="<?php echo $harga; ?>" placeholder="Total Harga" />
                </div> -->
              </div>
            </div>


            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" onclick="javascript:history.back();" class="btn btn-default">Cancel</button>
          </form>

          <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.page-content -->
  </div>
</div><!-- /.main-content -->

<script>
  jQuery(function ($) {

    $("#nominal").on('keyup', function () {
      var nominal = $(this).val().replace(/\./g, '');
      $(this).val(number_format(nominal * 1, 0, ',', '.'));
    });
    $("#harga").on('keyup', function () {
      var nominal = $(this).val().replace(/\./g, '');
      $(this).val(number_format(nominal * 1, 0, ',', '.'));
    });
  });
</script>
<script>
  $(document).ready(function () {


    $("#id_service").on('change', function () {
      var nominalAwal = $(this).find(':selected').attr('nom');
      $(".nominal-awal").val(nominalAwal);

    });

    loadServiceOrderTempData();

    $('#id_sparepart').keyup(function () {
      var keyword = $(this).val();

      // Lakukan request Ajax hanya jika panjang keyword lebih dari 2 karakter
      if (keyword.length > 0) {
        $.ajax({
          url: '<?= base_url('admin/service_order/search') ?>',
          type: 'POST',
          data: { keyword: keyword },
          dataType: 'json',
          success: function (response) {
            $('#search_results').empty();
            if (response.length > 0) {
              var resultHtml = '';
              $.each(response, function (index, item) {
                resultHtml += '<input type="text" value="' + item.nama_produk + '" readonly class="form-control search-result" data-id="' + item.id_produk_2 + '">';
              });
              $('#search_results').html(resultHtml);

              // Menambahkan event listener untuk setiap elemen input
              $('.search-result').click(function () {
                var id_produk = $(this).data('id');
                inputDataToTemp(id_produk);
              });
            } else {
              $('#search_results').html('<p>Tidak ada hasil ditemukan.</p>');
            }
          },
          error: function (xhr, status, error) {
            console.error(xhr.responseText);
          }
        });
      } else {
        $('#search_results').empty();
      }
    });
  });

  function inputDataToTemp(id_produk) {
    // Lakukan permintaan AJAX untuk menyimpan data ke server
    $.ajax({
      url: '<?= base_url('admin/service_order/insert_temp') ?>',
      type: 'POST',
      data: { id_produk: id_produk },
      dataType: 'json',
      success: function (response) {
        // Jika permintaan berhasil, tambahkan data ke dalam tabel
        if (response.status === 'success') {
          // Memuat data dari tabel service_order_temp setelah berhasil memasukkan data baru
          loadServiceOrderTempData();
        } else {
          alert('Gagal memasukkan data ke dalam tabel');
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
        alert('Gagal memasukkan data ke dalam tabel');
      }
    });
  }
  const numberWithCommas = (x) => {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return parts.join(",");
  }
  // Fungsi untuk memuat data dari tabel service_order_temp
  function loadServiceOrderTempData() {
    $.ajax({
      url: '<?= base_url('admin/service_order/load_temp_data') ?>',
      type: 'GET',
      dataType: 'json',
      success: function (response) {
        console.log(response);
        // Kosongkan tabel sebelum memuat data baru
        $('#tabel tbody').empty();

        // Tambahkan data dari response ke dalam tabel
        $.each(response, function (index, item) {
          var deleteButton = '<button type="button" class="btn-delete" data-id="' + item.id_produk + '">Hapus</button>'; // Tombol hapus dengan atribut data-id

          $('#tabel tbody').append(
            '<tr>' +
            '<td>' + (index + 1) + '</td>' +
            '<td>' +
            '<input type="hidden" class="form-control text-center input-update" style="border:none;outline:none;" name="id_produk[]" data-uid="' + item.id_produk + '" value="' + item.id_produk + '" />' +
            item.nama_produk +
            '</td>' +
            '<td>' +
            item.harga +
            '</td>' +
            '<td>' +
            + item.jumlah +
            '</td>' +
            '<td>' + deleteButton + '</td>' +
            '</tr>'
          );
        });


        // Menambahkan event listener untuk tombol hapus
        $('.btn-delete').click(function () {
          var idProduk = $(this).data('id'); // Mendapatkan ID produk dari atribut data-id
          // Panggil fungsi untuk menghapus data dengan ID produk tertentu
          deleteServiceOrderTempData(idProduk);
        });

      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
        alert('Gagal memuat data dari tabel service_order_temp');
      }
    });
  }
  // Fungsi untuk menghapus data dengan ID produk tertentu
  function deleteServiceOrderTempData(idProduk) {
    $.ajax({
      url: '<?= base_url('admin/service_order/delete_temp_data') ?>', // Ganti dengan URL endpoint untuk menghapus data
      type: 'POST',
      data: { id_produk: idProduk },
      dataType: 'json',
      success: function (response) {
        if (response.status === 'success') {
          // Jika penghapusan berhasil, muat ulang data tabel
          loadServiceOrderTempData();
        } else {
          alert('Gagal menghapus data dari tabel service_order_temp');
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
        alert('Gagal menghapus data dari tabel service_order_temp');
      }
    });
  }


</script>