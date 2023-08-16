<!-- PRE LOADER -->
<section class="preloader">
  <div class="spinner">

    <span class="spinner-rotate"></span>

  </div>
</section>


<!-- MENU -->
<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
  <div class="container">

    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
      </button>

      <!-- lOGO TEXT HERE -->
      <a href="index.html" class="navbar-brand">Beasiswa Poliban</a>
    </div>

    <!-- MENU LINKS -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="#home" class="smoothScroll">Home</a></li>
        <li><a href="#feature" class="smoothScroll">Mahaiswa</a></li>
        <li><a href="#about" class="smoothScroll">Beasiswa</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Kontak kami - <span>----</span></a></li>
      </ul>
    </div>

  </div>
</section>


<!-- FEATURE -->
<section id="home" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">

      <div class="col-md-offset-3 col-md-6 col-sm-12">
        <div class="home-info">
          <h3>Beasiswa</h3>
          <h1>POLIBAN</h1>
          <form action="" method="get" class="online-form">
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required="">
            <button type="submit" class="form-control">Get started</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- FEATURE -->
<section id="feature" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row">

      <div class="col-md-12 col-sm-12">
        <div class="section-title">
          <h1>Data Mahasiwa</h1>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <table id="datatable_01" class="table table-bordered">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Beasiswa</th>
            </tr>
          </thead>
          <?php
          foreach ($beasiswa as $d) { ?>
            <tr>
              <td><?php echo $d['nim'] ?></td>
              <td><?php echo $d['nama_mahasiswa'] ?></td>
              <td><?php echo $d['nama_beasiswa'] ?></td>
            </tr>
          <?php
          }
          ?>
        </table>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="feature-image">
          <img src="<?php echo base_url(); ?>assets/landing/images/poliban.jpg" class="img-responsive" alt="Thin Laptop">
        </div>
      </div>
    </div>
  </div>
</section>



<!-- ABOUT -->
<section id="about" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row">

      <div class="col-md-offset-3 col-md-6 col-sm-12">
        <div class="section-title">
          <h1>Beasiswa POLIBAN</h1>
        </div>
      </div>

      <div class="col-md-4 col-sm-4">
        <div class="team-thumb">
          <div class="team-info team-thumb-up">
            <h2 style="text-align:center;">KIP</h2>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-4">
        <div class="team-thumb">
          <div class="team-info team-thumb-down">
            <h2 style="text-align:center;">SDM</h2>
          </div>
        </div>
      </div>

        <div class="col-md-4 col-sm-4">
          <div class="team-thumb">
            <div class="team-info team-thumb-up">
              <h2 style="text-align:center;">LG</h2>
            </div>
          </div>
        </div>

      </div>
    </div>
</section>


<!-- FOOTER -->
<footer id="footer" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row">

      <div class="copyright-text col-md-12 col-sm-12">
        <div class="col-md-6 col-sm-6">
            <a rel="nofollow" href="http://tooplate.com">Tooplate</a>
          </p>
        </div>

        <div class="col-md-6 col-sm-6">
          <ul class="social-icon">
            <li><a href="https://web.facebook.com/agus.sbn" class="fa fa-facebook-square" attr="facebook icon"></a></li>
            <li><a href="https://youtube.com/agus_sbn" class="fa fa-youtube"></a></li>
            <li><a href="https://www.instagram.com/agus_setiyo_budi_n/" class="fa fa-instagram"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>