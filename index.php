<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        body{
            background-color: papayawhip;
        }
    </style>
</head>
<body>
<table cellpadding="7px" border=" 2px" class="table">
    <thead>
    
    <th>Id</th>
    <th>Employee</th>
    <th>Department</th>
    <th>Action</th>
</thead>  
    <?php
    include('conn.php');

    $emp = "select * from employeemaster";
    $dataa = mysqli_query($conn,$emp) or die("Lmao!!");

    if (mysqli_num_rows($dataa)>0){
        while($data_r=mysqli_fetch_assoc($dataa)){
            ?>
            <tr>
       
            <td><?php echo $data_r['Id'];?></td>
            
            <td><?php echo $data_r['FirstName'];?></td>
           
            <td><?php echo $data_r['Department'];?></td>
           
        
             <td><button type="button" class="btn btn-dark"><a href="reimb.php?id=<?= $data_r['Id']?>">Add</a></button></td>
        </tr>
        <?php
        }
    }
?>
</table>
<br>

</table>
</body>
</html>
