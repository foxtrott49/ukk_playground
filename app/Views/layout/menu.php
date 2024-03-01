<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures" style="background-color: #0a58ca;">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo" style="background-color: #0a58ca; font: #000;" ><a href="index.html">
                    <!-- <img src="images/logo.png" alt="" /> --><span style="color: white;">Playground UKK</span></a></div>
                    <li class="label" style="background-color: #0a58ca; color: white; font-weight: bold; font-size: 20px;" >Dashboard</li>
                    <li><a href="/home/dashboard" style="background-color: #0a58ca; color: white;"><i class="ti-dashboard"></i> Dashboard </a></li>
                    <!-- <br> -->
                    <li class="label" style="color: white; font-weight: bold; font-size: 20px;" >Features</li>
                    
                    <?php  if(session()->get('level')== 1){ ?>
                    <li><a class="sidebar-sub-toggle" style="background-color: #0a58ca; color: white;"><i class="ti-user"></i> User <span
                        class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                        <li><a href="<?= base_url('/Data_Pegawai')?>" style="background-color: #0a58ca; color: white;">Pengawai</a></li>
                     </ul>
                 </li>
                 <?php  }else{}?>
                 
                
                <li><a class="sidebar-sub-toggle" style="background-color: #0a58ca; color: white;"><i class="ti-server"></i> Data <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                    <li><a href="<?= base_url('/Playground/permainan')?>" style="background-color: #0a58ca; color: white;">List Permainan</a></li>
                    <li><a href="<?= base_url('/Playground/pembelian_tiket')?>" style="background-color: #0a58ca; color: white;">Pembelian Tiket</a></li>
                        
                    </ul>
                </li>
               

               <?php  if(session()->get('level')== 1){ ?>

                <li class="label" style="background-color: #0a58ca; color: white; font-weight: bold; font-size: 20px;">Laporan</li>
              <li><a href="/laporan" style="background-color: #0a58ca; color: white;"><i class="ti-book"></i> Laporan</a></li>
              <li><a href="/laporan/pengeluaran" style="background-color: #0a58ca; color: white;"><i class="ti-shopping-cart"></i> pengeluaran</a></li>

              <?php  }else{}?>

              <!-- <br> -->
              <li class="label" style="background-color: #0a58ca; color: white; font-weight: bold; font-size: 20px;">Account</li>
              <li><a href="/Profile" style="background-color: #0a58ca; color: white;"><i class="ti-info-alt"></i> Profile</a></li>
              <li><a href="/home/logout" style="background-color: #0a58ca; color: white;"><i class="ti-close"></i> Logout</a></li>
          </ul>
      </div>
  </div>
</div>
<!-- /# sidebar -->









<div class="header">
    <div class="container-fluid" style="background-color: #9ec5fe;">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">

                    <div class="header-icon" data-toggle="dropdown">
                        <span class="user-avatar">
                         
                         <?= session()->get('username')?>
                     </span>

                 </div>
             </div>
         </div>
     </div>
 </div>
</div>

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Thank you for coming! <span>Have fun! <?= session()->get('nama_pegawai')?></span></h1>
                        </div>
                    </div>
                </div>
            </div>
<section id="main-content">