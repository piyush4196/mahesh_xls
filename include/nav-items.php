
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../">
        <div class="sidebar-brand-icon">
          <!-- <i class="fas fa-laugh-wink"></i> -->
          <img src="<?= STATIC_FILES . 'assets/img/logo.png'; ?>" alt= "logo" height='50' />
        </div>
        <div class="sidebar-brand-text mx-3"><?= TITLE ?></br><span class="sub-title"></span></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <?php if($_SESSION['acc_type'] == 1){?>
      <li class="nav-item">
        <a class="nav-link" href="<?= STATIC_FILES.'home/index.php' ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <?php }else { ?>
        <li class="nav-item">
        <a class="nav-link" href="<?= STATIC_FILES.'home/user.php' ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <?php } ?>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        User
      </div>
      <li class="nav-item" >
        <a class="nav-link" href="<?= STATIC_FILES ?>home/upload-csv.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Upload XLS</span></a>
      </li>
      

      <li class="nav-item " >
        <a class="nav-link" href=""  data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>