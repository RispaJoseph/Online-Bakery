<?php
include("../shares/db/mydatabase.inc");
include("top.php");
?>
<head>
<style>
 table{
                   border: 2px solid #111;
                   border-radius: 1px;
                   width: 80%;
                   margin-left:0px;
                   
               }
               th {
    background-color: #17c3a2;
    color: white;
    height: 40px;
}
tr{
    height: 30px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

    </style>
</head>
<?php
$sql="select * from customer_reg";
$tbl=getDatas($sql);
if($tbl==null)
{
    echo"no datas";
}
else
{
    ?>
    <h1 style="position: relative;left:500px;top:100px;color:black;">CUSTOMER</h1>
    <table border="1"style="position:relative;left:130px;top:150px;">
    <tr>
    <th>Customer_id</th>
    <th>Name</th>
    <th>Address</th>
    <th>Gender</th>
    <th>Phoneno</th>
    <th>Email</th>
    </tr>
    <?php
        for($i=0;$i<count($tbl);$i++)
    {
for($j=0;$j<count($tbl[$i]);$j++)
{
}
    ?>

<tr>

<td><?php echo $tbl[$i][0];?></td>
<td><?php echo $tbl[$i][1];?></td>
<td><?php echo $tbl[$i][2];?></td>
<td><?php echo $tbl[$i][3];?></td>
<td><?php echo $tbl[$i][4];?></td>
<td><?php echo $tbl[$i][5];?></td>
<?php
}
}
?>
    
</table>
