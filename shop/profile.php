<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>
<?php include "includes/db.php";?>


<?php
$the_user_id="";$error="";$success="";$fname="";$lname="";$name_err="";$fname_err="";$lname_err="";$emailErr="";$email_err="";$password_equal="";$password_err="";$username_err="";$address_err="";$mobile="";$mobile_err="";$mobile_format="";$city_err="";$city_format="";$state="";$zip_err="";$zip_format="";$user_image="";

    $the_user_id = $_SESSION['user_id'];

    $query = "SELECT * FROM users WHERE user_id='$the_user_id'";
    $select_user_profile = mysqli_query($connection,$query);
    
while($row=mysqli_fetch_assoc($select_user_profile)){
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $password = $row['password'];
        $password2 = $row['password'];
        $username = $row['username'];
        $address = $row['address'];
        $mobile = $row['mobile'];
        $city = $row['city'];
        $zipcode = $row['zipcode'];
        $user_image = $row['user_image'];
}if(!$select_user_profile){
    die("Check Connection".mysqli_error($connection));
}else{
        if(isset($_POST['update'])){
            $user_image = $_FILES['image']['name'];
            $user_image_temp = $_FILES['image']['tmp_name'];
            
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            
            move_uploaded_file($user_image_temp, "./images/$user_image");
            
            
            
        }

}
?>

<!-- Page Content -->
    <div class="container" id="container" style="background-color:#fff;margin-top:20px;width:100%">
        
        <div class="row">
            
            <div class="col-md-3">
                <p class="lead"></p>
                <div class="list-group">
                    <a href="about.php" class="list-group-item active">Profile</a>
                    <a href="#" class="list-group-item">Address</a>
                </div>
            </div>

            <div class="col-md-9">
                   <h1>Profile</h1>
                   <hr>
        <form action="profile.php" method="post" enctype="multipart/form-data">
    <span class="error">
    <?php echo $error;?>
    </span>
    <?php echo $success;?>
    <div class="form-row">
    
    <div class="form-group col-md-12">
        <img src="./images/<?php echo $user_image;?>" alt="">
         <div class="form-group">
            <label for="Change Profile">Change Profile Image</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
          </div>
    </div>
     <!-- First Name -->
        <div class="form-group col-md-6">
          <label for="firstName" class="col-form-label">First Name</label>
          <input type="text" class="form-control" id="firstName" value='<?php echo $fname;?>' name="fname">
          <span class="error">
          <?php echo $fname_err;?>
          <?php echo $name_err;?>
          </span>
        </div>
        <!-- ./First Name-->
        
         <!-- Last Name-->
        <div class="form-group col-md-6">
          <label for="lastName" class="col-form-label">Last Name</label>
          <input type="text" class="form-control" id="lastName" value='<?php echo $lname;?>' name="lname">
          <span class="error">
          <?php echo $lname_err;?>
          <?php echo $name_err;?>
          </span>
        </div>
        <!-- ./Last Name-->
    </div>
        <!-- Email Form-->
        <div class="form-group">
          <label for="inputEmail4" class="col-form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail4" value='<?php echo $email;?>' name="email">
          <span class="error">
          <?php echo $email_err;?>
          <?php echo $emailErr;?>
          </span>
        </div>
        <!-- ./Email Form-->
        
        <!-- Password Form-->
        <div class="form-group">
          <label for="inputPassword4" class="col-form-label">Password</label>
          <input type="password" class="form-control" id="inputPassword4" value='<?php echo $password;?>' name="password">
          <span class="error">
          <?php echo $password_err;?> 
          <?php echo $password_equal;?>
          </span>
        </div>
        <!-- ./Password Form-->
        
         <!-- Password Form-->
        <div class="form-group">
          <label for="inputPassword4" class="col-form-label">
          Re-enter Password</label>
          <input type="password" class="form-control" id="inputPassword4" value='<?php echo $password2;?>' name="password2">
          <span class="error">
          <?php echo $password_err;?>
          <?php echo $password_equal;?>
          </span>
        </div>
        <!-- ./Password Form-->
    
        <!--Username Form-->
      <div class="form-group">
        <label for="username" class="col-form-label">Username</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Username" name="username" value="<?php echo $username;?>">
        <span class="error">
         <?php echo $username_err;?>
         </span>
      </div>
      <!--./Username Form-->
      
      <!-- Address Form-->
      <div class="form-group">
        <label for="inputAddress" class="col-form-label">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" value="<?php echo $address?>">
        <span class="error">
        <?php echo $address_err;?>
        </span>
      </div>
    <!-- ./Address Form-->
    
    <!-- Mobile Number Form-->
      <div class="form-group">
        <label for="inputMobile" class="col-form-label">Mobile Number</label>
        <input type="text" class="form-control" id="inputMobile" placeholder="Mobile Number" name="mobile" value="<?php echo $mobile;?>">
        <span class="error">
        <?php echo $mobile_err;?>
        <?php echo $mobile_format;?>
        </span>
      </div>
    <!-- ./Mobile Number Form-->
    
      <!-- City Form-->
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity" class="col-form-label">City</label>
          <input type="text" class="form-control" id="inputCity" name="city" value="<?php echo $city;?>">
          <span class="error">
          <?php echo $city_err;?>
          <?php echo $city_format;?>
          </span>
        </div>
    <!-- ./City Form-->
     
         <!-- State Form-->
        <div class="form-group col-md-4">
          <label for="inputState" class="col-form-label">State</label>
          <select id="inputState" class="form-control">Choose
          <option value="<?php echo $state;?>"></option>
<!--
          <?php
            $query = "SELECT * FROM states";
            $result1 = mysqli_query($connection,$query);    
              while($row1 = mysqli_fetch_array($result1)):;?>
            <option><?php echo $row1[1];?></option>
            <?php endwhile;?>
-->
          </select>
        </div>
        <!-- ./State Form-->
        
        <!-- Zipcode Form-->
        <div class="form-group col-md-2">
          <label for="inputZip" class="col-form-label">Zip</label>
          <input type="text" class="form-control" id="inputZip" name="zipcode" value="<?php echo $zipcode?>">
          <span class="error">
              <?php echo $zip_err;?>
              <?php echo $zip_format;?>
          </span>
        </div>
        <!-- Zipcode Form-->
      </div>
      <input type="submit" class="btn btn-primary" value="Update Profile" name="update">
    </form>
            </div>

        </div>

    </div>
<!--./ Page Content -->

<?php include "includes/footer.php"?>