<?php
//require_once( '../db_con.php' );

echo '<div class="row"><div class="col-md-5" style="padding-top:25px;"><ul class="nav nav-pills">
  <li class="active"><a href="index.php">',$leaderboard_button_name,'</a></li>
  <li><a href="index.php?page=player">',$search_button_name,'</a></li>
</ul></div><div class="col-md-7" align="right"><h2 class="text-muted">',$survivalgames_stats_title,'</h2></div></div><hr>';

$per_page = 50;
$p    = mysql_real_escape_string(addslashes($_GET['p']));
$sort     = mysql_real_escape_string(addslashes($_GET['sort']));
$mode = $_GET['mode'];
if(trim($sort) == "")
	$sort = 'points';
if($mode == "raw"){
	$per_page = 1000000000000000;
}

$sql = 'SELECT `lastname`,sum(kills) as kills ,sum(deaths) as deaths, sum(points) as points , sum(wins) as wins, sum(played) as played, sum(kdr) as kdr FROM '.$dbprefix.'players GROUP BY lastname ORDER BY '.$sort.' desc LIMIT '.($p*$per_page).','.$per_page;

//echo $sql;

$result = mysql_query($sql);
echo mysql_error();
echo '<ul class="nav nav-pills">
<li style="padding:10px;cursor:default;">Sort By: </li>
  <li><a href="index.php?page=leaderboard&sort=lastname">Player</a></li>
  <li><a href="index.php?page=leaderboard&sort=points">Points</a></li>
  <li><a href="index.php?page=leaderboard&sort=wins">Wins</a></li>
  <li><a href="index.php?page=leaderboard&sort=kills">Kills</a></li>
  <li><a href="index.php?page=leaderboard&sort=deaths">Deaths</a></li>
  <li><a href="index.php?page=leaderboard&sort=kdr">Kill/Death Ratio</a></li>
  <li><a href="index.php?page=leaderboard&sort=played">Games Played</a></li>
</ul>';
$index = ($p * $per_page)+1;
echo'<table class="table" style="font-size:14px;">';
echo '<thead>';
echo '<td>#</td>';
echo '<td>Username</td>';
echo '<td>Points</td>';
echo '<td>Wins</td>';
echo '<td>Kills</td>';
echo '<td>Deaths</td>';
echo '<td>Kill/Death Ratio</td>';
echo '<td>Games Played</td>';
echo '</thead>';
echo '<tbody>';
while($row = mysql_fetch_array($result)){



	echo '<tr><td>',$index,'</td>';
	echo '<td><a href="index.php?page=player&lastname=',$row['lastname'],'"><img src="http://minotar.net/avatar/',$row['lastname'],'/16.png"></a> <a href="index.php?page=player&player=',$row['lastname'],'">',$row['lastname'],'</a></td>';
	echo '<td>',$row['points'], '</td>';
	echo '<td>',$row['wins'],'</td>';
	echo '<td>',$row['kills'],'</td>';
	echo '<td>',$row['deaths'],'</td>';
	echo '<td>',$row['kills'],':',$row['deaths'],'</td>';
	echo '<td>',$row['played'],'</td>';
    
	echo '</tr>';

	$index++;

}
echo '</tbody>';
echo '</table>';
echo '<ul class="nav nav-pills" style="float:right;">';
if($p != 0 )
	echo '<li><a href="index.php?page=leaderboard&p=',$p-1,'">',$previous_page_button_name,'</a></li>';
	echo '<li><a href="index.php?page=leaderboard&p=',$p+1,'">',$next_page_button_name,'</a></li></ul>';
?>
	
