<div class="main-content" id="app">
    <div class=" main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
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
                    Generate Varian - <?= $produk->nama_produk ? $produk->nama_produk : '' ?>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-info">
                        <b>Informasi</b>
                        <p>Gunakan gambar dengan ukuran file kecil dibawah 300KB, agar server tidak terbebani dan proses upload lebih cepat.</p>
                    </div>
                    <form action="<?= base_url('admin/produk_retail/generate_varian_action/' . $this->uri->segment(4)) ?>" method="post" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <thead>
                                <th width="300">Nama Varian</th>
                                <th>Gambar (Kosongkan untuk menggunakan gambar produk induk)</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <tr v-for="(item,index) in varians">
                                    <td>
                                        <input type="text" name="nama_produk[]" class="form-control" placeholder="Masukan nama varian, contoh: Merah">
                                    </td>
                                    <td>
                                        <input type="file" name="gambar[]" id="" class="form-control">
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" @click="removeVarian(index)">Hapus</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="form-group d-flex">
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <button class="btn btn-success" type="button" @click="addVarian()"><i class="fa fa-plus"></i> Tambah Varian Lagi</button>
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-save"></i>
                                Simpan dan Buat Varian
                            </button>
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .d-flex {
        display: flex;
    }

    .justify-content-between {
        justify-content: space-between;
    }
</style>
<script src="<?= base_url('assets/js/vue.js') ?>"></script>
<script>
    let varians = [];
    for (let i = 0; i < 2; i++) {
        varians.push({});
    }

    var app = new Vue({
        el: '#app',
        data: {
            varians: varians,
            max_varian: 10,
        },
        methods: {
            addVarian() {
                varians.push({});
            },
            removeVarian(index) {
                varians.splice(index, 1);
            }
        }
    });
</script>