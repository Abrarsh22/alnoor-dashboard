<?Php
if( isset($_POST['start'])) {

    // File paths of the two files
  $file1=$_POST['fname'];
  $file=fopen($file1, 'r+');
    $file2 = $_FILES['fileToCompare']['tmp_name'];
 
 $lines1 = file( $file1, FILE_IGNORE_NEW_LINES );
$lines2 = file( $file2, FILE_IGNORE_NEW_LINES );

$data2 = file_get_contents("$file2");
$matches=array();

$resul = array_intersect( $lines1, $lines2 );
$text1=implode("\n",$resul );
file_put_contents('newfil.txt', $text1);
 $file="newfil.txt";
    $linecount = 0;
    $handleFile = fopen($file, "r");

    while(!feof($handleFile)){
      $line = fgets($handleFile);
      $linecount++;
    }
    
      if($linecount==1){
      	$linecount=0;
      }
  	
    fclose($handleFile);
    
    echo "Count of Similar Words".$linecount;
    echo "<br/>";

$result = array_diff( $lines1, $lines2 );
	$text = implode( "\n", $result );
$validEmails = array_filter($result, function($val) {
    return (bool) filter_var($val, FILTER_VALIDATE_EMAIL); 
});
$validEmailString = implode("\n",$validEmails);
//echo nl2br($validEmailString);
//	$texts=filter_var($text, FILTER_VALIDATE_EMAIL);
//		echo nl2br($texts);
	
$filename="blackfile.txt";

	file_put_contents($filename, $validEmailString);

//header("Content-Disposition: attachment; filename=$filename");
//header("Content-Type: text/plain "); 

//readfile($filename);
//exit();
	 //Link to download file...
 $url = "blackfile.txt";

 //Code to get the file...
 $data = file_get_contents($url);

 //save as?
 $filena = "blackfil.php";

 //save the file...
 $fh = fopen($filena,"w");
 fwrite($fh,$data);
 fclose($fh);

 //display link to the file you just saved...
echo "<a href='".$filena."' download>Click Here</a> to download the file...";


}
    ?>