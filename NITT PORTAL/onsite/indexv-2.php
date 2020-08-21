<?php

$conn=mysqli_connect('localhost','shaun','test1234','onsite');

if(isset($_POST['search']))
{
   

	if($_POST['t'] == 1)
	{
        $res = "<ul><li>No Matching Data</li></ul>";
        $q = $_POST['q'];
        $sql = "SELECT * FROM users WHERE name LIKE '%$q%'";
        $result = mysqli_query($conn, $sql);
        $data= mysqli_fetch_all($result, MYSQLI_ASSOC);

        $res = "<ul>";
        foreach($data as $key)
        {
        	$res .= "<li>" . $key['name'] ."<span>" . "<a href='http://localhost/onsite/delete.php?id=" . $key['id'] . " '; target= '_blank' >" . "Delete</a>" . "</span>" . "</li>";
        }
        //echo "hai";

        $res .= "</ul>";
	}

	else if($_POST['t'] == 2)
	{
        $res = "<ul><li>No Matching Data</li></ul>";
        $q = $_POST['q'];
        $sql = "SELECT rollno FROM users WHERE rollno LIKE '%$q%'";
        $result = mysqli_query($conn, $sql);
        $data= mysqli_fetch_all($result, MYSQLI_ASSOC);

        $res = "<ul>";
        //print_r($data);
        foreach($data as $key)
        {
        	$res .= "<li>" . $key['rollno'] . "</li>";
        }

        $res .= "</ul>";
	}

    exit($res);
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>NITT Search</title>

	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>

<style type="text/css">
	
   body{

   	 margin:0px;
   	 padding: 0px;
   	 background-color: #00bfff;
   }

   #fullcontent {

   	 
   	 width: 100vw;
   	 height: 100vh;
     display: flex;
     flex-direction: column;
     align-items: center;
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

   #actions {

   	 width: 100%;
   	 display: flex;
   	 flex-direction: row;
   	 justify-content: space-around;
   	 margin-top: 10vh;
   }

   .actions {

   	 padding: 7px 15px 7px 15px;
   	 background-color: #000;
   	 color: #00ffff;
   	 font: 19px Open Sans;
   }

   #searches {

   	 width: 100%;
   	 margin-top: 12vh;
   	 display: flex;
   	 justify-content: space-around;
   }

   #searchname {

   	 width: 400px;
   	 border: 1.5px solid #000;
   	 height: 35px;
   	 font: 19px Open Sans;
   }

   #searchnumber {

   	 width: 400px;
   	 border: 1.5px solid #000;
   	 height: 35px;
   	 font: 19px Open Sans;
   }

   a {

   	 text-decoration: none;
   	 color: #00ffff;
   }

   ul {

   	 list-style-type: none;
   }

   li {
   	 list-style-type: none;
   	 font: 17px Open Sans;
   	 margin-top: 20px;

   }

   span {

    margin-left: 10px;
    font:16px Open Sans ;
    padding-right: 5px;
    padding-left: 5px;
    background-color: #000;
   }

   #searchdept {

     width: 400px;
     border: 1.5px solid #000;
     height: 35px;
     font: 19px Open Sans;
   }

   #dept {

    margin-top: 8vh;
   }


</style>

</head>

<body>

     <div id="fullcontent">
     	
       <div id="heading">
          NITT Search Portal
       </div>

       <div id="actions">

       	   <div class="actions"><a href="http://localhost/onsite/add.php" target="_blank">Add</a></div>
       	   <div class="actions"><a href="http://localhost/onsite/update.php" target="_blank">Update</a></div>
       	   <div class="actions"><a>Delete</a></div>
       	
       </div>

       <div id="dept">
         
             <input type="number" id="searchdept" placeholder="Enter rollno to find dept"> <span style="margin-left: 30px; padding: 0px;"><button onclick="finddept();" style="margin-left: 0px; background-color: #000; color: #00ffff; outline: none; border: none; padding: 10px 15px 10px 15px; font:16px Open Sans;">Search</button></span>

             <p id="dd" style="text-align: center; font: 22px Open Sans;"></p>

       </div>

       <div id="searches">
       	
            <div>
            	<input type="text" name="searchname" id="searchname" placeholder="Enter name...">
                <div id="resname"></div>
            </div>

            <div><input type="text" name="searchnumber" id="searchnumber" placeholder="Enter number..."><div id="resnumber"></div></div>

       </div>

     </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  
  <script type="text/javascript">

    var a = document.getElementById('searchdept');
    var dd= document.getElementById('dd');
  	
        $(document).ready(function(){

           $("#searchname").keyup(function(){

               var query = $("#searchname").val();

               if(query.length > 0)
               {
               	  $.ajax({

                        url: 'indexv-2.php',
                        method: 'POST',
                        data: {

                        	search:1,
                        	t:1,
                        	q:query
                        },

                        success: function(data){

                        	$("#resname").html(data);
                        },
                        dataType: 'text'
               	  });
               }

           });
        });


        $(document).ready(function(){

           $("#searchnumber").keyup(function(){

               var query = $("#searchnumber").val();

               if(query.length > 0)
               {
               	  $.ajax({

                        url: 'index.php',
                        method: 'POST',
                        data: {

                        	search:1,
                        	t:2,
                        	q:query
                        },

                        success: function(data){

                        	$("#resnumber").html(data);
                        },
                        dataType: 'text'
               	  });
               }

           });
        });

    function finddept() {

       let av = a.value;
       let q = new Array();
       //console.log(av);
       //console.log(av.length);
       for(i=0; i<3; i++)
       {
            q[i] = av[i];
       }
       //console.log('hai');
       let p = q.toString();
       console.log(q);
       console.log(p);
       switch(p)
       {
         case '1,0,8' : dd.innerHTML = 'Electronics and Communication Department';
                      break;
         case '1,0,7' : dd.innerHTML = 'Electrical Electronics Department';
                      break;
         case '1,0,6' : dd.innerHTML = 'Computer Science Department';
                      break;                          
         case '1,0,3' : dd.innerHTML = 'Civil Department';
                      break;
         case '1,0,1' : dd.innerHTML = 'Architecture Department';
                      break;             

         case '1,1,0' : dd.innerHTML = 'Instrumentation and Control Department';
                      break;
         case '1,1,4' : dd.innerHTML = 'Production Department';
                      break;  
         case '1,1,2' : dd.innerHTML = 'Metallurgy Department';
                      break;
         case '1,0,3' : dd.innerHTML = 'Civil Department';
                      break; 
         case '1,1,1' : dd.innerHTML = 'Mechanical Department';
                      break; 
         case '1,0,2' : dd.innerHTML = 'Chemical Department';
                      break;                                                                
       }

       //console.log(dd.innerHTML);
    }    

  </script>   

</body>

</html>