
  <!-- jQuery library -->
<link rel="stylesheet" href="<?php echo URLROOT . 'css/admin.css'; ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/a8598e67d0.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div id="fixedNav">
<nav  class="navbar navbar-expand-lg navbar-dark mb-4 navbar">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT . 'public'; ?>">Home</a>
        </li>
         
        
        

		 <li class="nav-item dropdown">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php if (isset($_SESSION['userType_id'])) {
              ?> <i class="fas fa-user"></i> <?php echo $_SESSION['user_name'];
            } else {
              echo 'User';
            }
            ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php if (isset($_SESSION['userType_id'])) : ?>
              <li>
              <li><a class="dropdown-item" href="<?php echo URLROOT . 'pages/ViewProfile'; ?>">View Profile</a></li>
                <a class="dropdown-item" href = "<?php echo URLROOT . 'pages/editProfile';?>" >Edit Profile</a>
                <a class="dropdown-item" href="<?php echo URLROOT . 'users/logout';?>">Logout</a>
              </li>
            <?php else : ?>
              <li><a class="dropdown-item" href="<?php echo URLROOT . 'users/login'; ?>">Login</a></li>
              <li><a class="dropdown-item" href="<?php echo URLROOT . 'users/register'; ?>">Sign Up</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              
            <?php endif; ?>           
          </ul>
          <li class="nav-item dropdown">
          <span class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">Category</span>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?php echo URLROOT . 'pages/category?categoryName=Men'; ?>">Men</a></li>
              <li><a class="dropdown-item" href="<?php echo URLROOT . 'pages/category?categoryName=Women'; ?>">Women</a></li>
              <li><a class="dropdown-item" href="<?php echo URLROOT . 'pages/category?categoryName=Kids'; ?>">Kids</a></li>   
          </ul>
        </li>
         
        <li class="nav-item">  
          <a class="nav-link" href="<?php echo URLROOT . 'pages/contact'; ?>">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT . 'pages/FAQ'; ?>">FAQ</a>
        </li>
        </li>
          <?php if (isset($_SESSION['userType_id'])):?>
            <?php if ($_SESSION['userType_id']==1):?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo URLROOT . 'pages/adminDashboard'; ?>">Admin</a>
              </li>
            <?php else:?>
            <?php endif;?>
          <?php endif;?>

          
      </ul>
      <a class="navbar-brand" href="<?php echo URLROOT . 'public'; ?>"><?php echo SITENAME; ?></a>

      <div class="cart-icon">
          <a href="<?php echo URLROOT . 'pages/cart'; ?>">
            <i class="las la-shopping-cart la-2x" style="color: white"></i>
            <?php if(!empty($_SESSION['user_id'])){ ?>
            <!-- <span class='badge badge-warning' id='lblCartCount'><?php //echo count($this->model->getNumberOfCartItems($_SESSION['user_id']))?> </span> -->
            <span class='badge badge-warning' id='lblCartCount'>5</span>

            <?php } ?>
          </a>
      </div>
      
      <div class="search-container">
        <form action="<?php echo URLROOT . 'pages/search'; ?>" method="post">
          <input class="search expandright" id="searchright" name="searchright" type="text"  placeholder="Search">
          <label class="button searchbutton" for="searchright">
            <div class="search-icon-btn">
                <i class="fa fa-search"><a href="<?php echo URLROOT . 'pages/search'; ?>"></a></i>
            </div>
          </label>
        </form>
      </div>

</nav>
</div>
