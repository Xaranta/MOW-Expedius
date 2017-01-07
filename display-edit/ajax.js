function ajax(id)
{
var httpxml;
try
{
// Firefox, Opera 8.0+, Safari
httpxml=new XMLHttpRequest();
}
catch (e)
{
// Internet Explorer
try
{
httpxml=new ActiveXObject("Msxml2.XMLHTTP");
}
catch (e)
{
try
{
httpxml=new ActiveXObject("Microsoft.XMLHTTP");
}
catch (e)
{
alert("Your browser does not support AJAX!");
return false;
}
}
}
function stateChanged() 
{
if(httpxml.readyState==4)
{
///////////////////////
//alert(httpxml.responseText); 
var myObject = JSON.parse(httpxml.responseText); 
if(myObject.value.status=='success'){
document.getElementById(myObject.data.id).innerHTML = myObject.data.mark;
document.getElementById("msgDsp").innerHTML=myObject.value.message;
var sid='s'+myObject.data.id;
document.getElementById(sid).style.display = 'inline'; // Display  the edit button
setTimeout("document.getElementById('msgDsp').innerHTML=' '",2000)
}// end of if status is success 
else {  // if status is not success 
document.getElementById("msgDsp").innerHTML=myObject.value.message;
document.getElementById("msgDsp").style.borderColor='red';
setTimeout("document.getElementById('msgDsp').style.display='none'",2000)
} // end of if else checking status

}
}


var url="display-ajax.php";
var t1='t'+ id;
//alert(t1);
var mark = document.getElementById(t1).value; 
var parameters="mark=" + mark + "&id=" + id ;
httpxml.onreadystatechange=stateChanged;
httpxml.open("POST", url, true)
httpxml.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
//alert(parameters);
document.getElementById("msgDsp").style.borderColor='#ffffff';
document.getElementById("msgDsp").style.display = 'inline'
document.getElementById("msgDsp").innerHTML="Wait .... ";
httpxml.send(parameters) 

////////////////////////////////


}

