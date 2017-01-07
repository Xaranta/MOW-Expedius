<html>
<head>
    <title> Delegate edit form</title>
</head>
<body>
    Delegate update form  </p>

    <meta name="viewport" content="width=device-width; initial-scale=1.0">

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />


    <link href='http://fonts.googleapis.com/css?family=Droid+Serif|Ubuntu' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="js/flexslider/flexslider.css" />
    <link rel="stylesheet" href="css/basic-style.css">




    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>

    </head>

    <body id="home">

        <header class="wrapper clearfix">



            <nav id="topnav" role="navigation">
                <div class="menu-toggle">Menu</div>
                <ul class="srt-menu" id="menu-main-navigation">
                    <li><a href="Swift_Landing.html">Home page</a></li>

        </header>
        </section>

        <style>
            form label {
                display: inline-block;
                width: 100px;
                font-weight: bold;
            }
        </style>
        </ul>

        <?php
        session_start();
        $usernm="zellis1";
        $passwd="duG9osd1t3Uy1";
        $host="localhost";
        $database="test";
        
  /*$servername = "localhost";
	$username = "zellis1";
	$password = "duG9osd1t3Uy1";
	$dbname = "test";*/

        $Username=$_SESSION['myssession'];



        mysql_connect($host,$usernm,$passwd);

        mysql_select_db($database);

        $sql = "SELECT * FROM Clients WHERE id=1";
  $result = mysql_query($sql) or die (mysql_error()); // dont put spaces in between it, else your code wont recognize it the query that needs to be executed
while ($row = mysql_fetch_array($result)){     // here too, you put a space between it
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $address=$row['address'];
    }
?>
        </p>
    </body>
</html>