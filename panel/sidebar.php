<div class="page-sidebar " id="main-menu">
  <!-- BEGIN MINI-PROFILE -->
  <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
    <div class="user-info-wrapper sm">
      <div class="profile-wrapper sm">
        <img src="../assets/img/user-ikon.png" width="69" height="69" />
      </div>
      <div class="user-info sm">
        <div class="username"><?php echo $_SESSION['k_adi']; ?></div>
        <div class="status">Hoşgeldin <?php echo $_SESSION['ad']; ?></div>
      </div>
    </div>
    <ul>
      <li class="start  open active "> <a href="../index"><i class="material-icons">home</i> <span class="title">Ana Sayfa</span></a>
      </li>

      <li>
        <a href="../odalar"> <i class="fa fa-shopping-cart"></i> <span class="title">Odalar</span> 
        </a>
      </li>

      <li>
        <a href="../kullanici"> <i class="fa fa-user"></i> <span class="title">Kullanıcılar</span> 
        </a>
      </li>


      <li>
        <a href="javascript:;"> <i class="material-icons">airplay</i> <span class="title">Ayarlar</span> <span class=" arrow"></span> </a>
        <ul class="sub-menu">
          <li> <a href="../ayarlar">Genel Ayarlar</a> </li> 
          <!-- <li> <a href="../ayarlar/iletisim.php">İletişim Ayarlar</a> </li>  -->
          <!-- <li> <a href="../ayarlar/smtp.php">SMTP Ayarlar</a> </li>  -->
          <li> <a href="../ayarlar/resim.php">Resim Optimizasyonu</a> </li> 
          <!-- <li> <a href="../ayarlar/widget.php">widget</a> </li>  -->
        </ul>
      </li>
      <br><br>

    </ul>

    <div class="clearfix"></div>
    <!-- END SIDEBAR MENU -->
  </div>
</div>