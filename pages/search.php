
<?php
error_reporting(0);
include ( '../settings.php' );
$player = mysql_real_escape_string(addslashes($_GET['player']));

if(strlen($player) < 2){
	return;
}

$sql = 'SELECT lastname,sum(kills) as kills ,sum(deaths) as deaths, sum(points) as points , sum(wins) as wins, sum(played) as played, sum(kdr) as kdr FROM '.$dbprefix.'players WHERE lastname LIKE \'%'.$player.'%\' GROUP BY lastname ORDER BY points desc LIMIT 500';

$result = mysql_query($sql);
echo mysql_error();
$index = ($p * $per_page)+1;
echo'<table class="table" style="font-size:14px;">';
echo '<thead>';
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

	echo '<td><a href="index.php?page=player&player=',$row['lastname'],'"><img src="http://minotar.net/avatar/',$row['lastname'],'/16.png"></a> <a href="index.php?page=player&player=',$row['lastname'],'">',$row['lastname'],'</a></td>';
	echo '<td>',$row['points'], '</td>';
	echo '<td>',$row['wins'],'</td>';
	echo '<td>',$row['kills'],'</td>';
	echo '<td>',$row['deaths'],'</td>';
	echo '<td>',$row['kills'],':',$row['deaths'],'</td>';
	echo '<td>',$row['played'],'</td>';
	echo '</tr>';

	$index++;

}
echo '</tbody></table>';
return;

function getRank($rank_search){
include ( '../settings.php' );

$sql_rank = 'SELECT lastname, sum(points) as points FROM '.$dbprefix.'players GROUP BY lastname ORDER BY points desc';

$result_rank = mysql_query($sql_rank);
echo mysql_error();

$rank = 1;
$finished = false;
$max = 5000;

while($rank<=$max AND $row=mysql_fetch_array($result_rank)){
	if($row['player'] == $rank_search){
		$finished = true;
		break;
	}
	$rank++;
}
return $rank;
}

?>