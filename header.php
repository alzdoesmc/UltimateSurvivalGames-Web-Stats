<?php require_once( 'settings.php' ); error_reporting(0); ?>
<html>
<head>
<title><?php echo $servername; ?></title>

<style>
@import url(css/bootstrap.css);
.placeholder{
        min-height:75px;
    }
</style>
<script type="text/javascript">
function search(str)
{

if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","pages/search.php?player="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>

<nav class="navbar navbar-fixed-top navbar-default" role="navigation" style="height:50px;">
		<div class="container">
		    <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-nav-1">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="index.php"><?php echo $servername; ?></a>
		  </div>
		  <div class="collapse navbar-collapse navbar-nav-1">
		    <ul class="nav navbar-nav">
                <?php echo $links; ?>
              </ul>
		  </div>
		</div>
	</nav>