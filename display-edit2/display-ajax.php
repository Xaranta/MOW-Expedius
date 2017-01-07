<?Php
$id=$_POST['id'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$address=$_POST['address'];
$email=$_POST['email'];

$message=''; // 
$status='success';              // Set the flag  
//sleep(2); // if you want any time delay to be added

//// Data validation starts ///

if(!is_numeric($id)){  // checking data
$message= "Data Error";
$status='Failed';
}


//// Data Validation ends /////
if($status!='Failed'){  // Update the table now
    
    $message="update clients";
    require "config.php"; // MySQL connection string
    //$count=$dbo->prepare("select id, lastname from Clients WHERE firstname=:firstname");
    $count=$dbo->prepare("update Clients set firstname=:firstname,lastname=:lastname,address=:address,email=:email WHERE id=:id");
    $count->bindParam(":firstname",$firstname,PDO::PARAM_STR,30);
    $count->bindParam(":lastname",$lastname,PDO::PARAM_STR,30);
    $count->bindParam(":address",$address,PDO::PARAM_STR,60);
    $count->bindParam(":email",$email,PDO::PARAM_STR,50);
    $count->bindParam(":id",$id,PDO::PARAM_INT,6);
    $count->execute();
    $no=$count->rowCount();
    //echo $no;
    if($count->execute()){
    $message= " $no  Record updated";
    }else{
    $message = ' database error...';
    $status='Failed';
    }

}else{
}// end of if else if status is success 

$a = array('id'=>$id,'firstname'=>$firstname,'lastname'=>$lastname,'address'=>$address,'email'=>$email);
$a = array ('data'=>$a,'value'=>array("status"=>"$status","message"=>"$message"));
echo json_encode($a); 
?>
