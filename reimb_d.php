<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include('conn.php');
    $userid = $_POST['uid'];
     $fd2 =$_POST['fd'];
     $td2 = $_POST['td'];
     $des2 = $_POST['des'];
     $tamt2 = $_POST['tamt'];


 
 
 
 
 
     $upd = "INSERT INTO `employeereimburse`(`EmpId`, `FromDate`, `ToDate`, `Description`, `TotalAmount`) VALUES ('$userid','$fd2','$td2','$des2','$tamt2')";
    $up_data = mysqli_query($conn,$upd);

    if($up_data == true){

$b = $_POST['sd'];
$b1 = $_POST['sd1'];
$b2 = $_POST['sd2'];

$c = $_POST['head'];
$c1 = $_POST['head1'];
$c2 = $_POST['head2'];

$d = $_POST['amt'];
$d1 = $_POST['amt1'];
$d2 = $_POST['amt2'];


$query = "INSERT INTO `employeereimbursedetails`(`EmpId`, `ReimburseDate`, `Heads`, `HeadAmount`) VALUES ('$userid','$b','$c','$d'),
('$userid','$b1','$c1','$d1'),
('$userid','$b2','$c2','$d2')";

mysqli_query($conn,$query);
    }
    else{
echo "unknown Error";
    }
    
    echo "done";

    ?>
 
</body>
</html>