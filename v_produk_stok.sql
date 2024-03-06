CREATE VIEW `v_produk_stok` AS SELECT pr.*, od.id_orders_2, IFNULL(od.jumlah,0) AS stok_keluar, IFNULL(p.jumlah,0) AS stok_masuk, (IFNULL(p.jumlah,0) - IFNULL(od.jumlah,0)) AS stok
FROM produk_retail pr 
LEFT JOIN orders_detail od ON pr.id_produk_2=od.id_produk AND pr.id_toko=od.id_toko
LEFT JOIN pembelian p ON pr.id_produk_2=p.id_produk AND pr.id_toko=p.id_toko
GROUP BY pr.id_toko, pr.id_produk_2