
<nav class='navbar navbar-default'>
        <a class='navbar-brand' href='#'>
          <!-- <img width="81" height="21" class="logo" alt="Flatty" src="assets/images/logo.svg" />
          <img width="21" height="21" class="logo-xs" alt="Flatty" src="assets/images/logo_xs.svg" /> --><p>Academic Information System</p>
        </a>
        <a class='toggle-nav btn pull-left' href='#'>
          <i class='fa fa-bars'></i>
        </a>
        <ul class='nav'>
          <li class='dropdown dark user-menu'>
            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
              <img width="23" height="23" alt="Mila Kunis" src="assets/images/avatar.jpg" />
              <span class='user-name'><?php echo $_SESSION['namalengkap']; ?></span>
              <b class='caret'></b>
            </a>
            <ul class='dropdown-menu'>
              <li>
                <a href='#'>
                  <i class='fa fa-user'></i>
                  Profile
                </a>
              </li>
              <li>
                <a href='#'>
                  <i class='fa fa-cog'></i>
                  Settings
                </a>
              </li>
              <li class='divider'></li>
              <li>
                <a href='logout.php'>
                  <i class='fa fa-sign-out'></i>
                  Sign out
                </a>
              </li>
            </ul>
          </li>
        </ul>
</nav>


