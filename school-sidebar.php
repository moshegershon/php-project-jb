<?php
require_once 'student-bl.php';
require_once 'courses-bl.php';

$bl = new BusinessLogicstudents;
$arrayOfstudents = $bl->get();


 ?>
<h3>All students</h3>
 <table class="table">
 <tr>
         <th>Student id</th>
         <th>Student name</th>
         <th>Student last name</th>
         <th>Email</th>
         <th>Phone number</th>
         <th>Pic</th>
         </tr>
 <?php foreach ($arrayOfstudents as $item) {?>
         <tr>
         <td><?php echo $item->getId() ?></td>
         <td><?php echo $item->getName() ?></td>
         <td><?php echo $item->getLastname() ?></td>
         <td><?php echo $item->getEmail()  ?></td>
         <td><?php echo $item->getPhonenum()  ?></td>
         <td><img src="<?php echo $item->getPic()  ?>"></td>
     </tr>
 <?php }?>
 </table>
 <hr>
 <?php
 $bl = new BusinessLogiccourses;
 $arrayOfcourses = $bl->get();
 ?>
 <h3>All cuorses</h3>
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
 <?php }?>
 </table>
