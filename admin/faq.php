<?php require('header.php');
    if(isset($_SESSION['stno'])){
        
    }else{
        header("Location: login.php");
    }
    include('sidebar.php');
    ob_start();
?>

<div class='col-4'>

<?php
if (isset($_POST['submit'])) {
    if($_POST['operation'] === 'add'){
        $sql="INSERT INTO faq (faqHeading,faqContent) VALUES ('$_POST[ftitle]','$_POST[fdesc]')";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert success'>New FAQ added successfully</div>";
            ob_start();
        } else {
            echo "<div class='alert info'>Error: " . mysqli_error($conn) . "</div>";
        }
    }elseif($_POST['operation'] === 'change'){

    }
}
?>

    <div class="tab center">
        <button class="tablinks" onclick="openTab(event, 'Add')" id="defaultOpen">Add FAQ</button>
        <button class="tablinks" onclick="openTab(event, 'Change')">Change FAQ</button>
        <button class="tablinks" onclick="openTab(event, 'Delete')">Delete FAQ</button>
    </div>

    <div id="Add" class="tabcontent">
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="row">
                <div class="col-8">
                    <label for="ftitle">FAQ Title *</label>
                    <input class='form-input' type="text" id="ftitle" name="ftitle" placeholder="..."  maxlength="256" required>
                <label for="fdesc">FAQ Description *</label>
                    <textarea rows="10" class='form-input' id="fdesc" name="fdesc" placeholder="..." required></textarea>
                </div>
            </div>
            <input type="hidden" name='operation' value='add'>
            <input class="btn" type="submit" name="submit" value="Add to Database">
        </form>
    </div>

        <div id="Change" class="tabcontent">
        <h3>Select FAQ to Change</h3>
        <input type="search" name="searchChange" placeholder="FAQ title" >
        <p><i class="fa fa-exclamation-triangle"></i> This feature will be added soon.</p>
        <input class="btn" type="submit" disabled value="Submit Change">
        </div>

        <div id="Delete" class="tabcontent">
        <h3>Select FAQ to Delete</h3>
        <input type="search" name="searchDelete" placeholder="Course ID" >
        <p><i class="fa fa-exclamation-triangle"></i> This feature will be added soon.</p>
        <input class="btn" type="submit" disabled value="Confirm Delete">
        </div>
</div>

<div class="col-2 notice">
    <h2><i class='fa fa-question-circle'></i> Notice</h2>
    <p>Please check twice before you submit.</p>
    <h2><i class="fa fa-link"></i> Quick Links</h2>
    <p>
        <ul>
            <li><a href="student.php">Add New Student</a></li>
            <li><a href="subject.php">Add New Subject</a></li>
            <li><a href="course.php">Add New Course</a></li>
        </ul>  
    </p>
</div>

<style>




</style>
<script src="../js/tab.js"></script>
<?php require('../footer.php') ?>