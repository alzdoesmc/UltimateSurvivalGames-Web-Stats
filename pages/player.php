

<?php
error_reporting(0);
//require_once( '../db_con.php' );

echo '<div class="row"><div class="col-md-5" style="padding-top:25px;"><ul class="nav nav-pills">
  <li class="active"><a href="index.php">',$leaderboard_button_name,'</a></li>
  <li><a href="index.php?page=player">',$search_button_name,'</a></li>
</ul></div><div class="col-md-7" align="right"><h2 class="text-muted">',$survivalgames_stats_title,'</h2></div></div><hr>';


$per_page = 30;
$p    = mysql_real_escape_string(addslashes($_GET['p']));
$player = mysql_real_escape_string(addslashes($_GET['player']));


if($player != ""){
 
$sql_rank = 'SELECT lastname, sum(points) as points FROM '.$dbprefix.'players GROUP BY lastname ORDER BY points desc';

$sql_data = 'SELECT lastname, sum(points) as points, sum(kills) as kills ,sum(deaths) as deaths, sum(wins) as wins,  sum(played) as played FROM '.$dbprefix."players  WHERE lastname = '$player'";


$result_rank = mysql_query($sql_rank);
$result_data = mysql_query($sql_data);
$data = mysql_fetch_array($result_data);


$rank = 1;
$finished = false;
$max = 5000;


echo '<center>';
echo '<div class="row" style="border-radius:3px;border:1px solid #000;">
    <div class="col-md-10" align="center">
        <h2>
            Statistics for '.$player.'
        </h2>
    </div>
    <div class="col-md-2" align="center">
        <a href="index.php?page=player" class="btn btn-primary btn-md" style="margin-top:7px;">',$search_again_button_name,'</a>
    </div>
</div>';
echo '<div class="row" style="margin-top:55px;">
<div class="col-md-3"><img src="http://minotar.net/avatar/'.$player.'"><br><h4>'.$player.'</h4></div>
<div class="col-md-9">
    <div align="center" style="margin-top:15px;">
        <table class="table">
            <tbody>
                <tr>
                    <td style="font-weight:bold;">
                        Points
                    </td>
                    <td>
                        '.$data['points'].'
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">
                        Kills
                    </td>
                    <td>
                        '.$data['kills'].'
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">
                        Deaths
                    </td>
                    <td>
                        '.$data['deaths'].'
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">
                        Kill/Death Ratio
                    </td>
                    <td>
	                    '.$data['kills'].':'.$data['deaths'].'
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">
                        Games Played
                    </td>
                    <td>
                        '.$data['played'].'
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">
                        Wins
                    </td>
                    <td>
                        '.$data['wins'].'
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>';
	
}
else{
    echo '<center style="margin-top:10px;"><form onSubmit="return false;">
    <input class="form-control" style="text-align:center;" id="searchInput" type="text" placeholder="',$search_player_box_placeholder,'" onkeyup="search(this.value)" onclick="this.value=\'\'">
    </form>';
    
    echo '<div id="livesearch"></div>';
}
?> 

