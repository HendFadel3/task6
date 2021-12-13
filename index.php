
<?php 

require 'helpers.php';
require 'dbconection.php';


   if($_SERVER['REQUEST_METHOD'] == "POST"){
       $title=clean($_POST['title']);
       $content=clean($_POST['content']);
       $img=($_FILES['img']);
       


       $errors=[];
       if(!Validate($title,1))
       {$errors['title']="req";}
        elseif(!Validate($title,2))
       {$errors['title']="Length";}
        if(!Validate($content,1))
       {$errors['content']="req";}
       elseif(!Validate($content,3))
       {$errors['content']="Length";}
       if(!Validate($img,1))
       {$errors['img']="imgReq";}

       

    //    if(!empty($_FILES['img']['name'])){
    //      $errors['img'] = "Field Required";
    //     }else{
    //        $tmpPath    =  $_FILES['img']['tmp_name'];
    //        $imageName  =  $_FILES['img']['name'];
    //        $exArray   = explode('.',$imageName);
    //        $extension = end($exArray);
    //        $FinalName = rand().time().'.'.$extension;
    //        $allowedExtension = ["png",'jpg'];
              
    //           if(in_array($extension,$allowedExtension)){
    //                  $desPath = './uploads/'.$FinalName;
    //                if(move_uploaded_file($tmpPath,$desPath)){
    //                    echo 'Image Uploaded';
    //                    }else{
    //                      echo 'Error In Uploading file';
    //                    }
    //                }
    //        if(!in_array($extension,$allowedExtension)){
    //            $errors['img'] = "Invalid Extension";
    //        }
    //     }



        if(count($errors) > 0){
            foreach ($errors as $key => $value) {
                # code...
                echo '* '.$key.' : '.$value.'<br>';
            }
        }
        else{

        
   
           $sql="insert into task6(title,content,img) values ('$title','$content','$img')";
           $op=mysqli_query($con,$sql);
           if($op)
           {echo 'data inserted';}
           else{echo 'error'.mysqli_error($con);}
        }
   
   
    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register</h2>
 
 
  <form  action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data" method="POST" >

  

  <div class="form-group">
    <label for="exampleInputName">Title</label>
    <input type="text" class="form-control" id="exampleInputName"  name="title" aria-describedby="" placeholder="Enter title">
  </div>


  <div class="form-group">
    <label for="exampleInputName">Content</label>
    <input type="text" class="form-control" id="exampleInputName"  name="content" aria-describedby="" placeholder="Enter content">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">Image</label>
    <input type="file"  id="exampleInputPassword1" name="img" >
  </div>
 
  
  <button type="submit" class="btn btn-primary"  >Submit</button>
</form>
</div>

</body>
</html>