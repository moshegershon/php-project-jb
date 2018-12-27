<?php
 include 'header.php';
 require_once 'user-bl.php';
 $bl = new BusinessLogicusers;
 $arrayOfusers = $bl->get();

 if (!empty($_POST['us'])){
    $student = new usersModel([
        'id' =>$_POST['id'],
        'name' => $_POST['name'],
        'password' => $_POST['pass'],
        'pic' => $_POST['pic'],
        'prmition_level' => $_POST['pl']
    ]);
    $bl->update($student); 
    }
    if (!empty($_POST['delete'])){
        ?>
        <script>alert('are you shure you want to delete <?php echo $_POST['id']?>')
        </script>
        <?php
        $bl->delete($_POST['id']);
        }
    
if (!empty($_POST['update'])){
    ?>
    <h3 class="au"> Update user</h3>
    <form class="form-group" id='addstudent' action='<?php echo basename($_SERVER['PHP_SELF']); ?>' method='POST' novalidate>
    <input class="form-control" type='hidden' name='id' value="<?php echo $_POST["id"] ?>">    
    <input class="form-control" name='name' placeholder='Users name' required>
    <input class="form-control" name='pass' placeholder='password' required>
        <input class="form-control" name="pic" type="file">
        <input class="form-control" name='pl' placeholder='prmitionLevel' required>
        <button class="form-control btn btn-primary" name="us" type="submit" value="2">Save</button>
    </form>
<?php
}
 ?>
 <div class="addu">
        <a href='adduser.php'>+ Add new user</a>
        </div>
        <form action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="POST">
<input type="number" placeholder = "id" name="id"> 
<button type="submit" class="btn btn-primary" name="getbyid" value="1">submit</button>
</form>
<?php
if(!empty($_POST['getbyid'])){
    $item = $bl->getOne($_POST['id']);
     if (!$item->getId()){
        ?>
        <div class="alert alert-primary">
        <strong>There is no such user</strong>
    </div>
         <?php
    }
    ?>
<table class="table">
<tr>
         <th>User id</th>
         <th>User name</th>
         <th>Pic</th>
         <th>Premition level</th>
         </tr>
         <tr>
         <td><?php echo $item->getId(); ?></td>
         <td><?php echo $item->getName(); ?></td>
         <td><img src='<?php echo $item->getPic();  ?>'></td>
         <td><?php echo $item->getPrmitionLevel();?></td>
         <form action="users.php" method="POST">
         <input type='hidden' name='id' value="<?php echo $item->getId() ?>">
        <?php if ($item->getPrmitionLevel()==1 && $_SESSION['pl']==1){?>
         <td><button type="submit" class="btn btn-primary" name="update" value="5">Update</button></td>
         <?php 
         } else if($item->getPrmitionLevel()==2 && $_SESSION['pl']==2)  {?>
         <!-- <td><button type="submit" class="btn btn-primary" name="delete" value="4">Delete</button></td> -->
         <td><button type="submit" class="btn btn-primary" name="update" value="6">Update</button></td>
         <?php
         } else if ($item->getPrmitionLevel()!=1 && $_SESSION['pl']==1){
         ?>
         <td><button type="submit" class="btn btn-primary" name="delete" value="4">Delete</button></td>
         <td><button type="submit" class="btn btn-primary" name="update" value="6">Update</button></td>
         <?php
         } else if ($item->getPrmitionLevel()==3 && $_SESSION['pl']!=3){
          ?>   
         <td><button type="submit" class="btn btn-primary" name="delete" value="4">Delete</button></td>
         <td><button type="submit" class="btn btn-primary" name="update" value="6">Update</button></td>
         
         </form>    
     </tr>
     </table>
    <?php
    }} else{ 
    ?>
    
 <h2>All users</h2>
 <table class="table">
 <tr>
         <th>User id</th>
         <th>User name</th>
         <th>User pic</th>
         <th>prmition_level</th>
         </tr>
 <?php foreach ($arrayOfusers as $item) {?>
         <tr>
         <td><?php echo $item->getId(); ?></td>
         <td><?php echo $item->getName(); ?></td>
         <td><img src='<?php echo $item->getPic(); ?>'></td>
         <td><?php echo $item->getPrmitionLevel();  ?></td>
     </tr>
 <?php }}?>
 </table>
<?php
include 'footer.php';
?>