<?php
$msg=false;
$addmsg=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
      $name= $_POST['uname'];
      $gender=$_POST['gender'];
      $date=$_POST['date'];
      $fname=$_POST['fname'];
      $mname=$_POST['mname'];
      $nationality=$_POST['nationality'];
      $Marital=$_POST['Marital'];
      $physically=$_POST['Physically'];
      $community=$_POST['Community'];
      $qualification=$_POST['Qualification'];
        $addline1=$_POST['line1'];
        $addline2=$_POST['line2'];
        $addline3=$_POST['line3'];
        $city=$_POST['city'];
        $state=$_POST['slist'];
        $Pincode=$_POST['Pincode'];
        $mobile=$_POST['mnumber'];
        $email=$_POST['emailField'];
        $cemail=$_POST['cemail'];
 include 'db_confiq.php';  
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else{
$sql = "INSERT INTO `joining` (`id`, `Name`, `Gender`, `DOB`, `Father`, `Mother`, `Nationality`, `Marital`, `Physically`, `Community`, `Qualification`, `Addline1`, `Addline2`, `Addline3`, `City`, `State`, `Pincode`, `Mobile`, `Email`, `Submitdate`) VALUES (NULL, '$name', '$gender', '$date', '$fname','$mname', '$nationality', '$Marital', '$physically', '$community', '$qualification ', '$addline1', '$addline2', '$addline3', '$city', '$state', '$Pincode', '$mobile', '$email', CURRENT_TIMESTAMP)";

if (mysqli_query($conn, $sql)) {
    global  $addmsg;
    $addmsg=true;
    
  } else {
    $duplicate = mysqli_error($conn);
        if($duplicate=="Duplicate entry 'choubeyazad@gmail.co' for key 'Email'"){
            global $msg;
            $msg=true;

           
        }

  }
  
  mysqli_close($conn);





    
}

}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="sty.css">
    <title>Joining</title>
</head><body>
    
<img src="img/home.jpg" style="width:98%;">

    <div class="Heading text-center mt-4">
        <h5>Application Form For Joining</h5>
        <p class="red">All the given fields are required starts with *</p>
    </div>
    <h6 class="bord text-center"> <strong>Part-1 Registration </strong></h6>
   
    <div class="form">
    <?php
                if($msg){
                    echo "<p style=' color:red;
                    font-size: 15px;
                    margin-left: 45%;'> Email id already exists !!!</p>";

                }
                elseif($addmsg){
                    echo "<p style=' color:green;
                    font-size: 15px;
                    margin-left: 45%;'> New record created successfully !!!</p>";

                }
      
      ?>
    <form id="text" action="form.php" method="post">
        <strong>
            <p id="ph"  > Personal Details </p>
        </strong>
        <table><tr>
            <td><b>Name</b>
                <input type="text" name="uname" style=" margin-left: 455px;  width:420px;" required>
                <p class="red1"><u>Note:</u> Name should be same as document.<br>
                    <u>Note:</u> Please do not use any prefix such Mr. or Ms etc.
                </p>
            </td></tr>
            <tr style="margin-bottom:10px;" > <td ><b>Gender</b>
           <SELECT id ="fill" name='gender' >
                  <OPTION Value="Male">Male</OPTION>
                  <OPTION Value="Female">Female</OPTION>
                  <OPTION Value="Other">Other</OPTION>
                  </SELECT>            </td></tr>
                  <tr id="fill">
                  <td  > <b>Date Of Birth</b> <input type="date" name="date" style=" margin-left: 417px;"  >
                  <p class="red1"><u> Note: </u> (Date Of Birth as recorded in Marticulation/Seccoundry Examnation Certificate.)</p>
                  </td>
                  </tr>
                  <tr>
                  <td > <b>Father Name's </b> <input type="text" name='fname' style=" margin-left: 413px;  width:420px;" required>
                  <p class="red1"><u> Note: </u> Do not use prefix such Shri or Mr etc. </p > </td>
                  </tr>
                  <tr>
                  <td > <b>Mother Name's </b>  <input type="text" name='mname' style=" margin-left: 405px;  width:420px;" required>
                  <p class="red1"><u> Note: </u> Do not use prefix such Smt or Mrs etc. </p > </td>
                  </tr>
                  <tr > <td ><b>Nationality</b>
                  <select name="nationality"  style=" margin-left: 428px;">
                  <option value="indian">--Indian--</option>
  <option value="afghan">Afghan</option>
  <option value="albanian">Albanian</option>
  <option value="algerian">Algerian</option>
  <option value="american">American</option>
  <option value="andorran">Andorran</option>
  <option value="angolan">Angolan</option>
  <option value="antiguans">Antiguans</option>
  <option value="argentinean">Argentinean</option>
  <option value="armenian">Armenian</option>
  <option value="australian">Australian</option>
  <option value="austrian">Austrian</option>
  <option value="azerbaijani">Azerbaijani</option>
  <option value="bahamian">Bahamian</option>
  <option value="bahraini">Bahraini</option>
  <option value="bangladeshi">Bangladeshi</option>
  <option value="barbadian">Barbadian</option>
  <option value="barbudans">Barbudans</option>
  <option value="batswana">Batswana</option>
  <option value="belarusian">Belarusian</option>
  <option value="belgian">Belgian</option>
  <option value="belizean">Belizean</option>
  <option value="beninese">Beninese</option>
  <option value="bhutanese">Bhutanese</option>
  <option value="bolivian">Bolivian</option>
  <option value="bosnian">Bosnian</option>
  <option value="brazilian">Brazilian</option>
  <option value="british">British</option>
  <option value="bruneian">Bruneian</option>
  <option value="bulgarian">Bulgarian</option>
  <option value="burkinabe">Burkinabe</option>
  <option value="burmese">Burmese</option>
  <option value="burundian">Burundian</option>
  <option value="cambodian">Cambodian</option>
  <option value="cameroonian">Cameroonian</option>
  <option value="canadian">Canadian</option>
  <option value="cape verdean">Cape Verdean</option>
  <option value="central african">Central African</option>
  <option value="chadian">Chadian</option>
  <option value="chilean">Chilean</option>
  <option value="chinese">Chinese</option>
  <option value="colombian">Colombian</option>
  <option value="comoran">Comoran</option>
  <option value="congolese">Congolese</option>
  <option value="costa rican">Costa Rican</option>
  <option value="croatian">Croatian</option>
  <option value="cuban">Cuban</option>
  <option value="cypriot">Cypriot</option>
  <option value="czech">Czech</option>
  <option value="danish">Danish</option>
  <option value="djibouti">Djibouti</option>
  <option value="dominican">Dominican</option>
  <option value="dutch">Dutch</option>
  <option value="east timorese">East Timorese</option>
  <option value="ecuadorean">Ecuadorean</option>
  <option value="egyptian">Egyptian</option>
  <option value="emirian">Emirian</option>
  <option value="equatorial guinean">Equatorial Guinean</option>
  <option value="eritrean">Eritrean</option>
  <option value="estonian">Estonian</option>
  <option value="ethiopian">Ethiopian</option>
  <option value="fijian">Fijian</option>
  <option value="filipino">Filipino</option>
  <option value="finnish">Finnish</option>
  <option value="french">French</option>
  <option value="gabonese">Gabonese</option>
  <option value="gambian">Gambian</option>
  <option value="georgian">Georgian</option>
  <option value="german">German</option>
  <option value="ghanaian">Ghanaian</option>
  <option value="greek">Greek</option>
  <option value="grenadian">Grenadian</option>
  <option value="guatemalan">Guatemalan</option>
  <option value="guinea-bissauan">Guinea-Bissauan</option>
  <option value="guinean">Guinean</option>
  <option value="guyanese">Guyanese</option>
  <option value="haitian">Haitian</option>
  <option value="herzegovinian">Herzegovinian</option>
  <option value="honduran">Honduran</option>
  <option value="hungarian">Hungarian</option>
  <option value="icelander">Icelander</option>
  <option value="indonesian">Indonesian</option>
  <option value="iranian">Iranian</option>
  <option value="iraqi">Iraqi</option>
  <option value="irish">Irish</option>
  <option value="israeli">Israeli</option>
  <option value="italian">Italian</option>
  <option value="ivorian">Ivorian</option>
  <option value="jamaican">Jamaican</option>
  <option value="japanese">Japanese</option>
  <option value="jordanian">Jordanian</option>
  <option value="kazakhstani">Kazakhstani</option>
  <option value="kenyan">Kenyan</option>
  <option value="kittian and nevisian">Kittian and Nevisian</option>
  <option value="kuwaiti">Kuwaiti</option>
  <option value="kyrgyz">Kyrgyz</option>
  <option value="laotian">Laotian</option>
  <option value="latvian">Latvian</option>
  <option value="lebanese">Lebanese</option>
  <option value="liberian">Liberian</option>
  <option value="libyan">Libyan</option>
  <option value="liechtensteiner">Liechtensteiner</option>
  <option value="lithuanian">Lithuanian</option>
  <option value="luxembourger">Luxembourger</option>
  <option value="macedonian">Macedonian</option>
  <option value="malagasy">Malagasy</option>
  <option value="malawian">Malawian</option>
  <option value="malaysian">Malaysian</option>
  <option value="maldivan">Maldivan</option>
  <option value="malian">Malian</option>
  <option value="maltese">Maltese</option>
  <option value="marshallese">Marshallese</option>
  <option value="mauritanian">Mauritanian</option>
  <option value="mauritian">Mauritian</option>
  <option value="mexican">Mexican</option>
  <option value="micronesian">Micronesian</option>
  <option value="moldovan">Moldovan</option>
  <option value="monacan">Monacan</option>
  <option value="mongolian">Mongolian</option>
  <option value="moroccan">Moroccan</option>
  <option value="mosotho">Mosotho</option>
  <option value="motswana">Motswana</option>
  <option value="mozambican">Mozambican</option>
  <option value="namibian">Namibian</option>
  <option value="nauruan">Nauruan</option>
  <option value="nepalese">Nepalese</option>
  <option value="new zealander">New Zealander</option>
  <option value="ni-vanuatu">Ni-Vanuatu</option>
  <option value="nicaraguan">Nicaraguan</option>
  <option value="nigerien">Nigerien</option>
  <option value="north korean">North Korean</option>
  <option value="northern irish">Northern Irish</option>
  <option value="norwegian">Norwegian</option>
  <option value="omani">Omani</option>
  <option value="pakistani">Pakistani</option>
  <option value="palauan">Palauan</option>
  <option value="panamanian">Panamanian</option>
  <option value="papua new guinean">Papua New Guinean</option>
  <option value="paraguayan">Paraguayan</option>
  <option value="peruvian">Peruvian</option>
  <option value="polish">Polish</option>
  <option value="portuguese">Portuguese</option>
  <option value="qatari">Qatari</option>
  <option value="romanian">Romanian</option>
  <option value="russian">Russian</option>
  <option value="rwandan">Rwandan</option>
  <option value="saint lucian">Saint Lucian</option>
  <option value="salvadoran">Salvadoran</option>
  <option value="samoan">Samoan</option>
  <option value="san marinese">San Marinese</option>
  <option value="sao tomean">Sao Tomean</option>
  <option value="saudi">Saudi</option>
  <option value="scottish">Scottish</option>
  <option value="senegalese">Senegalese</option>
  <option value="serbian">Serbian</option>
  <option value="seychellois">Seychellois</option>
  <option value="sierra leonean">Sierra Leonean</option>
  <option value="singaporean">Singaporean</option>
  <option value="slovakian">Slovakian</option>
  <option value="slovenian">Slovenian</option>
  <option value="solomon islander">Solomon Islander</option>
  <option value="somali">Somali</option>
  <option value="south african">South African</option>
  <option value="south korean">South Korean</option>
  <option value="spanish">Spanish</option>
  <option value="sri lankan">Sri Lankan</option>
  <option value="sudanese">Sudanese</option>
  <option value="surinamer">Surinamer</option>
  <option value="swazi">Swazi</option>
  <option value="swedish">Swedish</option>
  <option value="swiss">Swiss</option>
  <option value="syrian">Syrian</option>
  <option value="taiwanese">Taiwanese</option>
  <option value="tajik">Tajik</option>
  <option value="tanzanian">Tanzanian</option>
  <option value="thai">Thai</option>
  <option value="togolese">Togolese</option>
  <option value="tongan">Tongan</option>
  <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
  <option value="tunisian">Tunisian</option>
  <option value="turkish">Turkish</option>
  <option value="tuvaluan">Tuvaluan</option>
  <option value="ugandan">Ugandan</option>
  <option value="ukrainian">Ukrainian</option>
  <option value="uruguayan">Uruguayan</option>
  <option value="uzbekistani">Uzbekistani</option>
  <option value="venezuelan">Venezuelan</option>
  <option value="vietnamese">Vietnamese</option>
  <option value="welsh">Welsh</option>
  <option value="yemenite">Yemenite</option>
  <option value="zambian">Zambian</option>
  <option value="zimbabwean">Zimbabwean</option>
</select>
</td> </tr>
<tr > <td ><b>Marital Status</b>
<select name="Marital"  style=" margin-left: 413px;">
                  <option value="">--Select Marital--</option>
  <option value="Married">Married</option>
  <option value="Unmarried">Unmarried</option>
  </select></td> </tr>
  <tr > <td ><b>Physically Changed :</b>
  <select name="Physically"  style=" margin-left: 377px;">
 <option value="Yes">Yes</option>
  <option value="No">No</option>
  </td> </tr>
  <tr > <td ><b>Community :</b>
  <select name="Community"  style=" margin-left: 417px; margin-bottom:10px;">
 <option value="Yes">Gerenal</option>
  <option value="No">OBC</option>
  <option value="No">SC/ST</option>
  </td> </tr> </table>  
   <strong>
            <p id="ph"> Educational Qualification </p>
        </strong>  
        <table>  
        <tr > <td ><b>Select Your Educational Qualification :</b>      
        <select name="Qualification"  style=" margin-left: 275px; margin-bottom:10px;">
        <option value="">--Select Your Qualification--</option>
 <option value="10th">10th</option>
  <option value="10+2">10+2</option>
  <option value="Grauation">Grauation</option>
  <option value="Post Grauation ">Post Grauation </option>   
         </td> </tr> </table>  
         <strong>
            <p id="ph"> Address </p>
        </strong>       
        <table>  
        
        <p class="red" style="margin-bottom:2px; margin-left: 500px;"><u> Note: </u> Do not enter your name again in address flieds. </p > </td>
        <tr > <td ><b>Line 1:</b>
        <input type="text"  name='line1' style=" margin-left: 458px;  width:420px;" required>
        </td> </tr> 
        <tr > <td ><b>Line 2:</b>
        <input type="text" name='line2' style=" margin-left: 458px;   width:420px;"  required>
        </td> </tr> 
        
        <tr > <td ><b>Line 3:</b>
        <input type="text" name='line3' style=" margin-left: 458px;   width:420px;" required>
        </td> </tr> 
        <tr > <td ><b>District/City:</b>
        <input type="text" name='city' style=" margin-left: 422px;   width:420px;" required>
        </td> </tr> 
        <tr > <td ><b>State/UT :</b>
<select name=slist  style=" margin-left: 440px;">
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Orissa">Orissa</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttaranchal">Uttaranchal</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="West Bengal">West Bengal</option>
</select>
<tr > <td ><b>Pincode:</b>
        <input type="number" name='Pincode' style=" font-size: 12px; margin-left: 447px;  width:80px; " required>
        </td> </tr> 
        
        <tr > <td ><b>Mobile No:</b>
        <input type="number" name='mnumber' style=" font-size: 12px; margin-left: 433px;  width:150px; " required>
        </td> </tr>       
        <tr > <td ><b>Email id:</b> 
        <input type="text" id="emailField" name='emailField' pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$" style=" font-size: 12px; margin-left: 446px;  width:420px; " placeholder ="Enter Email id"required>
     
      
        <tr > <td ><b> Confirm Email id:</b> 
        <input type="text" id="cemail" name='cemail' pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$" style=" font-size: 12px; margin-left: 395px;  width:420px; " required>
      <tr> <td ><input type="submit" vaule="Submit"  id="okButton"  disabled style="margin-left:50%; margin-bottom:10px; margin-top:10px;" /> <input type="reset" >
        </form>  </div>
        <script>
const signUpForm = document.getElementById('text');
var emailField = document.getElementById('emailField');
const okButton = document.getElementById('okButton');
var cemail= document.getElementById('cemail');
emailField.addEventListener('keyup',testpassword2);   
cemail.addEventListener('keyup',testpassword2);
    function testpassword2() {
    if (emailField.value==cemail.value ) {
    okButton.disabled = false;
  } else {  
    okButton.disabled = true;
  }
};
  
okButton.addEventListener('click', function (event) {
  signUpForm.submit();
});
</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>
</html>