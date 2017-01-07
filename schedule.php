<!DOCTYPE html>
<html lang="en">

    
    <!--

CREATE TABLE Clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
address VARCHAR(60),
reg_date TIMESTAMP
)

INSERT INTO Clients (firstname, lastname, email, address)
VALUES ('Zach', 'Ellis', 'fuckoffblud.com', '2016 Park Pl, Boca Raton, FL, 33486'),
('Tyler', 'Hoffman', 'fuckoffblud.com', '855 NW 4th Ave, Boca Raton, FL, 33432'),
('Ken', 'Ellis', 'fuckoffblud.com', '900 S Ocean Blvd, Boca Raton, FL 33432'),
('Alex', 'Gillman', 'fuckoffblud.com', '777 Glades Rd, Boca Raton, FL 33431')

-->
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MOW Expedius</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    
    <link href="calendar.css" type="text/css" rel="stylesheet" />

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   
     <style>
    @media(min-width:768px) {
    .navbar-default {
        padding: 15px 0;
        border: 0;
        background-color: #1B2D57;
        -webkit-transition: padding .3s;
        -moz-transition: padding .3s;
        transition: padding .3s;
    }

    .navbar-default .navbar-brand {
        font-size: 2em;
        -webkit-transition: all .3s;
        -moz-transition: all .3s;
        transition: all .3s;
    }

    .navbar-default .navbar-nav>.active>a {
        border-radius: 3px;
    }

    .navbar-default.navbar-shrink {
        padding: 7px 0;
        background-color: #1B2D57;
    }

    .navbar-default.navbar-shrink .navbar-brand {
        font-size: 1.5em;
    }
}

        
    header .intro-text {
    padding-top: 120px;
    padding-bottom: 50px;
    }


    </style>
    
  <!--<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Draggable directions</title> -->
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
      }
        .cont {
        margin-top: 8%;
        height: 18%;
        width: 100%;
      }
      #map {
        height: 75%;
        /*float: left;*/
        margin-left: 10%;
        margin-right: 10%;
        width: 80%;
      }
      #right-panel {
        /*float: left;*/
        width: 100%;
        height: 75%;
      }
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
        #right-panel select, #right-panel input {
        font-size: 35px;
        }

        #right-panel select {
          width: 100%;
        }

        #right-panel i {
          font-size: 12px;
        }

      .panel {
        height: 100%;
        overflow: auto;
      }
      
      .col-lg-10{
        float : none;
      }    
        
        .container-client-buttons{
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }   
        
    </style>
  </head>

  <body>
  
<?php
	$servername = "localhost";
	$username = "zellis1";
	$password = "duG9osd1t3Uy1";
	$dbname = "test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		 die("Connection failed: " . $conn->connect_error);
	} 

    //fetch table rows from mysql db
    $sql = "SELECT id, firstname, lastname, address FROM Clients";
	$result = $conn->query($sql);
    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    //echo json_encode($emparray);

    //close the db connection
    mysqli_close($connection);
?>

  
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
                <a class="navbar-brand" href="volunteer-dashboard.html">Expedius</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="routes.php">Routes</a>
                    </li>
                    <li class="page-scroll">
                        <a href="volunteer-dashboard.html">Schedule</a>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <!--span class="skills">Route 1</span0  1,Infinite+Loop,Cupertino,California   -->
                        <!--button type="button" class="btn btn-primary btn-lg" id="button1" >Route 1</button>
                        <button type="button" class="btn btn-primary btn-lg" id="button2" >Route 2</button-->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <body id="page-top" class="index">
        <div class="schedule-container">            
            <?php
                include 'calendar.php';

                $calendar = new Calendar();

                echo $calendar->show();
                ?>
        </div>
    </body>

      
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