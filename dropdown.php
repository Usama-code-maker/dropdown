<?php
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "readers"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

<html>
    <head>
        <title>Drop</title>
        <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
    </head>






    <body>


<div>Departments </div>
       
<select id="sel_depart">
   <option value="0">- Select -</option>
   <?php 
   // Fetch Department
   $sql_department = "SELECT * FROM department";
   $department_data = mysqli_query($con,$sql_department);
   while($row = mysqli_fetch_assoc($department_data) ){
      $departid = $row['id'];
      $depart_name = $row['depart_name'];
      
      // Option
      echo "<option value='".$departid."' >".$depart_name."</option>";
   }
   ?>
</select>



<div class="clear"></div>

<div>Users </div>
<select id="sel_user">
   <option value="0">- Select -</option>
 <?php 
   // Fetch Department
   $sql_department = "SELECT * FROM users";
   $department_data = mysqli_query($con,$sql_department);
   while($row = mysqli_fetch_assoc($department_data) ){
      $user_id = $row['id'];
      $user_name = $row['user_name'];

      // Option
      echo "<option value='".$user_id."' >".$user_name."</option>";
   }
   ?>
   </select>                 



   <div>desigination </div>
<select id="des_user">
   <option value="0">- Select -</option>
 <?php 
   // Fetch Department
   $sql_department = "SELECT * FROM des_info";
   $department_data = mysqli_query($con,$sql_department);
   while($row = mysqli_fetch_assoc($department_data) ){
      $user_id = $row['id'];
      $user_name = $row['designation'];

      // Option
      echo "<option value='".$user_id."' >".$user_name."</option>";
   }
   ?>
   </select>             

         <?php 
/*


$departid = $_POST['depart_name'];   // department id

$sql = "SELECT id,name FROM users WHERE department=".$departid;

$result = mysqli_query($con,$sql);

$users_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $userid = $row['id'];
    $name = $row['name'];

    $users_arr[] = array("id" => $userid, "name" => $name);
}

// encoding array to json format
echo json_encode($users_arr);*/
?>



<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */


    $("#sel_depart").change(function(){
        var deptid = $('#sel_depart').val();

        $.ajax({
            url: 'ajax.php',
            type: 'post',
            data: {deptid:deptid},
            success:function(response){

                    
                    $("#sel_user").html(response);

                }
            
        });
    });


</script>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */


    $("#sel_user").change(function(){
        var desid = $('#sel_user').val();

        $.ajax({
            url: 'ajax1.php',
            type: 'post',
            data: {desid:desid},
            success:function(response){

                    
                    $("#des_user").html(response);

                }
            
        });
    });


</script>
    </body>
    </html>