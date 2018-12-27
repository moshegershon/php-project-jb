<?php session_start(); ?>
<?php include 'header.php';
 require_once 'courses-bl.php';
    require_once 'student-bl.php'; 
    $bl = new BusinessLogicstudents; 
    $cbl = new BusinessLogiccourses;
    $arrayOfcourses = $cbl->get();
    
    if (!empty($_POST['adds'])){
        if (empty($_POST['name'])||
            empty($_POST['lastname'])||
            empty($_POST['email'])||
            empty($_POST['phonenum'])||
            empty($_POST['pic'])){
            ?>
            <div class="alert alert-primary">
                <strong>All fields must be filled in to create a new student</strong>
            </div>
            <?php
          }
          else{
        $user = new studentsModel([
            'name' => $_POST['name'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'phonenum' => $_POST['phonenum'],
            'pic' => $_POST['pic']
        ]);
        $sid = $bl->set($user);
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
    
    
?>



<div class="us">
<h2> Add new student</h2>
    <form class="form-group"  id='addstudent' action='<?php echo basename($_SERVER['PHP_SELF']); ?>' method='POST' >
        <input class="form-control" name='name' placeholder='Student name' value='<?php echo !empty($_POST['sname']) ? $_POST['sname'] : '' ?>' required>
        <input class="form-control" name='lastname' type="text" placeholder="Last name" required>
        <input class="form-control" name='email' type="email" placeholder="Email" required>
        <input class="form-control" name='phonenum' type="text" placeholder="Phonenum" required>
        <input class="form-control" name="pic" type="file">
        <button class="form-control btn btn-primary" name="adds" type="submit" value="2">Save</button>
        <h2> Courses to choose from</h2>
        <?php for ($i=0; $i<sizeof($arrayOfcourses);$i++) {?>
            <input type="checkbox" name='c[]' value="<?php echo $arrayOfcourses[$i]->getId() ?>"><?php echo $arrayOfcourses[$i]->getName() ?>
        <?php } ?>
    </form>
</div>

<script>
    
    var formElement = document.getElementById('addcourse');
    formElement.addEventListener("submit", formSubmitEventCallback, false); 
    function formSubmitEventCallback(e) {
        const inputs = document.querySelectorAll('#addcourse input[required]');
        
        let isValid = true;
        for(let i=0; i < inputs.length; i++) {
            if (!inputs[i].value) {
                isValid = false;
                $(inputs[i]).addClass('error');
            } else {
                $(inputs[i]).removeClass('error');
            }
        }
        if (!isValid) e.preventDefault();
        return isValid;
    }
    
</script>

<?php include 'footer.php' ?>