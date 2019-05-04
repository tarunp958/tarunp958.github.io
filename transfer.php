<html>
   <head>
      <title>Select Box Control</title>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
      <style type="text/css">
        .form{
          align-content: center;
          padding: 25%;
          padding-top: 10%;
        }
        select{
          border-radius: 4px;
          width:200px;
        }
        input{
          border-radius: 4px;
          width: 200px;
        }
        span{
          padding-top: 10px;
        }
        
      </style>
   </head>
   <body>
    <div class="form" align="center">
      <fieldset>
      <form method = "post" action = "<?php $_PHP_SELF ?>">
         <select name = "dropdown" id="sel">
            <datalist id="select">
            <option value="">Select User</option>
            <?php

                include "config.php";
                $query = "select * from user";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id'] ;         
                    $name = $row['name'];
                    echo "<option value = ".$name." id=".$id." >".$name."</option>";
                }
                ?>
            </datalist>
          </select>
          <br>
          <span> <input type="number" name = "update" id="pass" placeholder="Enter credit to transfer" min="0" max="20000"></span><br>
          <span> <input  type = "submit" id = "up" value = "Submit" onclick="update()"></span>
         
      </form>
    </fieldset>
    </div>
   </body>
   <script type='text/javascript'>
     function update(){
          <?php

          $add = $_POST['dropdown'];
          $pass = $_POST['update'];
          $temp="Select id from session where name ='a'";
          $userid = mysqli_query($con,$temp);
          while( $row=mysqli_fetch_array($userid) ){
             $temp=$row['id'];
          }
          $qadd = "UPDATE user SET credit = credit +".$pass." WHERE name = '".$add."'";
          $radd=mysqli_query($con,$qadd);
          
           $qsub = "UPDATE user SET credit = credit -".$pass." WHERE id = ".$temp;
          $rsub=mysqli_query($con,$qsub);
            if($radd and $rsub){
                 $message = "TRANSFER SUCCESSFUL";
                  echo "<script type='text/javascript'>alert('$message');</script>"; 
                  header('Location:user.php');
           }
           else{
                echo("Error description: " . mysqli_error($con));
           }
          ?>
        }
        
 

   </script>


</html>