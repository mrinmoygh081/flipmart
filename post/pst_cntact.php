<?php
require_once "../include/db.php";

if(isset($_POST['contact_submit'])){
    $contact_name = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['name']));
    $contact_email = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['email']));
    $contact_subject = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['subject']));
    $contact_messaage = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['message']));

    $query = "INSERT INTO contact(contact_name,contact_email,contact_subject,contact_message)";
    $query .= "VALUES ('$contact_name','$contact_email','$contact_subject','$contact_messaage')";
    $connection = mysqli_query($db_connection,$query);

    if(!$connection){
        die(mysqli_error($db_connection));
    }
    else{
        header("Location: ../contact.php");
    }


}
?>