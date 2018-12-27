<?php
    // session_start();
    // if (!empty($_GET['logout'])) {
    //     session_destroy();
    //     $_SESSION = [];
    // }
    // else if (!empty($_POST['email']) && !empty($_POST['pass'])) {
    //     $email = $_POST['email'];
    //     $pass = $_POST['pass'];
    //     // from db
    //     if ( $email == 'a@test.com' && $pass =='1234') {
    //         $_SESSION['uid'] = 4;
    //     }
    // }
?>


 <?php
        
    session_start();
    session_destroy();
    
    session_start();
    if (!empty($_GET['logout'])) {
        session_destroy();
        $_SESSION = [];
    }

    require_once 'user-model.php';

    $bl = new BusinessLogicusers;
     if (!empty($_POST['email']) && !empty($_POST['pass'])) {
        $u = new usersModel([
            'name' =>  $_POST['email'],
            'password' => $_POST['pass']
        ]);
        $res = $bl->isin($u);
        $logged = !empty($res->getId());
            if($logged){
                $_SESSION['uid'] = $res->getId();
                $_SESSION['pl'] = $res->getPrmitionLevel();
            }else{
                ?>
                <div class="alert alert-warning">
                <strong>Warning!</strong> <?php echo 'username or password are worng'?>
              </div>
              <?php
            }
        }
 ?>
  <?php include 'header.php'; ?>

<body id="LoginForm">
<div class="container">
<h1 class="form-heading">login Form</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Login</h2>
   <p>Please enter your email and password</p>
   </div>
   <form action='<?php echo basename($_SERVER['PHP_SELF']); ?>' method='POST'>

        <div class="form-group">


            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email Address"  >

        </div>

        <div class="form-group">

            <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password" >

        </div>
        <div class="forgot">
        <!-- <a href="reset.html">Forgot password?</a> -->
</div>
        <button type="submit" class="btn btn-primary">Login</button>

    </form>
    </div>


</div></div></div>
    
<?php include 'footer.php'; ?>  