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
        $sql="INSERT INTO subject VALUES ('$_POST[sucode]','$_POST[suname]','$_POST[sucid]',NULL)";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert success'>New Subject added successfully</div>";
            ob_start();
        } else {
            echo "<div class='alert info'>Error: " . mysqli_error($conn) . "</div>";
        }
    }elseif($_POST['operation'] === 'change'){

    }
}
?>

    <div class="tab center">
        <button class="tablinks" onclick="openTab(event, 'Add')" id="defaultOpen">Add Subject</button>
        <button class="tablinks" onclick="openTab(event, 'Change')">Change Subject</button>
        <button class="tablinks" onclick="openTab(event, 'Delete')">Delete Subject</button>
    </div>

    <div id="Add" class="tabcontent">
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="row">
                <div class="col-4">
                    <label for="sucode">Subject Code *</label>
                    <input class='form-input' type="text" id="sucode" name="sucode" placeholder="SENG XXXXX" maxlength="11" required>
                    <label for="suname">Subject Name *</label>
                    <input class='form-input' type="text" id="suname" name="suname" placeholder="..."  maxlength="256" required>
                </div>
                <div class="col-4">
                    <label for="sucid">Course ID *</label>
                    <select class="form-input" id="sucid" name="sucid" required>
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
                    <label for="supdf">Course Content</label>
                    <input class='form-input' disabled  type="file" id="supdf" name="supdf">
                </div>
            </div>
            <input type="hidden" name='operation' value='add'>
            <input class="btn" type="submit" name="submit" value="Add to Database">
        </form>
    </div>

        <div id="Change" class="tabcontent">
        <h3>Select Subject to Change</h3>
        <input type="search" name="searchChange" placeholder="Subject Code" >
        <table id="subjectList left" style="width:100%;text-align:left;">
        <?php
            $sql="SELECT DISTINCT * FROM subject ORDER BY RAND() LIMIT 5" ;
                $result = mysqli_query($conn,$sql);
                $resulCheck = mysqli_num_rows($result);
            if(($resulCheck)>0){
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['SubjectCode'] . "</td>";
                    echo "<td>" . $row['SubjectName'];
                    echo "</td></tr>";
                }
            }
            ?>
        </table>
        <p><i class="fa fa-exclamation-triangle"></i> This feature will be added soon.</p>
        <input class="btn" type="submit" disabled value="Submit Change">
        </div>

        <div id="Delete" class="tabcontent">
        <h3>Select Subject to Delete</h3>
        <input type="search" name="searchDelete" placeholder="Subject Code" >
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
            <li><a href="student.php">Add New Student</a></li>
            <li><a href="faq.php">Add New FAQ</a></li>
        </ul>  
    </p>
</div>

<style>

</style>
<script src="../js/tab.js"></script>
<?php require('../footer.php') ?>