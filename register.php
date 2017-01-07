<?php
session_start();
if( isset($_SESSION['user_id']) ){
	header("Location: /");
}
require 'database.php';
//require 'functions.php'; I realized PDO prepare does string escaping


// Turn off all error reporting
error_reporting(0);

$message = '';
if(!empty($_POST['email']) && !empty($_POST['password'])&& !empty($_POST['firstname'])&& !empty($_POST['lastname'])&& !empty($_POST['phone'])&& !empty($_POST['address'])&& !empty($_POST['city'])&& !empty($_POST['zip'])):
    //check to see if e-mail is already being used
    
    //This method always says that the email is already in use, even if I am entering a new one. 
    
    /*$records = $conn->prepare('SELECT * FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);*/



    $records = $conn->prepare('SELECT count(*) FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_NUM);
    
    if( $results[0] > 0){
        $message = "Sorry, that E-mail address is already registered to an account.";
    }
    
    //$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    //I still need to add string sanitation. 

    //this one never says that the email is in use.
    /*
    $email = $_POST['email'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."'");

    if(mysqli_num_rows($query) > 0){
        $message = "Sorry, that E-mail address is already registered to an account.";
	}
    */
    
    //this was the last method I tried, and it also never says that the email is in use.
    /*
    try{
        $stmt2 = $conn->prepare('SELECT `email` FROM `user` WHERE email = ?');
        $stmt2->bindParam(1, $_POST['email']); 
        $stmt2->execute();
        while($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        }
    }
    catch(PDOException $e){
        echo 'ERROR: ' . $e->getMessage();
    }

    if($stmt2->rowCount() > 0){
        //echo "The record exists!";
		$message = "Sorry, that E-mail address is already registered to an account.";
	}
    */

    else{
        // Enter the new user in the database
        $sql = "INSERT INTO users (email, password, firstname, lastname, phone, address, city, zip) VALUES (:email, :password, :firstname, :lastname, :phone, :address, :city, :zip)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
        $stmt->bindParam(':firstname', $_POST['firstname']);
        $stmt->bindParam(':lastname', $_POST['lastname']);
        $stmt->bindParam(':phone', $_POST['phone']);
        $stmt->bindParam(':address', $_POST['address']);
        $stmt->bindParam(':city', $_POST['city']);
        $stmt->bindParam(':zip', $_POST['zip']);

        if( $stmt->execute() ):
            $message = 'Successfully created new user';
        else:
            $message = 'Sorry there must have been an issue creating your account';
        endif;
    }

endif;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MOW | EXPEDIUS</title>

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
        a{
            color:grey;
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
                <a class="navbar-brand page-scroll" href="index.php">Expedius</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="login.php">Log in</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="register.php">Sign up</a>
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
                <h1>Expedius</h1>
                <h3>A Route Delivery Solution for Meals On Wheels Palm Beach</h3>
                <?php if(!empty($message)): ?>
                    <h2><?= $message ?></h2>
                <?php endif; ?>
                <!--form action="login.php" method="POST">
		
		<input type="text" placeholder="Enter your email" name="email">
		<input type="password" placeholder="and password" name="password">

		<input type="submit" >

	</form-->
                <div class="container-login">
                    <div class="row vertical-offset-100">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Registration</h3>
                                </div>
                                <div class="panel-body"> 
                                    <form accept-charset="UTF-8" role="form" action="register.php" method="POST">
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="First Name" name="firstname" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Last Name" name="lastname" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Phone number" name="phone" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Address" name="address" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="City" name="city" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Zip Code" name="zip" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="E-mail" name="email" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder= "Password" name="password" type="password">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Confirm password" name="confirm_password" type="confirm_password">
                                        </div>
                            
                                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register">
                                    </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--a href="#services" class="page-scroll btn btn-xl">Forgot your password?</a-->
                <a href="login.php"><button type="button" class="btn btn-primary btn-xl">Already have an account? Login here</button></a>
            </div>
        </div>
    </header>




    

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
    <!--script src="js/contact_me.js"></script--> 
    <!--disabled because it was triggering when I hit the login submit-->
    
    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>
