<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
    <style>
        .container {
            min-height:13.85cm;
            max-height:13.85cm;
            width:9cm;
        }
        .container-bg{
            display:flex;
            justify-content:center;
            align-items:center;
            border:solid 1px black;
            height: 12.3cm;
            width: 9cm;
            background:url('<?php echo base_url();?>/assets/images/packing.jpg')!important;
            background-size:contain!important;
        }
        .wrapper {
            background: white!important;
            padding: 20px;
            height: 8cm;
            width: 8cm;
            border-radius: 10px;
            margin-top: 20px;
        }
        
        .row {
            margin:0px;
        }
        
        .col-xs-6 {
            padding:0px;
        }

        img {
            -webkit-print-color-adjust: exact;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="row">
        <?php $no = 1;foreach ($data_order as $order) { 
            $bg_color = "white";
            if($order->id_media == 4){
                $bg_color = "yellow";
            }
            $bg_color = $order->kode_warna;
        ?>
        <div class="col-xs-6 container">
            <div class="container-bg">
            <div class="wrapper" style="background-color:white!important;padding:5px;">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Kode CS</th>
                        <td><?php echo $order->last_nama_cs;?></td>
                    </tr>
                    <tr>
                        <th>Order ID</th>
                        <td><?php echo $order->no_invoice;?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $order->nama_penerima;?></td>
                    </tr>
                    <tr>
                        <th>No HP</th>
                        <td><?php echo $order->no_hp;?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $order->alamat_penerima;?></td>
                    </tr>
                    <tr>
                        <th>Ket</th>
                        <td>
                            <?php foreach ($order->detail_order as $produk) { echo $produk->nama_produk.' ('.$produk->jumlah.') <br>'; } ?>
                            <?php
                                if($order->id_media != 4){
                                    $harga = $order->ongkir / 1000;
                                    if($harga < 1000){
                                        echo $harga.'K';
                                    }else{
                                        $harga = $harga / 1000;
                                        echo $harga.'JT';
                                    }    
                                } else {
                            ?>
                            <br><br> 
                            <b>BAYAR DI TEMPAT Rp. <?php $totalcod = $order->nominal; echo number_format($totalcod,0,',','.')?> </b>
                            <?php echo '<div>'.$order->keterangan.'</div>'; } ?>
                        </td>
                    </tr>
                </table>
            </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <script>
        function PopUp(data) {
            var mywindow = window.open('','','left=0,top=0,width=950,height=600,toolbar=0,scrollbars=0,status=0,addressbar=0');

            var is_chrome = Boolean(mywindow.chrome);
            var isPrinting = false;
            mywindow.document.write(data);
            mywindow.document.close(); // necessary for IE >= 10 and necessary before onload for chrome


            if (is_chrome) {
                mywindow.onload = function() { // wait until all resources loaded 
                    isPrinting = true;
                    mywindow.focus(); // necessary for IE >= 10
                    mywindow.print();  // change window to mywindow
                    mywindow.close();// change window to mywindow
                    isPrinting = false;
                };
                setTimeout(function () { if(!isPrinting){mywindow.print();mywindow.close();} }, 300);
            }
            else {
                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10
                mywindow.print();
                mywindow.close();
            }

            return true;
        }
    </script>
</body>
</html>