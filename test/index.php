<?php 
$fullname = "";
$phone = "";
$email = "";
$subject = "";
$message = "";
$count = 0;

$fullnemeErr = '';
$phoneErr = '';
$emailErr = '';
$subjectErr = '';
$messageErr = '';

if(isset($_POST['submit'])) {
    if($_POST['fullname'] === '')
    {
        $fullnemeErr = "*this field is required";
    }  else {
        $fullname = $_POST['fullname'];
        $count = $count+1;
    }
    if($_POST['phone'] === '') {
        $phoneErr = "*this field is required";
    } else {
        $phone = $_POST['phone'];
        $count = $count+1;
    }
    if($_POST['email'] === '') {
        $emailErr = "*this field is required";
    } else {

        $email = $_POST['email'];
        $count = $count+1;
    } 
    if($_POST['subject'] === '') {
        $subjectErr = "*this field is required";
    } else {
        $subject  = $_POST['subject'];
        $count = $count+1;
    } 
    if($_POST['message'] === '') {
        $messageErr = "*this field is required";
    } else {
        $message = $_POST['message'] ;
        $count = $count+1;
    }

    if($count === 5)
    {
        $con = new mysqli("localhost","root","","contact_form");
        if($con->connect_error) {
            die("Connection failed:".$conn->connect_error);
        }
        $ip = $_SERVER['REMOTE_ADDR'];
        $sql = "INSERT INTO form_data (fullname, phone, email, subject, message,ipadress) VALUES ('$fullname','$phone','$email','$subject','$message','$ip')";
        if($con->query($sql) === TRUE) {
            echo "success";
        }
    
    }
    
}

?>

<form action = "" method = "post">
    <input type = "text" placeholder = "full name" name = "fullname">
    <span><?php echo $fullnemeErr ?></span>
    <br>
    <br>
    <input type = "number" placeholder = "phone number" name = "phone">
    <span><?php echo $phoneErr ?></span>
    <br>
    <br>
    <input type = "email" placeholder = "email" name = "email">
    <span><?php echo $emailErr ?></span>
    <br>
    <br>
    <input type = "text" placeholder = "subject" name = "subject">
    <span><?php echo $subjectErr ?></span>
    <br>
    <br>
    <input type = "textarea" placeholder = "message" name = "message">
    <span><?php echo $messageErr ?></span>
    <br>
    <br>
    <input type = "submit" value ="Submit" name = "submit">
</form>