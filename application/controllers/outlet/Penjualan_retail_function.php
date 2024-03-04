
        $id = $this->input->post('id', true);
        $id_pembeli = $this->input->post('id_pembeli', true);
        $id_sales = $this->input->post('id_sales', true);
        $tgl = $this->input->post('tgl', true);
        $nama_pembeli = $this->input->post('nama_pembeli', true);
        $alamat_pembeli = $this->input->post('alamat_pembeli', true);
        $pembayaran = $this->input->post('pembayaran', true);
        $total_asli = $this->input->post('total_asli', true);
        $diskon_member = $this->input->post('diskon_member', true);
        $total = $this->input->post('total', true);
        $ppn_nominal = $this->input->post('ppn_nominal', true);
        $total_ppn = $this->input->post('total_ppn', true);
        $total_diskon = $this->input->post('total_diskon', true);
        $deadline = $this->input->post('deadline', true);
        $nominal_tunai = $this->input->post('nominal_tunai', true);
        $nominal_transfer = $this->input->post('nominal_transfer', true);
        $akun_transfer = $this->input->post('akun_transfer', true);
        $nominal_hutang = $this->input->post('nominal_hutang', true);
        $deadline2 = $this->input->post('deadline2', true);
        $ongkos_kirim = $this->input->post('ongkos_kirim', true);
        $id_media = $this->input->post('id_media', true);
        $id_bank = $this->input->post('id_bank', true);
        $id_expedisi = $this->input->post('id_expedisi', true);
        $no_resi = $this->input->post('no_resi', true);
        $biaya_cod = $this->input->post('biaya_cod', true);
        $ongkir = $this->input->post('ongkir', true);

        // $data = array(
        //   'id_sales' => $id_sales,
        //   'id_pembeli' => $id_pembeli,
        //   'nama_pembeli' => $nama_pembeli,
        //   'alamat_pembeli' => $alamat_pembeli,
        //   'pembayaran' => $pembayaran,
        //   'total_asli' => $total_asli,
        //   'diskon_member' => $diskon_member,
        //   'total' => $total,
        //   'deadline' => $deadline,
        //   'ppn_nominal' => $ppn_nominal,
        //   'total_ppn' => $total_ppn,
        //   'tgl_order' => $tgl,
        // );

        // if (!empty($id)) {
        //     $this->db->where('id_toko', $this->userdata->id_toko);
        //     $this->db->where('id_orders_2', $id);
        //     $row_o = $this->db->get('orders')->row();
        //     $no_faktur = $row_o->no_faktur;
        //     $tgl_deadline = $row_o->deadline;
        // } else {
        //     $no_faktur = $this->get_faktur();
        //     $tgl_deadline = null;
        // }

        // if ($pembayaran=="3") { // LAINNYA
        //   if ($nominal_tunai > 0) {
        //   }
        //   if ($nominal_hutang > 0) { // KREDIT
        //     $str_deadline = mktime(0,0,0,date('m'),date('d')+$deadline2,date('Y'));
        //     $tgl_deadline = date('d-m-Y', $str_deadline);
        //     $row_last_piutang = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_piutang', 'desc')->get('piutang')->row();
        //     $id_piutang = 1;
        //     if ($row_last_piutang) {
        //         $id_piutang = $row_last_piutang->id_piutang + 1;
        //     }
        //     $data_piutang = array(
        //       'id_piutang' => $id_piutang,
        //       'id_toko' => $this->userdata->id_toko,
        //       'id_users' => $this->userdata->id_users,
        //       'no_faktur' => $no_faktur,
        //       'id_pembeli' => $id_pembeli,
        //       'jumlah_hutang' => $nominal_hutang+$ongkos_kirim,
        //       'jumlah_bayar' => 0,
        //       'sisa' => $nominal_hutang+$ongkos_kirim,
        //       'tanggal' => $tgl,
        //       'deadline' => $tgl_deadline,
        //       'tgl_order' => $tgl
        //     );
        //     $this->Piutang_retail_model->insert($data_piutang);
        //   }
        // }
        // if ($pembayaran=="2") { // KREDIT
        //   $str_deadline = mktime(0,0,0,date('m'),date('d')+$deadline,date('Y'));
        //   $tgl_deadline = date('d-m-Y', $str_deadline);
        //   $row_last_piutang = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_piutang', 'desc')->get('piutang')->row();
        //   $id_piutang = 1;
        //   if ($row_last_piutang) {
        //       $id_piutang = $row_last_piutang->id_piutang + 1;
        //   }
        //   $data_piutang = array(
        //     'id_piutang' => $id_piutang,
        //     'id_toko' => $this->userdata->id_toko,
        //     'id_users' => $this->userdata->id_users,
        //     'no_faktur' => $no_faktur,
        //     'id_pembeli' => $id_pembeli,
        //     'jumlah_hutang' => $total,
        //     'jumlah_bayar' => 0,
        //     'sisa' => $total,
        //     'tanggal' => $tgl,
        //     'deadline' => $tgl_deadline,
        //     'tgl_order' => $tgl
        //   );
        //   $this->Piutang_retail_model->insert($data_piutang);
        // }
        // $bukan_member = "";
        // if ($id_pembeli*1==0) {
        //   $bukan_member = $nama_pembeli." - ".$alamat_pembeli;
        //   $id_sales = '';
        // }
        // if (!empty($id)) {
        //   $id_orders = $id;

        //   // update data orders
        //   $data_update = array(
        //     'pembeli' => $id_pembeli,
        //     'diskon_member' => $diskon_member,
        //     'bukan_member' => $bukan_member,
        //     'pembayaran' => $pembayaran,
        //     'nominal' => $total,
        //     'bayar' => $total,
        //     'deadline' => $deadline,
        //     'ppn' => 0,
        //     'ppn_nominal' => $ppn_nominal,
        //     'ongkir' => $ongkos_kirim,
        //     'id_media' => $id_media,
        //     'id_bank' => $id_bank,
        //     'id_expedisi' => $id_expedisi,
        //     'no_resi' => $no_resi,
        //     'biaya_lain' => $biaya_cod,
        //   );
        //   $this->db->where('id_orders_2', $id);
        //   $this->db->update('orders', $data_update);

        //   // hapus tabel orders detail
        //   $this->db->where('id_orders_2', $id);
        //   $this->db->delete('orders_detail');

        // } else {
        //   // insert data orders
        //   $row_last_orders = $this->db->select('id_orders_2')
        //                               ->from('orders')
        //                               ->where('id_toko', $this->userdata->id_toko)
        //                               ->order_by('id_orders_2', 'desc')
        //                               ->get()->row();
        //   $id_orders = 1;
        //   if ($row_last_orders) {
        //     $id_orders = $row_last_orders->id_orders_2+1;
        //   }
        //   $data_orders = array(
        //     'id_orders_2' => $id_orders,
        //     'id_toko' => $this->userdata->id_toko,
        //     'id_users' => $this->userdata->id_users,
        //     'id_sales' => $id_sales,
        //     'no_faktur' => $no_faktur,
        //     'tgl_order' => $tgl,
        //     'jam_order' => date('H:i:s'),
        //     'pembeli' => $id_pembeli,
        //     'diskon_member' => $diskon_member,
        //     'bukan_member' => $bukan_member,
        //     'pembayaran' => $pembayaran,
        //     'nominal' => $total,
        //     'bayar' => $total,
        //     'deadline' => $deadline,
        //     'ppn' => 0,
        //     'ppn_nominal' => $ppn_nominal,
        //     // 'ongkir' => $ongkos_kirim,
        //     'id_media' => $id_media,
        //     'id_bank' => $id_bank,
        //     'id_expedisi' => $id_expedisi,
        //     'no_resi' => $no_resi,
        //     'biaya_lain' => $biaya_cod,
        //     'ongkir' => $ongkir,
        //   );
        //   $this->Penjualan_retail_model->insert($data_orders);
        // }
        // $total_harga = 0;
        // $total_hp_barang = 0;
        // $result = $this->Orders_temp_retail_model->get_barang_temp($this->userdata->id_users, $this->userdata->id_toko);
        // foreach ($result as $key) {
        //   if ($key->pil_harga=="1") { // HARGA UMUM
        //     if ($key->mingros > 0) {
        //       if ($key->jumlah >= $key->mingros) {
        //         // grosir //
        //         $harga = $key->harga_2;
        //       } else {
        //         // biasa //
        //         $harga = $key->harga_1;
        //       }
        //     } else {
        //       $harga = $key->harga_1;
        //     }
        //   } else if ($key->pil_harga=="2") { // HARGA GROSIR 1
        //     $harga = $key->harga_2;
        //   } else if ($key->pil_harga=="3") { // HARGA GROSIR 2
        //     $harga = $key->harga_3;
        //   } else if ($key->pil_harga=="4") { // HARGA RITA
        //     $harga = $key->harga_4;
        //   } else {
        //     $harga = 0;
        //   }
        //   $harga = $key->harga_jual;
        //   /*
        //   $diskon_produk = $harga*($key->diskon_produk/100);
        //   $diskon1 = $harga*($key->diskon/100);
        //   $diskon2 = $harga*($key->diskon2/100);
        //   $diskon3 = $harga*($key->diskon3/100);
        //   $diskon = ($diskon1*$key->jumlah) + ($diskon2*$key->jumlah) + ($diskon3*$key->jumlah) + ($diskon_produk*$key->jumlah);
        //   $harga_barang = ($harga*$key->jumlah)-$diskon;
        //   */
        //   $harga_barang = $harga * ((100-$key->diskon_produk)/100) * ((100-$key->diskon)/100) * ((100-$key->diskon2)/100) * ((100-$key->diskon3)/100) * $key->jumlah;
          
        //   $total_harga += $harga_barang;
        //   $data_stok = 0;
        //   $hp_barang = 0;
        //   $sisa_beli_bayar = $key->jumlah;
        //   $jml_sisa_stok = 0;
        //   /* 
        //     pembelian jika qty bayar
        //   */
        //   // hpp //
        //   $row_hpp_produk = $this->db->select('*')
        //                              ->from('hpp')
        //                              ->where('id_toko', $this->userdata->id_toko)
        //                              ->where('id_produk', $key->id_produk_2)
        //                              ->get()->row();
        //   $hpp_satuan = 0;
        //   if ($row_hpp_produk) {
        //     $hpp_satuan = $row_hpp_produk->hpp_fifo;
        //   }
        //   // hpp //
        //   $array_pembelian_sisa_stok = array();
        //   $harga_satuan = 0;
        //   $row_last_pembelian = $this->db->select('p.*')
        //                                  ->from('pembelian p')
        //                                  ->where('p.id_toko', $this->userdata->id_toko)
        //                                  ->where('p.id_produk', $key->id_produk_2)
        //                                  ->order_by('DATE(CONCAT(SUBSTRING(p.tgl_masuk,7,4),"-",SUBSTRING(p.tgl_masuk,4,2),"-",SUBSTRING(p.tgl_masuk,1,2))) DESC')
        //                                  ->order_by('p.id_pembelian', 'desc')
        //                                  ->get()->row();
        //   $res_pembelian = $this->get_stok($key->id_produk_2, $this->userdata->id_toko);
        //   foreach ($res_pembelian as $key2) {
        //     $exexpire = explode("-", $key2->tgl_expire);
        //     $hr_exp = $exexpire[0];
        //     $bln_exp = !empty($exexpire[1]) ? $exexpire[1] : '';
        //     $thn_exp = !empty($exexpire[2]) ? $exexpire[2] : '';
        //     $stgl_expire = $thn_exp."-".$bln_exp."-".$hr_exp;
        //     if($stgl_expire <= date('Y-m-d')){
        //       // stok kadaluarsa //
        //     } else {
        //       // stok ada //
        //       $data_stok += $key2->stok;
        //       if($sisa_beli_bayar > $key2->stok){
        //         $k_beli = $key2->stok;
        //       } else {
        //         $k_beli = $sisa_beli_bayar;
        //       }
        //       //Opsi Minus Stok
        //       $qry = $this->M_opsi->get_opsi_stok($this->userdata->id_toko);
        //       if($qry->opsi == 1){
        //         $k_beli = $sisa_beli_bayar;
        //       }
        //       //End Opsi Minus Stok
        //       $sisa_stok = $key2->stok - $k_beli;
        //       $jml_sisa_stok += $sisa_stok;
        //       // --- //
        //       // if (!empty($hpp_satuan)) {
        //       //   $harga_satuan = $hpp_satuan;
        //       // } else {
        //       //   $harga_satuan = $key2->harga_satuan;
        //       // }
        //       $harga_satuan = ($row_last_pembelian->total_bayar/$row_last_pembelian->jumlah); // harga_satuan tanpa ppn, sudah dipotong diskon
        //       // $hp_barang += $k_beli * $key2->harga_satuan;
        //       $hp_barang += $k_beli * ($row_last_pembelian->total_bayar/$row_last_pembelian->jumlah); // harga_satuan tanpa ppn, sudah dipotong diskon

        //       if ($qry->opsi == 0) {
        //         if ($sisa_stok < 0) {
        //           $sisa_stok = 0;
        //         }
        //       }
        //       $data_sp = array(
        //         'stok' => $sisa_stok
        //       );
        //       if ($k_beli > 0) {
        //         $array_pembelian_sisa_stok[$key2->id_pembelian] = $k_beli*1;
        //       }
        //       $this->Stok_produk_model->update_by_id_pembelian($key2->id_pembelian, $data_sp);
        //       // --- //
        //       $sisa_beli_bayar -= $key2->stok;
        //       if($sisa_beli_bayar > 0){
        //         $sisa_beli_bayar = $sisa_beli_bayar;
        //       } else {
        //         $sisa_beli_bayar = 0;
        //       }
        //     }
        //   }
            
        //   $zi = 0;
        //   $zdiskon_sum1 = 0;
        //   $zdiskon_sum2 = 0;
        //   $zdiskon_sum3 = 0;
            
        //   $sisa_beli_gratis = $key->jumlah_bonus;
        //   $res_pembelian = $this->get_stok($key->id_produk_2, $this->userdata->id_toko);
        //   foreach ($res_pembelian as $key2) {
        //     $exexpire = explode("-", $key2->tgl_expire);
        //     $hr_exp = $exexpire[0];
        //     $bln_exp = !empty($exexpire[1]) ? $exexpire[1] : '';
        //     $thn_exp = !empty($exexpire[2]) ? $exexpire[2] : '';
        //     $stgl_expire = $thn_exp."-".$bln_exp."-".$hr_exp;
        //     if($stgl_expire <= date('Y-m-d')){
        //       // stok kadaluarsa //
        //     } else {
        //       // stok ada //
        //       $data_stok += $key2->stok;
        //       if($sisa_beli_gratis > $key2->stok){
        //         $k_beli = $key2->stok;
        //       } else {
        //         $k_beli = $sisa_beli_gratis;
        //       }
        //       // Opsi Minus Stok
        //       $qry = $this->M_opsi->get_opsi_stok($this->userdata->id_toko);
        //       if($qry->opsi == 1){
        //         $k_beli = $sisa_beli_gratis;
        //       }
        //       //End Opsi Minus Stok
        //       $sisa_stok = $key2->stok - $k_beli;
        //       $jml_sisa_stok += $sisa_stok;

        //       if ($qry->opsi == 0) {
        //         if ($sisa_stok < 0) {
        //           $sisa_stok = 0;
        //         }
        //       }
        //       $data_sp = array(
        //         'stok' => $sisa_stok
        //       );
        //       if ($k_beli > 0) {
        //         if (!empty($array_pembelian_sisa_stok[$key2->id_pembelian])) {
        //           $array_pembelian_sisa_stok[$key2->id_pembelian] = $array_pembelian_sisa_stok[$key2->id_pembelian]+$k_beli*1;
        //         } else {
        //           $array_pembelian_sisa_stok[$key2->id_pembelian] = $k_beli*1;
        //         }
        //       }
        //       $this->Stok_produk_model->update_by_id_pembelian($key2->id_pembelian, $data_sp);
        //       // --- //
        //       $sisa_beli_gratis -= $key2->stok;
        //       if($sisa_beli_gratis > 0){
        //         $sisa_beli_gratis = $sisa_beli_gratis;
        //       } else {
        //         $sisa_beli_gratis = 0;
        //       }
        //     }
        //   }
        //   /* 
        //     pembelian jika qty gratis
        //   */
        //   $total_hp_barang += $hp_barang;
        //   $row_orders_sales = $this->db->select('ost.*')
        //                                ->from('orders_sales_temp ost')
        //                                ->join('users u', 'ost.id_users=u.id_users AND ost.id_toko=u.id_toko')
        //                                ->where('ost.id_toko', $this->userdata->id_toko)
        //                                ->where('u.id_cabang', $this->userdata->id_cabang)
        //                                ->where('ost.acc_sales', '1')
        //                                ->where('ost.acc_admin', '1')
        //                                ->where('ost.id_orders_temp', $key->id_orders_sales) 
        //                                ->get()->row();
        //   if ($row_orders_sales) {
        //     $data_update_sales = array('selesai' => '1');
        //     $this->db->where('id_orders_temp', $row_orders_sales->id_orders_temp);
        //     $this->db->update('orders_sales_temp', $data_update_sales);
        //     //$this->client_send_ost();
        //   }
            
        //   $zi++;
        //   $zdiskon_sum1 += $key->diskon*1;
        //   $zdiskon_sum2 += $key->diskon2*1;
        //   $zdiskon_sum3 += $key->diskon3*1;
            
        //   $data_temp = array(
        //     'id_orders_2' => $id_orders,
        //     'id_toko' => $this->userdata->id_toko,
        //     'id_produk' => $key->id_produk_2,
        //     'id_orders_sales' => $key->id_orders_sales,
        //     'pil_harga' => $key->pil_harga,
        //     'jumlah' => $key->jumlah,
        //     'jumlah_bonus' => $key->jumlah_bonus,
        //     'harga_satuan' => $harga_satuan*1,
        //     'harga_jual' => $harga*1,
        //     'id_karyawan' => $this->userdata->id_users,
        //     'diskon' => $key->diskon*1,
        //     'diskon2' => $key->diskon2*1,
        //     'diskon3' => $key->diskon3*1,
        //     'potongan' => $key->potongan*1,
        //     'subtotal' => $harga_barang,
        //     'json' => json_encode($array_pembelian_sisa_stok)
        //   );
        //   $this->Orders_detail_retail_model->insert($data_temp);
        //   $dibeli_baru = $key->dibeli+$key->jumlah+$key->jumlah_bonus;
        //   $data_produk = array(
        //     'dibeli' => $dibeli_baru,
        //   );
        //   $this->Produk_retail_model->update($key->id_produk_2, $data_produk);
        // }
        // $zdiskon1 = $zdiskon_sum1/$zi;
        // $zdiskon2 = $zdiskon_sum2/$zi;
        // $zdiskon3 = $zdiskon_sum3/$zi;
        // $zdiskon_jml = $zdiskon1+$zdiskon2+$zdiskon3;
        // $zdiskon_jml = 0;
        // $this->Orders_temp_retail_model->deleteAll($this->userdata->id_users, $this->userdata->id_toko);
        // $total_laba = ($total) - $total_hp_barang;
        // $total_laba_bersih = $total - $total_hp_barang;
        // $update = array(
        //   'laba' => $total_laba,
        //   'laba_bersih' => $total_laba_bersih,
        // );
        // $this->Penjualan_retail_model->update($id_orders, $update);
        // $hpp = $total-$total_laba;
        // // $ppn_nominal = $total*(10/100); 
        // $ppn_nominal = 0;
        // $total_ppn = $total;
        // $ada_member = false;
        // $pkp = false;
        // $nama_member = "";
        // $uid_akun = 0;
        // if ($id_pembeli*1!=0) {
        //   $row_member = $this->db->select('m.*')
        //                          ->from('member m')
        //                          ->join('users u', 'm.id_users=u.id_users AND m.id_toko=u.id_toko')
        //                          ->where('m.id_toko', $this->userdata->id_toko)
        //                         //  ->where('u.id_cabang', $this->userdata->id_cabang)
        //                          ->where('m.id_member', $id_pembeli)
        //                          ->get()->row();
        //   if ($row_member) {
        //     $uid_akun = $row_member->uid_akun;
        //     $nama_member = strtoupper(trim(str_replace(' ','_',$row_member->nama)));
        //     $ada_member = true;
        //     if ($row_member->pkp!="1") { // bukan pkp
        //     	if ($row_member->persen_pajak > 0) {
        //         //$ppn_nominal = $total*($row_member->persen_pajak/100);
        //         $ppn_nominal = 0;
        //         $total_ppn = $total;
        //     	} else {
      	// 				// $ppn_nominal = 0;
      	// 				// $total_ppn = $total;
        //     	}
        //     } else {
        //         $pkp = true;
        //     }
        //   }
        // }
        // // delete jurnal (update) 
        // if (!empty($id)) {

        // }

        // // insert jurnal
  	    // eval($this->Pengaturan_transaksi_model->accounting('penjualan'));
        // if ($pembayaran=="1") {
        //   $this->Pengaturan_akuntansi_model->jurnal_penjualan_tunai($this->userdata->id_toko, $tgl, $id_orders, $no_faktur, $total, $total-$total_laba, $id_pembeli);
        // } else if($pembayaran=="2"){
        //   $this->Pengaturan_akuntansi_model->jurnal_penjualan_kredit($this->userdata->id_toko, date('d-m-Y'), $id_orders, $no_faktur, $total, 0, $total-$total_laba, $id_piutang, $id_pembeli);
        // }
        $data_send = array(
        //   'no_faktur' => $no_faktur,
        //   'next_no_faktur' => $this->get_faktur(),
            // 'r' => $r,
        );
        // echo json_encode($data_send);