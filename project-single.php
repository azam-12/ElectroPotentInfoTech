<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=epit_website', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$name = $_GET['name'] ?? null;

if($name){
    $statement = $pdo->prepare('select * from products where name like :name');
    $statement->bindValue(':name', $name);
}
else{
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY id DESC LIMIT 0, 1');
}

$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

?>




<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>ElectroPotentInfoTech</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="plugins/fontawesome/font-awesome.min.css">
  <!-- animation css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- aos -->
  <link rel="stylesheet" href="plugins/aos/aos.css">
  <!-- venobox popup -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css">
  <!-- chart js -->
  <script src="plugins/chart/Chart.bundle.js"></script>

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

  <!--Favicon-->
  <!-- <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <link rel="icon" href="images/favicon.png" type="image/x-icon"> -->
  <script src="plugins/fontawesome/fontaesomelogo.min.css" crossorigin="anonymous"></script>
</head>

<body>
  <!-- preloader start -->
  <div class="preloader">
    <div class="spin"></div>
  </div>
  <!-- preloader end -->

<!-- header -->
<header>
  <!-- navigation -->
   <div class="navigation-sm bg-white position-relative">
     <div class="container">
       <nav class="navbar navbar-expand-lg navbar-light bg-white">
         <a class="navbar-brand" href="index.html">
         <img class="img-fluid" src="NewImages/logo1.png" width="180px" height="55px" >
</a>
           
         <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation"
           aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
 
         <div class="collapse navbar-collapse text-center pb-lg-0" id="navigation">
           <ul class="navbar-nav ml-auto">
             <li class="nav-item ">
               <a class="nav-link " href="index.html">
                 Home
               </a>
             </li>
             <li class="nav-item ">
               <a class="nav-link " href="about.html">
                 About us
               </a>
             </li>
             <li class="nav-item ">
               <a class="nav-link " href="products.php">
                 Products
               </a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="contact.html">Contact</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="service.html">Services</a>
              </li>
           </ul>
           <!-- search -->
           <div class="search px-4 pb-3 pb-lg-0">
             <button id="searchOpen" class="search-btn"><i class="fa fa-search text-dark"></i></button>
             <div class="search-wrapper">
               <form action="#">
                 <input class="search-box form-control" id="search" type="search" placeholder="Type & Hit Enter...">
               </form>
               <button id="searchClose" class="search-close"><i class="fa fa-close text-dark"></i></button>
             </div>
           </div>
           <!-- get start btn -->
           <a href="service.html" class="btn btn-primary hover-ripple">get started</a>
         </div>
       </nav>
     </div>
   </div>
   <!-- /navigation -->
 </header>
<!-- /header -->

<!-- page title -->
<section class="section bg-cover overlay" data-background="./NewImages/aboutus.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-white mb-3">Project Details</h2>
        <!-- breadcrumb -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item font-weight-semebold"><a class="text-white" href="index.html">Home</a></li>
            <li class="breadcrumb-item font-weight-semebold active text-primary" aria-current="page">Project Details</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- project details -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2><?= $product['name'] ?></h2>
        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
          labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
          aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
          eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
          mollit anim id est laborum.</p>
        <div class="row no-gutters bg-secondary p-sm-5 p-4 mb-5">
          <div class="col-md-3 col-6 mb-4 mb-md-0">
            <div class="border-md-right border-muted ml-4">
              <h5 class="text-white text-uppercase">CLIENT</h5>
              <span class="text-light">Australia</span>
            </div>
          </div>
          <div class="col-md-3 col-6 mb-4 mb-md-0">
            <div class="border-md-right border-muted ml-4">
              <h5 class="text-white text-uppercase">Category</h5>
              <span class="text-light">Investment</span>
            </div>
          </div>
          <div class="col-md-3 col-6 mb-4 mb-md-0">
            <div class="border-md-right border-muted ml-4">
              <h5 class="text-white text-uppercase">DATE</h5>
              <span class="text-light">16 April, 2018</span>
            </div>
          </div>
          <div class="col-md-3 col-6 mb-4 mb-md-0">
            <div class="ml-4">
              <h5 class="text-white text-uppercase">status</h5>
              <span class="text-light">In Process</span>
            </div>
          </div>
        </div>




        <!-- project image -->
        <!-- <img class="img-fluid w-100 mb-5" src="NewImages/Products/developmentkit.jpg" alt="project image"> -->
        <?php 
				$fileDir = "file:///C:/xampp/htdocs/epit_website/public/uploads/";
        // $fileDir = "https://epit.electropotentinfotech.in/uploads/";
				$filename = $product['pro_image'];
				$file = $fileDir . $filename;
				$b64image = base64_encode(file_get_contents($file));
			?>	
			<?php echo "<img src = 'data:image/jpg;base64,$b64image' alt='project image' class='img-fluid w-100 mb-5'>";?>

        <p class="mb-5"><?= $product['description'] ?></p>

        <div class="row mb-5">
          <div class="col-md-6 mb-4 mb-md-0">
            <div class="p-4 bg-white box-shadow">
              <h3>The Challenge</h3>
              <p>Excepteur sint occaecat cupidatat proident sunt in culpa qui officia ut dese runt mollit anim id est
                laborum. sed ut perspiciatis ex unde omnis iste natus error voluptatem acusantium.</p>
              <p>Eaque ipsa quae illo inventore verita
                tis et quasi architect beatae.
                vitae dicta sunt explicabo.</p>
              <ul class="list-styled style-circle">
                <li class="mb-1">Quality Services</li>
                <li class="mb-1">Clients Satisfaction</li>
                <li class="mb-1">Clients Services</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-4 bg-white box-shadow">
              <h3>The Strategy</h3>
              <p>Excepteur sint occaecat cupidatat proident sunt in culpa qui officia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, voluptate? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, quaerat!</p>
              <!-- chart -->
<canvas id="profit"></canvas>

<!-- script -->
<script>
  let profit = document.getElementById('profit').getContext('2d');
  let profitChart = new Chart(profit, {
    type: 'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'jul'],
      datasets: [{
        label: 'Profit',
        data: [
          230,
          400,
          500,
          380,
          350,
          450,
          601
        ],
        backgroundColor: 'transparent',
        borderWidth: 3,
        borderColor: '#86c33a'
      }]
    },
    options: {
      title: {
        display: false,
        text: 'Sales: 1 Sep, 2017 - 2 Aug, 2018',
        fontSize: 15
      },
      legend: {
        display: false,
        position: 'right',
        padding: 5,
      },
      layout: {
        padding: {
          left: 0,
          right: 0,
          bottom: 0,
          top: 0
        }
      },
      tooltips: {
        enabled: true
      }
    }
  });
</script>
            </div>
          </div>
        </div>
        <!-- Analyze your business -->
        <h3>Analyze your business</h3>
        <p class="mb-5">Quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam
          est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi
          tempora incidunt ut labore et dolore magnam aliquam.</p>
        <!-- accordion -->
        <div id="accordion">
          <!-- accordion item -->
          <div class="card border-0 mb-4">
            <div class="card-header p-0 border-0 bg-transparent">
              <a class="card-link h4 text-dark font-secondary d-block tex-dark mb-0 py-10" data-toggle="collapse" href="#collapseOne">
                <i class="fa fa-minus text-primary mr-2"></i> Elit Duied Aiusmod Tempor
              </a>
            </div>
            <div id="collapseOne" class="collapse show" data-parent="#accordion">
              <div class="card-body text-color pl-4 pb-0">
                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam.
              </div>
            </div>
          </div>
          <!-- accordion item -->
          <div class="card border-0 mb-4">
            <div class="card-header p-0 border-0 bg-transparent">
              <a class="card-link h4 text-dark font-secondary d-block tex-dark mb-0 py-10" data-toggle="collapse" href="#collapseTwo">
                <i class="fa fa-plus text-primary mr-2"></i> Mod Tempor did Labore Dolory
              </a>
            </div>
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
              <div class="card-body text-color pl-4 pb-0">
                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam.
              </div>
            </div>
          </div>
          <!-- accordion item -->
          <div class="card border-0 mb-4">
            <div class="card-header p-0 border-0 bg-transparent">
              <a class="card-link h4 text-dark font-secondary d-block tex-dark mb-0 py-10" data-toggle="collapse" href="#collapseThree">
                <i class="fa fa-plus text-primary mr-2"></i> Aiusmod Tempor did Labore Dolory
              </a>
            </div>
            <div id="collapseThree" class="collapse" data-parent="#accordion">
              <div class="card-body text-color pl-4 pb-0">
                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam.
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- sidebar -->
      <aside class="col-lg-4">
        <!-- quick contact -->
        <div class="bg-white px-4 py-5 box-shadow mb-5">
          <h4 class="mb-4">Quick Contact</h4>
          <form action="#">
            <input type="text" name="name" id="name" class="form-control form-control-sm border-0 rounded-0 box-shadow mb-3"
              placeholder="Name">
            <input type="email" name="mail" id="mail" class="form-control form-control-sm border-0 rounded-0 box-shadow mb-3"
              placeholder="Email">
            <input type="text" name="phone" id="phone" class="form-control form-control-sm border-0 rounded-0 box-shadow mb-3"
              placeholder="Phone">
            <input type="text" name="subject" id="subject" class="form-control form-control-sm border-0 rounded-0 box-shadow mb-3"
              placeholder="Subject">
            <textarea name="message" id="message" class="form-control form-control-sm border-0 rounded-0 box-shadow mb-3 py-3 px-4"
              placeholder="Your Message"></textarea>
            <button type="submit" value="send" class="btn btn-primary">send message</button>
          </form>
        </div>
        <!-- pdf download -->
        <div class="bg-white px-4 py-5 box-shadow mb-5">
          <h4 class="mb-4">Download PDF</h4>
          <ul class="list-unstyled">
            <li class="d-flex pb-3 mb-3 border-bottom border-color align-items-center">
              <i class="fa fa-file-pdf-o text-primary icon-sm"></i>
              <div class="ml-3">
                <p class="mb-0 text-dark">Market Growth.pdf</p>
                <span class="text-dark">1.53 mb</span>
              </div>
              <a href="#" class="text-color ml-auto"><i class="fa fa-download icon-xs"></i></a>
            </li>
            <li class="d-flex align-items-center">
              <i class="fa fa-file-pdf-o text-primary icon-sm"></i>
              <div class="ml-3">
                <p class="mb-0 text-dark">Market Growth.pdf</p>
                <span class="text-dark">1.53 mb</span>
              </div>
              <a href="#" class="text-color ml-auto"><i class="fa fa-download icon-xs"></i></a>
            </li>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</section>
<!-- /project details -->
<!-- footer -->
<footer>
  <!-- main footer -->
  <div class="section bg-secondary">
    <div class="container">
      <div class="row justify-content-between">
        <!-- footer content -->
        <div class="col-lg-5 mb-5 mb-lg-0">
              <!-- logo -->
              <a class="mb-4 d-inline-block" href="index.html">  <img class="img-fluid" src="NewImages/logo1.png" width="180px" height="55px" ></a>
              <p class="text-light">Our company is committed to serve the industry by producing high precision and advanced technology products of global standards. Our uniqueness lives in anticipating the market needs in advance and developing products to meet those needs.</p>
              <p class="text-light mb-5">Due to our continuous efforts for up gradation of quality and workmanship, we assure the best quality products, timely delivery and better after sales service</p>
              <h4 class="text-white mb-4">Follow Us On</h4>
          <!-- social links -->
          <ul class="list-inline social-icon-alt">
            <li class="list-inline-item">
              <a class="hover-ripple" href="#"><i class="fa fa-facebook"></i></a>
            </li>
            <li class="list-inline-item">
              <a class="hover-ripple" href="#"><i class="fa fa-twitter"></i></a>
            </li>
            <li class="list-inline-item">
              <a class="hover-ripple" target="_blank" href="https://www.linkedin.com/company/electropotent-infotech/"><i class="fa fa-linkedin"></i></a> 
            </li>
            <li class="list-inline-item">
              <a class="hover-ripple" href="#"><i class="fa fa-pinterest"></i></a>
            </li>
          </ul>
        </div>
        <div class="col-lg-6">
          <div class="row">
            <!-- service list -->
            <div class="col-6 mb-5">
              <h4 class="text-white mb-4">Services</h4>
              <ul class="list-styled">
                <li class="mb-3 text-light"><a class="text-light d-block" href="about.html">Company History</a></li>
                <li class="mb-3 text-light"><a class="text-light d-block" href="about.html">About Us</a></li>
                <li class="mb-3 text-light"><a class="text-light d-block" href="contact.html">Contact Us</a></li>
                <li class="mb-3 text-light"><a class="text-light d-block" href="service.html">Services</a></li>
                <li class="mb-3 text-light"><a class="text-light d-block" href="privacy-policy.html">Privacy Policy</a></li>
              </ul>
            </div>
            <!-- contact info -->
            <div class="col-6 mb-5">
              <h4 class="text-white mb-4">Contact Info</h4>
              <ul class="list-unstyled">
                <li class="text-light mb-3">682/B, ShivaRatna Housing Society, Swami Vivekanand road, near Sayadri Hospital, Pune MH-411037</li>
                <li class="text-light mb-3">+918080919227</li>
                <li class="text-light mb-3">info@electropotentinfotech.com</li>
              </ul>
            </div>
         
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- copyright -->
  <div class="bg-secondary-darken py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
          <p class="mb-0 text-white"><a href="index.html"><span class="text-primary">Electro Potent InfoTech</span></a> &copy; <script>
              var CurrentYear = new Date().getFullYear()
              document.write(CurrentYear)
            </script> All Right Reserved</p>
        </div>
       
      </div>
    </div>
  </div>
</footer>
<!-- /footer -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- aos -->
<script src="plugins/aos/aos.js"></script>
<!-- venobox popup -->
<script src="plugins/venobox/venobox.min.js"></script>
<!-- Modernizer -->
<script src="plugins/modernizer/modernizr.min.js"></script>
<!-- filter -->
<script src="plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<script src="plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>