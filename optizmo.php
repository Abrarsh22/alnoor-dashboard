<!DOCTYPE html>
<html lang="en">
<head>
  <title>Optizmo Offers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="border:1px solid #000;background-color: #2b6777"  >
    <img src="optizmo.png"/>
  <h1 style="text-align: center;text-decoration: underline;color: #fff;font-weight: bold;">OFFER FORM</h1>
  <div class="row">
    <div class="col-md-5" style="border:1px solid #000;background-color: #fefbe9;border-right-width: 0px;padding: 10px">
  <div style="text-align: center">
  <h2 style="color: #000">Add Offer</h2>
</div>
<div class="border" style="border:1px solid #FEC07C;margin-bottom: 10px"></div>
  <form action="optizmo.php" method="POST">
    <div class="form-group">
      <label for="email" style="color: #000">Enter Offer Id:</label>
      <input type="number" class="form-control" id="id" placeholder="Enter Id" name="id" autocomplete="false" required>
    </div>
    <div class="form-group">
      <label for="pwd" style="color: #000">Enter Offer Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" autocomplete="false" required>
    </div>
    <div class="form-group ">
      <label for="pwd" style="color: #000">Enter Offer Link:</label>
      <input type="text" class="form-control" id="link" placeholder="Enter Link" name="link" autocomplete="false" required>
    </div>
    <div style="text-align: center;">
    <input class="btn btn-primary" type="submit" name="submit" id="submit" style="margin-bottom: 10px"> </input>
  </div>
  </form>
</div>
<div class="col-md-7" style="border:1px solid #000;background-color: #e1eedd;padding: 10px">
  <div style="text-align: center;">
  <h2 style="color: #000">View Offers</h2>
</div>
<div class="border" style="border:1px solid #FEC07C;margin-bottom: 10px"></div> 
<div class="offersdetails">
  <?php
   $con=mysqli_connect('localhost','root','','optizmo');
  $select="SELECT * FROM `offers` ORDER BY id DESC"?>
  <div class="table-responsive">
    <table class="table ">
    <thead >
      <tr >
        <th  style="text-align: center;">Offer ID</th>
        <th style="text-align: center;">Offer Name</th>
        <th style="text-align: center;">Offer Link</th>
        <th  style="text-align: center;">Offer Date</th>  
        <th  style="padding-left:60px;">Option</th>
      </tr>
    </thead>
    <?php
    if ($result = mysqli_query($con,$select)) {
    while ($row = mysqli_fetch_assoc($result)) {
    ?>  
    <tbody>
      <tr>
        <td style="text-align: center"><?php echo $row['offer_id']?></td>
        <td style="text-align: center"><?php echo $row['offer_name']?></td>
        <td style="max-width: 150px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><a href="<?php echo $row['offer_link']?>" target="_blank"><?php echo $row['offer_link']?></a></td>
        <td style="text-align: center"><?php echo $row['date']?></td>
        <td ><a href="delete.php?id=<?php echo $row['id'];?>"><button class=" btn btn-danger" type="button" name="deluser" value="deluser" >Delete</button></a></td>
        <td ><a href="update.php?id=<?php echo $row['id'];?>"><button class=" btn btn-success" type="button" >Update</button></a></td>
      </tr>
    </tbody>
    <?php
  }
}
?>
  </table>
</div>
</div>
</div>
</div>
</div>
<?php
if(isset($_POST['submit'])){
$id=$_POST['id'];
$name=$_POST['name'];
$link=$_POST['link'];
  $con=mysqli_connect('localhost','root','','optizmo');
  $insquery="INSERT INTO `offers`(`offer_id`, `offer_name`,`offer_link`) VALUES ($id,'$name','$link')";
  $query=mysqli_query($con,$insquery);
  if($query){
  echo "<script type=\"text/javascript\">".
        "alert('Hurray');window.location.href='optizmo.php'".
        "</script>";
      }
      else{
       echo "<script type=\"text/javascript\">".
        "alert('Something Went Wrong');window.location.href='optizmo.php'".
        "</script>";
    }
}
?>
</body>
</html>