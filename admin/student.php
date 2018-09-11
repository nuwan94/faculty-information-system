<?php require('header.php');
    if(isset($_SESSION['stno'])){
        
    }else{
        header("Location: login.php");
    }
    include('sidebar.php');
?>
<div class='col-4'>

<?php
if (isset($_POST['submit'])) {
    if($_POST['operation'] === 'add'){
        $sql="INSERT INTO student VALUES ('$_POST[ssno]','$_POST[sfname]','$_POST[spwd]','$_POST[spmail]','$_POST[sumail]','$_POST[sacyear]','$_POST[saddr]','$_POST[stelno]','$_POST[szscore]','$_POST[scid]',0)";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert success'>New student added successfully</div>";
            ob_start();
        } else {
            echo "<div class='alert info'>Error: " . mysqli_error($conn) . "</div>";
        }
    }elseif($_POST['operation'] === 'change'){

    }
}
?>
    <div class="tab center">
        <button class="tablinks" onclick="openTab(event, 'Add')" id="defaultOpen">Add Student</button>
        <button class="tablinks" onclick="openTab(event, 'Change')">Change Student</button>
        <button class="tablinks" onclick="openTab(event, 'Delete')">Delete Student</button>
    </div>

    <div id="Add" class="tabcontent">
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="row">
                <div class="col-4">
                    <label for="ssno">Student No *</label>
                    <input class='form-input' type="text" id="ssno" name="ssno" placeholder="XX/20XX/XXX" maxlength="11" required>
                    <label for="sfname">Student Name *</label>
                    <input class='form-input' type="text" id="sfname" name="sfname" placeholder="..."  maxlength="256" required>
                    <label for="spmail">Personal Email</label>
                    <input class='form-input' type="text" id="spmail" name="spmail" placeholder="..." required maxlength="128">
                    <label for="sumail">University Email</label>
                    <input class='form-input' type="text" id="sumail" name="sumail" placeholder="..." maxlength="128">
                    <label for="saddr">Address *</label>
                    <input class='form-input' type="text" id="saddr" name="saddr" placeholder="..."  maxlength="256">
                </div>
                <div class="col-4">
                    <label for="sacyear">Academic Year * <small>(Ex : 2015 for 2016/16)</small></label>
                    <input class='form-input' type="number" id="sacyear" name="sacyear" min="2010" value="2016" max="2050" placeholder="..." required>
                    <label for="stelno">Contact No </label>
                    <input class='form-input' type="text" id="stelno" name="stelno" placeholder="07XXXXXXXX" maxlength="10">
                    <label for="szscore">Z-Score *</label>
                    <input class='form-input' type="number" step="0.0001" min="-4.0000" value="1.0000" max="4.0000" id="szscore" required name="szscore" placeholder="..." maxlength="5">
                    <label for="scid">Course ID *</label>
                    <select class="form-input" id="scid" name="scid" required>
                        <?php 
                            $sql = "SELECT CourseId,CourseName FROM course ORDER BY RAND()";
                            $result = mysqli_query($conn, $sql);
                            $resulCheck = mysqli_num_rows($result);
                            if($resulCheck>0){
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<option value='". $row['CourseId']."'>".$row['CourseId']." - ". $row['CourseName'] ."</option>";
                                }
                            }
                        ?>
                    </select>
                    <label for="spwd">Password *</label>
                    <input class='form-input' type="text" id="spwd" name="spwd" placeholder="" maxlength="32">
                </div>
            </div>
            <input type="hidden" name='operation' value='add'>
            <input class="btn" type="submit" name='submit' value="Add to Database">
        </form>
    </div>

        <div id="Change" class="tabcontent">
        <h3>Select Student to Change</h3>
        <input type="search" name="searchChange" placeholder="Student No" >
        <p><i class="fa fa-exclamation-triangle"></i> This feature will be added soon.</p>
        <input class="btn" type="submit" disabled value="Submit Change">
        </div>

        <div id="Delete" class="tabcontent">
        <h3>Select Student to Delete</h3>
        <input type="search" name="searchDelete" placeholder="Student No" >
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
            <li><a href="course.php">Add New Course</a></li>
            <li><a href="subject.php">Add New Subject</a></li>
            <li><a href="faq.php">Add New FAQ</a></li>
        </ul>  
    </p>
</div>

<style>


</style>
<script src="../js/add-student.js"></script>
<script src="../js/tab.js"></script>
<?php require('../footer.php') ?>