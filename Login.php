<?php 

session_start();

	include("config.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];

		if(!empty($Email) && !empty($Password) && !is_numeric($Email))
		{

			//read from database
			$query = "select * from users where Email = '$Email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['Password'] === $Password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: main.php");
						die;
					}
				}
			}
			
			header("Location: Error.php");
		}else
		{
			header("Location: Error.php");
		}
	}

?>