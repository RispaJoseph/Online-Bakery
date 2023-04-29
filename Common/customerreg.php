<?php
include("../shares/db/mydatabase.inc");
include("top.php");
?>
<html>
<head>  
 <style>  
     table{
         width: 800px;
         height: 500px;
     }
     input[type=text],input[type=email],input[type=date] ,input[type=password],select,textarea{
    width:100%;
    padding: 13px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
     }
         label
         {
             color: black;
         }
     input[type=submit] ,input[type=reset]{
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 2px;
    cursor: pointer;
    float: right;
     }
     
     }
   

    </style>   
</head>
<body>
<div style="position:relative;border:groove;left:320px;height:730px;width:900px;top:100px;background-color:#ccc ">
<br>
<form action="" method="post" enctype="multipart/form-data">
<h3 style="position: relative;left:320px;"><font color="black">CUSTOMER REGISTRATION</font></h3>
<div id="err" style="color: #ccc;height: 20px"></div>

<br>
<table style="position:relative;left:50px;height:600px;">
<tr>
            <td>Name:</td>
            <td><input type="text"name="name"></td>
        </tr>
  <tr>
            <td>Address:</td>
      <td><textarea  name="address"></textarea></td>
        </tr>
    <tr>
    <td>phoneno:</td>
            <td><input type="text"name="phoneno"></td>
        </tr>
      <tr>   
    <td>Email:</td>
            <td><input type="text"name="email"></td>
        </tr>
     <tr>
         <td>Gender:</td>
         <td><input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="female">Male
         </td>
         
    </tr>
    <tr>
        <td>Image</td>
        <td><input type="file" name="file"></td>
    </tr>
    <tr>
    <td>Password:</td>
    <td><input type="password" name="password"></td>
    </tr>
    <tr>
    <td>Confirm Password:</td>
    <td><input type="password" name="cfpassword"></td>
    </tr>
    <tr>

            <td><input type="submit" name="submit"></td>
           <td> <input type="reset" name="cancel"></td>

        </tr>    
        </table>
        </form>
        </div>
    </body>
</html>
<?php
   $fldr = "../uploads";
    $allowedExts = array("jpg", "gif", "jpeg","mp4");
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $f=$_FILES["file"]["name"];
    
    //echo "upload/$f";

    
    $size = $_FILES["file"]["size"];
    if($_FILES["file"]["size"] > 5000000)
    {
        die("File Size is ".($size/1000000)."MB, Maximum allowed size is 5MB");
    }
    if ((($_FILES["file"]["type"] == "image/jpg")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "video/mp4"))
    
    && ($_FILES["file"]["size"] <= 50000000)
    && in_array($extension, $allowedExts)){
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " .$_FILES["file"]["error"]. "<br />";
        }
        else
        {
        if (file_exists("$fldr/" .$_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " already exists. ";
        }
        else
        {
            move_uploaded_file($_FILES["file"]["tmp_name"],"$fldr/" . $_FILES["file"]["name"]);
            

            $mv_name = $_FILES["file"]["name"];     
            $mv_type = $_FILES["file"]["type"];
                $fname=$fldr."/".$mv_name;
            $mv_size = $_FILES["file"]["size"];
            
            if(isset($_POST['name']))
                {
  $sql="select ifnull(max(customer_id),0)+1 from customer_reg";
    $tbl=getDatas($sql);
      
        
         $n1=$_POST['name'];
         echo $n1;
     $n2=$_POST['address'];
    $n3=$_POST['phoneno'];
    $n4=$_POST['email'];
    $n5=$_POST['gender'];
    $n6=$_POST['image'];
                     $n7=$_POST['password'];
                     $n8=$_POST['cfpassword'];

   
    
    
     
     
                    
     if($n7==$n8)
{
  $sql="select ifnull(max(customer_id),0)+1 from customer_reg";
    $tbl=getDatas($sql);
     $sql="insert into customer_reg values('$tbl[0][0]','$n1','$n2','$n3','$n4','$n5','$fname')";
     setDatas($sql);
     $sql="insert into login_reg values('$n4','$n7','customer','1')";
     setDatas($sql);
         
     msgbox('success');
     }
else
{
    msgbox('password mismatch');
}
        }
        }
    }
    }


?>

                      


