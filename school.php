<?php session_start(); ?>
<?php include 'header.php'; ?>
<div style='float: left; width: 20%;'>
    <?php include 'school-sidebar.php' ?>
</div>

<div style='float:left; width:80%;'>
<?php
    require_once 'courses-bl.php';
    $bl = new BusinessLogiccourses;

    require_once 'student-bl.php';
    $sbl = new BusinessLogicstudents;
    
?>
    
    <br>
    
</div>

<?php include 'footer.php' ?>