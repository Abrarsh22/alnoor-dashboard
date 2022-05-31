<html>
<head>
  <title>
    Result
  </title>
</head>
</html>
<?Php
	
        $file=$_GET['file'];
    //header('Content-Type:text/plain');
    //header("Content-Disposition: attachment; filename=" . urlencode($file));
    //header('Content-Disposition:inline;filename="download.txt"');
   // header("Content-Length: " . filesize($file));
    echo "<h4>".nl2br(file_get_contents($file))."</h4>";

?>
