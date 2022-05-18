<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<style>
    #relpy{
        background-color: #ced4da;
    }

    #butt{
        margin-top: 5px;
        margin-bottom:5px;
        width: 80%;
        margin-left:63px;
    }
</style>

<body>
   <table class="table table-hover">
        <tr>

            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Action</th>

        </tr>
        
        <?php 
        $s=getData();
        // print_r($s);
        foreach($s as $row){

            echo "<tr>";
            
                echo "<td>".$row->The_Name."</td>";
                echo "<td>".$row->Email."</td>";
                echo "<td>".$row->The_Subject."</td>";
                echo "<td>".$row->The_Message."</td>";
                echo "<td>"."<a onclick='myfunction()'>
                                <button class='btn btn-outline-info'>Reply</button></a>"."
                            <a href='http://localhost/brief_9/wp-admin/admin.php?page=contact-dashbord&id=".$row->id."' >
                                <button class='btn btn-outline-danger'>Delete</button></a>"."</td>";

            echo "</tr>";
         }?>

   </table> 


   <div id="relpy" style="width: 50%;margin: auto; border-radius: 5px;" class="row vertical-center-row">

        <h2 class="text-center">The Reply</h2>
        <textarea name="text" id="" cols="30" rows="7" placeholder="Your Reply"></textarea>
        <button id="butt" class='btn btn-outline-primary'>Send</button>
        <button id="butt" class='btn btn-outline-danger' onclick="myfunction()">Cancel</button>

   </div>

   <script>
        document.getElementById("relpy").style.display = "none";

       function myfunction(){
           if(document.getElementById("relpy").style.display == "block")document.getElementById("relpy").style.display = "none";
           else document.getElementById("relpy").style.display = "block";
        }

    
   </script>
</body>
</html>
<?php 

// ------------------------------ get data ------------------------------

 function getData()
 {
     global $wpdb;

     $data=$wpdb->get_results("SELECT * FROM wp_contactus");
     return $data;
 }

// ------------------------------ delete ------------------------------

 if(isset($_GET['id'])){

    global $wpdb;
    $id=$_GET['id'];
    $wpdb->query("DELETE FROM `wp_contactus` WHERE id=$id");
    $urlp=admin_url().'admin.php?page=contact-dashbord';
    wp_redirect($urlp);

 }
 

?>