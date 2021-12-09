<?php require_once("../resources/config.php"); ?>
<?php

if(isset($_GET['id'])) {

	$first_name    		= escape_string($_POST['first_name']);
	$last_name 	   		= escape_string($_POST['last_name']);
	$username_prof 		= escape_string($_POST['username_prof']);
	$password_prof 		= md5(escape_string($_POST['password_prof']));
	$bpassword_prof		= escape_string($_POST['password_prof']);

if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) 
{
    $sql = "SELECT profile FROM customers WHERE user_id = ".$_GET['id']." ";
    $results = query($sql);

    if(row_count($results) == 1) {
        $row = fetch_array($results);
        $profile = $row['profile'];
    }
    $rename  =  $profile;

}
else
{
	$profile       		= $_FILES['file']['name'];
    $image_temp_location= $_FILES['file']['tmp_name'];
	$target_dir = UPLOAD_DIRECTORY_PROFILE."/";
	$target_file = $target_dir .  date('d_m_Y_H_i_s') . '_'. $profile;
	$rename = date('d_m_Y_H_i_s') . '_'. $profile;
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

	// Move the file
	move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

}
    $query  = "UPDATE customers SET ";
    $query .= "first_name = '{$first_name}'    , ";
    $query .= "last_name  = '{$last_name}'     , ";
    $query .= "username   = '{$username_prof}' , ";
    $query .= "password   = '{$password_prof}' , ";
	$query .= "profile    = '{$rename}' 	   , ";
    $query .= "bpassword  = '{$bpassword_prof}' ";
    $query .= "WHERE user_id=" . escape_string($_GET['id']);

    $send_update_query = query($query);
    confirm($send_update_query);
         
}
?>
<script>
	window.alert('Account updated successfully!');
	window.location.replace("index.php");
</script>