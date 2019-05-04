<?php 
include "config.php";

?>
<!doctype html>
<html>
    <head>
        <title>Users</title>
        <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
   
        <script src='jquery-3.1.1.min.js' type='text/javascript'></script>
        <script src='bootstrap/js/bootstrap.min.js' type='text/javascript'></script>
        <link rel="stylesheet" type="text/css" href="user.css">
    </head>
    <body >

        <div class="container" >
          <h2>CLICK ON VIEW TO SEE DETAILS:</h2>
            <!-- Modal -->
            <div class="modal fade" id="empModal" role="dialog" >
                <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content" >
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">User Info</h4>
                        </div>
                        <div class="modal-body" >
                          
                        </div>
                        <div class="modal-footer">
                          <a href="transfer.php" style="animation: none;text-decoration: none;"><button class="button" style="vertical-align:middle;" ><span>Transfer Credits </span></button></a>
                        </div>
                    </div>
                  
                </div>
            </div>

            <br/>
            <table border='1' style='border-collapse: collapse;'>
                <tr>
                    <th>Name</th>
                    <th>E-mail.</th>
                    <th>View</th>
                </tr>
                <?php 
                
                $query = "select * from user";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id'] ;         
                    $name = $row['name'];
                    $email = $row['email'];

                    echo "<tr>";
                    echo "<td>".$name."</td>";
                    echo "<td>".$email."</td>";
                    echo "<td><button id='butinfo_".$id."' class='userinfo'>View</button></td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <script type='text/javascript'>
            $(document).ready(function(){

                $('.userinfo').click(function(){
                    var id = this.id;
                    var splitid = id.split('_');
                    var userid = splitid[1];
                   
                 
                    $.ajax({
                        url: 'ajax.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                          
                            $('.modal-body').html(response); 

                            $('#empModal').modal('show'); 
                        }
                    });
                    $.ajax({
                        url: 'transfer.php',
                        type: 'post',
                        data: {userid: userid},
                    });

                });
            });
            </script>
        </div>
    </body>
</html>

        