<?php require('header.php');
    if(isset($_SESSION['stno'])){
    }else{
        header("Location: login.php");
    }
    include('sidebar.php');
?>
<div class="row">
    <div class="col-4 center">
        <?php 
        $result=mysqli_query($conn,"SELECT COUNT(*) as cstotal FROM course");
        $data=mysqli_fetch_assoc($result);
        echo "<div class='card-panel courses'><i class='fa fa-graduation-cap'></i><h2>";
        echo $data['cstotal'];
        echo "</h2>Courses</div>";

        $result=mysqli_query($conn,"SELECT COUNT(*) as sttotal FROM student");
        $data=mysqli_fetch_assoc($result);
        echo "<div class='card-panel students'><i class='fa fa-users'></i><h2>";
        echo $data['sttotal'];
        echo "</h2>Students</div>";

        $result=mysqli_query($conn,"SELECT COUNT(*) as sutotal FROM subject");
        $data=mysqli_fetch_assoc($result);
        echo "<div class='card-panel subjects'><i class='fa fa-book'></i><h2>";
        echo $data['sutotal'];
        echo "</h2>Subjects</div>";

        $result=mysqli_query($conn,"SELECT COUNT(*) as faqtotal FROM faq");
        $data=mysqli_fetch_assoc($result);
        echo "<div class='card-panel faqs'><i class='fa fa-question-circle'></i><h2>";
        echo $data['faqtotal'];
        echo "</h2>FAQS</div>";
        ?>
    </div>
    <div class="col-2">
    <h2>Special Notice</h2>
    <p>Please contact web master immidetly if anything went wrong.<br>
    <br>
    Email : <a href="mailto:webmaster@kln.ac.lk">webmaster@kln.ac.lk</a>
    <br>
    Tel : 033 22990901
    <br>
    Fax : 033 22990904</p>
    </div>
</div>
<style>
    .row button{
        width:100%;
        border:0;
        background:#eee;
        padding:5%;
        margin:1%;
        cursor:pointer;
        font-size:1em;
    }
    .row button:hover{
        background:#ddd;
    }
    .card-panel {
        background: #fff;
        border: 4px solid #cfd8dc;
        margin: 1%;
        display: inline-block;
        text-align: center;
        width: 47%;
        padding: 2%;
        position: relative;
        overflow:hidden;
        z-index:1;
        color:#fff;
    }
    .card-panel .fa {
        position: static;
        display:block;
        margin-bottom:10px;
        font-size: 6em;
        z-index:-1;
        margin-left:-100%;
    }
    .card-panel h2 {
        margin: -1em 0 0;
        font-size: 5em;
    }
    .courses{
        background-color:#FFCA28;
        border-color:#FFCA28;
    }
    .students{
        background-color:#ef5350;
        border-color:#ef5350;
    }
    .subjects{
        background-color:#66BB6A;
        border-color:#66BB6A;
    }
    .faqs{
        background-color:#5C6BC0;
        border-color:#5C6BC0;
    }
    @media only screen and (max-width:768px) {
        .card-panel .fa {
        }

    }
</style>
<?php
    require('../footer.php');
?>