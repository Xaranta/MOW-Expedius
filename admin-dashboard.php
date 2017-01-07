<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard | EXPEDIUS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    
    <style>
    @media(min-width:768px) {
    .navbar-default {
        padding: 25px 0;
        border: 0;
        background-color: #1B2D57;
        -webkit-transition: padding .3s;
        -moz-transition: padding .3s;
        transition: padding .3s;
    }

    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.html">Expedius</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">Client Management</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">Volunteer Management</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">Route Management</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#Schedule">Schedule Management</a>
                    </li>
                    <li>
                        
                        <span class="fa-stack fa-2x">
                            <!--i class="fa fa-circle fa-stack-2x text-primary"></i-->
                            <a href="editprofile.html"><i class="fa fa-cog fa-stack-1x fa-inverse"></i></a>
                        </span>
                        
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <!--div class="intro-lead-in">Welcome To Our Studio!</div>
                <div class="intro-heading">It's Nice To Meet You</div-->
                <h1>Welcome Expedius User</h1>
                <h3>Next Scheduled Day: November 20th</h3>
                <!--a href="#services" class="page-scroll btn btn-xl">Edit Profile</a>
                <a href="#services" class="page-scroll btn btn-xl">What else do I need?</a-->
            </div>
        </div>
    </header>
    
    <!-- Client Management Section -->
     <section id="Client Management" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Client Management</h2>
                    <!--h3 class="section-subheading text-muted">I think we should just integrate the calendar functionality right in the user dashboard </h3-->
                </div>
            </div>
        </div>
    </section>
    
    <!-- Volunteer Management Section -->
     <section style="background-color:#0384BD" id="Volunteer Management" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Volunteer Management</h2>
                    <!--h3 class="section-subheading text-muted">I think we should just integrate the calendar functionality right in the user dashboard </h3-->
                </div>
            </div>
        </div>
    </section>


    <!-- Route management Section -->
    <a href="routes.php">
    <section id="routes">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Route Management</h2>
                    <h3 class="section-subheading text-muted">Clients to be served today: Zach Ellis, Ken Ellis, Tyler Hoffman, Alex Gillman.</h3>
                </div>
                
            </div>
        </div>
    </section>
    </a>


    <!-- Team Section -->
    <section style="background-color:#0384BD" id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Schedule Management</h2>
                    <!--h3 class="section-subheading text-muted">I think we should just integrate the calendar functionality right in the user dashboard.</h3-->
                </div>
            </div>
        </div>
    </section>
    

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Expedius</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>
