<?php include "includes/header.php"?>
<?php include "includes/navigation.php"?>
<?php include "includes/db.php"?>
<?php global $connection;?>

<?php
$error="";$success="";$fname="";$lname="";$name_err="";$fname_err="";$lname_err="";$emailErr="";$email_err="";$password_equal="";$password_err="";$username_err="";$address_err="";$mobile="";$mobile_err="";$mobile_format="";$city_err="";$city_format="";$state="";$zip_err="";$zip_format="";

if(isset($_POST['register'])){
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $password2 = trim($_POST['password2']);
    $username = trim($_POST['username']);
    $address = trim($_POST['address']);
    $mobile = trim($_POST['mobile']);
    $city = trim($_POST['city']);
    $state = $_POST['state'];
    $zipcode = trim($_POST['zipcode']);  
    
    //Prevent SQL Injection
    $fname = mysqli_real_escape_string($connection,$fname);
    $lname = mysqli_real_escape_string($connection,$lname);
    $email = mysqli_real_escape_string($connection,$email);
    $password = mysqli_real_escape_string($connection,$password);
    $password2 = mysqli_real_escape_string($connection,$password2);
    $username = mysqli_real_escape_string($connection,$username);
    $address = mysqli_real_escape_string($connection,$address);
    $mobile = mysqli_real_escape_string($connection,$mobile);
    $city = mysqli_real_escape_string($connection,$city);
    $state = mysqli_real_escape_string($connection,$state);
    $zipcode = mysqli_real_escape_string($connection,$zipcode);
    
    
    if(!isset($fname) || trim($fname)==''){
        $fname_err = "Field cannot be empty";
    }else if(!preg_match("/^[\w]+$/",$fname)){
        $name_err = "Enter letters only";
    }
    
    if(!isset($lname) || trim($lname)==''){
        $lname_err = "Field cannot be empty";
    }else if(!preg_match("/^[\w]+$/",$lname)){
        $name_err = "Enter letters only";
    }
    
    if(!isset($email) || trim($email) == ''){
        $email_err = "Field cannot be empty.";
    }
    
    if(!isset($password) || trim($password) == ''){
        $password_err = "Field cannot be empty";
    }else if(!isset($password2) || trim($password2) == ''){
        $password_err = "Field cannot be empty";
    }
    
    if($password !== $password2){
        $password_equal = "Password Fields don't match";
    }
    
    if(!isset($username) || trim($username) == ''){
        $username_err = "Field cannot be empty";
    }
    
    if(!isset($address) || trim($address) == ''){
        $address_err = "Field cannot be empty";
    }
    
    if(!isset($mobile) || trim($mobile) == ''){
        $mobile_err = "Field cannot be empty";        
    }else if(!preg_match('/^[0-9]{10}+$/',$mobile)){
        $mobile_format = "Mobile number Incorrect";
    }
    
    if(!isset($city) || trim($city) == ''){
        $city_err = "Field cannot be empty";
    }
//    }else if(!preg_match('/[^A-Za-z0-9]/',$city)){
//        $city_format = "Enter only characters";
//    }
    
    if(!isset($zipcode) || trim($zipcode) == ''){
        $zip_err = "Field cannot be empty";
    }
//    }else if(!preg_match('/^[0-9]{10}+$/',$zipcode)){
//        $zip_format = "Enter correct zipcode";
//    }
    
        
    
if(!empty($fname) || !empty($lname) || !empty($email) || !empty($password) || !empty($password2) || !empty($username) || !empty($address) || !empty($mobile) || !empty($city) || !empty($state) || !empty($zipcode)){
        $hashFormat = "$2y$10$";
        $salt = "abcdefghijklmnopqrs148";
        $hash_and_salt = $hashFormat . $salt;

        $password = crypt($password,$hash_and_salt);
    
        $query = "INSERT INTO users (fname,lname,username,password,email,address,mobile,city,state,zipcode) VALUES ('$fname','$lname','$username','$password','$email','$address','$mobile','$city','$state','$zipcode')";
    
        $result = mysqli_query($connection,$query);
    
    if(!$result){
        die("Check Connection" . mysqli_error($connection));
    }else{
        $success = "<div class='alert alert-success' role='alert'> Thanks for registering with us. </div>";
    }
}else{
        $error = "*Please check all fields";
    }
    
}


?>


<div class="container" style="width:100%;">
    <form action="register.php" method="post" class="register">
    <p class="signUp">Sign Up</p>
    <hr>
    <span class="error">
    <?php echo $error;?>
    </span>
    <?php echo $success;?>
    <div class="form-row">
     <!-- First Name -->
        <div class="form-group col-md-6">
          <label for="firstName" class="col-form-label">First Name</label>
          <input type="text" class="form-control" id="firstName" placeholder="First Name" name="fname">
          <span class="error">
          <?php echo $fname_err;?>
          <?php echo $name_err;?>
          </span>
        </div>
        <!-- ./First Name-->
        
         <!-- Last Name-->
        <div class="form-group col-md-6">
          <label for="lastName" class="col-form-label">Last Name</label>
          <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lname">
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
          <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
          <span class="error">
          <?php echo $email_err;?>
          <?php echo $emailErr;?>
          </span>
        </div>
        <!-- ./Email Form-->
        
        <!-- Password Form-->
        <div class="form-group">
          <label for="inputPassword4" class="col-form-label">Password</label>
          <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
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
          <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password2">
          <span class="error">
          <?php echo $password_err;?>
          <?php echo $password_equal;?>
          </span>
        </div>
        <!-- ./Password Form-->
    
        <!--Username Form-->
      <div class="form-group">
        <label for="username" class="col-form-label">Username</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Username" name="username">
        <span class="error">
         <?php echo $username_err;?>
         </span>
      </div>
      <!--./Username Form-->
      
      <!-- Address Form-->
      <div class="form-group">
        <label for="inputAddress" class="col-form-label">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
        <span class="error">
        <?php echo $address_err;?>
        </span>
      </div>
    <!-- ./Address Form-->
    
    <!-- Mobile Number Form-->
      <div class="form-group">
        <label for="inputMobile" class="col-form-label">Mobile Number</label>
        <input type="text" class="form-control" id="inputMobile" placeholder="Mobile Number" name="mobile">
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
          <input type="text" class="form-control" id="inputCity" name="city">
          <span class="error">
          <?php echo $city_err;?>
          <?php echo $city_format;?>
          </span>
        </div>
    <!-- ./City Form-->
     
         <!-- State Form-->
        <div class="form-group col-md-4">
          <label for="inputState" class="col-form-label">State</label>
          <select id="inputState" class="form-control" name="state">
<!--
          <option value="Choose State">Choose State</option>
          <option value="WB">West Bengal</option>
-->

          <?php
            $query = "SELECT * FROM states";
            $result1 = mysqli_query($connection,$query);    
              while($row1 = mysqli_fetch_array($result1)):;?>
            <option><?php echo $row1[1];?></option>
            <?php endwhile;?>
          </select>
        </div>
        <!-- ./State Form-->
        
        <!-- Zipcode Form-->
        <div class="form-group col-md-2">
          <label for="inputZip" class="col-form-label">Zip</label>
          <input type="text" class="form-control" id="inputZip" name="zipcode">
          <span class="error">
              <?php echo $zip_err;?>
              <?php echo $zip_format;?>
          </span>
        </div>
        <!-- Zipcode Form-->
      </div>
      <div class="form-group">
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" required> I Accept the terms and conditions.
          </label>
        </div>
      </div>
      <input type="submit" class="btn btn-primary" value="Register" name="register">
      
    </form>
</div>


<?php include "includes/footer.php"?>