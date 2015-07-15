<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<!DOCTYPE html>
<html class=" js no-touch rgba backgroundsize borderimage borderradius csstransforms csstransforms3d csstransitions svg">
   <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Inatel Games E-Commerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" href="assets/css/img/favicon.ico" type="image/x-icon">
    <link href="assets/css/styles.css" rel="stylesheet" media="screen">
    <link class="color-scheme" href="assets/css/color-default.css" rel="stylesheet" media="screen">
    <script type="text/javascript" async="" src="assets/js/dc.js"></script>
    <script src="assets/js/modernizr.custom.js"></script>
  </head>
  <body>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="fa fa-times"></i>
            </button>
            <h2>Entre ou <a href="#">Registre-se</a></h2>
          </div>
          <div class="modal-body">
          <form class="login-form" id="validateData" onSubmit="JavaScript:sendForm(this);">
            <div class="form-group group">
            	<label for="log-email">Email</label>
              <input type="email" class="form-control" name="logEmail" id="logEmail" placeholder="Insira seu email" required="">
            </div>
            <div class="form-group group">
            	<label for="log-password">Senha</label>
              <input type="password" class="form-control" name="logPassword" id="logPassword" placeholder="Insira sua senha" required="">
            </div>
            <div class="checkbox">
              <label>
                  <div class="icheckbox" style="position: relative;">
                      <input type="checkbox" name="remember" style="position: absolute; opacity: 0;">
                      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                  </div>
              </label>
            </div>
            <input class="btn btn-success" type="submit" value="Login">
          </form>
          </div>
        </div>
      </div>
    </div>

    <header data-offset-top="500" data-stuck="600">
    	<div class="container">
      	<a class="logo" href="#"><img src="assets/css/img/logo.png" alt="Inatel Games"></a>
        
        <div class="mobile-border"><span></span></div>
        
        <nav class="menu">
          <ul class="main">
          	<li class="has-submenu">
               <a href="index.php">Home</a>
            </li>
          	<li class="has-submenu">
               <a href="#">Sua conta</a>
                <ul class="submenu">
                    <?php 
                        if(!isset($_SESSION['login_status'])){ 
                            echo '
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#loginModal">Entrar / Registrar</a>
                                    </li>
                            ';
                        }else{ 
                            echo '
                                    <li>
                                        <a href="personalInfo.php">Sua conta</a>
                                    </li>
                                    <li>
                                        <a onclick="endSession();">Finalizar sessao</a>
                                    </li>
                            ';
                        } 
                    ?>
                </ul>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    
    <div class="page-content">
    
      <section class="catalog-grid">
      	<div class="container">
        	<h2 class="primary-color">Jogos</h2>
          <div class="row" id="gamesCatalogueList">
          </div>
        </div>
      </section>
    </div>

    <footer class="footer">
    	<div class="container">
        <div class="copyright">
        	<div class="row">
          	<div class="col-lg-7 col-md-7 col-sm-7">
              <p>© 2015 Inatel Games. Desenvolvido por <a href="#" target="_blank">Luciano e Henrique</a></p>
            </div>
          	<div class="col-lg-5 col-md-5 col-sm-5">
            	<div class="payment">
                <img src="assets/css/img/visa.png" alt="Visa">
                <img src="assets/css/img/paypal.png" alt="PayPal">
                <img src="assets/css/img/master.png" alt="Master Card">
                <img src="assets/css/img/discover.png" alt="Discover">
                <img src="assets/css/img/amazon.png" alt="Amazon">
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/smoothscroll.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/icheck.min.js"></script>
    <script src="assets/js/jquery.placeholder.js"></script>
    <script src="assets/js/jquery.stellar.min.js"></script>
    <script src="assets/js/jquery.touchSwipe.min.js"></script>
    <script src="assets/js/jquery.shuffle.min.js"></script>
    <script src="assets/js/lightGallery.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/masterslider.min.js"></script>
    <script src="assets/js/mailer.js"></script>
    <script src="assets/js/color-switcher.js"></script>

    <script type="text/javascript" src="assets/js/conversion.js"></script>
    
<!--    <script src="bower_components/jquery/dist/jquery.min.js"></script>-->
    <script src="bower_components/blueimp-md5/js/md5.min.js"></script>
    
    <script type="text/javascript" src="assets/jsProject/HtmlService.js"></script>
    <script type="text/javascript" src="assets/jsProject/HtmlController.js"></script>
    
    <script type="text/javascript" src="assets/jsProject/UserService.js"></script>
    <script type="text/javascript" src="assets/jsProject/UserController.js"></script>
  

</body>
</html>




<script>
    function sendForm(form){
        UserController.validateData(form);
        event.preventDefault();
    }
    function endSession(){
        UserController.endSession();
//        event.preventDefault();
    }
</script>