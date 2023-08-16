<?php
//==================================== HOME ====================================
if ($page == 'home') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-12">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $jml_mahasiswa; ?></h3>

                <p>Jumlah Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <a href="<?php echo base_url('admin/mahasiswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jml_ukm; ?></h3>

                <p>Jumlah UKM</p>
              </div>
              <div class="icon">
                <i class="ion ion-folder"></i>
              </div>
              <a href="<?php echo base_url('admin/ukm') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Selamat Datang Admin</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>

        <div class="card-body">
          <h2>Info</h2>
          <p>Ini adalah contoh sistem informasi menggunakan CI3 dengan sistem login,
            dan menggunakan data yang berelasi. Didalamnya juga menggunakan sistem
            multilogin untuk membedakan level user tertentu.<br>
            Besar harapan contoh coding ini bermanfaat sebagai start awal memahami
            membangun sebuah sistem informasi yang lebih rumit.</p>
        </div>
      </div>
    </section>
  </div>
<?php


//==================================== mahasiswa ====================================
} else if ($page == 'mahasiswa') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">
          <a href=<?php echo base_url("admin/mahasiswa_tambah") ?> class="btn btn-primary" style="margin-bottom:15px">
            Tambah Mahasiswa</a>
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php
            foreach ($mahasiswa as $d) { ?>
              <tr>
                <td><?php echo $d['nim'] ?></td>
                <td><?php echo $d['nama_mahasiswa'] ?></td>
                <td><?php echo $d['tanggal_lahir'] ?></td>
                <td><?php echo $d['alamat_mahasiswa'] ?></td>
                <td>
                  <a href=<?php echo base_url("admin/mahasiswa_edit/") . $d['nim']; ?>> <i class="fas fa-pencil-alt"></i> </a>
                  <td>
                  <a href=<?php echo base_url("admin/mahasiswa_hapus/") . $d['nim']; ?> onclick="return confirm('Yakin menghapus mahasiswa : <?php echo $d['nama_mahasiswa']; ?> ?');" ;><i class="fas fa-trash-alt"></i></a>

                </td>
              </tr>
            <?php
            }
            ?>
          </table>

        </div>
    </section>
  </div>

<?php
}

//--------------------------------- Detil ---------------------------------
else if ($page == 'mahasiswa_detil') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">

          <dl class="row">
            <dt class="col-sm-2">NIM</dt>
            <dd class="col-sm-10"><?php echo $d['nim']; ?></dd>
            <dt class="col-sm-2">Nama Mahasiswa</dt>
            <dd class="col-sm-10"><?php echo $d['nama_mahasiswa']; ?></dd>
            <dt class="col-sm-2">Nama ukm</dt>
            <dd class="col-sm-10"><?php echo $d['nama_ukm']; ?></dd>
            <dt class="col-sm-2">Alamat</dt>
            <dd class="col-sm-10"><?php echo $d['alamat_mahasiswa']; ?></dd>
          </dl>

        </div>
      </div>
      <div class="float-right">
                            <a href="<?php echo base_url("admin/mahasiswa") ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                        </div>
    </section>
  </div>
<?php

  //--------------------------------- Tambah ---------------------------------
} else if ($page == 'mahasiswa_tambah') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">

          <form method="POST" action="<?php echo base_url('admin/mahasiswa_tambah'); ?>" class="form-horizontal">

            <div class="card-body">

              <div class="form-group row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nim" id="nim" value="<?php echo set_value('nim'); ?>" placeholder="Masukkan NIM Mahasiswa">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nim')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" value="<?php echo set_value('nama_mahasiswa'); ?>" placeholder="Masukkan Nama Mahasiswa">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_mahasiswa')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>" placeholder="Masukkan Tanggal Lahir Mahasiswa">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tanggal_lahir')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="alamat_mahasiswa" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="alamat_mahasiswa" id="alamat_mahasiswa" value="<?php echo set_value('alamat_mahasiswa'); ?>" placeholder="Masukkan alamat_mahasiswa Mahasiswa ">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('alamat_mahasiswa')); ?></span>
                </div>

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
                <div class="float-right">
                            <a href="<?php echo base_url("admin/mahasiswa") ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                        </div>
            </div>
              </div>
          </form>


        </div>
    </section>
  </div>
<?php

  //--------------------------------- Edit ---------------------------------
} else if ($page == 'mahasiswa_edit') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">

          <form method="POST" action="<?php echo base_url('admin/mahasiswa_edit/' . $d['nim']); ?>" class="form-horizontal">

            <div class="card-body">

              <div class="form-group row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nim" id="nim" value="<?php echo set_value('nim', $d['nim']); ?>" placeholder="Masukkan NIM Mahasiswa">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nim')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama mahasiswa</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" value="<?php echo set_value('nama_mahasiswa', $d['nama_mahasiswa']); ?>" placeholder="Masukkan Nama Mahasiswa">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_mahasiswa')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo set_value('tanggal_lahir', $d['tanggal_lahir']); ?>" placeholder="Masukkan Tanggal Lahir Mahasiswa">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tanggal_lahir')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="alamat_mahasiswa" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="alamat_mahasiswa" id="alamat_mahasiswa" value="<?php echo set_value('alamat_mahasiswa', $d['alamat_mahasiswa']); ?>" placeholder="Masukkan alamat_mahasiswa Mahasiswa">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('alamat_mahasiswa')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
              <div class="float-right">
                            <a href="<?php echo base_url("admin/mahasiswa") ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                        </div>
            </div>
            
          </form>


        </div>
    </section>
  </div>
<?php
}

//==================================== ukm ====================================
else if ($page == 'ukm') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">
          <a href=<?php echo base_url("admin/ukm_tambah") ?> class="btn btn-primary" style="margin-bottom:15px">Tambah ukm</a>
          <table  id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>Id ukm</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <?php
            foreach ($ukm as $d) { ?>
              <tr>
                <td><?php echo $d['id_ukm'] ?></td>
                <td><?php echo $d['nama_ukm'] ?></td>
                <td><?php echo $d['deskripsi'] ?></td>
                <td>
                  <a href=<?php echo base_url("admin/ukm_edit/") . $d['id_ukm']; ?>>Edit </a>
                  <a href=<?php echo base_url("admin/ukm_hapus/") . $d['id_ukm']; ?> onclick="return confirm('Yakin menghapus ukm : <?php echo $d['nama_ukm']; ?> ?');" ;> Hapus</a>

                </td>
              </tr>
            <?php
            }
            ?>
          </table>

        </div>
      </div>
    </section>
  </div>

<?php
}

//--------------------------------- TAMBAH ---------------------------------
else if ($page == 'ukm_tambah') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Isikan Data Dengan Benar</h3>
        </div>
        <div class="card-body">

          <?php echo validation_errors(); ?>

          <form method="POST" action="<?php echo base_url('admin/ukm_tambah'); ?>" class="form-horizontal">

            <div class="card-body">

              <div class="form-group row">
                <label for="nama_ukm" class="col-sm-2 col-form-label">Nama ukm</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_ukm" id="nama_ukm" value="<?php echo set_value('nama_ukm'); ?>" placeholder="Masukkan Nama UKM">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_ukm')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi UKM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?php echo set_value('deskripsi'); ?>" placeholder="Masukkan Deskripsi UKM">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('deskripsi')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
              <div class="float-right">
                            <a href="<?php echo base_url("admin/ukm") ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                        </div>
            </div>
          </form>

        </div>
      </div>
    </section>
  </div>

<?php
}

//--------------------------------- EDIT ---------------------------------
else if ($page == 'ukm_edit') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Isikan Data Dengan Benar</h3>
        </div>
        <div class="card-body">

          <?php echo validation_errors(); ?>

          <form method="POST" action="<?php echo base_url('admin/ukm_edit/' . $d['id_ukm']); ?>" class="form-horizontal">

            <div class="card-body">

              <div class="form-group row">
                <label for="nama_ukm" class="col-sm-2 col-form-label">Nama ukm</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_ukm" id="nama_ukm" value="<?php echo set_value('nama_ukm', $d['nama_ukm']); ?>" placeholder="Masukkan Nama ukm">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_ukm')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi UKM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?php echo set_value('deskripsi', $d['deskripsi']); ?>" placeholder="Masukkan Deskripsi UKM">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('deskripsi')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>

        </div>
      </div>
      <div class="float-right">
                            <a href="<?php echo base_url("admin/ukm") ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                        </div>
    </section>
  </div>

<?php
}
//==================================== ANggota UKM ====================================
else if ($page == 'anggota_ukm') {
  ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?php echo  $judul; ?></h1>
            </div>
          </div>
        </div>
      </section>
  
      <section class="content">
        <div class="card">
          <div class="card-body">
            <a href=<?php echo base_url("admin/anggotaukm_tambah") ?> class="btn btn-primary" style="margin-bottom:15px">Tambah ukm</a>
            <table  id="datatable_01" class="table table-bordered">
              <thead>
                <tr>
                  <th>Id Anggota</th>
                  <th>NIM</th>
                  <th>UKM</th>
                  <th>Aksi</th>
                </tr>
              </thead>
  
              <?php
              foreach ($anggota_ukm as $d) { ?>
                <tr>
                  <td><?php echo $d['id_anggota'] ?></td>
                  <td><?php echo $d['nim'] ?></td>
                  <td><?php echo $d['nama_ukm'] ?></td>
                  
                  <td>
                    <a href=<?php echo base_url("admin/anggotaukm_edit/") . $d['id_anggota']; ?>>Edit </a>
                    <a href=<?php echo base_url("admin/anggotaukm_hapus/") . $d['id_anggota']; ?> onclick="return confirm('Yakin menghapus Anggota UKM : <?php echo $d['nim']; ?> ?');" ;> Hapus</a>
  
                  </td>
                </tr>
              <?php
              }
              ?>
            </table>
  
          </div>
        </div>
      </section>
    </div>
  
  <?php
  }

    
      //--------------------------------- Tambah Anggota UKM ---------------------------------
else if ($page == 'anggotaukm_tambah') {
    ?>
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1><?php echo  $judul; ?></h1>
              </div>
            </div>
          </div>
        </section>
    
        <section class="content">
          <div class="card">
            <div class="card-body">
    
              <form method="POST" action="<?php echo base_url('admin/anggotaukm_tambah'); ?>" class="form-horizontal">
    
                <div class="card-body">

                <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">Pilih NIM Mahasiswa</label>
                    <div class="col-sm-10">
                      <?php echo form_dropdown('nim', $ddmahasiswa, set_value('nim')); ?>
                      <span class="badge badge-warning"><?php echo strip_tags(form_error('nim')); ?></span>
                    </div>
                  </div>
        
                  <div class="form-group row">
                    <label for="id_ukm" class="col-sm-2 col-form-label">Pilih UKM</label>
                    <div class="col-sm-10">
                      <?php echo form_dropdown('id_ukm', $ddukm, set_value('id_ukm')); ?>
                      <span class="badge badge-warning"><?php echo strip_tags(form_error('id_ukm')); ?></span>
                    </div>
                  </div>
    
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <div class="float-right">
                                <a href="<?php echo base_url("admin/anggota_ukm") ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                </div>
                  </div>
              </form>
    
    
            </div>
        </section>
      </div>
    <?php
    }    
      //--------------------------------- Edit Anggota UKM---------------------------------
else if ($page == 'anggotaukm_edit') {
  ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?php echo  $judul; ?></h1>
            </div>
          </div>
        </div>
      </section>
  
      <section class="content">
        <div class="card">
          <div class="card-body">
  
            <form method="POST" action="<?php echo base_url('admin/anggotaukm_edit/' . $d['id_anggota']); ?>" class="form-horizontal">
  
              <div class="card-body">

              <div class="form-group row">
                  <label for="nim" class="col-sm-2 col-form-label">Pilih NIM Mahasiswa</label>
                  <div class="col-sm-10">
                    <?php echo form_dropdown('nim', $ddmahasiswa, set_value('nim', $d['nim'])); ?>
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('nim')); ?></span>
                  </div>
                </div>
      
                <div class="form-group row">
                  <label for="id_ukm" class="col-sm-2 col-form-label">Pilih UKM</label>
                  <div class="col-sm-10">
                    <?php echo form_dropdown('id_ukm', $ddukm, set_value('id_ukm', $d['id_ukm'])); ?>
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('id_ukm')); ?></span>
                  </div>
                </div>
  
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <div class="float-right">
                              <a href="<?php echo base_url("admin/anggota_ukm") ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                          </div>
              </div>
                </div>
            </form>
  
  
          </div>
      </section>
    </div>
  <?php
  }    

?>