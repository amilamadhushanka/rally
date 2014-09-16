<?php
  if(!$_SESSION['email'] ){
    redirect('http://agilepartner.comxa.com/index.php/login');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>

    <title>Add New Member</title>

	<?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/iterationTable.css');
  ?>


</head>
<body>

  <div>
    <table align = "left" border="0" style="width:auto">
      <col width="500">
      <col width="500">
      <tr> 
        <td>
          <form>
          
          </form>
          <br>
          <?php
            loadusers($team,$project);
          ?>
        </td>
      </tr>
      <tr>
        <td>
          &nbsp;
        </td>
      </tr>
    </table>
  </div>

</body>
</html>

<?php

  function loadusers($team,$project){

    $query = "SELECT DISTINCT * FROM users WHERE username NOT IN (SELECT userName FROM newteam WHERE teamId='$team')";
    $result = mysql_query($query);

    echo '<center><div class="datagrid" style="width:950px">
          <table id="iterationTable">
            <thead>
            <tr>
              <th width="30%">NAME</th>
              <th width="15%">TITLE</th>
              <th width="15%">PHONE</th>
              <th width="5%">Assign</th>
            </tr>
            </thead>';

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      echo "<tbody><tr class='alt'><td>" . $row['fName'] . '&nbsp;' . $row['lName'] ."</td><td>" . $row['title'] . "</td><td>" . $row['phone'] . "</td>
            <td><a href='http://agilepartner.comxa.com/index.php/addNewMemberToTeam/addNewMember/". $team ."/". $project ."/". $row['username'] ."'>
             <img src='".base_url('assets\images\assign_icon.png')."' > </img> </a></td>
            </tr></tbody>";
    }

    echo "</table>
          <div></center>";
  }

?>