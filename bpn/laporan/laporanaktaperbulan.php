<?php include '../../koneksi/koneksi.php';
	session_start();
	$bulan = $_POST['bulan'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN BULANAN PEMBUATAN AKTA OLEH PPAT</title>
	
</head>
<body onload="window.print()">

			<table>
				<tr>
					<td style="width: 100px;">Nama P.P.A.T</td>
					<td>:</td>
					<td><?php echo $_SESSION['namalengkap']; ?></td>
					<td><div  style="width:1100px; "></div></td>
					<td><div style="width: 200px;"><p align="right" style="">Kepada Yth,</p></div></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td style="width:200px; ">Jln. Taman Siswa</td>
					<td></td>
					<td style="width:650px; "><p align="right">1.Kepala Kantor Pertahanan Kabupaten Cirebon</p></td>
				</tr>
				<tr>
					<td>NPWP</td>
					<td>:</td>
					<td><?php echo $_SESSION['NPWP']; ?></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Daerah Kerja</td>
					<td>:</td>
					<td><b>KABUPATEN CIREBON</b></td>
				</tr>
			</table>
	
			<center>
				<tr>
					<td></td>
					<td>
						<h3  style="margin-left:600px;">LAPORAN BULANAN PEMBUATAN AKTA OLEH PPAT</h3>
						<h4  style="margin-left: 600px;">Bulan <?php include'bulan.php'; ?> <?php echo date('Y'); ?></h4>
					</td>
				</tr>
				

				
				
			</center>

			<center>
				<table border="1"> 
					
					<tr>
						<th rowspan ="2"><center>NO URUT</center></th>
				    	<th colspan ="2"><center>AKTA</center></th>
				        <th rowspan ="2"><center>BENTUK <BR>PEMBUATAN HUKUM</center></th>
				        <th colspan ="2"><center>NAMA ALAMAT DAN NPWP</center></th>
				        <th rowspan ="2"><center>JENIS <BR>DAN NOMOR HAK</center></th>
				        <th rowspan ="2"><center>LETAK <BR>TANAH<BR> DAN BANGUNAN</center></th>
				        <th colspan ="2"><center>LUAS (M2)</center></th>
				        <th rowspan ="2"><center>HARGA TRANSAKSI<br> PEROLEHAN<br> PENGALIHAN HAK (Rp.000)</center></th>
				        <th colspan="2"><center>SPPT PBB</center></th>
				        <th colspan="2"><center>SSP</center></th>
				        <th colspan="2"><center>D BPHTB</center></th>
				        <th colspan="1"><center>Ket.</center></th>
				   </tr>
				    <tr>
				    	<td>NOMOR</td> 
				        <td>TANGGAL</td>
				        <td><center>PIHAK YANG <BR>MENGALIHKAN/ <BR>MEMBERIKAN</center></td>
				        <td><center>PIHAK YANG <BR>MENERIMA </center></td>
				        <td><center>TANAH</center></td>
				        <td><center>BANGUNAN</center></td>
				        <td><center>NOP/<br>TAHUN</center></td>
				        <td><center>NJOP <br> (Rp.00)</center></td>
				        <td><center>TGL</center></td>
				        <td><center>(Rp.00)</center></td>
				        <td><center>TGL</center></td>
				        <td><center>(Rp.00)</center></td>
				        <td></td>
				        
				    </tr>
				    <tr>
				    	<?php for ($i=1; $i <= 18; $i++) { 
				    		echo "<td><center>".$i."</center></td>";
				    	} ?>

				        
				    </tr>
				    <?php 
				    	$no = 1;
				    	$query = mysql_query("SELECT * FROM ppat  where month(tanggalinput)= '".$bulan."' order by idppat DESC");
				    	while ($row = mysql_fetch_array($query)) {
				    		 $konverttanggal = jin_date_str($row['tanggalinput']);
				    		 $konverttanggalssp = jin_date_str($row['tgl_ssp']);
				    		 $konverttanggalbphtb = jin_date_str($row['tgl_bphtb']);
				    		 
				    		echo "<tr>
				    				<td><center>".$no++."</center></td>
				    				<td>".$row['noakta']."</td>
				    				<td>".$konverttanggal."</td>
				    				<td>".$row['jenisakta']."</td>
				    				<td>".$row['namapemohon'].", ".$row['alamatpemohon']."</td>
				    				<td>".$row['namapenerima'].", ".$row['alamatpenerima']."</td>
				    				<td></td>
				    				<td>".$row['alamattanah']."</td>
				    				<td>".$row['luastanah']."</td>
				    				<td>".$row['luasbangunan']."</td>
				    				<td>".rupiah($row['harga'])."</td>
				    				<td>".$row['tahun']."/".$row['NOP']."</td>
				    				<td>".$row['NJOP']."</td>
				    				<td>".$konverttanggalssp."</td>
				    				<td>".rupiah($row['jumlah_ssp'])."</td>
				    				<td>".$konverttanggalbphtb."</td>
				    				<td>".rupiah($row['jumlah_bphtb'])."</td>
				    				<td>".$row['keterangan']."</td>
				    				
				    			  </tr>
				    			 ";
				    	}

				     ?>
				</table>
			</center>
			<?php 
				$queryAKB = mysql_query("SELECT count(*) as jumlahAKB FROM ppat where jenisakta='AJB' ");
				$jumalahAKB = mysql_fetch_array($queryAKB); 

				$queryAPHT = mysql_query("SELECT count(*) as jumlahAPHT FROM ppat where jenisakta='APHT' ");
				$jumlahAPHT = mysql_fetch_array($queryAPHT);

				$queryAPHB = mysql_query("SELECT count(*) as jumlahAPHB FROM ppat where jenisakta='APHB' ");
				$jumlahAPHB = mysql_fetch_array($queryAPHB);

				
			 ?>
			<table >
				<tr>
					<td>Akta Jual Beli</td><td></td>
					<td><div style="width: 400px;"> <?php echo $jumalahAKB['jumlahAKB']; ?> (<?php echo ucwords(Terbilang($jumalahAKB['jumlahAKB'])); ?>) Buah </div>  </td>
					<td><div style="width: 350px;"></div></td>
					<td>Cirebon, <?php echo date('d-m-Y'); ?><br>Pejabat Pembuat Akta Tanah </td>
				</tr>
				<tr>
					<td>Akta Pemberian Hak Tanggungan</td>
					<td><div style="width: 300px;"></div></td>
					<td><?php echo $jumlahAPHT['jumlahAPHT']; ?> (<?php echo ucwords(Terbilang($jumlahAPHT['jumlahAPHT'])); ?>) Buah</td>

				</tr>
				<tr>
					<td>Akta Pembagian Hak Bersama</td>
					<td><div style="width: 300px;"></div></td>
					<td> <?php echo $jumlahAPHB['jumlahAPHB']; ?> (<?php echo ucwords(Terbilang($jumlahAPHB['jumlahAPHB'])); ?>) Buah</td>
					
				</tr>
				<tr>
					<hr>
				</tr>
				<tr>
					<td>Jumlah Akta Bulan <?php include'bulan.php'; ?></td>
					<td><div style="width: 300px;"><hr></div></td>

					<td><br><?php echo $total = $jumalahAKB['jumlahAKB']+$jumlahAPHT['jumlahAPHT']+$jumlahAPHB['jumlahAPHB']; ?>  (<?php echo ucwords(Terbilang($total)); ?>) Buah </td>
				</tr>

			</table>
			<br>
			<table >
				<tr>
					<td>Jumlah SSP</td>
					<td><div style="width: 300px;"></div></td>
					<td>Rp. <?php $queryTotalSSP = mysql_query("SELECT SUM(jumlah_ssp) AS jumlahssp FROM ppat");
								$totalssp = mysql_fetch_array($queryTotalSSP);
								echo rupiah($totalssp['jumlahssp']);							
					 ?> -</td>
				</tr>
				<tr>
					<td>Jumlah BPHTB</td>
					<td><div style="width: 200px;"></div></td>
					<td>Rp. <?php $queryTotaljumlah_bphtb= mysql_query("SELECT SUM(jumlah_bphtb) AS jumlah_bphtb FROM ppat");
								$totaljumlah_bphtb = mysql_fetch_array($queryTotaljumlah_bphtb);
								echo rupiah($totaljumlah_bphtb['jumlah_bphtb']);							
					 ?>  -</td>
					<td><div style="width: 700px;"></div></td>
					<td>LILIS MARIATI SUWANDA, S.H.</td>
				</tr>
			</table>
</body>
</html>