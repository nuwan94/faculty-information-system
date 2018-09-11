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
            $sql="INSERT INTO course VALUES ('$_POST[coid]','$_POST[coname]',0,'$_POST[codesc]')";
            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert success'>New course added successfully</div>";
                ob_start();
            } else {
                echo "<div class='alert info'>Error: " . mysqli_error($conn) . "</div>";
            }
        }elseif($_POST['operation'] === 'change'){

        }
    }
?>

    <div class="tab center">
        <button class="tablinks" onclick="openTab(event, 'Add')" id="defaultOpen">Add Course</button>
        <button class="tablinks" onclick="openTab(event, 'Change')">Change Course</button>
        <button class="tablinks" onclick="openTab(event, 'Delete')">Delete Course</button>
    </div>

    <div id="Add" class="tabcontent">
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="row">
                <div class="col-4">
                    <label for="coid">Course Id *</label>
                    <input class='form-input' type="text" id="coid" name="coid" placeholder="SENG" maxlength="11" required>
                    <label for="coname">Course Name *</label>
                    <input class='form-input' type="text" id="coname" name="coname" placeholder="..."  maxlength="256" required>
                </div>
                <div class="col-4">
                <label for="codesc">Course Description</label>
                    <textarea rows="10" class='form-input' id="codesc" name="codesc" placeholder="..." ></textarea>
                </div>
            </div>
            <input type="hidden" name='operation' value='add'>
            <input class="btn" type="submit" name="submit" value="Add to Database">
        </form>
    </div>

        <div id="Change" class="tabcontent">
            <h3>Select Course to Change</h3>
            <input type="search" name="searchChange" oninput="getCourses(this.value)" placeholder="Course ID or Name" >
            <table id="subjectList" class="tablelist" style="width:100%;text-align:left">
            <?php
            $sql="SELECT DISTINCT * FROM course ORDER BY RAND() LIMIT 5" ;
                $result = mysqli_query($conn,$sql);
                $resulCheck = mysqli_num_rows($result);
                if(($resulCheck)>0){
                    while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['CourseId'] . "</td>";
                        echo "<td>" . $row['CourseName'];
                        echo "</td></tr>";
                    }
                }
            ?>
            </table>
            <!-- <p><i class="fa fa-exclamation-triangle"></i> This feature will be added soon.</p> -->
            <input class="btn" type="submit" disabled value="Submit Change">
        </div>

        <div id="Delete" class="tabcontent">
        <h3>Select Course to Delete</h3>
        <input type="search" name="searchDelete" placeholder="Course ID" >

        <input class="btn" type="submit" value="Confirm Delete">
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
            <li><a href="faq.php">Add New FAQ</a></li>
        </ul>  
    </p>
</div>

<script>
function getCourses(str) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("subjectList").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","modules/get-course.php?q="+str,true);
        xmlhttp.send();
}
</script>
<script src="../js/tab.js"></script>
<?php require('../footer.php') ?>