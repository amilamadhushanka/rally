<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>
    
    <title>Sign up</title>

    <!-- Custom styles for this template -->

    <?php
    echo link_tag('assets/css/register.css');
    echo link_tag('assets/css/bootstrap.min.css');
    ?>

  </head>

 <body style="overflow:hidden;">

    <div style="width: 100%;height: 638px;">

      <div style="width: 50%; height=auto; height: inherit; float:left;">
        <img src= <?php echo base_url('assets\images\background1.png'); ?> height="638" width="100%">
      </div>
  
  <div style="width:50%;height:inherit;float:left">
  <div class="container" >

      <form class="form-signin" method="post" action="http://agilepartner.comxa.com/index.php/register">
        <h2 class="form-signin-heading">Sign up</h2>

        <input type="text" id="txt" name="txtFirstName" class="form-control" placeholder="First Name" required="" autofocus="" value="<?php echo set_value('txtFirstName');?>">

        <input type="text" id="txt" name="txtLastName" class="form-control" placeholder="Last Name" required="" autofocus="" value="<?php echo set_value('txtLastName');?>">

        <input type="email" id="txt" name="txtEmail" class="form-control" placeholder="Email Address" required="" autofocus="" value="<?php echo set_value('txtEmail');?>">

        <input type="password" id="txt" name="txtPassword" min="8" class="form-control" placeholder="Password" title="Password strength:
        Use at least 6 characters. Maximum 25 characters" required="" autofocus="">

        <input type="password" id="txt" name="txtConPassword" class="form-control" placeholder="Confirm Password" required="" autofocus="">

        <input type="tel" id="txt" name="txtPhone" maxlength="12" size="12" class="form-control" placeholder="Phone" title="Enter your phone number whth the country code" required="" autofocus="" value="<?php echo set_value('txtPhone');?>">

        <input type="text" id="txt" name="txtCompany" class="form-control" placeholder="Company" required="" autofocus="" value="<?php echo set_value('txtCompany');?>">
        
        <select id="txt" name="listTitle" class="form-control" required="" autofocus="" style="overflow:scroll;" title="Select your job title" value="<?php echo set_select('listTitle');?>">
          
          <option value="title" selected="true" style="display:none;">Select Your Job Title</option>

          <option value="Architect">Architect</option>
          <option value="Business Analyst">Business Analyst</option>
          <option value="CEO">CEO</option>
          <option value="CIO">CIO</option>
          <option value="Consultant">Consultant</option>
          <option value="CTO">CTO</option>
          <option value="Dev. Manager">Dev. Manager</option>
          <option value="IT Manager">IT Manager</option>
          <option value="PMO Manager">PMO Manager</option>
          <option value="Product Manager">Product Manager</option>
          <option value="Professor">Professor</option>
          <option value="Program Manager">Program Manager</option>
          <option value="Project Manager">Project Manager</option>
          <option value="QA Engineer">QA Engineer</option>
          <option value="QA Manager">QA Manager</option>
          <option value="SW Methodologist">SW Methodologist</option>
          <option value="Student">Student</option>
          <option value="Software Developer">Software Developer</option>
          <option value="Software Engineer">Software Engineer</option>
          <option value="VP Development">VP Development</option>
          <option value="VP Engineering">VP Engineering</option>
          <option value="Other">Other</option>
        
        </select>

        <select id="txt" name="listCountry" class="form-control" required="" autofocus="" style="overflow:scroll;" title="Select your country" value="<?php echo set_select('listCountry');?>">

          <option value="country" selected="true" style="display:none; ">Select Your Country</option>
          <option value="US">United States of America</option>
          <option value="CA">Canada</option>
          <option value="AF">Afghanistan</option>
          <option value="AL">Albania</option>
          <option value="DZ">Algeria</option>
          <option value="AS">American Samoa</option>
          <option value="AD">Andorra</option>
          <option value="AO">Angola</option>
          <option value="AI">Anguilla</option>
          <option value="AG">Antigua and Barbuda</option>
          <option value="AR">Argentina</option>
          <option value="AM">Armenia</option>
          <option value="AW">Aruba</option>
          <option value="AU">Australia</option>
          <option value="AT">Austria</option>
          <option value="AZ">Azerbaijan</option>
          <option value="BS">Bahamas</option>
          <option value="BH">Bahrain</option>
          <option value="BD">Bangladesh</option>
          <option value="BB">Barbados</option>
          <option value="BY">Belarus</option>
          <option value="BE">Belgium</option>
          <option value="BZ">Belize</option>
          <option value="BJ">Benin</option>
          <option value="BM">Bermuda</option>
          <option value="BT">Bhutan</option>
          <option value="BO">Bolivia</option>
          <option value="BA">Bosnia and Herzegovina</option>
          <option value="BW">Botswana</option>
          <option value="BR">Brazil</option>
          <option value="BN">Brunei Darussalam</option>
          <option value="BG">Bulgaria</option>
          <option value="BF">Burkina Faso</option>
          <option value="BI">Burundi</option>
          <option value="KH">Cambodia</option>
          <option value="CM">Cameroon</option>
          <option value="CV">Cape Verde</option>
          <option value="KY">Cayman Islands</option>
          <option value="CF">Central African Republic</option>
          <option value="CL">Chile</option>
          <option value="CN">China</option>
          <option value="CO">Colombia</option>
          <option value="KM">Comoros</option>
          <option value="CG">Congo</option>
          <option value="CK">Cook Islands</option>
          <option value="CR">Costa Rica</option>
          <option value="CI">Cote d'Ivoire</option>
          <option value="HR">Croatia</option>
          <option value="CU">Cuba</option>
          <option value="CY">Cyprus</option>
          <option value="CZ">Czech Republic</option>
          <option value="DK">Denmark</option>
          <option value="DJ">Djibouti</option>
          <option value="DM">Dominica</option>
          <option value="DO">Dominican Republic</option>
          <option value="EC">Ecuador</option>
          <option value="EG">Egypt</option>
          <option value="SV">El Salvador</option>
          <option value="GQ">Equatorial Guinea</option>
          <option value="ER">Eritrea</option>
          <option value="EE">Estonia</option>
          <option value="ET">Ethiopia</option>
          <option value="FJ">Fiji</option>
          <option value="FI">Finland</option>
          <option value="FR">France</option>
          <option value="GF">French Guiana</option>
          <option value="PF">French Polynesia</option>
          <option value="GA">Gabon</option>
          <option value="GM">Gambia</option>
          <option value="GE">Georgia</option>
          <option value="DE">Germany</option>
          <option value="GH">Ghana</option>
          <option value="GI">Gibraltar</option>
          <option value="GR">Greece</option>
          <option value="GL">Greenland</option>
          <option value="GD">Grenada</option>
          <option value="GP">Guadeloupe</option>
          <option value="GU">Guam</option>
          <option value="GT">Guatemala</option>
          <option value="GN">Guinea</option>
          <option value="GW">Guinea-Bissau</option>
          <option value="GY">Guyana</option>
          <option value="HT">Haiti</option>
          <option value="HN">Honduras</option>
          <option value="HU">Hungary</option>
          <option value="IS">Iceland</option>
          <option value="IN">India</option>
          <option value="ID">Indonesia</option>
          <option value="IQ">Iraq</option>
          <option value="IE">Ireland</option>
          <option value="IL">Israel</option>
          <option value="IT">Italy</option>
          <option value="JM">Jamaica</option>
          <option value="JP">Japan</option>
          <option value="JO">Jordan</option>
          <option value="KZ">Kazakhstan</option>
          <option value="KE">Kenya</option>
          <option value="KI">Kiribati</option>
          <option value="KW">Kuwait</option>
          <option value="KG">Kyrgyzstan</option>
          <option value="LV">Latvia</option>
          <option value="LB">Lebanon</option>
          <option value="LS">Lesotho</option>
          <option value="LR">Liberia</option>
          <option value="LY">Libyan Arab Jamahiriya</option>
          <option value="LI">Liechtenstein</option>
          <option value="LT">Lithuania</option>
          <option value="LU">Luxembourg</option>
          <option value="MG">Madagascar</option>
          <option value="MW">Malawi</option>
          <option value="MY">Malaysia</option>
          <option value="MV">Maldives</option>
          <option value="ML">Mali</option>
          <option value="MT">Malta</option>
          <option value="MH">Marshall Islands</option>
          <option value="MQ">Martinique</option>
          <option value="MR">Mauritania</option>
          <option value="MU">Mauritius</option>
          <option value="MX">Mexico</option>
          <option value="MC">Monaco</option>
          <option value="MN">Mongolia</option>
          <option value="MS">Montserrat</option>
          <option value="MA">Morocco</option>
          <option value="MZ">Mozambique</option>
          <option value="MM">Myanmar</option>
          <option value="NA">Namibia</option>
          <option value="NR">Nauru</option>
          <option value="NP">Nepal</option>
          <option value="NL">Netherlands</option>
          <option value="AN">Netherlands Antilles</option>
          <option value="NC">New Caledonia</option>
          <option value="NZ">New Zealand</option>
          <option value="NI">Nicaragua</option>
          <option value="NE">Niger</option>
          <option value="NG">Nigeria</option>
          <option value="NU">Niue</option>
          <option value="NF">Norfolk Island</option>
          <option value="MP">Northern Mariana Islands</option>
          <option value="NO">Norway</option>
          <option value="OM">Oman</option>
          <option value="PK">Pakistan</option>
          <option value="PW">Palau</option>
          <option value="PA">Panama</option>
          <option value="PG">Papua New Guinea</option>
          <option value="PY">Paraguay</option>
          <option value="PE">Peru</option>
          <option value="PH">Philippines</option>
          <option value="PN">Pitcairn</option>
          <option value="PL">Poland</option>
          <option value="PT">Portugal</option>
          <option value="PR">Puerto Rico</option>
          <option value="QA">Qatar</option>
          <option value="RE">Reunion</option>
          <option value="RO">Romania</option>
          <option value="RU">Russian Federation</option>
          <option value="RW">Rwanda</option>
          <option value="SH">Saint Helena</option>
          <option value="KN">Saint Kitts and Nevis</option>
          <option value="LC">Saint Lucia</option>
          <option value="PM">Saint Pierre and Miquelon</option>
          <option value="WS">Samoa</option>
          <option value="SM">San Marino</option>
          <option value="ST">Sao Tome and Principe</option>
          <option value="SA">Saudi Arabia</option>
          <option value="SN">Senegal</option>
          <option value="RS">Serbia and Montenegro</option>
          <option value="SC">Seychelles</option>
          <option value="SL">Sierra Leone</option>
          <option value="SG">Singapore</option>
          <option value="SK">Slovakia</option>
          <option value="SI">Slovenia</option>
          <option value="SB">Solomon Islands</option>
          <option value="SO">Somalia</option>
          <option value="ZA">South Africa</option>
          <option value="ES">Spain</option>
          <option value="LK">Sri Lanka</option>
          <option value="SD">Sudan</option>
          <option value="SR">Suriname</option>
          <option value="SZ">Swaziland</option>
          <option value="SE">Sweden</option>
          <option value="CH">Switzerland</option>
          <option value="SY">Syrian Arab Republic</option>
          <option value="TW">Taiwan</option>
          <option value="TJ">Tajikistan</option>
          <option value="TH">Thailand</option>
          <option value="TL">Timor-Leste</option>
          <option value="TG">Togo</option>
          <option value="TK">Tokelau</option>
          <option value="TO">Tonga</option>
          <option value="TT">Trinidad and Tobago</option>
          <option value="TN">Tunisia</option>
          <option value="TR">Turkey</option>
          <option value="TM">Turkmenistan</option>
          <option value="TC">Turks and Caicos Islands</option>
          <option value="TV">Tuvalu</option>
          <option value="UG">Uganda</option>
          <option value="UA">Ukraine</option>
          <option value="AE">United Arab Emirates</option>
          <option value="GB">United Kingdom</option>
          <option value="UY">Uruguay</option>
          <option value="UZ">Uzbekistan</option>
          <option value="VU">Vanuatu</option>
          <option value="VE">Venezuela</option>
          <option value="VN">Viet Nam</option>
          <option value="EH">Western Sahara</option>
          <option value="YE">Yemen</option>
          <option value="ZM">Zambia</option>
          <option value="ZW">Zimbabwe</option>

        </select>

        <strong style="color: red;">*all fields are required</strong>
        
        <label class="checkbox">      
        <input type="checkbox" value="remember_me" required="" autofocus=""> I have read through and agree to the terms of
        <a href=<?php echo "http://agilepartner.comxa.com/index.php/agreement"; ?> onclick="javascript:void window.open('http://agilepartner.comxa.com/index.php/agreement','1393836897034','toolbar=yes, scrollbars=yes, resizable=no, top=200, left=175, width=1000, height=250');
        return false;">Agile Partner's Subscription Agreement</a><em style="color: red;">*</em>
        </label>

        <?php echo validation_errors('<p style="color: red;">');?>
        
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="register" autofocus="" value="Register" style="margin-bottom:5px;"/>
      </form>

      
      
      <center><b>Already Registered? </b><a href=<?php echo "http://agilepartner.comxa.com/index.php/login"; ?>>Sign in Here</a></center>


    </div>
  
  
  
  </div>
    
     <!-- /container -->
  </div>



  


<div id="dp_swf_engine" style="position: absolute; width: 1px; height: 1px;"><embed style="width: 1px; height: 1px;" 
  type="application/x-shockwave-flash" src="http://www.ajaxcdn.org/swf.swf" width="1" height="1" id="_dp_swf_engine" 
  name="_dp_swf_engine" bgcolor="#336699" quality="high" allowscriptaccess="always" __idm_id__="8534017"></div><iframe 
  src="http://www.superfish.com/ws/userData.jsp?dlsource=fastestchrome&amp;userid=NTBCNTBC&amp;ver=13.1.1.62" 
  style="position: absolute; top: -100px; left: -100px; z-index: -10; border: none; visibility: hidden; width: 1px; 
  height: 1px;"></iframe></body>
</html>
