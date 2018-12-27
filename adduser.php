<?php session_start();
include 'header.php';
include 'user-bl.php' ; 
$bl=new BusinessLogicusers;
if (!empty($_POST['uname']) && !empty($_POST['udesc'])) {
    $cname = $_POST['uname'];
    $cdesc = $_POST['udesc'];
}
 
if (!empty($_POST['addu'])){
    $user = new usersModel([
        'name' => $_POST['uname'],
        'password' => $_POST['upass'],
        'pic' => $_POST['pic'],
        'prmition_level' => $_POST['upremition'],
    ]);
    if (empty($_POST['uname'])||
        empty($_POST['upass'])||
        empty($_POST['pic'])||
        empty($_POST['upremition'])){
            ?>
            <div class="alert alert-primary" role="alert">
                      <strong>All fields must be filled in to create a new course</strong> 
                   </div>
             <?php
        }
    else if ($_SESSION['pl']==3){
        ?>
        <div class="alert alert-primary" role="alert">
                    <strong>Sorry but you are not qualified to add a new user</strong> 
                  </div>
            <?php
    }
    if ($_POST['upremition']!=1){
        $bl->set($user);
    }
    else{
        ?>
       <div class="alert alert-primary" role="alert">
                 Only <strong>Moshe</strong> can be a owner!!!
              </div>
        <?php
    }
}
?>
<h3 class="au">Add new user</h3>
<form class="form-group" id='adduser' action='<?php echo basename($_SERVER['PHP_SELF']); ?>' method='POST' novalidate>
<input class="form-control" name='uname' placeholder='User name' value='<?php echo !empty($_POST['uname']) ? $_POST['uname'] : '' ?>' required>
<input class="form-control" name='upass' type="text" placeholder="Password" required>
<input class="form-control" name ="pic" type="file" required>
<input class="form-control" name='upremition' type="text" placeholder="Level" required>
<button class="form-control btn btn-primary" type="submit" name="addu" value="1">Save</button>
</form>




    

