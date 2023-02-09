 <!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("template/head") ?>
	<style type="text/css">
            body {
                font-family: sans-serif;
                background-color: #fff;
                color: #535353;
                margin: 5px;
            }
            
            table {
                border-collapse: collapse;
                padding: 0;
                width: 100%;
            }
            
            td {
                padding: 0;
                vertical-align: top;
            }
            
            .ticket-title {
                color: #999;
                font-size: 16px;
                letter-spacing: 0;
                line-height: 16px;
                margin-top: 10px;
            }
            
            .ticket-info {
                color: #535353;
                font-size: 14px;
                line-height: 21px;
            }
            
            .ticket-wrapper {
                border: 2px solid #999;
                border-top: 12px solid rgb(33,150,243);
                margin: 15px auto 0;
                padding-bottom: 15px;
                width: 800px;
            }
            
            .ticket-wrapper:first-child {
                margin-top: 0;
            }
            
            .ticket-table {}
            
            .ticket-table .first-col {
                width: 570px;
            }
            
            .ticket-logo {
                border-left: 2px dashed #ccc;
                text-align: center;
                vertical-align: middle;
            }
            
            .ticket-logo img {
                height: 80px;
                width: 90px;
                float: left;
                margin-left: 15px; 
                margin-top: 5px;
            }
            
            .ticket-name-div {
                border-bottom: 2px dotted #ccc;
                margin: 0 10px 0 30px;
                padding: 10px 0px 2px 0;
                text-align: left;
            }
            
            .ticket-event-longtitle {
                color: #535353;
                font-size: 22px;
                letter-spacing: -1px;
                line-height: 40px;
                margin-left: 10px;
            }

            .ticket-event-longtitle-right {
                color: #535353;
                font-size: 13px;
                margin-left: 70px;
            }
            
            .ticket-event-shorttitle {
                color: #535353;
                font-size: 18px;
                letter-spacing: -1px;
                line-height: 22px;
            }
            
            .ticket-event-details {
                border-bottom: 2px dotted #ccc;
                margin: 0 12px 0px 22px;
                padding: 15px 0px 15px 0;
                text-align: left;
            }
            
            .ticket-event-details .first-col {
                text-align: left;
                width: 40%;
            }
            
            .ticket-event-details .second-col {
                text-align: right;
                vertical-align: top;
                width: 60%;
            }
            
            .ticket-venue {
                color: #535353;
                font-size: 14px;
                line-height: 21px;
            }
            
            .ticket-venue:first-child {
                font-size: 16px;
            }
            
            .ticket-ticket-details {
                margin: 0 12px 0px 22px;
                text-align: left;
            }
            
            .ticket-ticket-details .first-col {
                border-right: 2px dashed #ccc;
                padding-top: 4px;
                text-align: left;
                vertical-align: top;
                width: 150px;
            }
            
            .ticket-ticket-details .second-col {
                padding: 4px 0px 0px 32px;
                text-align: left;
                width: 200px;
            }
            
            .ticket-ticket-details .third-col {
                padding: 4px 0px 0px 40px;
                text-align: left;
                width: 300px;
            }
            
            .ticket-qr-code{
                height: 95px;
                margin-top: 10px;
                width: 95px;
            }
            
            /* Print specific styles */
            @media print {
                a[href]:after, abbr[title]:after {
                    content: "";
                }
                
                .ticket-wrapper {
                    width: 16cm;
                }
                
                .ticket-table .first-col {
                    width: 13.8cm;
                }
                
                .ticket-logo img {
                    height: auto;
                    max-width: 100%;
                }
                
                .ticket-ticket-details .first-col {
                    width: 4cm;
                }
                
                .ticket-ticket-details .second-col {
                    width: 6cm;
                }
                
                .ticket-ticket-details .third-col {
                    width: 2.5cm;
                }
                
                @page {
                    margin: 1cm;
                }
            }
        </style>
</head>
<body>
	<?php
    foreach ($tbl_ht_penjualan as $h) {
    } ?>
	<!-- Start Ticket -->
        <div class="ticket-wrapper">
            <table class="ticket-table">
                <tr>
                    <td class="first-col">
                        <!-- title -->
                        <div class="ticket-logo">
                            <img src="<?= base_url() ?>assets/img/logosipenture.png" alt="Logo" />
                        <div class="ticket-name-div">
                            <span class="ticket-event-longtitle">Eliy's Furniture</span>
                            <p class="ticket-event-longtitle-right">Jl. Jenderal Sudirman No. 01, Lt. 1 Blok B No. 29-32s, Tangcity Mall, Cikokol, Kota Tangerang</p>
                        </div>
                        </div>
                        <!-- /.ticket-name-div -->
                        <!-- venue details start -->
                        <div class="ticket-event-details">
                            <table>
                            	<?php
									$no = 1;
									foreach ($tbl_dt_penjualan as $d) {
								?>
                                <tr>
                                    <td class="first-col">
                                        <div class="ticket-title">
                                            Nama Customer :
                                        </div>
                                        <div class="ticket-info">
                                            <?= $h->nama_cust ?>
                                        </div>
                                        <div class="ticket-title">
                                            Nama Produk :
                                        </div>
                                        <!-- /.ticket-venue -->
                                        <div class="ticket-info">
                                            <?= $d->nama_produk ?>
                                        </div>
                                        <!-- /.ticket-info -->
                                    </td>
                                    <td class="first-col">
                                        <div class="ticket-title">
                                            Kuantitas :
                                        </div>
                                        <!-- /.ticket-venue -->
                                        <div class="ticket-info">
                                            <?= $d->kuantitas ?>
                                        </div>
                                        <div class="ticket-title">
                                            Harga :
                                        </div>
                                        <!-- /.ticket-venue -->
                                        <div class="ticket-info">
                                            Rp
											<span>
											<?= number_format($d->harga_jual, 0, ".", "."); ?>
											</span>
                                        </div>
                                    </td>
                                    <!-- /.first-col -->
                                    <td class="third-col">
                                        <div class="ticket-title">
                                            Tanggal :
                                        </div>
                                        <div class="ticket-info">
                                            <?= format_indo($h->waktu) ?>
                                        </div>
                                        <!-- /.ticket-venue -->
                                        
                                        <!-- /.ticket-venue -->
                                    </td>
                                    <!-- /.second-col -->
                                </tr>
                            </table>
                        </div>
                        <!-- /.ticket-event-details -->
                        <!-- ticket details start -->
                        <div class="ticket-ticket-details">
                            <table>

                                <tr>
                                    <td class="first-col">
                                        <div class="ticket-title">
                                            Total :
                                        </div>
                                        <!-- /.ticket-title -->
                                        <div class="ticket-info">
                                            Rp
											<span>
											<?= number_format($d->harga_jual*$d->kuantitas, 0, ".", "."); ?>
											</span>
                                        </div>
                                        <!-- /.ticket-info -->
                                    </td>
                                    <!-- /.first-col -->
                                    
                                    <!-- /.second-col -->
                                    <td class="third-col">
                                        <div class="ticket-title">
                                            Hormat Kami,
                                        </div><br><br><br>
                                        <!-- /.ticket-title -->
                                        <div class="ticket-info">
                                            <b><u>Elis Nuryanti</u></b>
                                        </div>
                                        <div class="ticket-info">
                                            Owner Toko
                                        </div>
                                    </td>
                                    <!-- /.third-col -->
                                </tr>
                            </table>
                        </div>
                        <!-- /.ticket-ticket-details -->
                    </td>
                </tr>
                <?php } ?>
            </table>
            <!-- /.ticket-table -->
        </div>
        <!-- /.ticket-wrapper -->
        <!-- End Ticket -->
</body>
<script>
	window.print();
</script>
</html>