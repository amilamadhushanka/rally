<?php
  if(!$_SESSION['email'] ){
    redirect('http://agilepartner.comxa.com/index.php/login');
  }

            $est_pre_person = $dataset{0}.' '. 'man hours' ;            
            $projectplanedtime = $dataset{1}.' '. 'days' ;            
            $projectplanedtimeInWeeks = $dataset{2}.' '. 'weeks' ;            
            $workingDaysPerWeek = $dataset{3}.' '. 'days' ;            

            $daysToWorkingDays = $dataset{4}.' '. 'days' ;            
            $WorkingHours = $dataset{5}.' '. 'hours' ;            
            $numberofMembers = $dataset{6}.' '. 'Members' ;
            $projectname = $dataset{7};            

?>

<html>


    <head>
	   <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>
        

        <title>Team Load</title>

    <!-- Bootstrap core CSS -->
    
        <link href="./css/bootstrap.min.css" rel="stylesheet"> 

    <!-- Custom styles for this template -->
        <link href="css/register.css" rel="stylesheet"> 
        <link href="css/add_project.css" rel="stylesheet">

    </head>

    <body>



<form role = "form" method = "post">

<table>
 <tr>
  <td> <h2 class="form-signin-heading" > <font color ="#0000FF"> Team Load </font> </h2></td>
  <td></td>
  
 </tr> 
 </table>

<table align = "center" border="1" style="width:auto" >
  <col width="250">
  <col width="705">

<tr>
  <td  style="text-align:left;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> Project : &nbsp;</label></td>  
  <td>
     <?php echo $_SESSION['project'];?>
  </td>
</tr>

<tr>
  <td  style="text-align:left;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> Etimated Time Per Person : &nbsp;</label></td>  
  <td>
    <?php echo "$est_pre_person"; ?>
  </td>
</tr>

<tr>
  <td  style="text-align:left;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> Project Plan Time In Days : &nbsp;</label></td>  
  <td>
    <input style="width:300px; border: none; box-shadow: none" type="text" id="from" name="from" class="form-control" value=
    "<?php
      echo $projectplanedtime;
     
    ?>"
     readonly>
  </td>


</tr>

<tr>
  <td  style="text-align:left;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> Project Plan Time In Weeks : &nbsp;</label></td>  
  <td>
    
     <?php
      echo "$projectplanedtime"."   ". "/"."    "."7"."\n" ;
      echo "<br/>";      
      echo $projectplanedtimeInWeeks;

    ?>
  </td>
</tr>


<tr>
  <td  style="text-align:left;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> Working Days per Week : &nbsp;</label></td>  
  <td>
    <input style="width:300px; border: none; box-shadow: none" type="text" id="from" name="from" class="form-control" value=
    " <?php 
    echo "$workingDaysPerWeek"; ?>" readonly>
  </td>
</tr>

<tr>
  <td  style="text-align:left;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> Project Working Days : &nbsp;</label></td>  
  <td>    
    <?php 
    echo "$workingDaysPerWeek"."  ". "x"."  ". "$projectplanedtimeInWeeks";
    echo "<br/>";
    echo $daysToWorkingDays; 
    ?>
  </td>


</tr>

<tr>
  <td  style="text-align:left;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> Project Working Hours : &nbsp;</label></td>  
  <td>
      <?php 
    echo "$daysToWorkingDays"."  ". "x"."  ". "8";
    echo "<br/>";
    echo $WorkingHours;
    ?>
  </td>
</tr>

<tr>
  <td  style="text-align:left;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> Number of Minimum Team Members : &nbsp;</label></td>  
  <td>
    <input style="width:300px; border: none; box-shadow: none" type="text" id="from" name="from" class="form-control" value=" <?php echo $numberofMembers; ?>" readonly>
  </td>
</tr>


</table>
</form>
</body>
</html>

