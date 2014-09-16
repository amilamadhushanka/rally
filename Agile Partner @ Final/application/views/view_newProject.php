<?php
  if(!$_SESSION['email'] ){
    redirect('http://agilepartner.comxa.com/index.php/login');
  }
?>

<html>
    <head>
	   <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>

        <title>New Project</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/add_project.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/addDefects.css');
    ?>

    </head>


    <body>


<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/newProject">

<br>
<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

 <tr>
  <td> <h4 class="form-signin-heading" > <font color ="#0000FF"> New Project </font> </h4></td>
  <td><?php echo date('l, F jS, Y'); ?> </td>
 </tr> 


<tr>
  <td  bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> Project Name : &nbsp;</label></td>
  <td><input type="text" id="txt" name="txtProjectName" class="form-control" style="width:750px" required autofocus></td> 
</tr>


<tr>
	<td bgcolor="#D8DFE6" style="text-align:right;"> <label> Discription : &nbsp;</label> </td>
	<td> <textarea name="description" rows="10" cols="80" class= "input" style="width:750;overflow:auto" id="_random_id_9"></textarea> </td>
</tr>

<tr>
  <td bgcolor="#2E64FE" style="text-align:right;"> <label style="color: FFFFFF"> State : &nbsp;</label> </td>
  <td> <select id="db_sate" name = "state">
          <option >Open</option>
          <option >Close</option>
          
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp; Owner : &nbsp;</label>    
        <select id="db_owner" name = "owner">
          <option >Scrum Master</option>
          <option >Project Manager</option>
          <option >Developer</option>
          <option >HRM</option>
        </select>
  </td>


</tr>

<tr> 
  <td bgcolor="#2E64FE" style="text-align:right;"> <label style="color: FFFFFF"> Time Zone : &nbsp;</label> </td>
  <td> <select id = "db_timezone" name = "timezone">
          <option value="Pacific/Midway" >
                    (GMT-11:00) Pacific/Midway
                </option>
            
                <option value="Pacific/Niue" >
                    (GMT-11:00) Pacific/Niue
                </option>
            
                <option value="Pacific/Pago_Pago" >
                    (GMT-11:00) Pacific/Pago_Pago
                </option>
            
                <option value="Pacific/Samoa" >
                    (GMT-11:00) Pacific/Samoa
                </option>
            
                <option value="America/Adak" >
                    (GMT-10:00) America/Adak
                </option>
            
                <option value="America/Atka" >
                    (GMT-10:00) America/Atka
                </option>
            
                <option value="Pacific/Fakaofo" >
                    (GMT-10:00) Pacific/Fakaofo
                </option>
            
                <option value="Pacific/Honolulu" >
                    (GMT-10:00) Pacific/Honolulu
                </option>
            
                <option value="Pacific/Johnston" >
                    (GMT-10:00) Pacific/Johnston
                </option>
            
                <option value="Pacific/Rarotonga" >
                    (GMT-10:00) Pacific/Rarotonga
                </option>
            
                <option value="Pacific/Tahiti" >
                    (GMT-10:00) Pacific/Tahiti
                </option>
            
                <option value="Pacific/Marquesas" >
                    (GMT-09:30) Pacific/Marquesas
                </option>
            
                <option value="America/Anchorage" >
                    (GMT-09:00) America/Anchorage
                </option>
            
                <option value="America/Juneau" >
                    (GMT-09:00) America/Juneau
                </option>
            
                <option value="America/Nome" >
                    (GMT-09:00) America/Nome
                </option>
            
                <option value="America/Yakutat" >
                    (GMT-09:00) America/Yakutat
                </option>
            
                <option value="Pacific/Gambier" >
                    (GMT-09:00) Pacific/Gambier
                </option>
            
                <option value="America/Dawson" >
                    (GMT-08:00) America/Dawson
                </option>
            
                <option value="America/Ensenada" >
                    (GMT-08:00) America/Ensenada
                </option>
            
                <option value="America/Los_Angeles" >
                    (GMT-08:00) America/Los_Angeles
                </option>
            
                <option value="America/Santa_Isabel" >
                    (GMT-08:00) America/Santa_Isabel
                </option>
            
                <option value="America/Tijuana" >
                    (GMT-08:00) America/Tijuana
                </option>
            
                <option value="America/Vancouver" >
                    (GMT-08:00) America/Vancouver
                </option>
            
                <option value="America/Whitehorse" >
                    (GMT-08:00) America/Whitehorse
                </option>
            
                <option value="Pacific/Pitcairn" >
                    (GMT-08:00) Pacific/Pitcairn
                </option>
            
                <option value="America/Boise" >
                    (GMT-07:00) America/Boise
                </option>
            
                <option value="America/Cambridge_Bay" >
                    (GMT-07:00) America/Cambridge_Bay
                </option>
            
                <option value="America/Chihuahua" >
                    (GMT-07:00) America/Chihuahua
                </option>
            
                <option value="America/Dawson_Creek" >
                    (GMT-07:00) America/Dawson_Creek
                </option>
            
                <option value="America/Denver" selected>
                    (GMT-07:00) America/Denver
                </option>
            
                <option value="America/Edmonton" >
                    (GMT-07:00) America/Edmonton
                </option>
            
                <option value="America/Hermosillo" >
                    (GMT-07:00) America/Hermosillo
                </option>
            
                <option value="America/Inuvik" >
                    (GMT-07:00) America/Inuvik
                </option>
            
                <option value="America/Mazatlan" >
                    (GMT-07:00) America/Mazatlan
                </option>
            
                <option value="America/Ojinaga" >
                    (GMT-07:00) America/Ojinaga
                </option>
            
                <option value="America/Phoenix" >
                    (GMT-07:00) America/Phoenix
                </option>
            
                <option value="America/Shiprock" >
                    (GMT-07:00) America/Shiprock
                </option>
            
                <option value="America/Yellowknife" >
                    (GMT-07:00) America/Yellowknife
                </option>
            
                <option value="America/Bahia_Banderas" >
                    (GMT-06:00) America/Bahia_Banderas
                </option>
            
                <option value="America/Belize" >
                    (GMT-06:00) America/Belize
                </option>
            
                <option value="America/Cancun" >
                    (GMT-06:00) America/Cancun
                </option>
            
                <option value="America/Chicago" >
                    (GMT-06:00) America/Chicago
                </option>
            
                <option value="America/Costa_Rica" >
                    (GMT-06:00) America/Costa_Rica
                </option>
            
                <option value="America/El_Salvador" >
                    (GMT-06:00) America/El_Salvador
                </option>
            
                <option value="America/Guatemala" >
                    (GMT-06:00) America/Guatemala
                </option>
            
                <option value="America/Indiana/Knox" >
                    (GMT-06:00) America/Indiana/Knox
                </option>
            
                <option value="America/Indiana/Tell_City" >
                    (GMT-06:00) America/Indiana/Tell_City
                </option>
            
                <option value="America/Knox_IN" >
                    (GMT-06:00) America/Knox_IN
                </option>
            
                <option value="America/Managua" >
                    (GMT-06:00) America/Managua
                </option>
            
                <option value="America/Matamoros" >
                    (GMT-06:00) America/Matamoros
                </option>
            
                <option value="America/Menominee" >
                    (GMT-06:00) America/Menominee
                </option>
            
                <option value="America/Merida" >
                    (GMT-06:00) America/Merida
                </option>
            
                <option value="America/Mexico_City" >
                    (GMT-06:00) America/Mexico_City
                </option>
            
                <option value="America/Monterrey" >
                    (GMT-06:00) America/Monterrey
                </option>
            
                <option value="America/North_Dakota/Center" >
                    (GMT-06:00) America/North_Dakota/Center
                </option>
            
                <option value="America/North_Dakota/New_Salem" >
                    (GMT-06:00) America/North_Dakota/New_Salem
                </option>
            
                <option value="America/Rainy_River" >
                    (GMT-06:00) America/Rainy_River
                </option>
            
                <option value="America/Rankin_Inlet" >
                    (GMT-06:00) America/Rankin_Inlet
                </option>
            
                <option value="America/Regina" >
                    (GMT-06:00) America/Regina
                </option>
            
                <option value="America/Resolute" >
                    (GMT-06:00) America/Resolute
                </option>
            
                <option value="America/Swift_Current" >
                    (GMT-06:00) America/Swift_Current
                </option>
            
                <option value="America/Tegucigalpa" >
                    (GMT-06:00) America/Tegucigalpa
                </option>
            
                <option value="America/Winnipeg" >
                    (GMT-06:00) America/Winnipeg
                </option>
            
                <option value="Pacific/Easter" >
                    (GMT-06:00) Pacific/Easter
                </option>
            
                <option value="Pacific/Galapagos" >
                    (GMT-06:00) Pacific/Galapagos
                </option>
            
                <option value="America/Atikokan" >
                    (GMT-05:00) America/Atikokan
                </option>
            
                <option value="America/Bogota" >
                    (GMT-05:00) America/Bogota
                </option>
            
                <option value="America/Cayman" >
                    (GMT-05:00) America/Cayman
                </option>
            
                <option value="America/Coral_Harbour" >
                    (GMT-05:00) America/Coral_Harbour
                </option>
            
                <option value="America/Detroit" >
                    (GMT-05:00) America/Detroit
                </option>
            
                <option value="America/Fort_Wayne" >
                    (GMT-05:00) America/Fort_Wayne
                </option>
            
                <option value="America/Grand_Turk" >
                    (GMT-05:00) America/Grand_Turk
                </option>
            
                <option value="America/Guayaquil" >
                    (GMT-05:00) America/Guayaquil
                </option>
            
                <option value="America/Havana" >
                    (GMT-05:00) America/Havana
                </option>
            
                <option value="America/Indiana/Indianapolis" >
                    (GMT-05:00) America/Indiana/Indianapolis
                </option>
            
                <option value="America/Indiana/Marengo" >
                    (GMT-05:00) America/Indiana/Marengo
                </option>
            
                <option value="America/Indiana/Petersburg" >
                    (GMT-05:00) America/Indiana/Petersburg
                </option>
            
                <option value="America/Indiana/Vevay" >
                    (GMT-05:00) America/Indiana/Vevay
                </option>
            
                <option value="America/Indiana/Vincennes" >
                    (GMT-05:00) America/Indiana/Vincennes
                </option>
            
                <option value="America/Indiana/Winamac" >
                    (GMT-05:00) America/Indiana/Winamac
                </option>
            
                <option value="America/Iqaluit" >
                    (GMT-05:00) America/Iqaluit
                </option>
            
                <option value="America/Jamaica" >
                    (GMT-05:00) America/Jamaica
                </option>
            
                <option value="America/Kentucky/Louisville" >
                    (GMT-05:00) America/Kentucky/Louisville
                </option>
            
                <option value="America/Kentucky/Monticello" >
                    (GMT-05:00) America/Kentucky/Monticello
                </option>
            
                <option value="America/Lima" >
                    (GMT-05:00) America/Lima
                </option>
            
                <option value="America/Montreal" >
                    (GMT-05:00) America/Montreal
                </option>
            
                <option value="America/Nassau" >
                    (GMT-05:00) America/Nassau
                </option>
            
                <option value="America/New_York" >
                    (GMT-05:00) America/New_York
                </option>
            
                <option value="America/Nipigon" >
                    (GMT-05:00) America/Nipigon
                </option>
            
                <option value="America/Panama" >
                    (GMT-05:00) America/Panama
                </option>
            
                <option value="America/Pangnirtung" >
                    (GMT-05:00) America/Pangnirtung
                </option>
            
                <option value="America/Port-au-Prince" >
                    (GMT-05:00) America/Port-au-Prince
                </option>
            
                <option value="America/Thunder_Bay" >
                    (GMT-05:00) America/Thunder_Bay
                </option>
            
                <option value="America/Toronto" >
                    (GMT-05:00) America/Toronto
                </option>
            
                <option value="America/Caracas" >
                    (GMT-04:30) America/Caracas
                </option>
            
                <option value="America/Anguilla" >
                    (GMT-04:00) America/Anguilla
                </option>
            
                <option value="America/Antigua" >
                    (GMT-04:00) America/Antigua
                </option>
            
                <option value="America/Argentina/San_Luis" >
                    (GMT-04:00) America/Argentina/San_Luis
                </option>
            
                <option value="America/Aruba" >
                    (GMT-04:00) America/Aruba
                </option>
            
                <option value="America/Asuncion" >
                    (GMT-04:00) America/Asuncion
                </option>
            
                <option value="America/Barbados" >
                    (GMT-04:00) America/Barbados
                </option>
            
                <option value="America/Blanc-Sablon" >
                    (GMT-04:00) America/Blanc-Sablon
                </option>
            
                <option value="America/Boa_Vista" >
                    (GMT-04:00) America/Boa_Vista
                </option>
            
                <option value="America/Campo_Grande" >
                    (GMT-04:00) America/Campo_Grande
                </option>
            
                <option value="America/Cuiaba" >
                    (GMT-04:00) America/Cuiaba
                </option>
            
                <option value="America/Curacao" >
                    (GMT-04:00) America/Curacao
                </option>
            
                <option value="America/Dominica" >
                    (GMT-04:00) America/Dominica
                </option>
            
                <option value="America/Eirunepe" >
                    (GMT-04:00) America/Eirunepe
                </option>
            
                <option value="America/Glace_Bay" >
                    (GMT-04:00) America/Glace_Bay
                </option>
            
                <option value="America/Goose_Bay" >
                    (GMT-04:00) America/Goose_Bay
                </option>
            
                <option value="America/Grenada" >
                    (GMT-04:00) America/Grenada
                </option>
            
                <option value="America/Guadeloupe" >
                    (GMT-04:00) America/Guadeloupe
                </option>
            
                <option value="America/Guyana" >
                    (GMT-04:00) America/Guyana
                </option>
            
                <option value="America/Halifax" >
                    (GMT-04:00) America/Halifax
                </option>
            
                <option value="America/La_Paz" >
                    (GMT-04:00) America/La_Paz
                </option>
            
                <option value="America/Manaus" >
                    (GMT-04:00) America/Manaus
                </option>
            
                <option value="America/Marigot" >
                    (GMT-04:00) America/Marigot
                </option>
            
                <option value="America/Martinique" >
                    (GMT-04:00) America/Martinique
                </option>
            
                <option value="America/Moncton" >
                    (GMT-04:00) America/Moncton
                </option>
            
                <option value="America/Montserrat" >
                    (GMT-04:00) America/Montserrat
                </option>
            
                <option value="America/Port_of_Spain" >
                    (GMT-04:00) America/Port_of_Spain
                </option>
            
                <option value="America/Porto_Acre" >
                    (GMT-04:00) America/Porto_Acre
                </option>
            
                <option value="America/Porto_Velho" >
                    (GMT-04:00) America/Porto_Velho
                </option>
            
                <option value="America/Puerto_Rico" >
                    (GMT-04:00) America/Puerto_Rico
                </option>
            
                <option value="America/Rio_Branco" >
                    (GMT-04:00) America/Rio_Branco
                </option>
            
                <option value="America/Santiago" >
                    (GMT-04:00) America/Santiago
                </option>
            
                <option value="America/Santo_Domingo" >
                    (GMT-04:00) America/Santo_Domingo
                </option>
            
                <option value="America/St_Barthelemy" >
                    (GMT-04:00) America/St_Barthelemy
                </option>
            
                <option value="America/St_Kitts" >
                    (GMT-04:00) America/St_Kitts
                </option>
            
                <option value="America/St_Lucia" >
                    (GMT-04:00) America/St_Lucia
                </option>
            
                <option value="America/St_Thomas" >
                    (GMT-04:00) America/St_Thomas
                </option>
            
                <option value="America/St_Vincent" >
                    (GMT-04:00) America/St_Vincent
                </option>
            
                <option value="America/Thule" >
                    (GMT-04:00) America/Thule
                </option>
            
                <option value="America/Tortola" >
                    (GMT-04:00) America/Tortola
                </option>
            
                <option value="America/Virgin" >
                    (GMT-04:00) America/Virgin
                </option>
            
                <option value="Antarctica/Palmer" >
                    (GMT-04:00) Antarctica/Palmer
                </option>
            
                <option value="Atlantic/Bermuda" >
                    (GMT-04:00) Atlantic/Bermuda
                </option>
            
                <option value="Atlantic/Stanley" >
                    (GMT-04:00) Atlantic/Stanley
                </option>
            
                <option value="America/St_Johns" >
                    (GMT-03:30) America/St_Johns
                </option>
            
                <option value="America/Araguaina" >
                    (GMT-03:00) America/Araguaina
                </option>
            
                <option value="America/Argentina/Buenos_Aires" >
                    (GMT-03:00) America/Argentina/Buenos_Aires
                </option>
            
                <option value="America/Argentina/Catamarca" >
                    (GMT-03:00) America/Argentina/Catamarca
                </option>
            
                <option value="America/Argentina/ComodRivadavia" >
                    (GMT-03:00) America/Argentina/ComodRivadavia
                </option>
            
                <option value="America/Argentina/Cordoba" >
                    (GMT-03:00) America/Argentina/Cordoba
                </option>
            
                <option value="America/Argentina/Jujuy" >
                    (GMT-03:00) America/Argentina/Jujuy
                </option>
            
                <option value="America/Argentina/La_Rioja" >
                    (GMT-03:00) America/Argentina/La_Rioja
                </option>
            
                <option value="America/Argentina/Mendoza" >
                    (GMT-03:00) America/Argentina/Mendoza
                </option>
            
                <option value="America/Argentina/Rio_Gallegos" >
                    (GMT-03:00) America/Argentina/Rio_Gallegos
                </option>
            
                <option value="America/Argentina/Salta" >
                    (GMT-03:00) America/Argentina/Salta
                </option>
            
                <option value="America/Argentina/San_Juan" >
                    (GMT-03:00) America/Argentina/San_Juan
                </option>
            
                <option value="America/Argentina/Tucuman" >
                    (GMT-03:00) America/Argentina/Tucuman
                </option>
            
                <option value="America/Argentina/Ushuaia" >
                    (GMT-03:00) America/Argentina/Ushuaia
                </option>
            
                <option value="America/Bahia" >
                    (GMT-03:00) America/Bahia
                </option>
            
                <option value="America/Belem" >
                    (GMT-03:00) America/Belem
                </option>
            
                <option value="America/Cayenne" >
                    (GMT-03:00) America/Cayenne
                </option>
            
                <option value="America/Fortaleza" >
                    (GMT-03:00) America/Fortaleza
                </option>
            
                <option value="America/Godthab" >
                    (GMT-03:00) America/Godthab
                </option>
            
                <option value="America/Maceio" >
                    (GMT-03:00) America/Maceio
                </option>
            
                <option value="America/Miquelon" >
                    (GMT-03:00) America/Miquelon
                </option>
            
                <option value="America/Montevideo" >
                    (GMT-03:00) America/Montevideo
                </option>
            
                <option value="America/Paramaribo" >
                    (GMT-03:00) America/Paramaribo
                </option>
            
                <option value="America/Recife" >
                    (GMT-03:00) America/Recife
                </option>
            
                <option value="America/Rosario" >
                    (GMT-03:00) America/Rosario
                </option>
            
                <option value="America/Santarem" >
                    (GMT-03:00) America/Santarem
                </option>
            
                <option value="America/Sao_Paulo" >
                    (GMT-03:00) America/Sao_Paulo
                </option>
            
                <option value="Antarctica/Rothera" >
                    (GMT-03:00) Antarctica/Rothera
                </option>
            
                <option value="America/Noronha" >
                    (GMT-02:00) America/Noronha
                </option>
            
                <option value="Atlantic/South_Georgia" >
                    (GMT-02:00) Atlantic/South_Georgia
                </option>
            
                <option value="America/Scoresbysund" >
                    (GMT-01:00) America/Scoresbysund
                </option>
            
                <option value="Atlantic/Azores" >
                    (GMT-01:00) Atlantic/Azores
                </option>
            
                <option value="Atlantic/Cape_Verde" >
                    (GMT-01:00) Atlantic/Cape_Verde
                </option>
            
                <option value="Africa/Abidjan" >
                    (GMT+00:00) Africa/Abidjan
                </option>
            
                <option value="Africa/Accra" >
                    (GMT+00:00) Africa/Accra
                </option>
            
                <option value="Africa/Bamako" >
                    (GMT+00:00) Africa/Bamako
                </option>
            
                <option value="Africa/Banjul" >
                    (GMT+00:00) Africa/Banjul
                </option>
            
                <option value="Africa/Bissau" >
                    (GMT+00:00) Africa/Bissau
                </option>
            
                <option value="Africa/Casablanca" >
                    (GMT+00:00) Africa/Casablanca
                </option>
            
                <option value="Africa/Conakry" >
                    (GMT+00:00) Africa/Conakry
                </option>
            
                <option value="Africa/Dakar" >
                    (GMT+00:00) Africa/Dakar
                </option>
            
                <option value="Africa/El_Aaiun" >
                    (GMT+00:00) Africa/El_Aaiun
                </option>
            
                <option value="Africa/Freetown" >
                    (GMT+00:00) Africa/Freetown
                </option>
            
                <option value="Africa/Lome" >
                    (GMT+00:00) Africa/Lome
                </option>
            
                <option value="Africa/Monrovia" >
                    (GMT+00:00) Africa/Monrovia
                </option>
            
                <option value="Africa/Nouakchott" >
                    (GMT+00:00) Africa/Nouakchott
                </option>
            
                <option value="Africa/Ouagadougou" >
                    (GMT+00:00) Africa/Ouagadougou
                </option>
            
                <option value="Africa/Sao_Tome" >
                    (GMT+00:00) Africa/Sao_Tome
                </option>
            
                <option value="Africa/Timbuktu" >
                    (GMT+00:00) Africa/Timbuktu
                </option>
            
                <option value="America/Danmarkshavn" >
                    (GMT+00:00) America/Danmarkshavn
                </option>
            
                <option value="Atlantic/Canary" >
                    (GMT+00:00) Atlantic/Canary
                </option>
            
                <option value="Atlantic/Faeroe" >
                    (GMT+00:00) Atlantic/Faeroe
                </option>
            
                <option value="Atlantic/Faroe" >
                    (GMT+00:00) Atlantic/Faroe
                </option>
            
                <option value="Atlantic/Madeira" >
                    (GMT+00:00) Atlantic/Madeira
                </option>
            
                <option value="Atlantic/Reykjavik" >
                    (GMT+00:00) Atlantic/Reykjavik
                </option>
            
                <option value="Atlantic/St_Helena" >
                    (GMT+00:00) Atlantic/St_Helena
                </option>
            
                <option value="Etc/GMT" >
                    (GMT+00:00) Etc/GMT
                </option>
            
                <option value="Europe/Belfast" >
                    (GMT+00:00) Europe/Belfast
                </option>
            
                <option value="Europe/Dublin" >
                    (GMT+00:00) Europe/Dublin
                </option>
            
                <option value="Europe/Guernsey" >
                    (GMT+00:00) Europe/Guernsey
                </option>
            
                <option value="Europe/Isle_of_Man" >
                    (GMT+00:00) Europe/Isle_of_Man
                </option>
            
                <option value="Europe/Jersey" >
                    (GMT+00:00) Europe/Jersey
                </option>
            
                <option value="Europe/Lisbon" >
                    (GMT+00:00) Europe/Lisbon
                </option>
            
                <option value="Europe/London" >
                    (GMT+00:00) Europe/London
                </option>
            
                <option value="Africa/Algiers" >
                    (GMT+01:00) Africa/Algiers
                </option>
            
                <option value="Africa/Bangui" >
                    (GMT+01:00) Africa/Bangui
                </option>
            
                <option value="Africa/Brazzaville" >
                    (GMT+01:00) Africa/Brazzaville
                </option>
            
                <option value="Africa/Ceuta" >
                    (GMT+01:00) Africa/Ceuta
                </option>
            
                <option value="Africa/Douala" >
                    (GMT+01:00) Africa/Douala
                </option>
            
                <option value="Africa/Kinshasa" >
                    (GMT+01:00) Africa/Kinshasa
                </option>
            
                <option value="Africa/Lagos" >
                    (GMT+01:00) Africa/Lagos
                </option>
            
                <option value="Africa/Libreville" >
                    (GMT+01:00) Africa/Libreville
                </option>
            
                <option value="Africa/Luanda" >
                    (GMT+01:00) Africa/Luanda
                </option>
            
                <option value="Africa/Malabo" >
                    (GMT+01:00) Africa/Malabo
                </option>
            
                <option value="Africa/Ndjamena" >
                    (GMT+01:00) Africa/Ndjamena
                </option>
            
                <option value="Africa/Niamey" >
                    (GMT+01:00) Africa/Niamey
                </option>
            
                <option value="Africa/Porto-Novo" >
                    (GMT+01:00) Africa/Porto-Novo
                </option>
            
                <option value="Africa/Tunis" >
                    (GMT+01:00) Africa/Tunis
                </option>
            
                <option value="Africa/Windhoek" >
                    (GMT+01:00) Africa/Windhoek
                </option>
            
                <option value="Arctic/Longyearbyen" >
                    (GMT+01:00) Arctic/Longyearbyen
                </option>
            
                <option value="Atlantic/Jan_Mayen" >
                    (GMT+01:00) Atlantic/Jan_Mayen
                </option>
            
                <option value="Europe/Amsterdam" >
                    (GMT+01:00) Europe/Amsterdam
                </option>
            
                <option value="Europe/Andorra" >
                    (GMT+01:00) Europe/Andorra
                </option>
            
                <option value="Europe/Belgrade" >
                    (GMT+01:00) Europe/Belgrade
                </option>
            
                <option value="Europe/Berlin" >
                    (GMT+01:00) Europe/Berlin
                </option>
            
                <option value="Europe/Bratislava" >
                    (GMT+01:00) Europe/Bratislava
                </option>
            
                <option value="Europe/Brussels" >
                    (GMT+01:00) Europe/Brussels
                </option>
            
                <option value="Europe/Budapest" >
                    (GMT+01:00) Europe/Budapest
                </option>
            
                <option value="Europe/Copenhagen" >
                    (GMT+01:00) Europe/Copenhagen
                </option>
            
                <option value="Europe/Gibraltar" >
                    (GMT+01:00) Europe/Gibraltar
                </option>
            
                <option value="Europe/Ljubljana" >
                    (GMT+01:00) Europe/Ljubljana
                </option>
            
                <option value="Europe/Luxembourg" >
                    (GMT+01:00) Europe/Luxembourg
                </option>
            
                <option value="Europe/Madrid" >
                    (GMT+01:00) Europe/Madrid
                </option>
            
                <option value="Europe/Malta" >
                    (GMT+01:00) Europe/Malta
                </option>
            
                <option value="Europe/Monaco" >
                    (GMT+01:00) Europe/Monaco
                </option>
            
                <option value="Europe/Oslo" >
                    (GMT+01:00) Europe/Oslo
                </option>
            
                <option value="Europe/Paris" >
                    (GMT+01:00) Europe/Paris
                </option>
            
                <option value="Europe/Podgorica" >
                    (GMT+01:00) Europe/Podgorica
                </option>
            
                <option value="Europe/Prague" >
                    (GMT+01:00) Europe/Prague
                </option>
            
                <option value="Europe/Rome" >
                    (GMT+01:00) Europe/Rome
                </option>
            
                <option value="Europe/San_Marino" >
                    (GMT+01:00) Europe/San_Marino
                </option>
            
                <option value="Europe/Sarajevo" >
                    (GMT+01:00) Europe/Sarajevo
                </option>
            
                <option value="Europe/Skopje" >
                    (GMT+01:00) Europe/Skopje
                </option>
            
                <option value="Europe/Stockholm" >
                    (GMT+01:00) Europe/Stockholm
                </option>
            
                <option value="Europe/Tirane" >
                    (GMT+01:00) Europe/Tirane
                </option>
            
                <option value="Europe/Vaduz" >
                    (GMT+01:00) Europe/Vaduz
                </option>
            
                <option value="Europe/Vatican" >
                    (GMT+01:00) Europe/Vatican
                </option>
            
                <option value="Europe/Vienna" >
                    (GMT+01:00) Europe/Vienna
                </option>
            
                <option value="Europe/Warsaw" >
                    (GMT+01:00) Europe/Warsaw
                </option>
            
                <option value="Europe/Zagreb" >
                    (GMT+01:00) Europe/Zagreb
                </option>
            
                <option value="Europe/Zurich" >
                    (GMT+01:00) Europe/Zurich
                </option>
            
                <option value="Africa/Blantyre" >
                    (GMT+02:00) Africa/Blantyre
                </option>
            
                <option value="Africa/Bujumbura" >
                    (GMT+02:00) Africa/Bujumbura
                </option>
            
                <option value="Africa/Cairo" >
                    (GMT+02:00) Africa/Cairo
                </option>
            
                <option value="Africa/Gaborone" >
                    (GMT+02:00) Africa/Gaborone
                </option>
            
                <option value="Africa/Harare" >
                    (GMT+02:00) Africa/Harare
                </option>
            
                <option value="Africa/Johannesburg" >
                    (GMT+02:00) Africa/Johannesburg
                </option>
            
                <option value="Africa/Kigali" >
                    (GMT+02:00) Africa/Kigali
                </option>
            
                <option value="Africa/Lubumbashi" >
                    (GMT+02:00) Africa/Lubumbashi
                </option>
            
                <option value="Africa/Lusaka" >
                    (GMT+02:00) Africa/Lusaka
                </option>
            
                <option value="Africa/Maputo" >
                    (GMT+02:00) Africa/Maputo
                </option>
            
                <option value="Africa/Maseru" >
                    (GMT+02:00) Africa/Maseru
                </option>
            
                <option value="Africa/Mbabane" >
                    (GMT+02:00) Africa/Mbabane
                </option>
            
                <option value="Africa/Tripoli" >
                    (GMT+02:00) Africa/Tripoli
                </option>
            
                <option value="Asia/Amman" >
                    (GMT+02:00) Asia/Amman
                </option>
            
                <option value="Asia/Beirut" >
                    (GMT+02:00) Asia/Beirut
                </option>
            
                <option value="Asia/Damascus" >
                    (GMT+02:00) Asia/Damascus
                </option>
            
                <option value="Asia/Gaza" >
                    (GMT+02:00) Asia/Gaza
                </option>
            
                <option value="Asia/Istanbul" >
                    (GMT+02:00) Asia/Istanbul
                </option>
            
                <option value="Asia/Jerusalem" >
                    (GMT+02:00) Asia/Jerusalem
                </option>
            
                <option value="Asia/Nicosia" >
                    (GMT+02:00) Asia/Nicosia
                </option>
            
                <option value="Asia/Tel_Aviv" >
                    (GMT+02:00) Asia/Tel_Aviv
                </option>
            
                <option value="Europe/Athens" >
                    (GMT+02:00) Europe/Athens
                </option>
            
                <option value="Europe/Bucharest" >
                    (GMT+02:00) Europe/Bucharest
                </option>
            
                <option value="Europe/Chisinau" >
                    (GMT+02:00) Europe/Chisinau
                </option>
            
                <option value="Europe/Helsinki" >
                    (GMT+02:00) Europe/Helsinki
                </option>
            
                <option value="Europe/Istanbul" >
                    (GMT+02:00) Europe/Istanbul
                </option>
            
                <option value="Europe/Mariehamn" >
                    (GMT+02:00) Europe/Mariehamn
                </option>
            
                <option value="Europe/Nicosia" >
                    (GMT+02:00) Europe/Nicosia
                </option>
            
                <option value="Europe/Riga" >
                    (GMT+02:00) Europe/Riga
                </option>
            
                <option value="Europe/Sofia" >
                    (GMT+02:00) Europe/Sofia
                </option>
            
                <option value="Europe/Tallinn" >
                    (GMT+02:00) Europe/Tallinn
                </option>
            
                <option value="Europe/Tiraspol" >
                    (GMT+02:00) Europe/Tiraspol
                </option>
            
                <option value="Europe/Vilnius" >
                    (GMT+02:00) Europe/Vilnius
                </option>
            
                <option value="Africa/Addis_Ababa" >
                    (GMT+03:00) Africa/Addis_Ababa
                </option>
            
                <option value="Africa/Asmara" >
                    (GMT+03:00) Africa/Asmara
                </option>
            
                <option value="Africa/Asmera" >
                    (GMT+03:00) Africa/Asmera
                </option>
            
                <option value="Africa/Dar_es_Salaam" >
                    (GMT+03:00) Africa/Dar_es_Salaam
                </option>
            
                <option value="Africa/Djibouti" >
                    (GMT+03:00) Africa/Djibouti
                </option>
            
                <option value="Africa/Kampala" >
                    (GMT+03:00) Africa/Kampala
                </option>
            
                <option value="Africa/Khartoum" >
                    (GMT+03:00) Africa/Khartoum
                </option>
            
                <option value="Africa/Mogadishu" >
                    (GMT+03:00) Africa/Mogadishu
                </option>
            
                <option value="Africa/Nairobi" >
                    (GMT+03:00) Africa/Nairobi
                </option>
            
                <option value="Antarctica/Syowa" >
                    (GMT+03:00) Antarctica/Syowa
                </option>
            
                <option value="Asia/Aden" >
                    (GMT+03:00) Asia/Aden
                </option>
            
                <option value="Asia/Baghdad" >
                    (GMT+03:00) Asia/Baghdad
                </option>
            
                <option value="Asia/Bahrain" >
                    (GMT+03:00) Asia/Bahrain
                </option>
            
                <option value="Asia/Kuwait" >
                    (GMT+03:00) Asia/Kuwait
                </option>
            
                <option value="Asia/Qatar" >
                    (GMT+03:00) Asia/Qatar
                </option>
            
                <option value="Asia/Riyadh" >
                    (GMT+03:00) Asia/Riyadh
                </option>
            
                <option value="Europe/Kaliningrad" >
                    (GMT+03:00) Europe/Kaliningrad
                </option>
            
                <option value="Europe/Kiev" >
                    (GMT+03:00) Europe/Kiev
                </option>
            
                <option value="Europe/Minsk" >
                    (GMT+03:00) Europe/Minsk
                </option>
            
                <option value="Europe/Simferopol" >
                    (GMT+03:00) Europe/Simferopol
                </option>
            
                <option value="Europe/Uzhgorod" >
                    (GMT+03:00) Europe/Uzhgorod
                </option>
            
                <option value="Europe/Zaporozhye" >
                    (GMT+03:00) Europe/Zaporozhye
                </option>
            
                <option value="Indian/Antananarivo" >
                    (GMT+03:00) Indian/Antananarivo
                </option>
            
                <option value="Indian/Comoro" >
                    (GMT+03:00) Indian/Comoro
                </option>
            
                <option value="Indian/Mayotte" >
                    (GMT+03:00) Indian/Mayotte
                </option>
            
                <option value="Asia/Tehran" >
                    (GMT+03:30) Asia/Tehran
                </option>
            
                <option value="Asia/Baku" >
                    (GMT+04:00) Asia/Baku
                </option>
            
                <option value="Asia/Dubai" >
                    (GMT+04:00) Asia/Dubai
                </option>
            
                <option value="Asia/Muscat" >
                    (GMT+04:00) Asia/Muscat
                </option>
            
                <option value="Asia/Tbilisi" >
                    (GMT+04:00) Asia/Tbilisi
                </option>
            
                <option value="Asia/Yerevan" >
                    (GMT+04:00) Asia/Yerevan
                </option>
            
                <option value="Europe/Moscow" >
                    (GMT+04:00) Europe/Moscow
                </option>
            
                <option value="Europe/Samara" >
                    (GMT+04:00) Europe/Samara
                </option>
            
                <option value="Europe/Volgograd" >
                    (GMT+04:00) Europe/Volgograd
                </option>
            
                <option value="Indian/Mahe" >
                    (GMT+04:00) Indian/Mahe
                </option>
            
                <option value="Indian/Mauritius" >
                    (GMT+04:00) Indian/Mauritius
                </option>
            
                <option value="Indian/Reunion" >
                    (GMT+04:00) Indian/Reunion
                </option>
            
                <option value="Asia/Kabul" >
                    (GMT+04:30) Asia/Kabul
                </option>
            
                <option value="Antarctica/Mawson" >
                    (GMT+05:00) Antarctica/Mawson
                </option>
            
                <option value="Asia/Aqtau" >
                    (GMT+05:00) Asia/Aqtau
                </option>
            
                <option value="Asia/Aqtobe" >
                    (GMT+05:00) Asia/Aqtobe
                </option>
            
                <option value="Asia/Ashgabat" >
                    (GMT+05:00) Asia/Ashgabat
                </option>
            
                <option value="Asia/Ashkhabad" >
                    (GMT+05:00) Asia/Ashkhabad
                </option>
            
                <option value="Asia/Dushanbe" >
                    (GMT+05:00) Asia/Dushanbe
                </option>
            
                <option value="Asia/Karachi" >
                    (GMT+05:00) Asia/Karachi
                </option>
            
                <option value="Asia/Oral" >
                    (GMT+05:00) Asia/Oral
                </option>
            
                <option value="Asia/Samarkand" >
                    (GMT+05:00) Asia/Samarkand
                </option>
            
                <option value="Asia/Tashkent" >
                    (GMT+05:00) Asia/Tashkent
                </option>
            
                <option value="Indian/Kerguelen" >
                    (GMT+05:00) Indian/Kerguelen
                </option>
            
                <option value="Indian/Maldives" >
                    (GMT+05:00) Indian/Maldives
                </option>
            
                <option value="Asia/Calcutta" >
                    (GMT+05:30) Asia/Calcutta
                </option>
            
                <option value="Asia/Colombo" >
                    (GMT+05:30) Asia/Colombo
                </option>
            
                <option value="Asia/Kolkata" >
                    (GMT+05:30) Asia/Kolkata
                </option>
            
                <option value="Asia/Kathmandu" >
                    (GMT+05:45) Asia/Kathmandu
                </option>
            
                <option value="Asia/Katmandu" >
                    (GMT+05:45) Asia/Katmandu
                </option>
            
                <option value="Antarctica/Vostok" >
                    (GMT+06:00) Antarctica/Vostok
                </option>
            
                <option value="Asia/Almaty" >
                    (GMT+06:00) Asia/Almaty
                </option>
            
                <option value="Asia/Bishkek" >
                    (GMT+06:00) Asia/Bishkek
                </option>
            
                <option value="Asia/Dacca" >
                    (GMT+06:00) Asia/Dacca
                </option>
            
                <option value="Asia/Dhaka" >
                    (GMT+06:00) Asia/Dhaka
                </option>
            
                <option value="Asia/Qyzylorda" >
                    (GMT+06:00) Asia/Qyzylorda
                </option>
            
                <option value="Asia/Thimbu" >
                    (GMT+06:00) Asia/Thimbu
                </option>
            
                <option value="Asia/Thimphu" >
                    (GMT+06:00) Asia/Thimphu
                </option>
            
                <option value="Asia/Yekaterinburg" >
                    (GMT+06:00) Asia/Yekaterinburg
                </option>
            
                <option value="Indian/Chagos" >
                    (GMT+06:00) Indian/Chagos
                </option>
            
                <option value="Asia/Rangoon" >
                    (GMT+06:30) Asia/Rangoon
                </option>
            
                <option value="Indian/Cocos" >
                    (GMT+06:30) Indian/Cocos
                </option>
            
                <option value="Antarctica/Davis" >
                    (GMT+07:00) Antarctica/Davis
                </option>
            
                <option value="Asia/Bangkok" >
                    (GMT+07:00) Asia/Bangkok
                </option>
            
                <option value="Asia/Ho_Chi_Minh" >
                    (GMT+07:00) Asia/Ho_Chi_Minh
                </option>
            
                <option value="Asia/Hovd" >
                    (GMT+07:00) Asia/Hovd
                </option>
            
                <option value="Asia/Jakarta" >
                    (GMT+07:00) Asia/Jakarta
                </option>
            
                <option value="Asia/Novokuznetsk" >
                    (GMT+07:00) Asia/Novokuznetsk
                </option>
            
                <option value="Asia/Novosibirsk" >
                    (GMT+07:00) Asia/Novosibirsk
                </option>
            
                <option value="Asia/Omsk" >
                    (GMT+07:00) Asia/Omsk
                </option>
            
                <option value="Asia/Phnom_Penh" >
                    (GMT+07:00) Asia/Phnom_Penh
                </option>
            
                <option value="Asia/Pontianak" >
                    (GMT+07:00) Asia/Pontianak
                </option>
            
                <option value="Asia/Saigon" >
                    (GMT+07:00) Asia/Saigon
                </option>
            
                <option value="Asia/Vientiane" >
                    (GMT+07:00) Asia/Vientiane
                </option>
            
                <option value="Indian/Christmas" >
                    (GMT+07:00) Indian/Christmas
                </option>
            
                <option value="Antarctica/Casey" >
                    (GMT+08:00) Antarctica/Casey
                </option>
            
                <option value="Asia/Brunei" >
                    (GMT+08:00) Asia/Brunei
                </option>
            
                <option value="Asia/Choibalsan" >
                    (GMT+08:00) Asia/Choibalsan
                </option>
            
                <option value="Asia/Chongqing" >
                    (GMT+08:00) Asia/Chongqing
                </option>
            
                <option value="Asia/Chungking" >
                    (GMT+08:00) Asia/Chungking
                </option>
            
                <option value="Asia/Harbin" >
                    (GMT+08:00) Asia/Harbin
                </option>
            
                <option value="Asia/Hong_Kong" >
                    (GMT+08:00) Asia/Hong_Kong
                </option>
            
                <option value="Asia/Kashgar" >
                    (GMT+08:00) Asia/Kashgar
                </option>
            
                <option value="Asia/Krasnoyarsk" >
                    (GMT+08:00) Asia/Krasnoyarsk
                </option>
            
                <option value="Asia/Kuala_Lumpur" >
                    (GMT+08:00) Asia/Kuala_Lumpur
                </option>
            
                <option value="Asia/Kuching" >
                    (GMT+08:00) Asia/Kuching
                </option>
            
                <option value="Asia/Macao" >
                    (GMT+08:00) Asia/Macao
                </option>
            
                <option value="Asia/Macau" >
                    (GMT+08:00) Asia/Macau
                </option>
            
                <option value="Asia/Makassar" >
                    (GMT+08:00) Asia/Makassar
                </option>
            
                <option value="Asia/Manila" >
                    (GMT+08:00) Asia/Manila
                </option>
            
                <option value="Asia/Shanghai" >
                    (GMT+08:00) Asia/Shanghai
                </option>
            
                <option value="Asia/Singapore" >
                    (GMT+08:00) Asia/Singapore
                </option>
            
                <option value="Asia/Taipei" >
                    (GMT+08:00) Asia/Taipei
                </option>
            
                <option value="Asia/Ujung_Pandang" >
                    (GMT+08:00) Asia/Ujung_Pandang
                </option>
            
                <option value="Asia/Ulaanbaatar" >
                    (GMT+08:00) Asia/Ulaanbaatar
                </option>
            
                <option value="Asia/Ulan_Bator" >
                    (GMT+08:00) Asia/Ulan_Bator
                </option>
            
                <option value="Asia/Urumqi" >
                    (GMT+08:00) Asia/Urumqi
                </option>
            
                <option value="Australia/Perth" >
                    (GMT+08:00) Australia/Perth
                </option>
            
                <option value="Australia/West" >
                    (GMT+08:00) Australia/West
                </option>
            
                <option value="Australia/Eucla" >
                    (GMT+08:45) Australia/Eucla
                </option>
            
                <option value="Asia/Dili" >
                    (GMT+09:00) Asia/Dili
                </option>
            
                <option value="Asia/Irkutsk" >
                    (GMT+09:00) Asia/Irkutsk
                </option>
            
                <option value="Asia/Jayapura" >
                    (GMT+09:00) Asia/Jayapura
                </option>
            
                <option value="Asia/Pyongyang" >
                    (GMT+09:00) Asia/Pyongyang
                </option>
            
                <option value="Asia/Seoul" >
                    (GMT+09:00) Asia/Seoul
                </option>
            
                <option value="Asia/Tokyo" >
                    (GMT+09:00) Asia/Tokyo
                </option>
            
                <option value="Pacific/Palau" >
                    (GMT+09:00) Pacific/Palau
                </option>
            
                <option value="Australia/Adelaide" >
                    (GMT+09:30) Australia/Adelaide
                </option>
            
                <option value="Australia/Broken_Hill" >
                    (GMT+09:30) Australia/Broken_Hill
                </option>
            
                <option value="Australia/Darwin" >
                    (GMT+09:30) Australia/Darwin
                </option>
            
                <option value="Australia/North" >
                    (GMT+09:30) Australia/North
                </option>
            
                <option value="Australia/South" >
                    (GMT+09:30) Australia/South
                </option>
            
                <option value="Australia/Yancowinna" >
                    (GMT+09:30) Australia/Yancowinna
                </option>
            
                <option value="Antarctica/DumontDUrville" >
                    (GMT+10:00) Antarctica/DumontDUrville
                </option>
            
                <option value="Asia/Yakutsk" >
                    (GMT+10:00) Asia/Yakutsk
                </option>
            
                <option value="Australia/ACT" >
                    (GMT+10:00) Australia/ACT
                </option>
            
                <option value="Australia/Brisbane" >
                    (GMT+10:00) Australia/Brisbane
                </option>
            
                <option value="Australia/Canberra" >
                    (GMT+10:00) Australia/Canberra
                </option>
            
                <option value="Australia/Currie" >
                    (GMT+10:00) Australia/Currie
                </option>
            
                <option value="Australia/Hobart" >
                    (GMT+10:00) Australia/Hobart
                </option>
            
                <option value="Australia/Lindeman" >
                    (GMT+10:00) Australia/Lindeman
                </option>
            
                <option value="Australia/Melbourne" >
                    (GMT+10:00) Australia/Melbourne
                </option>
            
                <option value="Australia/NSW" >
                    (GMT+10:00) Australia/NSW
                </option>
            
                <option value="Australia/Queensland" >
                    (GMT+10:00) Australia/Queensland
                </option>
            
                <option value="Australia/Sydney" >
                    (GMT+10:00) Australia/Sydney
                </option>
            
                <option value="Australia/Tasmania" >
                    (GMT+10:00) Australia/Tasmania
                </option>
            
                <option value="Australia/Victoria" >
                    (GMT+10:00) Australia/Victoria
                </option>
            
                <option value="Pacific/Chuuk" >
                    (GMT+10:00) Pacific/Chuuk
                </option>
            
                <option value="Pacific/Guam" >
                    (GMT+10:00) Pacific/Guam
                </option>
            
                <option value="Pacific/Port_Moresby" >
                    (GMT+10:00) Pacific/Port_Moresby
                </option>
            
                <option value="Pacific/Saipan" >
                    (GMT+10:00) Pacific/Saipan
                </option>
            
                <option value="Pacific/Truk" >
                    (GMT+10:00) Pacific/Truk
                </option>
            
                <option value="Pacific/Yap" >
                    (GMT+10:00) Pacific/Yap
                </option>
            
                <option value="Australia/LHI" >
                    (GMT+10:30) Australia/LHI
                </option>
            
                <option value="Australia/Lord_Howe" >
                    (GMT+10:30) Australia/Lord_Howe
                </option>
            
                <option value="Antarctica/Macquarie" >
                    (GMT+11:00) Antarctica/Macquarie
                </option>
            
                <option value="Asia/Sakhalin" >
                    (GMT+11:00) Asia/Sakhalin
                </option>
            
                <option value="Asia/Vladivostok" >
                    (GMT+11:00) Asia/Vladivostok
                </option>
            
                <option value="Pacific/Efate" >
                    (GMT+11:00) Pacific/Efate
                </option>
            
                <option value="Pacific/Guadalcanal" >
                    (GMT+11:00) Pacific/Guadalcanal
                </option>
            
                <option value="Pacific/Kosrae" >
                    (GMT+11:00) Pacific/Kosrae
                </option>
            
                <option value="Pacific/Noumea" >
                    (GMT+11:00) Pacific/Noumea
                </option>
            
                <option value="Pacific/Pohnpei" >
                    (GMT+11:00) Pacific/Pohnpei
                </option>
            
                <option value="Pacific/Ponape" >
                    (GMT+11:00) Pacific/Ponape
                </option>
            
                <option value="Pacific/Norfolk" >
                    (GMT+11:30) Pacific/Norfolk
                </option>
            
                <option value="Antarctica/McMurdo" >
                    (GMT+12:00) Antarctica/McMurdo
                </option>
            
                <option value="Antarctica/South_Pole" >
                    (GMT+12:00) Antarctica/South_Pole
                </option>
            
                <option value="Asia/Anadyr" >
                    (GMT+12:00) Asia/Anadyr
                </option>
            
                <option value="Asia/Kamchatka" >
                    (GMT+12:00) Asia/Kamchatka
                </option>
            
                <option value="Asia/Magadan" >
                    (GMT+12:00) Asia/Magadan
                </option>
            
                <option value="Pacific/Auckland" >
                    (GMT+12:00) Pacific/Auckland
                </option>
            
                <option value="Pacific/Fiji" >
                    (GMT+12:00) Pacific/Fiji
                </option>
            
                <option value="Pacific/Funafuti" >
                    (GMT+12:00) Pacific/Funafuti
                </option>
            
                <option value="Pacific/Kwajalein" >
                    (GMT+12:00) Pacific/Kwajalein
                </option>
            
                <option value="Pacific/Majuro" >
                    (GMT+12:00) Pacific/Majuro
                </option>
            
                <option value="Pacific/Nauru" >
                    (GMT+12:00) Pacific/Nauru
                </option>
            
                <option value="Pacific/Tarawa" >
                    (GMT+12:00) Pacific/Tarawa
                </option>
            
                <option value="Pacific/Wake" >
                    (GMT+12:00) Pacific/Wake
                </option>
            
                <option value="Pacific/Wallis" >
                    (GMT+12:00) Pacific/Wallis
                </option>
            
                <option value="Pacific/Chatham" >
                    (GMT+12:45) Pacific/Chatham
                </option>
            
                <option value="Pacific/Apia" >
                    (GMT+13:00) Pacific/Apia
                </option>
            
                <option value="Pacific/Enderbury" >
                    (GMT+13:00) Pacific/Enderbury
                </option>
            
                <option value="Pacific/Tongatapu" >
                    (GMT+13:00) Pacific/Tongatapu
                </option>
            
                <option value="Pacific/Kiritimati" >
                    (GMT+14:00) Pacific/Kiritimati
                </option>
        </select>
  </td>  
  
</tr>

<tr> 
  <td bgcolor="#2E64FE" style="text-align:right;"> <label style="color: FFFFFF"> Date Format : &nbsp;</label> </td>
  <td> <select id ="db_dataformat" name = "date_formate">
          <option value="NULL_CRITERIA" >
                    «No Entry»
                </option>
            
                <option value="yyyy-MM-dd" selected>
                    yyyy-MM-dd
                </option>
            
                <option value="MM/dd/yyyy" >
                    MM/dd/yyyy
                </option>
            
                <option value="dd/MM/yyyy" >
                    dd/MM/yyyy
                </option>
            
                <option value="yyyy/MM/dd" >
                    yyyy/MM/dd
                </option>
            
                <option value="yyyy-MMM-dd" >
                    yyyy-MMM-dd
                </option>
        </select>

         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
        <label> Date/Time Format : &nbsp;</label> 
        <select id ="db_dataformat" name = "date_and_time_formate">
          <option value="NULL_CRITERIA" >
                    «No Entry»
                </option>
            
                <option value="yyyy-MM-dd hh:mm:ss a" selected>
                    yyyy-MM-dd hh:mm:ss a
                </option>
            
                <option value="MM/dd/yyyy hh:mm:ss a" >
                    MM/dd/yyyy hh:mm:ss a
                </option>
            
                <option value="dd/MM/yyyy hh:mm:ss a" >
                    dd/MM/yyyy hh:mm:ss a
                </option>
            
                <option value="yyyy/MM/dd hh:mm:ss a" >
                    yyyy/MM/dd hh:mm:ss a
                </option>
            
                <option value="yyyy-MMM-dd hh:mm:ss a" >
                    yyyy-MMM-dd hh:mm:ss a
                </option>
        </select>
  </td>
</tr>

<tr> 
  <td bgcolor="#2E64FE" style="text-align:right;"> <label style="color: FFFFFF"> Workdays : &nbsp;</label> </td>
  <td> &nbsp;
      <input type = "checkbox"
                 id = "chksuday"
                 value = "1" name = "check_sunday" />
             <label for = "chkEggs">Sunday</label>
           
             <input type = "checkbox"
                 id = "chkmonday"
                 name = "check_monday"
                 value = "1" />
             <label for = "chkHam">Monday</label>

             <input type = "checkbox"
                 id = "chktuesday"
                 name = "check_tuesday"
                 value = "1" />
             <label for = "chkEggs">Tuesday</label>
           
             <input type = "checkbox"
                 id = "chkwednessday"
                 name = "check_wednesday"
                 value = "1" />
             <label for = "chkHam">Wednessday</label>

             <input type = "checkbox"
                 id = "chkThursday"
                 name = "check_thursday"
                 value = "1" />
             <label for = "chkEggs">Thuersday</label>
           
             <input type = "checkbox"
                 id = "chkfriday"
                 name = "check_friday"
                 value = "1" />
             <label for = "chkHam">Friday</label>

             <input type = "checkbox"
                 id = "chksaturday"
                 name = "check_saturday"
                 value = "1" />
             <label for = "chkHam">Saturday</label>
  </td>

    <tr>
        <td bgcolor="#D8DFE6" style="text-align:right;"> <label> Enable Build and Changest : &nbsp;</label> </td>
        <td> &nbsp;&nbsp;<input  type = "checkbox"
                    name = "changest"
                 id = "chkchangest"
                 value = "1" />
        </td>
    </tr>


<tr>
  <td bgcolor="#A9C2DB"> <lable> <b>Work Product Prefixes </b></label> </td>
  <td> </td>
</tr>

</tr>

<tr>
  <td bgcolor="#D8DFE6" style="text-align:right;"><label> User Story : &nbsp;</label></td>
  <td><input type="text" id="txt" name="txtUserStory" class="form-control" style="width:100px" value="US" required></td> 
</tr>



<tr>
  <td bgcolor="#D8DFE6" style="text-align:right;"><label> Defects : &nbsp;</label></td>
  <td><input type="text" id="txt" name="txtDfect" class="form-control" style="width:100px" value="DF" required></td> 
</tr>

</tr>

<tr>
  <td bgcolor="#D8DFE6" style="text-align:right;"><label> Tasks : &nbsp;</label></td>
  <td><input type="text" id="txt" name="txtTask" class="form-control" style="width:100px" value="TS" required></td> 
</tr>

<tr>  
  <td>&nbsp;
  </td>
</tr>

<tr>  
  <td>&nbsp;
  </td>
  <td>
    <br>
    <button name = "save_new" style="width:120px">Save & New</button>
    <button name = "cancel" style="width:120px" onclick="window.close()">Cancel</button>
  </td>
</tr>
</table>
<center>
    <?php echo validation_errors('<p style="color: red;">');?>
</center>
</form>
</body>
</html>


