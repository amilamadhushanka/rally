<?php
  if(!$_SESSION['email'] ){
    redirect('http://agilepartner.comxa.com/index.php/login');
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update and Delete with Slide Effect.....</title>
<link href="frame.css" rel="stylesheet" type="text/css"><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
  
 
 <script type="text/javascript">


 $( document ).ready(function () {
//class of comment button
//what to do when btn is clickd
$(".comment_button").click(function() 
{


var element = $(this);
   
   //assign value of comment box to boxval
   //#content is id of comment box
   var boxval = $("#content").val();
	
    var dataString =  "comment="+ boxval +"&img_id="+ <?php echo $_GET['img_id'] ?> + "&userName=<?php echo $_SESSION['email']; ?>"  +"";
    //
	

	if(boxval=='')
	{
	alert("Please Enter Some Text");
	
	}
	else
	{
		//#flash is id of div tag
	$("#flash").show();
	$("#flash").fadeIn(1000).html('<img src="ajax.gif" align="absmiddle">&nbsp;<span class="loading">Loading Update...</span>');

			$.ajax({
				//URL to send the request to
				url: 'addComment',
				type: 'POST',
				//specifies data to be sent to the server
				data: dataString,
				//A function to be run when the request suceeds 
				success: function(html) {
					//alert("aaaaaaa");
					//$("ol#update").prepend(html);
					document.getElementById('update').innerHTML = document.getElementById('update').innerHTML + html;
					document.getElementById('content').value='';
					$("#flash").hide();
				},
				//A function to be run when the request fails 
				error: function(data) {
				    alert("ERROR !");
				}
			});
	
}
return false;
	

});

/*
$('.delete_update').live("click",function() 
{
var ID = $(this).attr("id");
 var dataString = 'msg_id='+ ID;
 
if(confirm("Sure you want to delete this update? There is NO undo!"))
{

$.ajax({
type: "POST",
 url: "delete_data.php",
  data: dataString,
 cache: false,
 success: function(html){
 $(".bar"+ID).slideUp('slow', function() {$(this).remove();});
 }
});

}

return false;
});

*/


});



</script>


<style type="text/css">
body
{

}
.comment_box
{
background-color:#D3E7F5; border-bottom:#ffffff solid 1px; padding-top:3px
}
a
	{
	text-decoration:none;
	color:#d02b55;
	}
	a:hover
	{
	text-decoration:underline;
	color:#d02b55;
	}
	*{margin:0;padding:0;}
	
	
	ol.timeline
	{list-style:none;font-size:1.2em;}ol.timeline li{ position:relative;padding:.7em 0 .6em 0;border-bottom:1px dashed #000;line-height:1.1em; background-color:#D3E7F5; height:55px; width:499px}ol.timeline}
	.delete_button
	{
	float:right; margin-right:10px; width:20px; height:20px
	}
	.feed_link
	{
	font-style:inherit; font-family:Georgia; font-size:13px;padding:10px; float:left; width:350px
	}
	.feed_a
	{
	color:#0000CC; text-decoration:underline
	}
	.delete_update
	{
	font-weight:bold;
	
	}
</style>
</head>

<body>

<div align="center">
<table cellpadding="0" cellspacing="0" width="500px">
<tr>
<td>


<div id="test">

</div>
<div style="height:7px"></div>
<div id="flash" align="left"  ></div>
<ol  id="update" class="timeline">

<div id="old_updates">
</div>
	<?php
		//assign the current element's key to the $key variable on each iteration
		//$comments arr created in viewImage.php
		foreach ($comments as $key => $val) {
			$user = $val['userName'];
			$comment = $val['comment'];

			echo "<li>";
			echo "$user </br>$comment";
			echo "</li>";
		}

	?>

</ol>

<div align="left">
<form  method="post" name="form" action="">
<?php if($_SESSION['teamRole']=='Scrum Master'){ 
echo '<table cellpadding="0" cellspacing="0" width="500px">
<tr><td align="left"><div align="left"><h3>What do you think?</h3></div></td></tr>
<tr>
<td style="padding:4px; padding-left:10px;" class="comment_box">
<textarea cols="30" rows="2" style="width:480px;font-size:14px; font-weight:bold" name="content" id="content" maxlength="145" ></textarea><br />
<button type="submit" id="update" name="submit" class="comment_button">Comment</button>
</td>
</tr>
</table>';
}?>
</form>

</div>


</div>

</td>
</tr>



</div>
</li>
</table>
</div>
</body>
</html>

