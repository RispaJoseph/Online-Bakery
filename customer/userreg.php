<html>
<head>
    <style>
     table{
         width: 900px;
         height: 400px;
     }
     input[type=text],input[type=email],input[type=date] ,input[type=password],select,textarea{
    width: 50%;
    padding: 13px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
     }
        
     input[type=submit],input[type=reset]{
         background-color:bisque;
         color: green;
         height:50px;
         width: 50px;
         border: none;
         border-radius: 4px;
     }
     input[type=submit]:hover,input[type=reset]:hover{
         background-color: beige;
     }
    </style>
    <title>Login</title>
    </head>
<body>
    <form action="" method ="post">
   <h1 style="position:relative;left:200px;top:50px;color:blue";>login</h1>     
<table style="position:relative;left:500px:top:100px">
        <tr>
            <td>Name:</td>
            <td><input type="text"name="name"></td>
        </tr>
  <tr>
            <td>Address:</td>
      <td><textarea  name="address"></textarea></td>
        </tr>
          <tr>
            <td>Gender:</td>
            <td><input type="radio"name="gender" value="male">male
            <input type="radio"name="gender" value="female">female
              </td>
        </tr>
        <tr>
            <td>District</td>
<td><select name=”district” id=”register_district” style=”width:160px”>
<option value=”Alappuzha”>Alappuzha</option>
<option value=”Idukki”>Idukki</option>
<option value=”Kottayam”>Kottayam</option>
<option value=”Thiruvananthapuram”>Thiruvananthapuram</option>
<option value=”Kannur”>Kannur</option>
<option value=”Kasargod”>Kasargod</option>
<option value=”Wayanad”>Wayanad</option>
<option value=”Kozhikode”>Kozhikode</option>
<option value=”Malapuram”>Malapuram</option>
<option value=”Palakkad”>Palakkad</option>
<option value=”Thrissur”>Thrissur</option>
<option value=”Pathanamthitta”>Pathanamthitta</option>
<option value=”Kollam”>Kollam</option>
<option value=”Ernakulam”>Kottayam</option>
    <tr>
    <td>Email:</td>
<td><input type=email  name="email"></td>
        </tr>
    

</select>
            </td>
    </tr>
        </table>
    </form>
    </body>
    
        </html>
        
































