<?php session_start(); ?>
<?php include 'header.php'; ?>
<?php 
    require_once 'courses-bl.php'; 
    $bl = new BusinessLogiccourses; 
?>
<?php
if(!empty($_POST['addc'])){
if (empty($_POST['cname'])||
    empty($_POST['cdesc'])||
    empty($_POST['pic'])){
    ?>
    <div class="alert alert-primary">
        <strong>All fields must be filled in to create a new course</strong>
    </div>
    <?php
  }
   else{ 
    $user = new coursesModel([
        'name' => $_POST['cname'],
        'description' => $_POST['cdesc'],
        'pic' => $_POST['pic']
    ]);
    $bl->set($user);
}
}
  




if ( $_SESSION['pl']==1||$_SESSION['pl']==2){
?>
    <div class="uc">
<h2> Add new course</h2>
    <form class="form-group" id='addcourse' action='<?php echo basename($_SERVER['PHP_SELF']); ?>' method='POST' novalidate>
        <input class="form-control" name='cname' placeholder='Course name' value='<?php echo !empty($_POST['cname']) ? $_POST['cname'] : '' ?>' >
        <input class="form-control" name='cdesc' type="text"  placeholder="Course description"  >
        <input class="form-control" name="pic" type="file" >
        <button class="form-control btn btn-primary" name="addc" type="submit" value="3">Save</button>
    </form>
</div>
<?php 
 } else { 
?>

        <div class="alert alert-primary">
        <strong>Unfortunately, your level is not enough to create a new course</strong>
    </div>


<?php
    }
    ?>
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