<?php
    $Name= $_POST['Name'];
    $Email= $_POST['Email'];
    $Password= $_POST['Password'];    

        $conn = new mysqli('localhost','root','','soundwave');
        if ($conn-> connect_error){
            die('Connection Failed :'.$conn->connect_error);
        }else{
            if(!empty($Name) && !empty($Email) && !is_numeric($Email) &&!empty($Password))
		{
            $stmt = $conn->prepare("insert into users(Name,Email,Password) values(?,?,?)");
            $stmt->bind_param("sss",$Name,$Email,$Password);
            $stmt->execute();
            header ('Location:Complete.php');
            $stmt->close();
            $conn->close();
        }else{
               header("Location:Error.php"); 
            }
            
        }
            
?>