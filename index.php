
<html>

<?php

require_once __DIR__ . '/vendor/autoload.php';


  $email = base64_decode($_GET['q']);
  // $email ='thiranjayamunasinghe@gmail.com';
  

   
   
  $servername = "localhost";
  $username = "itfsulk_homealone2020";
  $password = "homealone2020";
  $dbName='itfsulk_homealone2020';

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
    $name=$row['name'];
    $rank=1;
    
    
    
    $competition='HomeAlone 2020';




    $ParticipationHTML='<center>
    
    <div style="height:100%; padding-bottom:10px;padding-right:5px; text-align:center; border-left: 45px solid #444040;border-right: 45px solid #444040;border-top: 25px solid #444040; border-bottom: 25px solid #444040">
    <div style=" height:87%; padding:20px; text-align:center;margin-left: 5px; margin-top: 5px; margin-right: 0px; margin-bottom: 1px; border: 8px solid  #721414">
      
      <div>
         <table align="center"  style="margin-top:0px; margin-left: 0px; margin-bottom:5px; padding-bottom:0px;">
        <tr class="logo">
          <td> <div class="ifsuHomeAlone">
            <img class="homeAloneLogo"  src="assets/logo.png">
          </div></td>
        <td> <div class="ifsuHomeAlone">
          <img class="ifsuLogo"  src="assets/itfsu.png">
        </div></td>
        
        </tr>
        </table>
     </div>
     
     <div>
     <span
       class="fontChange"
       style="font-size: 35px; color: #de0000; font-weight: bold;"
       >CERTIFICATE OF PARTICIPATION</span
     >
   </div>
         
   <div class="changePadding">
   <span class="fontChange" style="font-size: 20px;"
     >This is to certify that</span
   >
 </div>
 <div class="bigFontChangPadding1">
 <span style="font-size: 25px;"
   ><b><u class="dotted">'.$name.'</u></b></span
 >
 <span class="fontChange" style="font-size: 20px;">of the team </span>
 <span class="fontChange" style="font-size: 25px;"
   ><u class="dotted"><b>CodeIT</b></u></span
 >
</div>
<div class="changePaddingSpecial">
 <span class="fontChange" style="font-size: 20px;"
   >has participated in the virtual
   <b>mini-hackathon HomeAlone2020 </b>organized
 </span>
</div>
<!-- <span style="font-size:20px"></span><br> -->
<div class="changePadding">
 <span class="fontChange" style="font-size: 20px;"
   >by the Students\' Union of the Faculty of Information
   Technology,</span
 >
</div>
<div class="changePadding">
 <span class="fontChange" style="font-size: 20px;"
   >University of Moratuwa, which was held from
 </span>
</div>
<div class="changePadding">
 <span class="fontChange" style="font-size: 20px;"
   >2nd April - 5th April 2020.</span
 >
</div>

     <div>
        <table align="center"  style="margin-top:0px;margin-left: 0px;margin-bottom:0px;padding-bottom:0px;">
        <tr>
          <td> <div>
            <img class="seal"  src="assets/star.png">
          </div></td>
        </tr>
        </table>
     </div>
   
    </div>
    </div>
    </center>';



    $WinnerHTML='<center>
    
    <div style="height:100%; padding-bottom:10px;padding-right:5px; text-align:center; border-left: 45px solid #444040;border-right: 45px solid #444040;border-top: 25px solid #444040; border-bottom: 25px solid #444040">
    <div style=" height:87%; padding:20px; text-align:center;margin-left: 5px; margin-top: 5px; margin-right: 0px; margin-bottom: 1px; border: 8px solid  #721414">
      
      <div>
         <table align="center"  style="margin-top:0px; margin-left: 0px; margin-bottom:5px; padding-bottom:0px;">
        <tr class="logo2">
          <td> <div class="ifsuHomeAlone2">
            <img class="homeAloneLogo2"  src="assets/logo.png">
          </div></td>
        <td> <div class="ifsuHomeAlone2">
          <img class="ifsuLogo2" src="assets/itfsu.png">
        </div></td>
        
        </tr>
        </table>
     </div>
     
     <div>
     <span
       class="fontChange2"
       style="font-size: 35px; color: #de0000; font-weight: bold;"
       >CERTIFICATE OF ACHIEVEMENT</span
     >
   </div>
         
   <div class="changePadding2">
   <span class="fontChange2" style="font-size: 20px;"
     >This is to certify that</span
   >
 </div>
 <div class="bigFontChangPadding21">
 <span class="fontChange2" style="font-size: 25px;"
   ><b><u class="dotted2">'.$name.'</u></b></span
 >
 <span class="fontChange2" style="font-size: 20px;">was a part of </span>
</div>
<div class="bigFontChangPadding22">
 <span class="fontChange2" style="font-size: 20px;"> the team </span>
 <span style="font-size: 25px;"
   ><u class="dotted2"><b>CodeIT</b></u></span
 >
 <span style="font-size: 20px;">that emerged </span>
 <span style="font-size: 25px;"
   ><b><u class="dotted2">Winner</u></b></span
 ><span style="font-size: 20px;"> out of the 423 teams </span>
</div>
<div class="changePadding2">
 <span class="fontChange2" style="font-size: 20px;">
 in the virtual <b> mini-hackathon HomeAlone2020 </b>organized by the</span
 >
</div>
<!-- <span style="font-size:20px"></span><br> -->
<div class="changePadding2">
 <span class="fontChange2" style="font-size: 20px;"
   >Students\' Union of the Faculty of Information Technology,</span
 >
</div>
<div class="changePadding2">
 <span class="fontChange2" style="font-size: 20px;"
   >University of Moratuwa, which was held from
 </span>
</div>
<div class="changePadding2">
 <span class="fontChange2" style="font-size: 20px;">
   2nd April - 5th April 2020.</span
 >
</div>

     <div>
        <table align="center"  style="margin-top:0px;margin-left: 0px;margin-bottom:0px;padding-bottom:0px;">
        <tr>
          <td> <div>
            <img class="seal"  src="assets/star.png">
          </div></td>
        </tr>
        </table>
     </div>
   
    </div>
    </div>
    </center>';

   



     

     
     if(!$rank.is_null){
      if($rank==1){
        $stylesheet_winner = file_get_contents('style/styles-winner.css');
        $mpdf->WriteHTML($stylesheet_winner,\Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($WinnerHTML,\Mpdf\HTMLParserMode::HTML_BODY);
      }else if($rank>=2&&$rank<=20) {
        
        $stylesheet_winner = file_get_contents('style/styles-winner.css');
        $mpdf->WriteHTML($stylesheet_winner,\Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($WinnerHTML,\Mpdf\HTMLParserMode::HTML_BODY);
      }else{
        
        $stylesheet_participant = file_get_contents('style/styles.css');
        $mpdf->WriteHTML($stylesheet_participant,\Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($ParticipationHTML,\Mpdf\HTMLParserMode::HTML_BODY);
      }
     }

    // $mpdf->WriteHTML($stylesheet,1);
// $mpdf->WriteHTML($html2,2);

    // $mpdf->WriteHTML($html);
    $mpdf->Output('HomeAlone2020.pdf', \Mpdf\Output\Destination::INLINE);
    }
    echo "<br><h3>Email not found</h3></br>";
  

?>
</html>