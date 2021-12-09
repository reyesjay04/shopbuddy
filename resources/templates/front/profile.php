<?php require_once("../resources/config.php"); ?>
<?php 
if(isset($_POST['update'])) {
  echo "123";
}

if(!isset($_SESSION['email'])) {

} else {


$sql = query("SELECT * FROM customers WHERE email = '".$_SESSION['email']."' ");
confirm($sql);

while($row = fetch_array($sql)) {

    $profile = display_profile($row['profile']);
  # code...


?>
<form method="post" enctype="multipart/form-data" action="save_profile.php?id=<?php echo $row['user_id']?>">
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Manage Account</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="col-md-6">
            <img id="blah" style="max-height: 150px; max-width: 239px;" src="../resources/<?php echo $profile; ?>" alt="">
          <div class="form-group">
            <label for="product-title">Profile picture</label>
            <input type="file" name="file" onchange="readURL(this);">
          </div>
          </div>
          <div class="col-md-6">
            <div class="form-group" style="margin-bottom: 0px;">
              <label for="product-title">Email Address</label>
              <input type="email" name="email" id="email_prof" tabindex="1" class="form-control"  value="<?php echo $row['email'];?>" readonly >
            </div>
            <div class="form-group" style="margin-bottom: 0px;">
              <label for="product-title">Contact Number</label>
              <input type="text" name="contact" id="contact_prof" tabindex="1" class="form-control" value="<?php echo $row['contact_number'];?>" readonly >
            </div> 
          </div>
        </div>
        <div class="container-fluid">
            <div class="form-group" style="margin-bottom: 0px;">
              <label for="product-title">First Name</label>
              <input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" value="<?php echo $row['first_name'];?>" required >
              <label for="product-title">Last Name</label>
              <input type="text" name="last_name" id="last" tabindex="1" class="form-control" value="<?php echo $row['last_name'];?>"required >
            </div>          
            <div class="form-group" style="margin-bottom: 0px;">
              <label for="product-title">Username</label>
              <input type="text" name="username_prof" id="username_prof" tabindex="1" class="form-control"  value="<?php echo $row['username'];?>" required >
            </div>
            <div class="form-group" style="margin-bottom: 0px;">
              <label for="product-title">Password</label>
              <input type="password" name="password_prof" id="password_prof" tabindex="1" class="form-control" value="<?php echo $row['bpassword'];?>" required >
              <input type="checkbox" onclick="myFunction6()">Show Password
            </div>            

            <div class="form-group" style="margin-bottom: 0px;">
            </div>          
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="update" class="btn btn-default">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="reload()">Close</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php
}
}
?>
<script type="text/javascript">
function myFunction6() {
var x = document.getElementById("password_prof");
if (x.type === "password") {
  x.type = "text";
} else {
  x.type = "password";
}
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
function reload() {
  // location.reload();
}

</script>