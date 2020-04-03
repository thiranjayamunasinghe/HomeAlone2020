
<html>

<?php

require_once __DIR__ . '/vendor/autoload.php';


   $email ='thiranjayamunasinghe@gmail.com';
   
   
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


  $mpdf = new \Mpdf\Mpdf(['format' => 'A4-L','margin_left' => 1,
  'margin_right' => 1,
  'margin_top' => 1,
  'margin_bottom' => 1]);


  $sql="select * from users where email = '".$email."'";
  $result=$conn->query($sql);


  if($result->num_rows >0){
    $row=$result->fetch_assoc();
    echo $row['name'];
    $name=$row['name'];
    $competition='HomeAlone 2020';






    $html='<center>
    
    <div style="height:100%; padding:20px; text-align:center; border: 10px solid #787878">
    <div style="height:87%; padding:20px; text-align:center; border: 5px solid #787878">
      
      <div>
         <table align="center"  style="margin-top:0px; margin-left: 0px; margin-bottom:5px; padding-bottom:0px;">
        <tr class="logo">
          <td> <div class="ifsuHomeAlone">
            <img class="homeAloneLogo"  src="C:\xampp\htdocs\my\HomeAlone\assets\logo.png">
          </div></td>
        <td> <div class="ifsuHomeAlone">
          <img class="ifsuLogo"  src="C:\xampp\htdocs\my\HomeAlone\assets\itfsu.png">
        </div></td>
        
        </tr>
        </table>
     </div>
     
        <div> <span style="font-size:36px; color:#f80000;font-weight:bold">CERTIFICATE OF PARTICIPATION</span></div> 
         
          <div class="changePadding"><span style="font-size:24px;">This is to certify that</span></div>
          <div class="bigFontChangPadding"><span style="font-size:28px;"><b><u class="dotted">'.$name.'</u></b></span>
                <span style="font-size:24px">of the team </span>
                <span style="font-size:28px"><u class="dotted"><b>CodeIT</b></u></span> </div>
          <div class="changePadding"><span style="font-size:24px">has participated in the virtual <b>mini-hackathon HomeAlone2020 </b>organized by the</span> </div>
          <!-- <span style="font-size:20px"></span><br> -->
         <div class="changePadding"> <span style="font-size:24px">Students\' Union of the Information Technology Faculty,University of Moratuwa,</span></div>
          <div class="changePadding"><span style="font-size:24px">which was held from 2nd April - 5th April 2020.</span></div>

     <div>
        <table align="center"  style="margin-top:0px;margin-left: 0px;margin-bottom:0px;padding-bottom:0px;">
        <tr>
          <td> <div class="ifsuHomeAlone">
            <img class="seal"  src="C:\xampp\htdocs\my\HomeAlone\assets\star.png">
          </div></td>
        </tr>
        </table>
     </div>
   
    </div>
    </div>
    </center>';

   

    $stylesheet = file_get_contents('style/styles.css');


     $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
     $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

    // $mpdf->WriteHTML($stylesheet,1);
// $mpdf->WriteHTML($html2,2);

    // $mpdf->WriteHTML($html);
    $mpdf->Output('HomeAlone2020.pdf', \Mpdf\Output\Destination::INLINE);
    }
    echo "<br><h4>Email not found</h4></br>";
  

?>
</html>