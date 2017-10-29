<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>
<?php include "includes/db.php";?>



<?php
    $success="";$name="";$mobile="";$comment="";$name_err="";
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $comment = $_POST['comment'];
        
        if(!isset($name) || trim($name)){
            $name_err = "Field cannot be empty.";
        }else if(!preg_match("/^[\w]+$/",$name)){
            $name_err = "Enter only letters";
        }
        
        if(!isset($mobile) || trim($mobile)){
            $mobile_err = "Field cannot be empty";
        }else if(!preg_match('/^[0-9]{10}+$/',$mobile)){
            $mobile_err = "Enter only numbers";
        }
        
        $query = "INSERT INTO contact(name,mobile,query) VALUES('$name','$mobile','$comment')";
        $post_query = mysqli_query($connection,$query);
        
        if(!$post_query){
            die("Check Connection".mysqli_error($connection));
        }else{
            $success = "<div class='alert alert-success' role='alert'> Thanks for contacting with us. We will be with you shortly. </div>";
        }
    }
?>
        
<!-- Page Content -->
    <div class="container" id="container" style="background-color:#fff;margin-top:20px;width:100%;">
        <?php echo $success;?>
        <div class="row">

            <div class="col-md-3">
                <p class="lead"></p>
                <div class="list-group">
                    <a href="about.php" class="list-group-item">Who We Are</a>
                    <a href="contact.php" class="list-group-item active">Contact Us</a>
                </div>
            </div>

            <div class="col-md-9">
                <h1>Contact Us</h1>
                <hr>
                <form action="contact.php" method="post">
                   <div class="form-group">
                       <label for="Name">Name:</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name">
                        <br>
                        <label for="Mobile">Mobile Number:</label>
                            <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile">
                        <br>
                        <label for="Query">Enter your Query:</label>
                        <br>
                            <textarea name="comment" cols="30" rows="4"></textarea>
                        <br>
                        <input type="submit" value="Submit" class="btn btn-success" name="submit">
                    </div>
                </form>
            </div>

        </div>

    </div>
<!--./ Page Content -->

<?php include "includes/footer.php";?>