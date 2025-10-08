<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Submit From Start-->

    <form method="post" action="" enctype="multipart/form-data">
        Upload File: <input type="file" name="my_file">
        <input type="submit" name="submit" value="Upload">
    </form>

     <!--Submit From End-->

    <?php 

    // Task Start
    if(isset($_REQUEST["submit"])) {
        $file           =$_FILES["my_file"];
        $uploadOk       = 1;

        if($file["size"] > 5 * 1024 * 1024) {
            echo "Sorry, Maximum allowed size is 5MB.";
            $uploadOk = 0;
        }

        $file_name      =$file["name"];
        $explode_name   =explode(".",$file_name);
        $file_ext_name  =end($explode_name);

        $new_file_name  ="img" . time() . "." . "$file_ext_name";
        $file_tmp_name  =$file["tmp_name"];

        $dir="Upload/";

        if ($uploadOk == 1) {
       if (move_uploaded_file($file_tmp_name,$dir . $new_file_name)) {
                echo"<br>";
                echo "File Upload Successfully. <br> <br>"; 
       } 
         else{
                echo "File Upload File.";
       }
                print_r ("$new_file_name");
        }

    }
    // Task End

    ?>


</body>
</html>
