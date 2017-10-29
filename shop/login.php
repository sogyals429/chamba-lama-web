<?php include "includes/header.php"?>
<?php include "includes/navigation.php"?>
<?php include "includes/db.php"?>


<?php 
    $success = "";$error="";
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM users";
        $select_user_query = mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_user_query)){
            $user_id = $row['user_id'];
            $username1 = $row['username'];
            $email1 = $row['email'];
            $password1 = $row['password'];
        }
        
        $hashFormat = "$2y$10$";
        $salt = "abcdefghijklmnopqrs148";
        $hash_and_salt = $hashFormat . $salt;

        $password = crypt($password,$hash_and_salt);
        
        if($email==$email1 && $password==$password1 || $email==$username1 && $password==$password1){
            $success = "<div class='alert alert-success' role='alert'>Login successful.</div>";
            $_SESSION['username'] = $email;
            $_SESSION['user_id'] = $user_id;
            header("Location:index.php");
        }else{
            $error = "<div class='alert alert-danger' role='alert'>Please check login credentials.</div>";
        }
        
        
    }
?>


<div class="container">
  <?php echo $success?>
  <?php echo $error;?>
   <div class="login">
    <form action="login.php" method="post" class="login">
     <p class="login1">Login</p>
      <div class="form-group">
        <label for="exampleInputEmail1" class="text">Email address</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        <small id="emailHelp" class="hint">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1" class="text">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
      </div>
    
    <!--Add Remember Me feature later-->
     <!--
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input">
          Remember Me
        </label>
      </div>
--> 
      <input type="submit" class="btn btn-primary" name="login" value="Login">
      <a href="register.php" class="btn btn-info">Register</a>
      <div class="forgot">
          <label for="forgotPassword" class="text"><a href="#">Forgot Password?</a></label>
      </div>
    </form>
    </div>
</div>

<?php include "includes/footer.php"?>