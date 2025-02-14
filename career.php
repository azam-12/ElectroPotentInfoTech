
<?php

$message = "";

if (isset($_POST['submit'])) {

     # verify url, this is for recaptcha V2
    //  error_reporting(0);     
     $secretKey = "6LfHSKMgAAAAACYgvN9fifALxKPOSIlfUu7MPDDL";
     $responseKey = $_POST['g-recaptcha-response'];

     $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$responseKey;
     $response = file_get_contents($url);
     $response = json_decode($response);    

     
     $firstname = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["firstname"])));
     $lastname = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["lastname"])));
     $email = filter_var(trim($_POST["mail"]), FILTER_SANITIZE_EMAIL);

    //  $subject = trim($_POST["subject"]);
    //  $message = trim($_POST["message"]);
     $phone = trim($_POST["phone"]);
    
     $name = $firstname." ".$lastname;
     $headers = "From: $name <$email>";
     $message = '
     <h3 align="center">Candidate Details</h3>
         <table border="1" width="100%" cellpadding="5" cellspacing="5">
             <tr>
                 <td width="30%">Name</td>
                 <td width="70%">'.$name.'</td>
             </tr>
             <tr>
                 <td width="30%">Email Address</td>
                 <td width="70%">'.$email.'</td>
             </tr>
             <tr>
                 <td width="30%">Phone Number</td>
                 <td width="70%">'.$phone.'</td>
             </tr>
             <tr>
                 <td width="30%">Message</td>
                 <td width="70%">'.trim($_POST["message"]).'</td>
             </tr>
         </table>
     ';

    //  if ( empty($firstname) OR empty($lastname) OR empty($phone) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($message) ){  //OR empty($_FILES['resume']['tmp_name'])    OR empty($subject)
    //     # Set a 400 (bad request) response code and exit.
    //     // http_response_code(400);
    //     echo "Please complete the form and try again.";
    //     exit;
    // }


    $path = 'resume/'. $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], $path);
    // exit;

    require 'PHPMailerAutoload.php';
    require 'mail_credential.php';

    $mail = new PHPMailer;

    // $mail->SMTPDebug = 5;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'bond.herosite.pro';//bond.herosite.pro    smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAIL;                 // SMTP username
    $mail->Password = PASS;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;//465;587                                    // TCP port to connect to

    // $message .= "Mobile Number:\n$phone\n";

    $mail->setFrom(EMAIL, "_mainaccount@electropotentinfotech.com");   //('from@example.com', 'Mailer');
    $mail->addAddress('azam@electropotentinfotech.com');//('joe@example.net', 'Joe User');     

// Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo($email);//('info@example.com', 'Information');

    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    $mail->addAttachment($path);   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    $mail->isHTML(true);                                  // Set email format to HTML


    $mail->Subject = "Application for Apperenticeship";
    $mail->Body = $message;
    $mail->header = $headers;
    
    // $mail->Subject = 'Here is the subject';
    // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


    if($response->success){
        if(!$mail->send()){
          $message = '<div class="alert alert-danger">There was an error while sending the email, please try after soem time. </div>'; 
            // http_response_code(500);
            // echo "Oops! Something went wrong, couldn't send your message.";  
            // echo "Mailer Error :". $mail->ErrorInfo;          
        }else{
            $message = '<div class="alert alert-success">Application Successfully Submitted.</div>';
            unlink($path);
            // http_response_code(200);
            // echo "Thank You! Your message has been sent.";
        }
    }else{
        $message = '<div class="alert alert-danger">Recaptcha Verification Failed.</div>'; 
        // echo "Verification Failed";   
    }
    // if (!$mail->send()) {
    //     echo 'Message could not be sent.';
    //     echo 'Mailer Error: ' . $mail->ErrorInfo;
    // } else {
    //     echo 'Message has been sent';
    // }

}

?>


<!DOCTYPE html>



<html lang="zxx">
  <head>
    <meta charset="utf-8" />
    <title>ElectroPotentInfoTech</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css" />
    <!-- slick slider -->
    <link rel="stylesheet" href="plugins/slick/slick.css" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="plugins/fontawesome/font-awesome.min.css" />
    <!-- animation css -->
    <link rel="stylesheet" href="plugins/animate/animate.css" />
    <!-- aos -->
    <link rel="stylesheet" href="plugins/aos/aos.css" />
    <!-- venobox popup -->
    <link rel="stylesheet" href="plugins/venobox/venobox.css" />
    <!-- chart js -->
    <script src="plugins/chart/Chart.bundle.js"></script>

    <!-- Main Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />

    <!--Favicon-->
    <link rel="shortcut icon" href="NewImages/logo.png" type="image/x-icon" />
    <link rel="icon" href="NewImages/logo.png" type="image/x-icon" />
    <script
      src="plugins/fontawesome/fontaesomelogo.min.css"
      crossorigin="anonymous"
    ></script>
  </head>

  <section>
    <!-- preloader start -->
    <!-- <div class="preloader">
    <div class="spin"></div>
  </div> -->
    <!-- preloader end -->
    <!-- header -->
    <header>
      <!-- navigation -->
      <div class="navigation bg-white position-relative pl-5 pr-5">
        <div class="container-fluid ml-5 mr-5">
          <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <a class="navbar-brand" href="index.html">
              <img
                class="img-fluid" src="NewImages/logo1.png" width="200px" height="150px"/></a>

            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div
              class="collapse navbar-collapse text-center pb-lg-0"
              id="navigation"
            >
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.html"> Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html"> About us </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="products.php"> Products </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.html">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="career.php">Career </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <!-- /navigation -->
    </header>
    <!-- /header -->
    
<!-- page title -->
<section class="section bg-cover overlay" data-background="NewImages/aboutus.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-white">Join us </h2>
        <!-- breadcrumb -->
       
      </div>
    </div>
  </div>
</section>
<!-- /page title -->
    <section>
    <div class="container-fluid p-5 " id="Apply">
      <div class="row align-items-center justify-content-between pl-5 pr-5">
        <div class="col-md-5 " >
          <span class="section-title-border"></span>
          <p class="subtitle mt-5">Carrer's at ElectroPotent InfoTech</p>
          <h3 class="section-title">
            Begin your career journey with us and discover how your talents and
            skills can help change the world.
          </h3>
          <span class="section-title-border float-right"></span>
        </div>
        <div class="col-md-6">
          <h3 class="section-title">Apply Here 👇</h3>

          <form class="contact__form" method="post" action="mail_phpmailer.php" enctype="multipart/form-data"> <!---action="mail_phpmailer.php" - -->
            <div class="alert alert-success contact__msg" style="display: none" role="alert">            
              Your message was sent successfully.
            </div>
             <!-- <php echo $message; ?>  -->
             <div class="row justify-content-between">
              <div class="col-md-6">
                <input type="text" name="firstname" id="firstname" class="form-control border-1 rounded-0 box-shadow mb-4" required placeholder=" First Name"/>
              </div>
              <div class="col-md-6">
                <input
                  type="text" name="lastname" id="lastname" class="form-control border-1 rounded-0 box-shadow mb-4" required placeholder="Last Name"/>
              </div>
              <div class="col-md-6">
                <input type="email" name="mail" id="mail" class="form-control border-1 rounded-0 box-shadow mb-4" required placeholder="Email"/>
              </div>
              <div class="col-md-6">
                <input type="text" name="phone" id="phone" pattern="^[6-9][0-9]{9}$" class="form-control border-1 rounded-0 box-shadow mb-4" required placeholder="Phone"/>
              </div>
              <div class="col-md-12 ">
                <textarea name="message" id="message" class="form-control border-1 rounded-0 box-shadow mb-5 py-3 px-4" required placeholder="Description"></textarea>
              </div>
              <div class="col-md-6">
                <label for="name" class="form-label">Upload Your Resume</label>
                <input type="file" required id="file" accept=".doc, .docx, .pdf" name="file" >
              </div>
              <div class="col-md-6">
            <div class="g-recaptcha" data-sitekey="6LfHSKMgAAAAALd8xhttO5kMvmySIbZILI3sDer9"></div>
          </div>
              <div class="col-md-12 p-2 mt-3">
                <button type="submit" name="submit" value="send" class="btn btn-primary hover-ripple ">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
    <section>
    <div class="container-fluid p-5 bg-light overflow-hidden">
     <div class="container text-right pr-5 pl-5 "> <span class="section-title-border border-center"></span>
      <p class="subtitle">Join Us</p>
      <h3 class="section-title ">
       Apply for our recent oppenings
      </h3></div>
      <div class="card border-2 rounded-4 box-shadow">
        <div class="row justify-content-between p-2">
          <div class="col-md-6 ">
            <div class="card-body position-relative">
              <h2 class="text-dark text-center mb-4">Embedded Enggineer</h2>
              <div class="card-text" title="Embedded Enggineer">
                <h4 title= "Job Description">Job Description</h4>
                <ul class="list-styled style-circle mb-4">
                  <li>
                    Minimum 0 to 1 year, Experience of firmware and hardware
                    development experience
                  </li>
                  <li>
                    Ability to design and develop appropriate to real time
                    control and information systems.
                  </li>
                  <li>
                    Good interpersonal skills and be able to work in a team.
                  </li>
                </ul>
                <h4 title="Mandatory Skills" >Mandatory Skills</h4>
                <ul class="list-styled style-circle">
                  <li>Microcontroller based Circuit design</li>
                  <li>
                    Knowledge on PIC microcontrollers ,Atmel and cypress
                    controller
                  </li>
                  <li>Good C programming skills in Embedded C</li>
                  <li>
                    Excellent programming skill and implementation capability in
                    C required
                  </li>
                  <li>Digital interface – (CMOS to TTL,TTL to TTL)</li>
                  <li>Communication Interface – UART,SPI,I2C and CAN</li>
                  <li>
                    Sensor signal conditioning (Temperature ,Hall and voltage..)
                  </li>
                  <li>Altium- Schematic and PCB Design</li>
                </ul>
              </div>
            </div>
            <a href="#Apply" class="btn btn-secondary btn-arrow ml-5 mt-5 pl-5">Read More</a>
          </div>
          <div class="col-md-6 ">
            <img
              class="card-img-top rounded-0 "
              src="NewImages/aboutus.jpg"
              height="600px"
              width="390px"
            />
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- footer -->
<footer>
  <!-- main footer -->
  <div class="section bg-secondary p-5 mb-0 pb-0">
    <div class="container-fluid pl-5 pr-5 mb-0">
      <div class="row justify-content-between">
        <!-- footer content -->
        <div class="col-lg-5">
          <!-- logo -->
          <a class="mb-4 d-inline-block p-1" href="index.html"><img src="NewImages/logo1.png" width="220px" height="100px"></a>
          <p class="text-light">Our company is committed to serve the industry by producing high precision and advanced technology products of global standards. Our uniqueness lives in anticipating the market needs in advance and developing products to meet those needs.</p>
          <p class="text-light mb-5">Due to our continuous efforts for up gradation of quality and workmanship, we assure the best quality products, timely delivery and better after sales service</p>
          <h4 class="text-white mb-2">Follow Us On</h4>
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
              <h4 class="text-white mb-4 mt-5">Services</h4>
              <ul class="list-styled">
                <li class="mb-3 text-light"><a class="text-light d-block" href="about.html">Company History</a></li>
                <li class="mb-3 text-light"><a class="text-light d-block" href="about.html">About Us</a></li>
                <li class="mb-3 text-light"><a class="text-light d-block" href="contact.html">Contact Us</a></li>
                <li class="mb-3 text-light"><a class="text-light d-block" href="service.html">Services</a></li>
                              </ul>
            </div>
              <!-- contact info -->
              <div class="col-6 mb-5 mt-5">
                <h4 class="text-white mb-4">Contact Info</h4>
                <ul class="list-unstyled">
                  <li class="text-light mb-2">682/B, ShivaRatna Housing Society, Swami Vivekanand road, near Sayadri Hospital, Pune MH-411037</li>
                  <li class="text-light mb-2">+918080919227</li>
                  <li class="text-light mb-3">info@electropotentinfotech.com</li>
                </ul>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- copyright -->
  <div class="bg-secondary-darken p-1">
    <div class="container-fluid">
          <p class="mb-0 text-white text-right"><a href="index.html"><span class="text-danger">Electro Potent InfoTech</span></a> &copy; <script>
              var CurrentYear = new Date().getFullYear()
              document.write(CurrentYear)
            </script> All Right Reserved</p>
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
    
    <!-- Req for send mail form -->
    <!-- <script src="js/contact.js"></script> -->

    <!-- For recaptcha V2  -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  </body>
</html>
