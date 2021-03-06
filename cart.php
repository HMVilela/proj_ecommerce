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
    <header data-offset-top="500" data-stuck="600">
    	<div class="container">
      	<a class="logo" href="#"><img src="assets/css/img/logo.png" alt="Inatel Games"></a>
        <div class="mobile-border"><span></span></div>
        <nav class="menu">
          <ul class="main">
          	<li class="has-submenu">
               <a href="indexLogged.php">Home</a>
            </li>
          	<li class="has-submenu">
               <a href="#">Compras</a>
            	<ul class="submenu">
                <li><a href="#">Carrinho</a></li>
                <li><a href="#">Finalizar compra</a></li>
              </ul>
            </li>
          	<li class="has-submenu">
               <a href="personalInfo.php">Sua conta</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    
    <div class="page-content">
    
      <section class="shopping-cart">
      	<div class="container-white">
        	<div class="row">
          	<div class="col-lg-9 col-md-9">
            	<h2 class="title">Carrinho</h2>
            	<table class="items-list">
              	<tbody><tr>
                	<th>&nbsp;</th>
                  <th>Nome do jogo</th>
                  <th>Preço do produto</th>
                </tr>
                <tr class="item">
                	<td class="thumb"><a href="shop-single-item-v1.php"></a></td>
                  <td class="name"><a href="shop-single-item-v1.php">Final Fantasy XIV</a></td>
                  <td class="price">R$ 199.00</td>
                  <td class="delete"><i class="icon-delete"></i></td>
                </tr>
                <tr class="item">
                	<td class="thumb"><a href="shop-single-item-v1.php"></a></td>
                  <td class="name"><a href="shop-single-item-v1.php">Destiny</a></td>
                  <td class="price">R$ 130.00</td>
                  <td class="delete"><i class="icon-delete"></i></td>
                </tr>
                <tr class="item">
                	<td class="thumb"><a href="shop-single-item-v1.php"></a></td>
                  <td class="name"><a href="shop-single-item-v1.php">Mortal Kombat X</a></td>
                  <td class="price">R$ 120.00</td>
                  <td class="delete"><i class="icon-delete"></i></td>
                </tr>
              </tbody>
              </table>
            </div>
            
            <div class="col-lg-3 col-md-3">
            	<h3>Valor do Carrinho</h3>
              <form class="cart-sidebar" method="post">
              	<div class="cart-totals">
                	<table>
                  	<tbody>
                  	<tr>
                    	<td>Total</td>
                      <td class="total align-r">R$ 450.00</td>
                    </tr>
                  </tbody></table>
                  <input type="submit" class="btn btn-success btn-block" name="to-checkout" value="Finalizar Compra">
                </div>
                
              </form>
            </div>
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
    
    <script src="bower_components/blueimp-md5/js/md5.min.js"></script>
    
    <script type="text/javascript" src="assets/jsProject/HtmlService.js"></script>
    <script type="text/javascript" src="assets/jsProject/HtmlController.js"></script>
    
    <script type="text/javascript" src="assets/jsProject/UserService.js"></script>
    <script type="text/javascript" src="assets/jsProject/UserController.js"></script>
  

</body>
</html>