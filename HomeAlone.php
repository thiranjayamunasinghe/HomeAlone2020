
<html>

<?php

require_once __DIR__ . '/vendor/autoload.php';


if(isset($_POST['send']))
{
if (isset($_POST['email'])) 
{
   $email = $_POST['email'];
   
   
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbName='homealone';

  // Create connection
  $conn = new mysqli($servername, $username, $password,$dbName);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  // echo ">Connected successfully";


  $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);


  $sql="select * from users where email = '".$email."'";
  $result=$conn->query($sql);


  if($result->num_rows >0){
    $row=$result->fetch_assoc();
    echo $row['name'];
    $name=$row['name'];
    $competition='HomeAlone 2020';



    $html='
    <center>
    <style>
    .signature, .title { 
    float:left;
      border-top: 1px solid #000;
      width: 200px; 
      text-align: center;
    }
    </style>
    <div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
    <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
          <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
          <br><br>
          <span style="font-size:25px"><i>This is to certify that</i></span>
          <br><br>
          <span style="font-size:30px"><b>'.$name.'</b></span><br/><br/>
          <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
          <span style="font-size:30px">'.$competition.'</span> <br/><br/>
          <span style="font-size:20px">with score of <b>$grade.getPoints()%</b></span> <br/><br/><br/><br/>
          <span style="font-size:25px"><i>Completed Date</i></span><br>
          <span style="font-size:25px"><i>01-Sep-2018</i></span><br>
    <table style="margin-top:40px;float:left">
    <tr>
    <td><span><b>'.$name.'</b></td>
    </tr>
    <tr>
    <td style="width:200px;float:left;border:0;border-bottom:1px solid #000;"></td>
    </tr>
    <tr>
    <td style="text-align:center"><span><b>Signature</b></td>
    </tr>
    </table>
    <table style="margin-top:40px;float:right">
    <tr>
    <td><span><b>'.$name.'</b></td>
    </tr>
    <tr>
    <td style="width:200px;float:right;border:0;border-bottom:1px solid #000;"></td>
    </tr>
    <tr>
    <td style="text-align:center"><span><b>Signature</b></td>
    </tr>
    </table>
    </div>
    </div>
    </center>';



    $mpdf->WriteHTML($html);
    $mpdf->Output();
    }
    echo "<br><h4>Email not found</h4></br>";
  }else{
    
    echo "<br>Something went wrong. Please try again</br>";
  }
}else{
  echo "<br>Something went wrong. Please try again</br>";
}

?>
</html>