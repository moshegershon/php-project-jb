<?php
 include 'header.php';
 require_once 'student-bl.php';
 require_once 'courses-bl.php';
 require_once 'user-model.php';
 $ubl = new BusinessLogicusers;
 $bl = new BusinessLogicstudents;
 $cbl = new BusinessLogiccourses;
 $arrayOfstudents = $bl->get();
 $arrayOfcourses = $cbl->get();

 if (!empty($_POST['us'])){
     $bl->deleteFormConection($_POST['id']);
    // $bl->delete($_POST['id']);
    $user = new studentsModel([
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'lastname' => $_POST['lastname'],
        'email' => $_POST['email'],
        'phonenum' => $_POST['phonenum'],
        'pic' => $_POST['pic']
    ]);
    if(!empty($_POST['name'])||
    !empty($_POST['lastname'])||
    !empty($_POST['email'])||
    !empty($_POST['phonenum'])||
    !empty($_POST['pic'])){
    $bl->update($user);
    $sid = $_POST['id'];
    }
    else{
        ?>
            <div class="alert alert-primary" role="alert">
                      <strong>All fields must be filled in to update a student</strong> 
                   </div>
             <?php
    }
    if (!empty($_POST['c'])) {
        $coursesin = [];
        foreach ($_POST['c'] as $course) {
            array_push($coursesin, $course);
        }
    for ($i=0; $i<sizeof($coursesin);$i++){ 
        $bl->setWithCourses($sid,$coursesin[$i]);           
}
}

    }
    if (!empty($_POST['delete'])){
        ?>
        <script>confirm('are you shure you want to delete <?php echo $_POST['id']?>')
        </script>
        <?php
        $bl->deleteFormConection($_POST['id']);
        $bl->delete($_POST['id']);
        ?>
 
    <?php
    } 
    
        
    
 ?>
  <div class="adds">
        <a href='addstudent.php'>+ Add new student</a>
        </div>  
        <div class="alert alert-primary" role="alert">
You have a total of  <?php echo $bl->count(); ?> students in your academy</h4>
</div>
<hr>
 <form action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="POST">
 <h2> Get student by id</h2>
<input type="number" placeholder="id" name="id"> 
<button type="submit" class="btn btn-primary" name="getbyid" value="3">submit</button>
</form>
<hr>
<?php
if(!empty($_POST['id'])){
    $item = $bl->getOne($_POST['id']);
    if (!$item->getId()){
        ?>
        <div class="alert alert-primary">
        <strong>There is no such student</strong>
    </div>
         <?php
    }  
    else{ 
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
         <td><?php echo $item->getId() ?></td>
         <td><?php echo $item->getName() ?></td>
         <td><?php echo $item->getLastname() ?></td>
         <td><?php echo $item->getEmail()  ?></td>
         <td><?php echo $item->getPhonenum()  ?></td>
         <td><img src="<?php echo $item->getPic()  ?>"></td>
         <form method='POST'>
         <input type='hidden' name='id' value="<?php echo $item->getId() ?>">      
         <td><button type="submit" class="btn btn-primary" name="delete" value="4">Delete</button></td>
         <td><button type="submit" class="btn btn-primary" name="update" value="5">Update</button></td>
         </form>
        </tr>
     </table>
     <h2 >Courses that this student is in</h2>
     <hr>
    <?php
  
    $item1 = $cbl->getStudentWithCours($_POST['id']);
    foreach ($item1 as $c){
    ?>
    <h3><?php echo $c->getName() ?></h3>
     <table class="table">    
    <td><?php echo $c->getName() ?></td>
    <td><?php echo $c->getDescription() ?></td>
    <td><img src="<?php echo $c->getPic()  ?>"></td> 
    </table>
    <?php }}}
    else{
    ?>
 <h2>All students</h2>
 <table class="table">
 <tr>
         <th>Student id</th>
         <th>Student name</th>
         <th>Student last name</th>
         <th>Email</th>
         <th>Phone number</th>
         <th>Pic</th>
         </tr>
    </table>  
 <?php foreach ($arrayOfstudents as $item) {?>
    <table class="table">    
    <tr>
         <td><?php echo $item->getId() ?></td>
         <td><?php echo $item->getName() ?></td>
         <td><?php echo $item->getLastname() ?></td>
         <td><?php echo $item->getEmail()  ?></td>
         <td><?php echo $item->getPhonenum()  ?></td>
         <td><img src="<?php echo $item->getPic()  ?>"></td>
         </table>  
        </tr>
 <?php }}?>
 </table>
 <?php
if (!empty($_POST['update'])){
    ?>
    <form class="form-group" id='addstudent' action='<?php echo basename($_SERVER['PHP_SELF']); ?>' method='POST' novalidate>
    <input type='hidden' name='id' value="<?php echo $_POST["id"] ?>">    
    <input class="form-control" name='name' placeholder='Student name' value='<?php echo !empty($_POST['sname']) ? $_POST['sname'] : '' ?>' required>
        <input class="form-control" name='lastname' type="text" placeholder="Last name" required>
        <input class="form-control" name='email' type="text" placeholder="Email" required>
        <input class="form-control" name='phonenum' type="number" placeholder="Phonenum" required>
        <input class="form-control-file" name="pic" type="file">
        <button class="form-control btn btn-primary" name="us" type="submit" value="2">Save</button>
        <?php for ($i=0; $i<sizeof($arrayOfcourses);$i++) {?>
            <input type="checkbox" name='c[]' value="<?php echo $arrayOfcourses[$i]->getId() ?>"><?php echo $arrayOfcourses[$i]->getName() ?>
        <?php } ?>
    </form>
    <?php
}
?>
    <?php
   
include 'footer.php';
?>