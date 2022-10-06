<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login |</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Perfil de la empresa">
    <meta name="keywords" content="FacturacionWeb.site" />

    <!-- favicon -->
    <link rel="shortcut icon" href="../images/favicon.png" />

    <!-- Bootstrap 3.3.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

  </head>
  <body class="login-page bg-login" >
    <div class="login-box">
      <div style="color:#00a65a" class="login-logo">
       
      </div><!-- /.login-logo -->
      
      <?php  
      // fungsi untuk menampilkan pesan
      // jika alert = "" (kosong)
      // tampilkan pesan "" (kosong)
      if (empty($_GET['alert'])) {
        echo "";
      } 
      // jika alert = 1
      // tampilkan pesan Gagal "username atau password salah, cek kembali username dan password Anda"
      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-times-circle'></i> Login Falló!</h4>
                Nombre de usuario o contraseña incorrectos, vuelva a comprobar su nombre de usuario o contraseña.
              </div>";
      }
      // jika alert = 2
      // tampilkan pesan Sukses "Anda telah berhasil logout"
      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Bien hecho!</h4>
                Ha cerrado la sesión con éxito.
              </div>";
      }
      ?>

      <div class="login-box-body">
        <p class="login-box-msg"><i class="fa fa-user icon-title"></i> Inicio de sesión</p>
        <br/>
        <form action="login-check.php" method="POST">
          <p>Ingrese con su email y número de documento.</p>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Email" required />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Contraseña" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <br/>
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" name="login" value="Ingresar al sistema" />
            </div><!-- /.col -->
          </div>
          <br>
          <div class="row">
            
            <div class="col-xs-12" >
              <a href="../index.php"><input type="button" class="btn btn-primary btn-lg btn-block btn-flat" name="login" value="Regresar" /></a>
            </div><!-- /.col -->
          </div>
        </form>
        <div class="modal fade" id="registro">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-sign-out"> Registro Cliente</i></h4>
                </div>
                <form action="registro.php" method="POST">
                <div class="modal-body">
                    <p>Identificación: <input type="number" name="ident"><br><br>Nombres: <input type="text" name="nombres"><br><br>Apellidos: <input type="text" name="apellidos"><br><br> Lugar Origen: <input type="text" name="origen"><br><br>Celular: <input type="number" name="celular"><br><br>Fecha Nacimiento: <input type="date" name="fecha"><br><br>Edad: <input type="number" name="edad"><br><br>Email: <input type="email" name="email"><br><br>Contraseña: <input type="password" name="pass"></p>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="reg" value="Registrar">
                    
                </div>
              </form>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

  </body>
</html>