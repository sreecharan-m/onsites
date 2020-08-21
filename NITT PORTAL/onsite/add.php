<?php

$status='';
$conn=mysqli_connect('localhost','shaun','test1234','onsite');

if(isset($_POST['submit']))
{

	$n = $_POST['name'];
	$rn = $_POST['rollno'];
    $sql = "INSERT INTO users(name, rollno) VALUES('$n', '$rn') ";

      if(mysqli_query($conn,$sql))
      {
            //echo "success";
            $status="Added successfully";
      }
      else
      {
            $status="failed";
      }

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Add NITT</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>

<style type="text/css">
	
  #fullcontent {

  	 width: 100vw;
  	 height: 100vh;
  	 display: flex;
  	 flex-direction: column;
  	 justify-content: center;
  	 align-items: center;
  	 background-color: #00bfff;
  }

  body {
  	margin: 0px;
  	padding: 0px;
  }


  .entries {

    	margin-top: 2vh;
        padding: 5px;
    }

    .id {

    	text-align: left;
    	margin-top: 1.5vh;
    	font-weight: 900;
    	font-size: 25px;

    }

    .value {
    	margin-top: 1vh;
    }

    input {

    	width: 350px;
    	height: 20px;
    	font-size: 18px;
    	padding: 5px;
    	text-align: center;
    	border: 2px solid #000;
    }

    form {

    	margin-top: 0px;
    }

    #submit {
    	text-align: center;
    	margin-top: 8vh;
    }

    #signup {

    	padding: 9px 20px 9px 20px;
    	font-size: 20px;
        color: #00ff7f;
        background-color: #000;
        cursor: pointer;
    }
    
    a{
    	text-decoration: none;
    }
    
    #heading {

   	height: 5vh;
   	width: 100%;
   	text-align: center;
   	font: 30px Open Sans;
   	color: #000;
   	font-weight: 900;
   	margin-top: 5vh;
   }


</style>

</head>


<body>

      <div id="fullcontent">
      	
            <div id="heading">
               NITT Portal - Add
            </div>

            <div id="form" style="margin-top: 10vh;">
            	
                    <form method="POST" action="add.php">
             
             <div class="entries">
             	
             	<div class="id">
             		NAME:
             	</div>

             	<div class="value">
             		 
             		<input type="text" name="name" id="name">

             	</div>

             </div>


             <div class="entries">
             	
             	<div class="id">
             		Roll NO:
             	</div>

             	<div class="value">
             		 
             		<input type="number" name="rollno" id="username">

             	</div>

             </div>


             <div id="submit">
             	<button id="signup" name="submit">ADD</button>
             </div>

                <div class="entries">
             	
             	<div class="id" style="text-align: center;">
             		<?php echo "$status"; ?>
             	</div>

                </div>
            
            </form>

           </div>

      </div>

</body>

</html>