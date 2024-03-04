<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
    <style>
        body {
            padding:20px;
        }
        .wrapper{
            border:solid 1px black;
            padding:20px;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="row">
        <?php $no = 1;foreach ($data_order as $order) { ?>
        <div class="col-xs-6 wrapper">
            *<?php echo $no++;?>* : <?php echo $order->no_invoice;?><br>
            Pengirim : Momiku / <?php echo $order->id_cs.' ('.$order->no_hp_cs.')' ;?> <br><br>
            Penerima : <?php echo $order->nama_penerima.' ('.$order->no_hp.')';?><br>
            <?php echo $order->alamat_penerima;?><br>
            Order : <?php if($order->gc > 0){ echo '<b>/ '.$order->gc.'GC</b>'; } ?>
                    <?php if($order->hs > 0){ echo '<b>/ '.$order->hs.'HS</b>'; } ?>
                    <?php
                        $harga = $order->harga / 1000;
                        if($harga < 1000){
                            echo $harga.'K';
                        }else{
                            $harga = $harga / 1000;
                            echo $harga.'JT';
                        }
                    ?>
        </div>
        <?php } ?>
    </div>
</body>
</html>