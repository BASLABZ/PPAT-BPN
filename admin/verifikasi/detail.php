<?php 
    $id = $_GET['id'];
    $row = mysql_fetch_array(mysql_query("SELECT * FROM ppat where idppat = '".$id."'"));
 ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>DATA AKTA PPAT</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Akta</a></li>
        <li class="active">Detail PPAT</li>
        <li><?php echo $row['noakta']; ?></li>
      </ol>
    </section>
    <section class="content">
     <div class="row">
      <form method="POST" class="role">
         <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">DATA PIHAK YANG MENGALIHKAN & PENERIMA</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama Pihak yang Mengalihkan</label>
                  <input type="text" class="form-control" name="namapemohon" required disabled value="<?php echo $row['namapemohon']; ?>"> 
                </div>
                <div class="form-group">
                  <label>Alamat Pihak yang Mengalihkan</label>
                  <textarea class="form-control" name="alamatpemohon" required disabled><?php echo $row['alamatpemohon']; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Nama Penerima</label>
                  <input type="text" name="namapenerima" class="form-control" required disabled value="<?php echo $row['namapenerima']; ?>">
                </div>
                <div class="form-group">
                  <label>Alamat Penerima</label>
                  <textarea class="form-control" name="alamatpenerima" required disabled>
                    <?php echo $row['alamatpenerima']; ?>   
                  </textarea>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="form-group">
          <img src="../dokumen/<?php echo $row['file']; ?>" class="img-responsive dim_about">
        </div>
       </div>
       <div class="col-md-6">
         <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">DATA TANAH</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
              <div class="form-gruop">
                <label>Tanggal Akta</label>
                <div class="input-group">
                <input type="text" class="form-control" id="tanggalakta" disabled  name="tanggalakta" value="<?php echo $row['tanggalakta']; ?>">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              </div>
              </div>
              <div class="form-group">
                <label>Alamat Tanah</label>
                <textarea class="form-control" required disabled name="alamattanah"><?php echo $row['alamattanah']; ?></textarea>
              </div>
              <div class="form-group">
                <label>Jenis Akta</label>
                <select class="form-control" name="jenisakta" required disabled>
                       <option value="null">-Pilih Jenis Akta-</option>
                       <option value="AJB"
                        <?php if($row['jenisakta']=='AJB'){echo "selected=selected";}?>>
                          AKTA JUAL BELI
                      </option>
                       <option value="Hibah"
                        <?php if($row['jenisakta']=='Hibah'){echo "selected=selected";}?>>
                          AKTA HIBAH
                      </option>
                       <option value="Tukar-menukar"
                        <?php if($row['jenisakta']=='Tukar-menukar'){echo "selected=selected";}?>>
                          AKTA TUKAR - MENUKAR
                      </option>
                       <option value="APHB"
                        <?php if($row['jenisakta']=='APHB'){echo "selected=selected";}?>>
                          AKTA APHB
                      </option>
                       <option value="Inbreng"
                        <?php if($row['jenisakta']=='Inbreng'){echo "selected=selected";}?>>
                          AKTA Inbreng
                      </option>
                       <option value="APHT"
                        <?php if($row['jenisakta']=='APHT'){echo "selected=selected";}?>>
                          AKTA APHT
                      </option>
                       <option value="APHGB/HP diatas HM"
                        <?php if($row['jenisakta']=='APHGB/HP diatas HM'){echo "selected=selected";}?>>
                          AKTA APHGB/HP diatas HM
                      </option>
                       <option value="SKMHT"
                        <?php if($row['jenisakta']=='SKMHT'){echo "selected=selected";}?>>
                          AKTA SKMHT
                      </option>
                         
                    </select>
              </div>
              <div class="form-group">
                <label>No AKTA</label>
                <input type="text" class="form-control" name="noakta" required disabled value="<?php echo $row['noakta']; ?>">
              </div>
              <div class="form-group">
                <label>Jenis Hak</label>
                <select class="form-control" name="jenishak" required id="jk">
                       <option value="null">-Pilih Jenis Hak-</option>
                       <option value="HM"
                        <?php if($row['jenishak']=='HM'){echo "selected=selected";}?>>
                        Hak Milik
                      </option>
                       <option value="HGU"
                        <?php if($row['jenishak']=='HGU'){echo "selected=selected";}?>>
                          Hak Guna Usaha
                      </option>
                       <option value="HGB"
                        <?php if($row['jenishak']=='HGB'){echo "selected=selected";}?>>
                          Hak Guna Bangunan
                      </option>
                       <option value="HP"
                        <?php if($row['jenishak']=='HP'){echo "selected=selected";}?>>
                          Hak Pakai
                      </option>
                       <option value="HS"
                        <?php if($row['jenishak']=='HS'){echo "selected=selected";}?>>
                          Hak Sewa
                      </option>
                       <option value="HMT"
                        <?php if($row['jenishak']=='HMT'){echo "selected=selected";}?>>
                         Hak Membuka Tanah
                      </option>
                       <option value="HMHH"
                        <?php if($row['jenishak']=='HMHH'){echo "selected=selected";}?>>
                         Hak Memungut - Hasil Hutan
                      </option>
                       <option value="LAIN"
                        <?php if($row['jenishak']=='LAIN'){echo "selected=selected";}?>>
                         Hak - Hak Lain
                      </option>
                         
                    </select>
              </div>
                <div class="form-group" id="nohaks">
                      <label>No Hak</label>
                      <input type="text" class="form-control" ="" name="nohak" value="<?php echo $row['nohak']; ?>">
                    </div> 
              <div class="form-group">
                <label>Jenis Aset</label>
                <select class="form-control" name="jenisaset" required disabled>
                  <option value="null">-Pilih Aset-</option>
                  <option value="TANAH"
                        <?php if($row['jenisaset']=='TANAH'){echo "selected=selected";}?>>
                          TANAH
                      </option>
                  <option value="BANGUNAN"
                        <?php if($row['jenisaset']=='BANGUNAN'){echo "selected=selected";}?>>
                          BANGUNAN
                      </option>
                      
                </select>
              </div>
              <div class="row">

                <div class="col-md-6">
                   <div class="form-group">
                    <label>LUAS TANAH</label>
                    <input type="text" class="form-control" name="luastanah" disabled value="<?php echo $row['luastanah']; ?>">
                  </div>     
                </div>
                
                <div class="col-md-6">
                  <div class="form-gruop">
                    <label>LUAS BANGUNAN</label>
                    <input type="text" class="form-control" required disabled name="luasbangunan" value="<?php echo $row['luasbangunan']; ?>">
                  </div>    
                </div>

              </div>
              <div class="form-group">
                <label>HARGA ASET</label>
                <input type="text" class="form-control" name="harga" required disabled value="<?php echo $row['harga']; ?>">
              </div>
              <div class="form-group">
                <label>NOP/TAHUN</label>
                <input type="text" class="form-control" name="NOP" required disabled value="<?php echo $row['NOP']; ?>">
              </div>
              <div class="form-group">
                <label>NJOP</label>
                <input type="text" class="form-control" name="NJOP" required disabled value="<?php echo $row['NJOP']; ?>">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label>Tahun</label>
                    <input type="text" class="form-control" name="tahun" required disabled value="<?php echo $row['tahun']; ?>">
                  </div>
                  <div class="col-md-8">
                    <label>Tanggal SSP</label>
                    <input type="text" class="form-control" id="tanggalssp" name="tgl_ssp" required disabled value="<?php echo $row['tgl_ssp']; ?>"> 
                  </div>
                </div>

              </div>
              <div class="form-group">
                <label>Nominal SSP</label>
                <input type="text" class="form-control" name="jumlah_ssp" required disabled value="<?php echo $row['jumlah_ssp']; ?>">
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label>Tanggal BPHTB</label>
                  <input type="text" class="form-control" name="tgl_bphtb" required disabled id="tgl_bphtb" value="<?php echo $row['tgl_ssp']; ?>">
                </div>
                <div class="col-md-8">
                  <label>Nominal BPHTB</label>
                  <input type="text" class="form-control" name="jumlah_bphtb" required disabled value="<?php echo $row['jumlah_bphtb']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                  <textarea class="form-control" name="keterangan" required disabled>
                    <?php echo $row['keterangan']; ?>
                  </textarea>
              </div> 

              
              </div>
            </div>
          </div>
          
        </div>
       </div>
      </form>
     </div>
    </section>
  </div>