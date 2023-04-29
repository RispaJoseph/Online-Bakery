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
<h3 style="position: relative;left:320px;"><font color="black">ADD PRODUCT</font></h3>
<div id="err" style="color: #ccc;height: 20px"></div>

<br>
<table style="position:relative;left:50px;height:600px;">
       
  <tr>
            <td>Product Name:</td>
      <td><textarea  name="name"></textarea></td>
        </tr>
         
        <tr>
            <td>Category</td>
<td>
    <select name="category">
<option value="Cake">Cake</option>
<option value="Snacks">Snacks</option>
<option value="Sweets">Sweets</option>
<option value="Icecreams">Icecreams</option>
<option value="Drinks">Drinks</option>

    </select>
        </td>
 
    </tr>
         <tr>
            <td>Quantity:</td>
            <td><input type="text"name="quantity"></td>
        </tr>
    
   
    <tr>
    <td>Price:</td>
        <td><input type="text" name="price"></td>
    </tr>
    
     <tr>
        <td>Image</td>
        <td><input type="file" name="file"></td>
    </tr>
    
    <tr>
        <td><input type="submit" name="submit"></td>
        <td><input type="reset" name="reset"></td>
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
  $sql="select ifnull(max(product_id),0)+1 from add_product";
    $tbl=getDatas($sql);
      
        
         $n1=$_POST['name'];
         echo $n1;
     $n2=$_POST['category'];
    $n3=$_POST['quantity'];
    $n4=$_POST['price'];
    $n5=$_POST['image'];
   
   
 $sql="insert into add_product values('$tbl[0][0]','$n1','$n2','$n3','$n4','$fname')";
     setDatas($sql);
    
         
     msgbox('success');
   
   
}
        }
        }
    }

?>





