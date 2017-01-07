<html>


<body>
<h3 align="center">Manage Student Details</h3>
<table border="1" align="center">
   <tr>
       <td> <input type="button" id="display" value="Display All Data" /> </td>
   </tr>
</table>
<div id="responsecontainer" align="center">
    
<?php
$usernm="b66a9fa66ca4f7";
$passwd="8512b611";
$host="us-cdbr-iron-east-03.cleardb.net";
$database="ad_ad1ac2bcdb9acb2";
    
$conn = mysql_connect($host, $usernm, $passwd);
mysql_select_db($database,$conn);
$result=mysql_query("select * from clients",$conn);
echo "<table border='1' >
<tr>
<td align=center> <b>ID</b></td>
<td align=center><b>Name</b></td>
<td align=center><b>Address</b></td>";

while($data = mysql_fetch_row($result))
{   
    echo "<tr>";
    echo "<td align=center>$data[0]</td>";
    echo "<td align=center>$data[1] $data[2]</td>";
    echo "<td align=center>$data[3]</td>";
    echo "</tr>";
}
echo "</table>";
?>
    
</div>
</body>
</html>

