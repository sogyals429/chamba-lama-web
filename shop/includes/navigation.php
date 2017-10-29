<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">ChambaLama</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./about.php">About Us</a>
      </li>
    <!-- Products DropDown Menu-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    <!-- ./Products DropDown Menu-->
    </ul>
    
    <?php
      
      if(isset($_POST['search'])){
        $search = $_POST['search_data'];
              
          $query = "SELECT * FROM products WHERE ";
      }
      
      
    ?>

    <form class="form-inline my-2 my-lg-0" action="" method="post">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search_data">
      <button name="search" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
    <ul class="navbar-nav mr-right">
        <li class="nav-item" style="padding-left:10px;">
        <?php 
            if(isset($_SESSION['username'])){
            ?>
             <!-- Profile DropDown Menu-->

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#fff;font-size:18px;">
         <i class='fa fa-user' aria-hidden='true'> <?php echo $_SESSION['username'];?></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="./profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
          <a class="dropdown-item" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Help</a>
         <a href="#" class="dropdown-item"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</a>
          <hr>
            <a class="dropdown-item" href="./logout.php" name="logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
        </div>
      </li>

    <!-- ./Profile DropDown Menu-->
            <?php
            }
            else{
            ?>
                <a href="./login.php"><input type="submit" class="btn btn-outline-primary my-2 my-sm-0" value="Login"></a>
                
                <?php
            }
            
        ?>
    

            </a>
        </li>
    </ul>
  </div>
</nav>