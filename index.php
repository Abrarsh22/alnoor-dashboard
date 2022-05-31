<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title> AlNoor DashBoard </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style type="text/css">
.filesdrop{
   display:grid;
   justify-content: space-around;
}
.dropdown{
 width:250px;
 height:30px;
}
.dropdown-content{
    text-align: center;
  width:250px;
  height:100%;
  overflow-y:auto; 
  border:1px solid #ff8800;
  border-top:0px;
  display:none;
}
.dropdown-content ul{padding:0px;}
.dropdown-content li{
  top:12px;
   list-style:none;
   width:100%;
   color:#000;
   background:#f2f2f2;
   height:35px;
   margin-bottom: 1px;
}
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <style type="text/css">
           .custom-btn{}
       </style>
    </head>

<body style="background-image:linear-gradient(to right bottom,rgb(255, 215, 0,0.5),rgb(255,255,255,0.8),rgb(255, 215, 0,1));
background-repeat: no-repeat;background-attachment: fixed;" >
    <div class="container" style="border: 1px solid #000;background-color: rgb(49,41,4);">
        <div class="row">
            <div class="col-md-3" style="display: flex;justify-content: right">
        <img src="AlNoorlogocircle.png" height="180px" style="border-width: 0px;background-color:rgb(49,41,4) ;">
</div>
<div class="col-md-9" style="background-color: none;display: flex;justify-content: left;height: 180px;align-items: center;">
        <img src="Alnoorlogo (1).jpg" height="100px" width="580px" style="border-width: 0px;background-color: rgb(49,41,4)">
    </div>
</div>
<br/>
<center>
    <font face="verdana" size="5" style="color: #fff;text-decoration: underline;"> Select the file which is to be compared.</font>
</center>
<br/>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #fff";>
        <tr >
            <td width="100%" align="center" bgcolor="#e4ddf4" style="padding: 5px;display: flex;justify-content: center;">
                <font face="verdana" size="3.5" color="#2d2d2d"style="font-size: 16px;color: #000;padding: 5px;letter-spacing: 0.2px"  ><b>Select the main file: </b></font>
                <input type="file" name="mainFile" style="font-size: 16px;color: #000;text-decoration: underline;border:1px solid #000;
                padding: 5px;box-shadow: 2px 2px 2px #fff" required />        
            </td>
        </tr>
        <tr>
            <td>
                <div style="background-color: #fffbf0;height: 10px"></div>
            </td>
        </tr>
        <tr>
                <td width="50%" align="center" bgcolor="#943d24" style="padding: 5px">
                    <font face="verdana" size="3" style="font-size: 16px;color: #fff;padding: 5px;letter-spacing: 0.3px"><b>Set the Splitting value: </b></font>
  <input type="text" id="val" name="val" style="border:1px solid #000;padding: 3px" required>
            </td>       
        </tr>       

        <tr>
            <td colspan="2" align="center">
                <br/>
                    <input type="submit" value="Start Splitting" name="submitButton" class="btn btn-primary" />
                <br/>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <br />
            </td>
        </tr>
</table>
</form>
<br/>

<script>
$(document).ready(function(){
$('.dropdown-content').fadeToggle();

$("input:radio").click(function() {
        var output = "";
        $("input:checked").each(function() {
            output += $(this).next('span').text() + ", ";
            //alert(output);     
        }); 
        $(".dropdown").val(output.trim().slice(0,-1));
        //alert(document.getElementById('fname').value);  
        var d=document.getElementById('fname').value;
        //alert(d);
  }); 
});
function func1(){
  window.open('index.php','_blank');

}
        </script> 
<?Php

if( isset($_POST['submitButton']) && isset($_POST['val'])) {
$file1 = $_FILES['mainFile']['tmp_name'];
$lines1 = file( $file1, FILE_IGNORE_NEW_LINES );
$val = $_POST['val'];
$intval=(int)$val;
$file = fopen($file1,"r"); // this file could be raw.log or anything
$in = file("$file1");
$counter = 1; // to void warning    
?><form method="POST" action="result.php" enctype="multipart/form-data" target="_blank">
    <div class="table-responsive">
    <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border:1px solid #fff;" class="table">
        <tr >
            <td width="50%" align="center" bgcolor="#c8d8e4">
    <?php
        echo '<br/><div class=""><input type="text" class="dropdown" placeholder="Select Values" name="fname" id="fname" autocomplete="off"  />
        <div class="dropdown-content">
    <ul>';
while ($chunk = array_splice($in, 0, $intval)){
      //$f = fopen("split/splitfile".($counter++), "w");
      $data=implode("", $chunk);
      $result='splitfile_'.($counter++).'.';
      file_put_contents($result,$data);
      echo '<li><input type="radio" name="checkboxes[]" /><span style="padding: 5px;margin-top: 1px">'.$result.'</span><a href="View.php?file='.$result.'" target="_blank" class="btn btn-warning" style="padding: 5px">View</a><a href="download.php?file='.$result.'" class="btn btn-info"
        style="padding: 5px;margin-left: 5px">Download</a></li>

';
 

      //fputs($f, implode("", $chunk));
      //fclose($f);
//$my=fopen($result, "r");
//echo nl2br(fread($my,filesize("new2")));

}
echo '</ul></div>
<td width="50%" align="center" bgcolor="#2b6777">
                <font face="verdana" size="3.5" style="font-size: 16px;color: #fff;padding: 5px;letter-spacing: 0.2px"  ><b>Select the Black file to be compared: </b></font>
                <input type="file" name="fileToCompare" style="font-size: 16px;color: #fff;text-decoration: underline;border:1px solid #fff;
                padding: 5px;box-shadow: 2px 2px 2px #2b6777" required />
            </td></tr>
            <tr>
            <td colspan="2" align="center">
                <br/>
                    <input type="submit" value="Start Comparison" name="start" class="btn btn-primary" />
                <br/><br/>
            </td>
        </tr></table></div></form>';
        
}

?>
<div class="main" style="display: flex;justify-content: center;margin-top: 20px;margin-bottom: 20px;">
<div class="img-main" style="background-color:black;width:385px;" >
    <div class='img' >
        <a href="optizmo.php" target="_blank">
        <img src="optizmo.png" style="width:300px">
    </a>
    </div>
</div>
</div>
</div>
</body>
</html>     