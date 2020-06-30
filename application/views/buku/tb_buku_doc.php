<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tb_buku List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Pesan</th>
		<th>Tgl Pesan</th>
		
            </tr><?php
            foreach ($buku_data as $buku)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $buku->nama ?></td>
		      <td><?php echo $buku->email ?></td>
		      <td><?php echo $buku->pesan ?></td>
		      <td><?php echo $buku->tgl_pesan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>