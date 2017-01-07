<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>(Type a title for your page here)</title>
<link rel="stylesheet" href="style.css" type="text/css">

<script language="javascript" src="ajax.js"></script>

<script language="JavaScript">
function edit_field(id){

var sid='s'+id;
var t1='t'+ id;

var mark=document.getElementById(id).innerHTML; // Read the present mark
document.getElementById(id).style.backgroundColor = '#ffff00'; // Add different color to background
document.getElementById(id).innerHTML = '<input type=text id=' + t1 + ' value='+ mark + ' size=2> <input type=button value=Update onclick=ajax(' + id + ');>'; // Add different color to background
document.getElementById(id).style.display = 'inline';  // show the details
document.getElementById(sid).style.display = 'none'; // Hide the edit button

} // end of function

</script>
</head>

<body>
<?Php
////////////////////////////////////////////
require "config.php"; // MySQL connection string
echo "<div id=\"msgDsp\" STYLE=\"position: absolute; right: 0px; top: 10px;left:800px;text-align:left; FONT-SIZE: 12px;font-family: Verdana;border-style: solid;border-width: 1px;border-color:white;padding:0px;height:20px;width:250px;top:10px;z-index:1\"> Edit mark </div>";

$count="SELECT name,id,class,mark,sex FROM student LIMIT 10";

$i=1;

echo "<br><br><br><table class='t1'><tr><th>Name</th><th>Class</th><th>Sex</th><th>Mark</th><th>Edit</th></tr>";
foreach ($dbo->query($count) as $row) {
$m=$i%2;
$sid='s' . $row['id'];
echo "<tr class='r$m'><td> $row[name] </td><td> $row[class]  </td><td> $row[sex] </td><td>  <div id=$row[id] STYLE=\"width:140px;\">$row[mark]</div></td><td><input type=button id=$sid value='Edit' onclick=edit_field($row[id])></td></tr>";
$i=$i+1;
}
echo "</table>";
?>
<br><br><br>
<center><a href='http://www.plus2net.com' rel="nofollow">plus2net.com : PHP SQL HTML free tutorials and scripts</a></center> 

</body>
</html>
