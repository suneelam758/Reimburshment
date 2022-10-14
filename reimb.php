<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reimb</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

</head>
<body>
<?php
    include('conn.php');
    $uid = $_GET['id'];
    $emp = "select * from employeemaster where id = $uid";
    $dataa = mysqli_query($conn,$emp) or die("Lmao!!");

    if (mysqli_num_rows($dataa)>0){
        while($data_r=mysqli_fetch_assoc($dataa)){
            ?>

<div class="container">
  <br>
  <form class="form-horizontal" action="reimb_d.php" method="POST">
  <input type="hidden" name="uid" value="<?=$data_r['Id']?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="na" >Employee Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="na" name="na" value="<?php echo $data_r['FirstName'];?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="fd">From Date:</label>
      <div class="col-sm-10">          
        <input type="date" class="form-control" id="fd" placeholder="Select Date" name="fd">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="td">To Date:</label>
      <div class="col-sm-10">          
        <input type="date" class="form-control" onchange="dat()" id="td" placeholder="select date" name="td">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="des">Description</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="des" placeholder="Description" name="des" required>
      </div>
    </div>
    <input type="text" placeholder="Total Amount" name="tamt" value="" id="tamt1">
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>

    <?php
        }
    }
?>
 <!-- amount table -->
 <table class="table table-bordered">
  <thead>
    <tr>
   
      <th scope="col">Data</th>
      <th scope="col">Head</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td><input class="form-control" type="date" onchange="sdate()" placeholder="Date" id="sd" name="sd"></td>
      <td><input class="form-control" type="text" name="head" required></td>
      <td><input class="form-control" type="text" name="amt" id="at1" required></td>
    </tr>
    <tr>
      
      <td><input class="form-control" type="date" onchange="sdate1()" placeholder="Date" id="sd1" name="sd1"></td>
      <td><input class="form-control" type="text" name="head1" required></td>
      <td><input class="form-control" type="text" name="amt1" id="at2" required></td>
    </tr>
    <tr>
    <td><input class="form-control" type="date" onchange="sdate2()" placeholder="Date" id="sd2" name="sd2" required></td>
      <td><input class="form-control" type="text" name="head2" required></td>
      <td><input class="form-control" type="text" name="amt2" id="at3" onkeyup="return fill()" required></td>
    </tr>
  </tbody>
  </table>
 
  
  </form>
</div>
<script>
  function fill(){
var x = document.getElementById("at1").value;
var y = document.getElementById("at2").value;
var z = document.getElementById("at3").value;
var tamt = document.getElementById("tamt1");

tamt.value = parseInt(x) + parseInt(y) + parseInt(z);
  }
  function dat(){
    var a = document.getElementById("fd").value;
var b = document.getElementById("td").value;

    if(b<a){
    alert("please choose correct date");
    document.getElementById("td").value = "";
  }
  if(b == a){
    alert("please choose corrct date");
    document.getElementById("td").value = "";
  }
  }
  function sdate(){
    var a = document.getElementById("fd").value;
    var b = document.getElementById("td").value;
    var c = document.getElementById("sd").value;
    var d = document.getElementById("sd1").value;
    var e = document.getElementById("sd2").value;
    if(((c<a) || (c>b))){
      alert("Select between range");
      document.getElementById("sd").value = "";
    }
  }
  function sdate1(){
    var a = document.getElementById("fd").value;
    var b = document.getElementById("td").value;
    var c = document.getElementById("sd").value;
    var d = document.getElementById("sd1").value;
    var e = document.getElementById("sd2").value;
    if(((d<a) || (d>b))){
      alert("Select between range");
      document.getElementById("sd1").value = "";
    }
  }
  function sdate2(){
    var a = document.getElementById("fd").value;
    var b = document.getElementById("td").value;
    var c = document.getElementById("sd").value;
    var d = document.getElementById("sd1").value;
    var e = document.getElementById("sd2").value;
    if(((e<a) || (e>b))){
      alert("Select between range");
      document.getElementById("sd2").value = "";
    }
  }
</script>
</body>
</html>
