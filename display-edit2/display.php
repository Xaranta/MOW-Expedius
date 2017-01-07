<!DOCTYPE html>
<html>
<head>
<title>Edit Client Database</title>
<link rel="stylesheet" href="style.css" type="text/css">

<script language="javascript" src="ajax.js"></script>

</head>

<body>
<?Php
////////////////////////////////////////////
require "config.php"; // MySQL connection string
echo "<div id=\"msgDsp\" STYLE=\"position: absolute; right: 0px; top: 10px;left:800px;text-align:left; FONT-SIZE: 12px;font-family: Verdana;border-style: solid;border-width: 1px;border-color:white;padding:0px;height:20px;width:250px;top:10px;z-index:1\"> Edit Clients </div>";

//echo phpinfo();
$count="SELECT id,firstname,lastname,address,email FROM Clients LIMIT 10";

$i=1;

echo "<br><br><br><table class='t1' width='1000'><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Address</th><th>Email</th><th>Edit</th></tr>";
foreach ($dbo->query($count) as $row) {
$m=$i%2; // To manage row style using css file.
$id_id='id_'.$row['id'];
$firstname_id='firstname_' . $row['id'];
$lastname_id='lastname_' . $row['id'];  // Div tag to manage Mark data
$address_id='address_' . $row['id'];
$email_id='email_' . $row['id'];

$sid='s' . $row['id'];
echo "<tr class='r$m' height=50><td><div id=$id_id >$row[id]</div></td><td><div id=$firstname_id >$row[firstname]</div></td><td><div id=$lastname_id >$row[lastname]</div></td><td><div id=$address_id>$row[address]</div></td><td width='200'><div id=$email_id >$row[email]</div> </td><td><div id=$sid><input type=button value='Edit' onclick=edit_field($row[id])></div></td></tr>";
//echo "<tr><td><div id=$hid STYLE=\"width:240px;display:none;position: absolute;z-index:1;text-align: center;border-width: 2px;border-color:#ffff00;\"></div></td></tr>";
$i=$i+1;  // To manage row style
}
echo "</table>";
?>
<br><br><br>
<center><a href='http://lamp.cse.fau.edu/~zellis1/MOW3/admin-dashboard.php' rel="nofollow">Go back to admin dashboard</a></center> 

</body>
    
    
    
    <script>
        function edit_field(id){

        var firstname_id='firstname_'+id; // To read the present mark from div 
        var data_firstname='data_firstname'+ id;  // To assign id value to text box 

        var lastname_id='lastname_'+id;
        var data_lastname='data_lastname'+ id;

        var address_id='address_'+id;
        var data_address='data_address'+ id;

        var email_id='email_'+id;
        var data_email='data_email'+ id;

        var sid='s'+id;

        var firstname=document.getElementById(firstname_id).innerHTML; // Read the present name
        document.getElementById(firstname_id).innerHTML = "<input type=text id='" +data_firstname+ "' value='"+firstname+ "'>"; // 

        var lastname=document.getElementById(lastname_id).innerHTML; // Read the present mark
        document.getElementById(lastname_id).innerHTML = "<input type=text id='" +data_lastname+ "' value='"+lastname+ "'>"; // Display text input 

        var address=document.getElementById(address_id).innerHTML; // Read the present class
        document.getElementById(address_id).innerHTML = "<input type=text id='" +data_address+ "' value='"+address+ "' >"; // 

        var email=document.getElementById(email_id).innerHTML; // Read the present class
        document.getElementById(email_id).innerHTML = "<input type=text id='" +data_email+ "' value='"+email+ "' >"; //     

        document.getElementById(sid).innerHTML = '<input type=button value=Update onclick=ajax('+id+');>'; // Add different color to background
        } // end of function

    </script>
</html>
