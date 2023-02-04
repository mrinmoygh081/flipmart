<?php
session_start();
ob_start();
require_once "../include/db.php";

if(isset($_POST['btn_submit'])){
    $update_heading = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['heading']));
    $update_sub_heading = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['sub_heading']));
    $update_content = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['content']));
    

    $query_of_update = "UPDATE aboutus SET heading = '{$update_heading}',sub_heading = '{$update_sub_heading}',content = '{$update_content}' WHERE about_id = 1";
    
    $connection = mysqli_query($db_connection,$query_of_update);

    if(!$connection){
        die(mysqli_error($db_connection));
    }
    else
    {
        $_SESSION['about'] = 1;
        header("Location: ../aboutus.php?");
    }

}
elseif(isset($_POST['slider_submit'])){
    $image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['slider_image']['name']));
    $tmp_image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['slider_image']['tmp_name']));
    move_uploaded_file($tmp_image, "../img/$image");
    $slider_heading = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['slider_heading']));
    $slider_content = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['slider_content']));

    $query = "INSERT INTO slider(slider_image,slider_heading,slider_content)";
    $query .= "VALUES ('$image','$slider_heading','$slider_content')";
    $connection = mysqli_query($db_connection,$query);

    if(!$connection){
        die(mysqli_error($db_connection));
    }
    else{
        $_SESSION['slider'] = 1;
        header("Location: ../slider.php");
    }



}
elseif(isset($_POST['portfolio_submit'])){
    $portfolio_image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['portfolio_image']['name']));
    $tmp_image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['portfolio_image']['tmp_name']));
    move_uploaded_file($tmp_image, "../img/$portfolio_image");
    $portfolio_heading = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['portfolio_heading']));
    $portfolio_sub_heading = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['portfolio_sub_heading']));
    $portfolio_filter = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['portfolio_filter']));

    $query = "INSERT INTO portfolio(portfolio_image,portfolio_heading,portfolio_sub_heading,portfolio_filter)";
    $query .= "VALUES ('$portfolio_image','$portfolio_heading','$portfolio_sub_heading','$portfolio_filter')";
    $connection = mysqli_query($db_connection,$query);

    if(!$connection){
        die(mysqli_error($db_connection));
    }
    else{
        $_SESSION['portfolio'] = 1;
        header("Location: ../portfolio.php");
    }



}
elseif(isset($_POST['team_submit'])){
    $team_image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['team_image']['name']));
    $tmp_image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['team_image']['tmp_name']));
    move_uploaded_file($tmp_image, "../img/$team_image");
    $team_name = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['team_name']));
    $team_designation = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['team_designation']));

    if(isset($_POST['team_id'])){
    $team_id = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['team_id']));
    $Query = "SELECT * FROM team WHERE team_id = $team_id";
    $Connection = mysqli_query($db_connection,$Query);
    $row = mysqli_fetch_assoc($Connection);
        if(!$team_image){
            $team_image=$row['team_image'];
        }
        $query = "UPDATE team SET team_name = '{$team_name}',team_image = '{$team_image}',team_designation = '{$team_designation}' WHERE team_id = '$team_id'";
        
        }
else{
    $query = "INSERT INTO team(team_image,team_name,team_designation)";
    $query .= "VALUES ('$team_image','$team_name','$team_designation')";
}
    $connection = mysqli_query($db_connection,$query);

    if(!$connection){
        die(mysqli_error($db_connection));
    }
    else{
        $_SESSION['team'] = 1;
        if(isset($team_id)){
            header("Location: ../team_table.php#".$team_id);
            }
            else{
                header("Location: ../team.php");
            }
    }



}
elseif(isset($_POST['p_submit'])){
     $p_name = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['p_name']));
     $p_price = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['p_price']));
     $p_line1 = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['p_line1']));
     $p_line2 = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['p_line2']));
     $p_line3 = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['p_line3']));
     $p_line4 = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['p_line4']));
     $p_line5 = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['p_line5']));
    

    $query = "INSERT INTO pricing(p_name,p_price,p_line1,p_line2,p_line3,p_line4,p_line5)";
    $query .= "VALUES ('$p_name','$p_price','$p_line1','$p_line2','$p_line3','$p_line4','$p_line5')";
    $connection = mysqli_query($db_connection,$query);

    if(!$connection){
        die(mysqli_error($db_connection));
    }
    else{
        $_SESSION['price'] = 1;
        header("Location: ../pricing.php");
    }

}
elseif(isset($_POST['cat_submit'])){
    $cat_name = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['cat_name']));
    
    $cat_image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['cat_image']['name']));
    $tmp_image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['cat_image']['tmp_name']));
    move_uploaded_file($tmp_image, "../img/$cat_image");

    $query = "INSERT INTO category(cat_name,cat_image,cat_logo)";
    $query .= "VALUES ('$cat_name','$cat_image','veg')";
    $connection = mysqli_query($db_connection,$query);

    if(!$connection){
        die(mysqli_error($db_connection));
    }
    else{
        $_SESSION['category'] = 1;
        header("Location: ../category.php");
    }

}
// elseif(isset($_POST['blog_submit'])){
//     $blog_image = $_FILES['blog_image']['name'];
//     $tmp_image = $_FILES['blog_image']['tmp_name'];
//     move_uploaded_file($tmp_image, "../img/$blog_image");
//     $blog_heading = $_POST['blog_heading'];
//     $blog_auth = $_POST['blog_auth'];
//     $blog_date = $_POST['blog_date'];
//     $blog_content = $_POST['blog_content'];

//     $query = "INSERT INTO blog(blog_image,blog_cat_id,blog_heading,blog_auth,blog_date,blog_content)";
//     $query .= "VALUES ('$blog_image','5','$blog_heading','$blog_auth','$blog_date','$blog_content')";
//     $connection = mysqli_query($db_connection,$query);

//     if(!$connection){
//         die(mysqli_error($db_connection));
//     }
//     else{
//         $_SESSION['blog'] = 1;
//         header("Location: ../add_blog.php");
//     }



// }
elseif(isset($_POST['pro_submit'])){
    $pro_image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['pro_image']['name']));
    $tmp_image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['pro_image']['tmp_name']));
    move_uploaded_file($tmp_image, "../img/$pro_image");
    $pro_name = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['pro_name']));
    $pro_price = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['pro_price']));
    $pro_disc = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['pro_disc']));
    $pro_description = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['pro_description']));
    $pro_availavle = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['pro_available']));
    $pro_cat_id = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['category']));

    //$fileNames = array_filter($_FILES['pro_image_multiple']['name']);
    $targetDir = "../img/$pro_image";
    $allowTypes = array('jpg','png','jpeg','gif');
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
     $fileNames = $_FILES['pro_image_multiple']['name'];
    // $tmp_image_multiple = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['pro_image_multiple']['tmp_name']));
    // move_uploaded_file($tmp_image_multiple, "../img/$pro_image_multiple");


    if(isset($_POST['category_id'])){
        $category_id = $_POST['category_id'];
    $query = "UPDATE product SET pro_name = '{$pro_name}',pro_gid = '{$pro_cat_id}',pro_image = '{$pro_image}',pro_price = '{$pro_price}',pro_disc = '{$pro_disc}',pro_description = '{$pro_description}',pro_available = '{$pro_availavle}' WHERE pro_id = '$category_id'";

    }
    else{
        $query = "INSERT INTO product(pro_image,pro_gid,pro_name,pro_price,pro_disc,pro_description,pro_available)";
        $query .= "VALUES ('$pro_image','$pro_cat_id','$pro_name','$pro_price','$pro_disc','$pro_description','$pro_availavle')";
    }
    $connection = mysqli_query($db_connection,$query);

    if(!$connection){
        die(mysqli_error($db_connection));
    }
    else{
        if(isset($_POST['category_id'])){
            $category_id = $_POST['category_id'];
            $Query = "SELECT * FROM product WHERE pro_id = $category_id";
            $Connection = mysqli_query($db_connection,$Query);
            $Row = mysqli_fetch_assoc($Connection);
            $id = $Row['pro_id'];
    
                if(!empty($fileNames)){ 
                    foreach($_FILES['pro_image_multiple']['name'] as $key=>$val){ 
                        // File upload path 
                        $fileName = basename($_FILES['pro_image_multiple']['name'][$key]); 
                        $targetFilePath = $targetDir . $fileName; 
                         
                        // Check whether file type is valid 
                        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                        if(in_array($fileType, $allowTypes)){ 
                            // Upload file to server 
                            if(move_uploaded_file($_FILES["pro_image_multiple"]["tmp_name"][$key], $targetFilePath)){ 
                               $insert = $db_connection->query("INSERT INTO product_image(pro_id,pro_image) VALUES ('$id','$fileName')");
                            }else{ 
                                $errorUpload .= $_FILES['pro_image_multiple']['name'][$key].' | '; 
                            } 
                        }else{ 
                            $errorUploadType .= $_FILES['pro_image_multiple']['name'][$key].' | '; 
                        } 
                    } 
                     
                    // Error message 
                    $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                    $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
                    $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                     
                }else{ 
                    $statusMsg = 'Please select a file to upload.'; 
                } 
             





        }
        else {
        $Query = "SELECT * FROM product ORDER BY pro_id DESC";
        $Connection = mysqli_query($db_connection,$Query);
        $Row = mysqli_fetch_assoc($Connection);
        $id = $Row['pro_id'];


        if(!empty($fileNames)){ 
            foreach($_FILES['pro_image_multiple']['name'] as $key=>$val){ 
                // File upload path 
                $fileName = basename($_FILES['pro_image_multiple']['name'][$key]); 
                $targetFilePath = $targetDir . $fileName; 
                 
                // Check whether file type is valid 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to server 
                    if(move_uploaded_file($_FILES["pro_image_multiple"]["tmp_name"][$key], $targetFilePath)){ 
                       $insert = $db_connection->query("INSERT INTO product_image(pro_id,pro_image) VALUES ('$id','$fileName')");
                    }else{ 
                        $errorUpload .= $_FILES['pro_image_multiple']['name'][$key].' | '; 
                    } 
                }else{ 
                    $errorUploadType .= $_FILES['pro_image_multiple']['name'][$key].' | '; 
                } 
            } 
             
            // Error message 
            $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
            $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
            $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
             
        }else{ 
            $statusMsg = 'Please select a file to upload.'; 
        } 




        }
        



        $_SESSION['product'] = 1;
        if(isset($_POST['category_id'])){
        header("Location: ../product.php#".$category_id);
        }
        else{
            header("Location: ../add_product.php");
        }
    }



}
elseif(isset($_POST['blog_submit'])){
    $blog_image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['blog_image']['name']));
    $tmp_image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['blog_image']['tmp_name']));
    move_uploaded_file($tmp_image, "../img/$blog_image");
    $blog_heading = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['blog_heading']));
    $blog_auth = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['blog_auth']));
    $blog_date = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['blog_date']));
    $blog_content = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['blog_content']));
    $blog_cat_id = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['category']));


    if(isset($_POST['blog_id'])){
        $blog_id = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['blog_id']));
    $query = "UPDATE blog SET blog_heading = '{$blog_heading}',blog_cat_id = '{$blog_cat_id}',blog_image = '{$blog_image}',blog_auth = '{$blog_auth}',blog_date = '{$blog_date}',blog_content = '{$blog_content}' WHERE blog_id = '$blog_id'";

    }
    else{
        $query = "INSERT INTO blog(blog_image,blog_cat_id,blog_heading,blog_auth,blog_date,blog_content)";
        $query .= "VALUES ('$blog_image','$blog_cat_id','$blog_heading','$blog_auth','$blog_date','$blog_content')";
    }
    $connection = mysqli_query($db_connection,$query);

    if(!$connection){
        die(mysqli_error($db_connection));
    }
    else{
        $_SESSION['blog'] = 1;
        if(isset($_POST['blog_id'])){
        header("Location: ../blog.php#".$blog_id);
        }
        else{
            header("Location: ../add_blog.php");
        }
    }



}
elseif(isset($_POST['login_submit'])){
    if(!empty($_POST['user_name'])&& !empty($_POST['user_pass'])){
        $userName = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['user_name']));
        $userPassword = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['user_pass']));
        $query = "SELECT * FROM admin WHERE user_name = '$userName'";
        $connection = mysqli_query($db_connection,$query);
        $count = mysqli_num_rows($connection);
        if($count == 1){
            $row = mysqli_fetch_assoc($connection);
            $db_pass = $row['user_pass'];
            if($userPassword == $db_pass){
               $_SESSION['admin_id'] = $row['admin_id'];
               $_SESSION['admin_name'] = $row['admin_name'];
               unset($_SESSION['login_error']);
               header("Location: ../index.php");

            }
            else{
             echo $_SESSION['login_error'] = "Please check your password";
        header("Location: ../login.php");
            }
        }
        else{
           echo $_SESSION['login_error'] = "Please register yourself";
        header("Location: ../login.php");
        }
    }
    else{
       echo $_SESSION['login_error'] = "Please fill all the field";
        header("Location: ../login.php");
    }
}
elseif(isset($_POST['btn_delivery'])){
    $State = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['d_state']));
    $Charge = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['d_charge']));
    $query = "INSERT INTO d_charge(charge,state)";
    $query .= "VALUES ('$Charge','$State')";
    $connection = mysqli_query($db_connection,$query);

    if(!$connection){
        die(mysqli_error($db_connection));
    }
    else{
        $_SESSION['delivery'] = 1;
        header("Location: ../delivery_charge.php");
    }
}
elseif(isset($_POST['sub_cat_submit'])){
    $cat_name = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['sub_cat_name']));
    $cat_id = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['cat_id']));
    $query = "INSERT INTO sub_category(cat_id,sub_name)";
    $query .= "VALUES ('$cat_id','$cat_name')";
    $connection = mysqli_query($db_connection,$query);

    if(!$connection){
        die(mysqli_error($db_connection));
    }
    else{
        $_SESSION['sub_category'] = 1;
        header("Location: ../sub_category.php?id=".$cat_id);
    }
}
elseif(isset($_POST['group_submit'])){
    $group_name = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['group_name']));
    $sub_id = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['sub_id']));
    $query = "INSERT INTO groups(sub_id,group_name)";
    $query .= "VALUES ('$sub_id','$group_name')";
    $connection = mysqli_query($db_connection,$query);

    if(!$connection){
        die(mysqli_error($db_connection));
    }
    else{
        $_SESSION['group_category'] = 1;
        header("Location: ../groups.php?gid=".$sub_id);
    }
}
elseif(isset($_POST['add_submit'])){
    
    $add_image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['add_image']['name']));
    $tmp_image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['add_image']['tmp_name']));
    move_uploaded_file($tmp_image, "../img/$add_image");

    $query = "INSERT INTO adds(add_image)";
    $query .= "VALUES ('$add_image')";
    $connection = mysqli_query($db_connection,$query);

    if(!$connection){
        die(mysqli_error($db_connection));
    }
    else{
        $_SESSION['add'] = 1;
        header("Location: ../advertise.php");
    }
}
?>