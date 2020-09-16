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


 
   // Fetch Department
   $sql_department = "SELECT * FROM users where department = ".$_POST['deptid'];
   $department_data = mysqli_query($con,$sql_department);
   while($row = mysqli_fetch_assoc($department_data) ){
      $user_id = $row['id'];
      $user_name = $row['user_name'];
?>
      
      <option value='<?php echo $user_id; ?>' ><?php echo $user_name; ?></option>";
<?PHP
   }
   ?>