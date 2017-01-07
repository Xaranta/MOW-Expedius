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
    
    var url="display-ajax.php";
    var data_firstname='data_firstname'+ id;
    var data_lastname='data_lastname'+ id;
    var data_address='data_address'+ id;
    var data_email='data_email'+ id;

    var firstname = document.getElementById(data_firstname).value; 
    var lastname = document.getElementById(data_lastname).value; 
    var address = document.getElementById(data_address).value; 
    var email = document.getElementById(data_email).value; 
   

    var parameters="&id="+id+"&firstname="+firstname+"&lastname="+lastname + "&address="+address+"&email="+email;
    alert(parameters);
    httpxml.onreadystatechange=stateChanged;
    httpxml.open("POST", url, true);
    httpxml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //alert(parameters);
    document.getElementById("msgDsp").style.borderColor='#ffffff';
    document.getElementById("msgDsp").style.display = 'inline';
    document.getElementById("msgDsp").innerHTML="Wait .... ";
    httpxml.send(parameters);
    alert("before response text reparsed into JSON.");
    function stateChanged() 
    {
        if(httpxml.readyState==4  && httpxml.status == 200)
        {
        ///////////////////////
        alert(httpxml.responseText);  // this is where it fails
        //var myObject = httpxml.responseText; 
        var myObject =  JSON.parse(httpxml.responseText); 
        alert(myObject);
        if(myObject.value.status=='success'){
        var firstname_id='firstname_'+myObject.data.id;
        var lastname_id='lastname_'+myObject.data.id;
        var address_id='address_'+myObject.data.id;
        var email_id='email_'+myObject.data.id;
        document.getElementById(firstname_id).innerHTML = myObject.data.firstname;
        document.getElementById(lastname_id).innerHTML = myObject.data.lastname;
        document.getElementById(address_id).innerHTML = myObject.data.address;
        document.getElementById(email_id).innerHTML = myObject.data.email;


        document.getElementById("msgDsp").innerHTML=myObject.value.message;
        var sid='s'+myObject.data.id;
        document.getElementById(sid).innerHTML = "<input type=button value='Edit' onclick=edit_field("+myObject.data.id+")>";
        setTimeout("document.getElementById('msgDsp').innerHTML=' '",2000)
        }// end of if status is success 
        else {  // if status is not success 
        document.getElementById("msgDsp").innerHTML=myObject.value.message;
        document.getElementById("msgDsp").style.borderColor='red';
        setTimeout("document.getElementById('msgDsp').style.display='none'",2000)
        } // end of if else checking status

        }
    }




////////////////////////////////


}

