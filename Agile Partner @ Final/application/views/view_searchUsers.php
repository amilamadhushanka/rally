<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>
    
    <title>Users</title>

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

    if($result2 == FALSE){
                         
        echo'<div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              No Sucess User Stories Available.
            </div>';
    }
    
    else{
        foreach ($result2 as $story) {
          $lName=$story->lName;
          $fName=$story->fName;
          $company=$story->company;
          $title=$story->title;
          $country=$story->country;
          
        }
      }

        
  ?>

  <form class="form-iteration" role = "form" method = "post" action = "" enctype="multipart/form-data"  >



<table  border="0" >
  


  <tr>
    <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: FFFFFF" >User : &nbsp;</label></td>
    <td>
      <input type="text" id="name" name="name" class="form-control" style="width:450px; margin-top:5px;" value="
      <?php echo $fName; $lName;  ?>" readonly>
    </td> 
  </tr> 
  <td> &nbsp;&nbsp;&nbsp;&nbsp; </td>
  <td> &nbsp;&nbsp;&nbsp;&nbsp; </td>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">General</font></td>
  </tr>
<tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label>Company : &nbsp;</label></td>
    <td>
      <input type="text" id="name" name="name" class="form-control" style="width:450px; margin-top:5px;" value="
      <?php echo $company; ?>" readonly>
    </td> 
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label>Title : &nbsp;</label></td>
    <td>
      <input type="text" id="name" name="name" class="form-control" style="width:450px; margin-top:5px;" value="
      <?php echo $title; ?>" readonly>
    </td> 
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label>Country : &nbsp;</label></td>
    <td>
      <input type="text" id="name" name="name" class="form-control" style="width:450px; margin-top:5px;" value="
      <?php echo $country; ?>" readonly>
    </td> 
  </tr>

  <tr><td> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  </td>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">Project and Team Details</font></td>
  </tr>

  <tr><td> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  </td>
  </tr>
  <tr>
    <td></td>
    <td><?php 
  $search_q=  $this->input->post('keyword');
  getProjects($search_q) ?></td></tr>

  <tr><td> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  </td>


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
  getDefects($search_q) ?></td></tr>




</body>
  </html>

  <?php
function getProjects($search)
{
  $sql2="SELECT t.role,t.teamId,t.projectName FROM newteam t, users u
        WHERE u.fName='$search' AND t.userName=u.username"; 
$result2 = mysql_query($sql2);

echo "<center><div class='datagrid' >
          <table id='defectsTable' class='table_US' >
             <thead><tr>
             <th width='35%'> PROJECT </th>
             <th width='20%'> TEAM </th>
             <th width='20%'> ROLE </th>
             </tr></thread>";
 

    while($row = mysql_fetch_array($result2)){   //Creates a loop to loop through results

      echo "<tbody><tr class='alt'><td>".$row['projectName']."</td><td>".$row['teamId']."</td><td>".$row['role']."</td></tr></tbody>";
    
        }
        echo "</table>
          </div>
          </center>";

}

function getUserstory($search)
{
  $sql2="SELECT us.pname,us.ID,us.Name,us.Priority,us.state FROM userstory us, users u
        WHERE u.fName='$search' AND us.Owner=u.username"; 
$result2 = mysql_query($sql2);

echo "<center><div class='datagrid' >
          <table id='defectsTable' class='table_US' >
             <thead><tr>
             <th width='35%'> PROJECT </th>
             <th width='20%'> USERSTORY ID </th>
             <th width='20%'> USERSTORY </th>
             <th width='35%'> PRIORITY </th>
             <th width='20%'> STATE </th>
             
             </tr></thread>";
 

    while($row = mysql_fetch_array($result2)){   //Creates a loop to loop through results

      echo "<tbody><tr class='alt'><td>".$row['pname']."</td><td>".$row['ID']."</td><td>".$row['Name']."</td><td>".$row['Priority']."</td><td>".$row['state']."</td></tr></tbody>";
    
        }
        echo "</table>
          </div>
          </center>";

}

function getDefects($search)
{
  $sql2="SELECT d.project,d.userStory,d.name,d.environment,d.state,d.severity, d.creationDate,d.targetDate FROM defect d, users u
        WHERE u.fName='$search' AND d.owner=u.username"; 
$result2 = mysql_query($sql2);

echo "<center><div class='datagrid' >
          <table id='defectsTable' class='table_US' >
             <thead><tr>
             <th width='35%'> PROJECT </th>
             <th width='20%'> USERSTORY</th>
             <th width='20%'> DEFECT NAME </th>
             <th width='35%'> ENVIRONMENT </th>
             <th width='20%'> STATE </th>
             <th width='20%'> SEVERITY </th>
             <th width='35%'> CREATION DATE </th>
             <th width='20%'> TARGET DATE </th>
             
             </tr></thread>";
 

    while($row = mysql_fetch_array($result2)){   //Creates a loop to loop through results

      echo "<tbody><tr class='alt'><td>".$row['project']."</td><td>".$row['userStory']."</td><td>".$row['name']."</td><td>".$row['environment']."</td><td>".$row['state']."</td><td>".$row['severity']."</td><td>".$row['creationDate']."</td><td>".$row['targetDate']."</td></tr></tbody>";
    
        }
        echo "</table>
          </div>
          </center>";

}
