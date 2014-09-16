 <html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>
    
    <title>Project</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/createIteration.css');
      echo link_tag('assets/css/bootstrap.min.css');
    ?>
<?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/defectsTable.css');
      echo link_tag('assets/css/buttons.css');
    ?>
  

    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>
    

</head>


<body>

  <?php

    if($result1 == FALSE){
                         
        echo'<div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              No Sucess User Stories Available.
            </div>';
    }
    
    else{
        foreach ($result1 as $story) {
          $name=$story->name;
          $Description=$story->discription;
          $state=$story->state;
          $owner=$story->owner;
          $timezone=$story->timezone;
          $date_format=$story->date_format;
          $date_time_format=$story->date_time_format;
          $workdays=$story->workdays;
          $changest=$story->changest;
          $user_story=$story->user_story;
          $defect=$story->defect;
          $tasks=$story->tasks;
          $teamId=$story->teamId;

        }
      }

        
  ?>

  <form class="form-iteration" role = "form" method = "post" action = "" enctype="multipart/form-data"  >



<table  border="0" >
  


  <tr>
    <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: FFFFFF" >Project Name : &nbsp;</label></td>
    <td>
      <input type="text" id="name" name="name" class="form-control" style="width:450px; margin-top:5px;" value="<?php echo $name; ?>" readonly>
    </td> 
  </tr>
  <td> &nbsp;&nbsp;&nbsp;&nbsp; </td>
  <td> &nbsp;&nbsp;&nbsp;&nbsp; </td>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">General</font></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Description : &nbsp;</label></td>
    <td>
      <input type="text" id="description" name="description" class="form-control" style="width:450px; margin-top:5px;" value="<?php echo $Description; ?>" readonly>
    </td> 
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label>state &nbsp;</label></td>
    <td>
      <input type="text" id="state" name="state" class="form-control" style="width:450px; margin-top:5px;" value="<?php echo $state; ?>" readonly>
    </td> 
  </tr> 

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Owner : &nbsp;</label></td>
    <td>
      <input type="text" id="owner" name="owner" class="form-control" style="width:450px; margin-top:5px;" value="<?php echo $owner; ?>" readonly>
    </td> 
  </tr>


  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Timezone : &nbsp;</label></td>
    <td><input type="text" id="timezone" name="timezone" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $timezone; ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Date format : &nbsp;</label></td>
    <td><input type="text" id="date_format" name="date_format" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $date_format; ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Date/Time Format : &nbsp;</label></td>
    <td><input type="text" id="date_time_format" name="date_time_format" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $date_time_format; ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Work Days : &nbsp;</label></td>
    <td><input type="text" id="workdays" name="workdays" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $workdays; ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Changest : &nbsp;</label></td>
    <td><input type="text" id="changest" name="changest" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $changest; ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Userstory : &nbsp;</label></td>
    <td><input type="text" id="user_story" name="user_story" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $user_story; ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Defect : &nbsp;</label></td>
    <td><input type="text" id="defect" name="defect" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $defect; ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Tasks  &nbsp;</label></td>
    <td><input type="text" id="tasks" name="tasks" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $tasks; ?>" readonly></td>
  </tr>

<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
  

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">Team Details</font></td>
  </tr>

  
<tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Team ID  &nbsp;</label></td>
    <td><input type="text" id="tID" name="tID" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $teamId; ?>" readonly></td>
  </tr>

  <tr><td> &nbsp;&nbsp;&nbsp;&nbsp; </td></tr>
<tr>
  <td/>
    <td><?php 
$search_q=  $this->input->post('keyword');
  getTeams($search_q) ?></td></tr>

  <td> &nbsp;&nbsp;&nbsp;&nbsp; </td>
  

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">Userstory Details</font></td>
  </tr>

  <tr><td> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  </td>
  </tr>
  <tr>
    <td></td>
    <td><?php 
$search_q=  $this->input->post('keyword');
  getUserstory($search_q) ?></td></tr>

<tr><td> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  </td>
  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">Defect Details</font></td>
  </tr>

  <tr><td> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  </td>
  </tr>
  <tr>
    <td></td>
    <td><?php 
$search_q=  $this->input->post('keyword');
  getDefects($search_q) ?></td>
<td></td></tr>


  
    
  </table>
</body>
</html>

<?php
function getTeams($search)
{
  $sql2="SELECT t.role,u.fName,u.lName,u.company,u.title FROM newteam t, users u
        WHERE t.projectName='$search' AND t.username=u.username"; 
$result2 = mysql_query($sql2);

echo "<center><div class='datagrid' >
          <table id='defectsTable' class='table_US' >
             <thead><tr>
             <th width='35%'> TEAM MEMBERS </th>
             <th width='20%'> ROLE </th>
             <th width='20%'> COMPANY </th>
             <th width='20%'> TITLE </th>
             </tr></thread>";
 

    while($row = mysql_fetch_array($result2)){   //Creates a loop to loop through results

      echo "<tbody><tr class='alt'><td>".$row['fName']."&nbsp;&nbsp;".$row['lName']."</td><td>".$row['role']."</td><td>".$row['company']."</td><td>".$row['title']."</td></tr></tbody>";
    
        }
        echo "</table>
          </div>
          </center>";

}

function getUserstory($search)
{
  $sql3="SELECT Name,Discription,Owner,state FROM userstory
        WHERE pname='$search'"; 
$result3 = mysql_query($sql3);

echo "<center><div class='datagrid' >
          <table id='defectsTable' class='table_US' border='1'>
             <thead><tr>
             <th width='35%'> USERSTORY NAME </th>
             <th width='20%'> STATE </th>
             <th width='20%'> OWNER </th>
             <th width='20%'> DESCRIPTION </th>
             </tr></thread>";
 

    while($row = mysql_fetch_array($result3)){   //Creates a loop to loop through results

      echo "<tbody><tr class='alt'><td>".$row['Name']."</td><td>".$row['Discription']."</td><td>".$row['state']."</td><td>".$row['Owner']."</td></tr></tbody>";
      
        }
        echo "</table>
          </div>
          </center>";

}


function getDefects($search)
{
  $sql4="SELECT name,description,userStory,owner,state,severity FROM defect
        WHERE project='$search'"; 
$result4 = mysql_query($sql4);

echo "<center><div class='datagrid' >
          <table id='defectsTable' class='table_US' border='1'>
             <thead><tr>
             <th width='35%'> DEFECT NAME </th>
             <th width='35%'> DESCRIPTION </th>
             <th width='35%'> USERSTORY </th>
             <th width='20%'> STATE </th>
             <th width='20%'> SEVERITY </th>
             </tr></thread>";
 

    while($row = mysql_fetch_array($result4)){   //Creates a loop to loop through results

      echo "<tbody><tr class='alt'><td>".$row['name']."</td><td>".$row['description']."</td><td>".$row['userStory']."</td><td>".$row['state']."</td><td>".$row['severity']."</td></tr></tbody>";
      
        }
        echo "</table>
          </div>
          </center>";

}


  
?>





























 