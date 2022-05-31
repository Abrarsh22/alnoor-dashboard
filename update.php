<?php
$con=mysqli_connect('localhost','root','','optizmo');
$id = $_GET['id'];
  $selquery="SELECT * FROM offers where id='$id'";

    if(isset($_POST['submit'])){
      $ids=$_POST['id'];
      $name=$_POST['name'];
      $link=$_POST['link'];
      $updquery="UPDATE `offers` SET offer_id='$ids',offer_name='$name',offer_link='$link' where id='$id';";
      $updateres=mysqli_query($con,$updquery);
       if($updateres){
     echo "<script type=\"text/javascript\">".
        "alert('Hurray');window.location.href='optizmo.php'".
        "</script>";
  }
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>
    Admin Dashboard
  </title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Adamina' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Alata' rel='stylesheet'>
  <script>
    $(document).ready(function(){
      $('#myModal').modal('show');
    });
  </script>
    </head>
<body>
  <div>
    <h3><a href="optizmo.php">View Offers</a></h3>
  </div>
  <div id="myModal" class="modal fade" role="dialog" data-show="true">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Update Offers</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <?php
  $result = mysqli_query($con,$selquery); 
    while ($row = mysqli_fetch_assoc($result)){?>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
    <label for="pid">Enter Offer Id:</label>
    <input type="text" class="form-control" id="id" name="id" required value="<?php echo $row['offer_id']?>">
  </div>
  <div class="form-group">
    <label for="pname">Enter Offer Name:</label>
    <input type="text" class="form-control" id="name" name="name" required value="<?php echo $row['offer_name']?>">
  </div>
  <div class="form-group">
    <label for="pname">Enter Offer Link:</label>
    <input type="text" class="form-control" id="link" name="link" required value="<?php echo $row['offer_link']?>">
  </div>
  <div class="submit" style="display: flex;justify-content: center;">
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</div>
</form>
<?php
}
?>

      </div>
      <div class="modal-footer" style="display: flex;justify-content: flex-end;">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</body>
</html>
