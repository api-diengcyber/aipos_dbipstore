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
        .container{
            display:flex;
            justify-content:center;
            align-items:center;
            border:solid 1px black;
            height: 67vw;
            background:url('<?php echo base_url();?>/assets/images/packing.png')!important;
            background-size:contain!important;
            margin-bottom:40px;
        }
        .wrapper {
            background: white!important;
            padding: 20px;
            min-height: 320px;
            width: 335px;
            border-radius: 10px;
            margin-top: 20px;
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
        ?>
        <div class="col-xs-6 container">
            <div class="wrapper" style="background-color:<?php echo $bg_color;?>!important">
                *<?php echo $no++;?>* : <?php echo $order->no_invoice;?><br>
                Pengirim : Momiku / <?php echo $order->id_cs.' ('.$order->no_hp_cs.')' ;?> <br><br>
                Penerima : <?php echo $order->nama_penerima.' ('.$order->no_hp.')';?><br>
                <?php echo $order->alamat_penerima;?><br>
                Order : <?php if($order->gc > 0){ echo '<b>/ '.$order->gc.'GC</b>'; } ?>
                        <?php if($order->hs > 0){ echo '<b>/ '.$order->hs.'HS</b>'; } ?>
                        <?php
                            $harga = $order->ongkir / 1000;
                            if($harga < 1000){
                                echo $harga.'K';
                            }else{
                                $harga = $harga / 1000;
                                echo $harga.'JT';
                            }
                        ?>
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