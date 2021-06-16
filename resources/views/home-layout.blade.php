<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cafe House</title>
<!-- 
Cafe House Template
http://www.templatemo.com/tm-466-cafe-house
-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
  <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/css/templatemo-style.css')}}" rel="stylesheet">
  <link rel="shortcut icon" href="{{asset('frontend/img/favicon.ico')}}" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <!-- Preloader -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Preloader -->
    <div class="tm-top-header">
      <div class="container">
        <div class="row">
          <div class="tm-top-header-inner">
            <div class="tm-logo-container">
              <img src="{{asset('frontend/img/logo.png')}}" alt="Logo" class="tm-site-logo">
              <h1 class="tm-site-name tm-handwriting-font">Cafe House</h1>
            </div>
            <div class="mobile-menu-icon">
              <i class="fa fa-bars"></i>
            </div>
            <nav class="tm-nav">
              <ul>
                <li><a href="{{route('home')}}" class="{{isset($active)&&$active=="home"? "active":""}}">Home</a></li>
                <li><a href="{{route('special')}}" class="{{isset($active)&&$active=="special"? "active":""}}">Today Special</a></li>
                <li><a href="{{route('menu')}}" class="{{isset($active)&&$active=="menu"? "active":""}}">Menu</a></li>
                <li><a href="{{route('contact')}}" class="{{isset($active)&&$active=="contact"? "active":""}}">Contact</a></li>
              </ul>
            </nav>    
          </div>           
        </div>    
      </div>
    </div>
    <section class="tm-welcome-section">
      <div class="container tm-position-relative">
        <div class="tm-lights-container">
          <img src="{{asset('frontend/img/light.png')}}" alt="Light" class="light light-1">
          <img src="{{asset('frontend/img/light.png')}}" alt="Light" class="light light-2">
          <img src="{{asset('frontend/img/light.png')}}" alt="Light" class="light light-3">  
        </div>        
        <div class="row tm-welcome-content">
          <h2 class="white-text tm-handwriting-font tm-welcome-header"><img src="{{asset('frontend/img/header-line.png')}}" alt="Line" class="tm-header-line">&nbsp;Welcome To&nbsp;&nbsp;<img src="{{asset('frontend/img/header-line.png')}}" alt="Line" class="tm-header-line"></h2>
          <h2 class="gold-text tm-welcome-header-2">Cafe House</h2>
          <div style="height:80px;">
            <p class="gray-text tm-welcome-description " id="description">Cafe House template is a mobile-friendly responsive layout by . Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculusnec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
          
          </div>
          <a href="#main" class="tm-more-button tm-more-button-welcome">Details</a>      
        </div>
        <img src="{{asset('frontend/img/table-set.png')}}" alt="Table Set" class="tm-table-set img-responsive">             
      </div>      
    </section>
    {{--  --}}
    @yield('content')
    {{--  --}}
    <footer>
      <div class="tm-black-bg">
        <div class="container">
          <div class="row margin-bottom-60">
            <nav class="col-lg-3 col-md-3 tm-footer-nav tm-footer-div">
              <h3 class="tm-footer-div-title">Main Menu</h3>
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Directory</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Our Services</a></li>
              </ul>
            </nav>
            <div class="col-lg-5 col-md-5 tm-footer-div">
              <h3 class="tm-footer-div-title">About Us</h3>
              <p class="margin-top-15">Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.</p>
              <p class="margin-top-15">Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus.</p>
            </div>
            <div class="col-lg-4 col-md-4 tm-footer-div">
              <h3 class="tm-footer-div-title">Get Social</h3>
              <p>Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante.</p>
              <div class="tm-social-icons-container">
                <a href="#" class="tm-social-icon"><i class="fa fa-facebook"></i></a>
                <a href="#" class="tm-social-icon"><i class="fa fa-twitter"></i></a>
                <a href="#" class="tm-social-icon"><i class="fa fa-linkedin"></i></a>
                <a href="#" class="tm-social-icon"><i class="fa fa-youtube"></i></a>
                <a href="#" class="tm-social-icon"><i class="fa fa-behance"></i></a>
              </div>
            </div>
          </div>          
        </div>  
      </div> 
    @if (Session('cart')!= null)
    <div class="cart" id="cart-box">
      <div class="cart-icon">
          <a href="javascript:"><i class="fas fa-shopping-cart"></i></a>
      </div>
      <div class="cart-quantity">
          {{count(Session('cart'))}}
      </div>
      <ul class="cart-box">
          <li style="background-color: rgb(212, 120, 151);">
              <img src="../cbfa31cbb6b843e61aa9.jpg" alt="">x1
              <a href="#"><i class="fas fa-times"></i></a>
              <p>Sản phẩm 1</p>
              
          </li>
          <li style="background-color: rgb(212, 120, 151);">
              <img src="../cbfa31cbb6b843e61aa9.jpg" alt="">x1
              <a href="#"><i class="fas fa-times"></i></a>
              <p>Sản phẩm 1</p>
              
          </li>
          <li><button style="width:100%;border:none;background-color:orange">Checkout</button></li>
      </ul>
  </div>
    @endif
<style>
    body{
        margin: 0;
        padding: 0;
        font-size:14px; 
    }
    .cart-box{
        text-decoration: none;
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    .cart{
        width: 45px;
        height: 45px;
        position: relative;
        position: fixed;
        bottom:20px;
        left:50px;
        font-size: 40px;
    }
    .cart a{
        color:rgb(182, 19, 73);
    }
    .cart-icon{
        width: 100%;
        height: 100%;
    }
    .cart-quantity{
        width: 20px;
        height:20px;
        font-size: 20px;
        position: absolute;
        top: -10px;
        right: -15px;
        border-radius: 100%;
        text-align: center;
        color: purple;
        background-color: rgb(235, 140, 17);
    }
    .cart-box{
        width:200px;
        border: 1px solid black;
        position: absolute;
        top: -100px;
        font-size: 15px;
        display: none;
    }
    .cart-box li{
        margin: 0;
        padding: 0;
        display: flex;
      
    }
</style>     
      @yield('script')
   </footer> <!-- Footer content-->  
   <!-- JS -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>     <!-- jQuery -->
   <script type="text/javascript" src="{{asset('frontend/js/templatemo-script.js')}}"></script>      <!-- Templatemo Script -->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="{{asset('admin-template/plugins/common/common.min.js')}}"></script>
   <script>
    $(document).ready(function () {
          // swal({
          //   title: "Good job!",
          //   text: "You clicked the button!",
          //   icon: "success",
          // });
          $(".cart-icon").click(function(){
            $(".cart-box").fadeToggle(300);
        });
        var n = 1;
        var arrTitle = new Array();
        arrTitle[0] = "Every day, across the globe, our partners support the communities in our stores and the neighborhoods we are a part of. From open mic nights to service projects to spreading messages of hope, we are making our communities stronger.";
        arrTitle[1] = "Cafe House template is a mobile-friendly responsive layout by . Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculusnec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.";
        arrTitle[2] = "Cafe House template is a mobile-friendly responsive layout by . Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculusnec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.";
        setInterval(function () {
            $("#description").fadeOut(1000, function () {
                $("#description").text(arrTitle[n])
                $("#description").fadeIn(1000);
                n++;
                if (n == 3)
                    n = 0;
            })
        }, 4000)
    });
</script>
 </body>
 </html>