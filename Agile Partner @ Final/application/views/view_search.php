<!DOCTYPE html>
<html lang="en">

  <head>

    <style>
#search {
  background-color: lightyellow;
  outline: medium none;
  padding: 8px;
  width: 300px;
  border-radius: 2px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  border: 2px solid orange;
}

</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>

    <title>search</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/buttons.css');
    ?>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>
<!-- <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>-->
<script type="text/javascript" src=<?php echo base_url('assets/js/json2.js'); ?>></script>
<script>

  function check_(){
    if($("#search_prj").is(':checked')){
          if($("#search_usr").is(':checked'))
              $("#vall").val('3');
          else
            $("#vall").val('1');
    }
    else{
          if($("#search_usr").is(':checked'))
                  $("#vall").val('2');
          else
            $("#vall").val('0');
    }

  }

  $(document).ready(function(){
    //alert('aaaaa');

    $("#search_prj").change(function(){
        check_();
    });

    $("#search_usr").change(function(){
        check_();
    });


    $("#search").keyup(function(){
        
        if($("#search").val().length>3){
        $.ajax({
          type: "post",
          url: "search",
          cache: false,       
          data:'search='+$("#search").val() +'&v='+$("#vall").val(),

          success: function(response){
            $('#finalResult').html("");
            var obj = JSON.parse(response);
            if(obj.length>0){
              try{
                var items=[];   
                $.each(obj, function(i,val){   
                                    
                    items.push($('<li>').text(val.name));

                }); 
                $('#finalResult').append.apply($('#finalResult'), items);
              }catch(e) {   
                alert('Exception while request..');
              }   
            }else{
              $('#finalResult').html($('<li/>').text("No Data Found"));   
            }   
            
          },
          error: function(){            
            alert('Error while request..');
          }
        });
        }
    return false;
    });
  });
</script>
</head>
<body>


<?php echo form_open('http://agilepartner.comxa.com/index.php/search/getDetails'); ?>


  <br><br><br><br><br><br><br><br>
	
	<center>
    <table border="0">
      <tr>
        <td>search </td>
        <div id="container">
          
  	<td> <input type="text" id="search" name="keyword" autocomplete="off"> &nbsp;<ul id="finalResult"></ul></td>
  
</div>
  <td> <button type="submit" class="btn btn-default btn-lg"> 
  <span class="glyphicon glyphicon-search"></span>
  
</button> </td>
</tr>
<tr>

<td>
<input type="radio" name="search_val" id="search_prj" value="1">Projects </input>
</td>
</tr>

<tr>

<td>
<input type="radio" name="search_val" id="search_usr" value="2">Users </input>

<input type="text" hidden value="0" id ="vall"/>
</td>
</tr>

</table>
</center>

<?php echo form_close(); ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>

</body>

</html> 