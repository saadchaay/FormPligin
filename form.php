<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    
<form method="POST" action="">

<label>Full Name :</label>
<input type="text" name="cname" placeholder="Enter Your Full Name " class="form-control"><br>

<label>Email :</label>
<input type="email" name="email" placeholder="Enter Your Email" class="form-control"><br>

<label>Subject :</label>
<input type="text" name="sub" placeholder="Subject" class="form-control"><br>

<label>Content :</label>
<textarea name="message" placeholder="Enter Your Message" class="form-control"></textarea><br>

<input type="submit" name="save" value="Send" class="btn btn-outline-dark">

</form>
</body>
</html>

<?php

if(isset($_POST['save'])){

    insert();
}

function insert(){

    global $wpdb;
    $table = $wpdb->prefix.'contactUs';

    $name = $_POST['cname'];
    $email = $_POST['email'];
    $sub = $_POST['sub'];
    $message = $_POST['message'];

    if(empty($name) || empty($email) || empty($sub) || empty($message)){

        echo '<h1 style="color:red;">All fields are required</h1>';

    }else{

        $wpdb->insert(
            $table,
            [
                'The_Name' => $name,
                'Email' => $email,
                'The_Subject' => $sub,
                'The_Message' => $message
            ]
        );
        
        wp_redirect($_SERVER["REQUEST_URI"], 301);
        exit();
    }

}
?>



