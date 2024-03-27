<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
</head>

<body>

    <script>
        // Tambahkan JavaScript di sini jika diperlukan
        // Misalnya, kode untuk membuka jendela cetak faktur
        var myWindow = window.open("", "MsgWindow", "width=300, height=400");
        myWindow.document.write(`
        <table style="width:100%">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>mama</td>
            <td style="width:50%"></td>
            <td>No Faktur</td>
            <td>:</td>
            <td>
                <?= $service->no_faktur_service ?>
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>
                <?= $service->alamat ?>
            </td>
            <td style="width:50%"></td>
            <td>Tgl Masuk</td>
            <td>:</td>
            <td>
                <?= $service->tgl_masuk ?>
            </td>
        </tr>
        <tr>
            <td>No Telp</td>
            <td>:</td>
            <td>
                <?= $service->no_hp ?>
            </td>
            <td style="width:50%"></td>
            <td>Mekanik</td>
            <td>:</td>
            <td>
                <?= $service->nama_mekanik ?>
            </td>
        </tr>
    </table>
    <table class="table" width="100%">
        <tr>
            <td>Biaya Service</td>
            <td>
                Rp.
                <?= number_format($service->harga * 1, 0, ',', '.') ?>
            </td>
        </tr>


        <tr>
            <td><b>Sparepart</b></td>
            <td>

            </td>
        </tr>
        <?php
        $no = 1;
        $subTotal = 0;
        $total = 0;
        foreach ($parts as $p) { ?>
                            <tr style="border-bottom:1px solid black">

                                <td>

                                    <?= $no++ . '. ' . $p->nama_produk ?>
                                </td>
                                <td>
                                    x
                                    <?= $p->jumlah ?>
                                    Rp.
                                    <?php
                                    echo number_format($p->harga);
                                    $subTotal += $p->harga ?>
                                </td>
                            </tr>
                            <?php
        }
        ?>
        <tr>
            <th style="text-align:left">Total Bayar</th>
            <td>Rp.
                <?= number_format($subTotal + $service->harga) ?>
            </td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>
                <?= $service->keterangan ?>
            </td>
        </tr>

    </table>
    <table style="width:100%">
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td style="width:80%"></td>
            <td>
                Wonosobo,
                <?= date('d-mY') ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>


            </td>
            <td></td>
            <td>
                <?= $toko->nama_toko ?>
            </td>
        </tr>
    </table>
        `);
        // Setelah menambahkan konten ke jendela cetak faktur, panggil fungsi window.print() untuk mencetaknya
        myWindow.print();
    </script>

</body>

</html>