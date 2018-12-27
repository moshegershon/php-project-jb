<?php
 include 'header.php';
 require_once 'courses-bl.php';
 require_once 'student-bl.php';
 $bl = new BusinessLogiccourses;
 $sbl = new BusinessLogicstudents;

 $arrayOfcourses = $bl->get();


 if (!empty($_POST['uc'])){
        $course = new coursesModel([
            'id' =>$_POST['id'],
            'name' => $_POST['cname'],
            'description' => $_POST['cdesc'],
            'pic' => $_POST['pic']
        ]);
        if (!empty($_POST['name'])||
        !empty($_POST['description'])||
        !empty($_POST['pic'])){
        $bl->update($course); 
        }
    
        else {
            ?>
            <div class="alert alert-primary" role="alert">
                      <strong>All fields must be filled in to update a course</strong> 
                   </div>
             <?php
        }
    }
        if (!empty($_POST['delete'])){
            ?>
            <script>confirm('are you shure you want to delete <?php echo $_POST['id']?>')
            </script>
            <?php
            $bl->delete($_POST['id']);
        }


 if (!empty($_POST['update'])){
        ?>
        <div class="uc">
            <h2>Update course</h2>
        <form  class="form-group" id='updatecourse' action='<?php echo basename($_SERVER['PHP_SELF']); ?>' method='POST' novalidate>
        <input type='hidden' name='id' value="<?php echo $_POST["id"] ?>">    
        <input class="form-control" name='cname' placeholder='Course name' value='<?php echo !empty($_POST['cname']) ? $_POST['cname'] : '' ?>' required>
        <input class="form-control" name='cdesc' type="text" placeholder="Course description" required>
        <input class="form-control" name="pic" type="file">
        <button class="form-control btn btn-primary" name="uc" type="submit" value="3">Save</button>
    </form>
    </div>
 <?php
 }
 
 else{
     ?>
<div class="addc">
        <a href='addcourse.php'>+ Add new course</a>
        </div>
        <div class="alert alert-primary">You have a total of  <?php echo $bl->count(); ?> courses in your academy </h4>
        </div>
<form action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="POST">
<h2>Get cuorse by id </h2>
<hr>
<input type="number" placeholder="id" name="id"> 
<button type="submit" class="btn btn-primary" name="getbyid" value="4">submit</button>
</form>
<hr>
<?php
if(!empty($_POST['id'])){
    $item = $bl->getOne($_POST['id']);
    if (!$item->getId()){
        ?>
        <div class="alert alert-primary">
        <strong>There is no such course</strong>
    </div>
         <?php
    } else { 
?>
<table class="table">
<h2><?php echo $item->getName()?><h2/>
<tr>
        <th>Course id</th>
         <th>Course name</th>
         <th>Course description</th>
         <th>Pic</th>
</tr>
     <tr>
         <td><?php echo $item->getId() ?></td>
         <td><?php echo $item->getName() ?></td>
         <td><?php echo $item->getDescription() ?></td>
         <td><img src="<?php echo $item->getPic()  ?>"></td>
         <form method='POST'>
         <input type='hidden' name='id' value="<?php echo $item->getId() ?>"> 
         <?php if ($_SESSION['pl']!=3) { ?>  
         <td><button type="submit" class="btn btn-primary" name="delete" value="4">Delete</button></td>
         <td><button type="submit" class="btn btn-primary" name="update" value="5">Update</button></td>
         <tr> 
         <?php }}?>
        </form>
     </table>
<?php

$item1 = $sbl->getCoursWithStudent($_POST['id']);?>
<h2>Students that are in this course</h2>
<?php
foreach ($item1 as $s){
?>
 <table class="table">
 
<tr>
         <th>Student id</th>
         <th>Student name</th>
         <th>Student last name</th>
         <th>Email</th>
         <th>Phone number</th>
         <th>Pic</th>
         </tr>
         <tr>
         <td><?php echo $s->getId() ?></td>
         <td><?php echo $s->getName() ?></td>
         <td><?php echo $s->getLastname() ?></td>
         <td><?php echo $s->getEmail()  ?></td>
         <td><?php echo $s->getPhonenum()  ?></td>
         <td><img src="<?php echo $s->getPic()  ?>"></td>
</table>
<?php }}
else{?>
 <h2>All courses</h2>
 <table class="table">
 <tr>
         <th>Course id</th>
         <th>Course name</th>
         <th>Course description</th>
         <th>Pic</th>
         </tr>
 <?php foreach ($arrayOfcourses as $item) {?>
         <tr>
         <td><?php echo $item->getId() ?></td>
         <td><?php echo $item->getName() ?></td>
         <td><?php echo $item->getDescription() ?></td>
         <td><img src="<?php echo $item->getPic()  ?>"></td>
     </tr>
     
 <?php }}?>
 </table>
 <?php
 if (!empty($_POST['update'])){
        ?>
        <form  class="form-group" id='updatecourse' action='<?php echo basename($_SERVER['PHP_SELF']); ?>' method='POST' novalidate>
        <input type='hidden' name='id' value="<?php echo $_POST["id"] ?>">    
        <input class="form-control" name='cname' placeholder='Course name' value='<?php echo !empty($_POST['cname']) ? $_POST['cname'] : '' ?>' required>
        <input class="form-control" name='cdesc' type="text" placeholder="Course description" required>
        <input class="form-control" name="pic" type="file">
        <button class="form-control btn btn-primary" name="uc" type="submit" value="3">Save</button>
    </form>
 <?php
 }
 }
include 'footer.php';
?>
