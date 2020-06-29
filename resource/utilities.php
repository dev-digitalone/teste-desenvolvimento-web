<?php

function check_empty_fields($required_fields_array){
    
    $form_errors = array();

   
    foreach($required_fields_array as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL){
            $form_errors[] = $name_of_field . " is a required field";
        }
    }

    return $form_errors;
}

function check_min_length($fields_to_check_length){
    
    $form_errors = array();

    foreach($fields_to_check_length as $name_of_field => $minimum_length_required){
        if(strlen(trim($_POST[$name_of_field])) < $minimum_length_required){
            $form_errors[] = $name_of_field . " is too short, must be {$minimum_length_required} characters long";
        }
    }
    return $form_errors;
}

function check_email($data){
    
    $form_errors = array();
    $key = 'email';
    
    if(array_key_exists($key, $data)){

        if($_POST[$key] != null){

            $key = filter_var($key, FILTER_SANITIZE_EMAIL);

            if(filter_var($_POST[$key], FILTER_VALIDATE_EMAIL) === false){
                $form_errors[] = $key . " is not a valid email address";
            }
        }
    }
    return $form_errors;
}


function show_errors($form_errors_array){
    $errors = "<p><ul style='color: red;'>";

    foreach($form_errors_array as $the_error){
        $errors .= "<li> {$the_error} </li>";
    }
    $errors .= "</ul></p>";
    return $errors;
}

function flashMessage($message,$color='red'){ 
	if( $color === 'red' ){
			$data = "<div class='alert alert-danger'>{$message}</div>";
	}else{
			$data = "<div class='alert alert-success'>{$message}</div>";
	}
	return $data;
}
###########################################################################################################################

function redirectTO($page){
	header("location: {$page}.php");
}


function checkDuplicasy($input, $columnName, $databaseName, $tableName, $db){ 
	try{					
		$sqlQuery = "SELECT {$columnName}
					FROM {$databaseName}.{$tableName}
					WHERE {$columnName}=:input";

		$statement = $db->prepare($sqlQuery);

		$statement->execute( array(':input'=>$input) );
		if($statement->rowcount()==1){
			$status = true;
			$message = "Sorry this {$columnName} is already taken ";
		}else{
			$status = false;
			$message = NULL;
		}
	}catch(PDOException $ex){
		$status = 'exception';
		$message = "An error occoured : DURING THE CHECKING OF DUPLICASY OF {$columnName} IN {$databaseName}->{$tableName} ==> {$ex->getMessage()}";
	}
	$returnThis = array('status'=>$status, 'message'=>$message);
	return $returnThis;
}

function checkDuplicasy_filterMe($input, $columnName, $databaseName, $tableName, $db){
	
	try{					
		$sqlQuery = "SELECT {$columnName}
					FROM {$databaseName}.{$tableName}
					WHERE {$columnName}=:input 
					AND id != :id";

		$statement = $db->prepare($sqlQuery);

		$statement->execute( array(':input'=>$input, ':id'=>$_SESSION['id'] ) );
		if($statement->rowcount()==1){
			$status = true;
			$message = "Sorry this {$columnName} is already taken ";
		}else{
			$status = false;
			$message = NULL;
		}
	}catch(PDOException $ex){
		$status = 'exception';
		$message = "An error occoured : DURING THE CHECKING OF DUPLICASY OF {$columnName} IN {$databaseName}->{$tableName} ==> {$ex->getMessage()}";
	}
	$returnThis = array('status'=>$status, 'message'=>$message);
	return $returnThis;
}


###########################################################################################################################
function welcomeMessage($username){ 
$message ="<script type='text/javascript'>
				swal({
  					title: 'Welcome {$username}!',
  					text: 'Its good to have you here',
  					timer: 3000,
  					type: 'success',
  					showConfirmButton: false
				});
	  				setTimeout(function(){
	    				window.location.href='index.php'; 
	  				}, 2000);
				</script>";

	
	return $message;
}

###########################################################################################################################
function popupMessage($title, $text, $type, $page){ 
$message ="<script type='text/javascript'>
				swal({
  					title: '{$title}',
  					text: '{$text}',
  					timer: 6000,
  					type: '{$type}',
  					showConfirmButton: false
				});
	  				setTimeout(function(){
	    				window.location.href='{$page}'; 
	  				}, 5000);
				</script>";

	
	return $message;
}

###########################################################################################################################
function confirmLogout(){

	$message = "<script type='text/javascript'>
					swal({
		  				title: 'Are you sure?',
		  				text: 'You want to log out ?',
		  				type: 'warning',
		  				
		  				showCancelButton: true,
		  				confirmButtonColor: '#DD6B55',
		  				
		  				confirmButtonText: 'Yes, Logout',
		  				cancelButtonText: 'cancel',
		  				
		  				closeOnConfirm: false,
		  				closeOnCancel: false
						},
					function(isConfirm){
		  				if (isConfirm) {
		    				swal({
				  				title: 'Come later',
				  				text: 'You are successfully loged out ',
				  				type: 'success',
				  				timer: 6000
				  				}),
							".session_destroy()."
		  				} else {
		    				swal({
				  				title: 'Hurray!!',
				  				text: 'Your are currently loged in :)',
				  				type: 'success',
				  				timer: 6000
				  			})
		  				}
						});
				</script>";

	return $message;
}

###########################################################################################################################
function rememberMe($id){
	$encryptId = base64_encode("7859739".$id."7359837") ; # making it more secure
	setcookie('authenticationSystem',$encryptId,time()+60*60*24*100,"/");
}

###########################################################################################################################

function isCookieValid($db){
	$isValid = false;
	if ( isset($_COOKIE['authenticationSystem']) ) {

		
		$decryptData = base64_decode($_COOKIE['authenticationSystem']);

		$break_1 = explode(7859739, $decryptData);
		$break_2 = explode(7359837, $break_1[1]);
		$decryptId = $break_2[0];

		
		try{
			$sqlQuery = "SELECT * 
						FROM register.users 
						WHERE id = :id";
			$statement=$db->prepare($sqlQuery);
			$statement->execute( array(':id'=>$decryptId) );

			if ($row = $statement->fetch()) {

				$username = $row['username'];
				$id = $row['id'];
				
				$_SESSION['id']= $id;
				$_SESSION['username']= $username; 

				$isValid = true;
					
			}else{
					
				echo popupMessage('Oops..',"this id does not exists in our database",'error','index.php');
				echo popupMessage('try this!',"try deleting your cookies for this site..",'error','index.php');
				$isValid = false;
				redirectTO("logout");
			}
		}catch(PDOException $ex){
			echo popupMessage('Oops..', "something went wrong ,WHILE CHECKING THE USER'S ID IN THE DATABASE,".$ex->getMessage(),'error','index.php');
		}
	}
	return $isValid;		
}
###########################################################################################################################

function guard(){
$isValid = true;
$inactive = 60*30;  

$fingerPrint = md5(  $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']  ); 
	if ( isset($_SESSION['fingerPrint']) && ($fingerPrint != $_SESSION['fingerPrint']) && isset($_SESSION['username']) ) {
		$isValid = false;
		redirectTO('logout');
	}elseif(isset($_SESSION['lastActive']) && (time()-$_SESSION['lastActive'] > $inactive) && isset($_SESSION['username'])){
		$isValid = false;

		
		redirectTO('logout');
	}else{

		$_SESSION['lastActive'] = time(); 

		$_SESSION['fingerPrint'] = $fingerPrint;

		echo dateTime1($_SESSION['lastActive']);
		echo "  hello ";
	}

return $isValid; 

}
###########################################################################################################################
function dateTime1($dateTime){ 
	$date = new DateTime(); 
	$date->setTimestamp($dateTime);		
	$date_string = date_format($date,'U=Y-m-d H:i:s');

	return $date_string;
}

function dateTime2($dateTime){
	$date_string = strftime( "%d %b %y", strtotime($dateTime) );
	return $date_string;
	
}

###########################################################################################################################
function Not_authorized($message,$page,$link_ame){
	$returnMesssage= "<div class=\"container\" align=\"center\" style=\"padding-top: 30%\" >
						<section>
							<p class=\"lead\"> {$message} </br> <a href=\"{$page}\" >{$link_ame} </a> </p>
							<p class=\"lead\">HACK US !  and please give us <a href=\"feedback.php\">feedback</a>  on our security! </p>
						</section>
					</div>";
	return $returnMesssage;
}
###########################################################################################################################
function isValidImage($file){
	$form_errors = array(); 

	
	$part = explode(".", $file);
	$ext = end($part);

	$ext = strtolower($ext); 
	switch ($ext) {
		case 'jpg':
		case 'png':
		case 'gif':
		case 'bmp':

		return $form_errors;  
	}
	
	$form_errors[] = " \" {$ext} \" is not a valid image file extension";
	return $form_errors;
}

function _token(){
	$randomToken = base64_encode(openssl_random_pseudo_bytes(32))."open ssl<br>"; 
	$_SESSION['token'] = $randomToken;
	
	return $_SESSION['token'];
}

function validate_token($requestToken){
	if( isset($_SESSION['token']) && $requestToken === $_SESSION['token'] ){ 
		unset($_SESSION['token']);
		return true;
	}
	return false; 

}

?>