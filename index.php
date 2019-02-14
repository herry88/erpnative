<?php 
  session_start();
  error_reporting(0);
  include "config/connection.php";
  include "config/library.php";
  // include "config/function_indotgl.php";
  
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Sign in | SIA</title>
    <meta content='all' name='robots'>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <<meta name="author" content="herryprasetyo.com">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!--[if IE]> <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> <![endif]-->
    <link href='assets/images/meta_icons/favicon.ico' rel='shortcut icon' type='image/x-icon'>
    <link href='assets/images/meta_icons/apple-touch-icon-precomposed.png' rel='apple-touch-icon-precomposed'>
    <!-- / START - page related stylesheets [optional] -->
    
    <!-- / END - page related stylesheets [optional] -->
    <!-- / bootstrap [required] -->
    <link href="assets/stylesheets/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- / theme file [required] -->
    <link href="assets/stylesheets/light-theme.css" rel="stylesheet" type="text/css" media="all" id="color-settings-body-color" />
    <!-- / coloring file [optional] (if you are going to use custom contrast color) -->
    <link href="assets/stylesheets/theme-colors.css" rel="stylesheet" type="text/css" media="all" />
    <!-- / demo file [not required!] -->
    <link href="assets/stylesheets/demo.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript">
      function validasi(form){
        if (form.username.value == ""){
          alert("Text Empty");
          form.username.focus();
          return(false);
        }
        if (form.password.value == "") {
          alert("password Empty");
          form.password.focus();
          return(false);
        }
      }
    </script>
  </head>
  <body onload='document.login.username.focus();' class='contrast-red login contrast-background'>
    <div class='middle-container'>
      <div class='middle-row'>
        <div class='middle-wrapper'>
          <div class='login-container-header'>
            <div class='container'>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='text-center'>
                    <!-- <img width="121" height="31" src="assets/images/logo_lg.svg" /> -->
                    <p>Sistem Informasi Akademik V.1.0</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class='login-container'>
            <div class='container'>
              <div class='row'>
                <div class='col-sm-4 col-sm-offset-4'>
                  <h1 class='text-center title'>Sign in</h1>
                  <?php
                  
                     if (isset($_POST['submit'])) {
                       $passlain = anti_injection($_POST['password']);
                       $data = md5(anti_injection($_POST['password']));
                       $pass = hash("sha512", $data);
                       $admin = mysqli_query($conn,"SELECT * FROM rb_users WHERE username='".anti_injection($_POST['username'])."' AND password='$pass'");
                       $guru = mysqli_query($conn,"SELECT * FROM rb_guru WHERE nip='".anti_injection($_POST['username'])."' AND password='$passlain'");
                        $siswa = mysqli_query($conn,"SELECT * FROM rb_siswa WHERE nisn='".anti_injection($_POST['username'])."' AND password='$passlain'");

                        $hitungadmin  = mysqli_num_rows($admin);
                        $hitungguru   = mysqli_num_rows($guru);
                        $hitungsiswa  = mysqli_num_rows($siswa);
                        if ($hitungadmin >=1) {
                           $r = mysqli_fetch_array($admin);
                           $_SESSION[id] = $r[id_user]; 
                           $_SESSION[namalengkap] = $r[nama_lengkap];
                           $_SESSION[level] = $r[level];
                           $_SESSION[username] = $r[username]; 
                           $_SESSION[passuser] = $r[password];
                           include "config/user_agent.php";
                           mysqli_query($conn,"INSERT INTO rb_users_aktivitas VALUES('','$r[id_user]','$ip','$user_browser $version','$user_os','$r[level]','".date('H:i:s')."','".date('Y-m-d')."')");
                          echo "<script>
                          window.alert('Welcome Back To System : $_SESSION[namalengkap]');
                          window.location='media.php?module=home';</script>";;

                         }
                         elseif ($hitungguru >= 1) {
                             $r = mysqli_fetch_array($guru);
                             $_SESSION['id']     = $r['nip'];
                             $_SESSION['namalengkap']  = $r['nama_guru'];
                             $_SESSION['level']    = 'guru';
                             include "config/user_agent.php";
                             mysqli_query($conn,"INSERT INTO rb_users_aktivitas VALUES('','$r[nip]','$ip','$user_browser $version','$user_os','guru','".date('H:i:s')."','".date('Y-m-d')."')");
                             echo "<script>
                             window.alert('Welcome Back To System : $_SESSION[namalengkap]');
                             window.location='media.php?module=home'</script>";
                           }
                        elseif ($hitungsiswa >= 1){
                            $r = mysqli_fetch_array($siswa);
                            $_SESSION[id]     = $r[nisn];
                            $_SESSION[namalengkap]  = $r[nama];
                            $_SESSION[kode_kelas]     = $r[kode_kelas];
                            $_SESSION[angkatan]     = $r[angkatan];
                            $_SESSION[level]    = 'siswa';
                            include "config/user_agent.php";
                            mysqli_query($conn,"INSERT INTO rb_users_aktivitas VALUES('','$r[nisn]','$ip','$user_browser $version','$user_os','siswa','".date('H:i:s')."','".date('Y-m-d')."')");
                            echo "<script>
                            window.alert('Welcome Back To System : $_SESSION[namalengkap]');
                            window.location='media.php?module=home';</script>";
                         }else{
                            echo "<script>window.alert('Maaf, Anda Tidak Memiliki akses'); window.location=('index.php')</script>";
                        
                         }   
                     }
                  ?>
                  <form action='' class='validate-form' method='POST'>
                    <div class='form-group'>
                      <div class='controls with-icon-over-input'>
                        <input type="text" name="username" value="" placeholder="Username" class="form-control" data-rule-required="true" />
                        <i class='fa fa-user text-muted'></i>
                      </div>
                    </div>
                    <div class='form-group'>
                      <div class='controls with-icon-over-input'>
                        <input type="password" name="password" value="" placeholder="Password" class="form-control" data-rule-required="true" />
                        <i class='fa fa-lock text-muted'></i>
                      </div>
                    </div>
                    
                    <button type="submit" name="submit" class='btn btn-block'>Sign in</button>
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
       
        </div>
      </div>
    </div>
    <!-- / jquery [required] -->
    <script src="assets/javascripts/jquery/jquery.min.js" type="text/javascript"></script>
    <!-- / jquery mobile (for touch events) -->
    <script src="assets/javascripts/jquery/jquery.mobile.custom.min.js" type="text/javascript"></script>
    <!-- / jquery ui -->
    <script src="assets/javascripts/jquery/jquery-ui.min.js" type="text/javascript"></script>
    <!-- / jQuery UI Touch Punch -->
    <script src="assets/javascripts/jquery/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
    <!-- / bootstrap [required] -->
    <script src="assets/javascripts/bootstrap/bootstrap.js" type="text/javascript"></script>
    <!-- / modernizr -->
    <script src="assets/javascripts/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
    <!-- / retina -->
    <script src="assets/javascripts/plugins/retina/retina.js" type="text/javascript"></script>
    <!-- / theme file [required] -->
    <script src="assets/javascripts/theme.js" type="text/javascript"></script>
    <!-- / demo file [not required!] -->
    <script src="assets/javascripts/demo.js" type="text/javascript"></script>
    <!-- / START - page related files and scripts [optional] -->
    <script src="assets/javascripts/plugins/validate/jquery.validate.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/validate/additional-methods.js" type="text/javascript"></script>
    <!-- / END - page related files and scripts [optional] -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
      
      ga('create', 'UA-42989202-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>
</html>
