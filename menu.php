            <li class='active'>
              <?php echo $level; ?>
              <a href='media.php?module=home'>
                <i class='fa fa-tachometer'></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class=''>
              <a class="dropdown-collapse" href="?module=home"><i class='fa fa-pencil-square-o'></i>
              <span>Data Master</span>
              <i class='fa fa-angle-down angle-down'></i>
              </a>
              <ul class='nav nav-stacked'>
               <?php include "menu/menu-admin.php"; ?>
              </ul>
            </li>
            <li>
              <a class='dropdown-collapse ' href='#'>
                <i class='fa fa-user'></i>
                <span>Data User</span>
                <i class='fa fa-angle-down angle-down'></i>
              </a>
              <ul class='nav nav-stacked'>
                <?php include "menu/menu-siswa.php"; ?>
              </ul>
            </li>
            <li>
              <a class='dropdown-collapse ' href='#'>
                <i class='fa fa-folder'></i>
                <span>Data Akademik</span>
                <i class='fa fa-angle-down angle-down'></i>
              </a>
              <ul class='nav nav-stacked'>
                <?php include "menu/menu-guru.php"; ?>
              </ul>
            </li>
            <li>
              <a class='dropdown-collapse ' href='#'>
                <i class='fa fa-coffee'></i>
                <span>Ujian Online</span>
                <i class='fa fa-angle-down angle-down'></i>
              </a>
              <ul class='nav nav-stacked'>
                <?php include "menu/menu-kepala.php"; ?>
              </ul>
            </li>
            
            
              
            