<?php

/* REQUIRED INFORMATION */

$servername='My Server'; // The name of your Minecraft Server

$dbhost='localhost'; // Hostname

$dbname='survivalgames'; // Database name

$dbuser='root'; // Mysql username

$dbpass=''; // Mysql password

$dbprefix = 'sg_'; // Table Prefix (defaults to sg_). Must be the same as in /plugins/SurvivalGames/config.yml

/* END OF REQUIRED INFORMATION */

$survivalgames_stats_title='SurvivalGames Stats'; // The SurvivalGames Stats title in the top-right corner of the page

// NAVBAR
$links='
<li><a href="/">Home</a></li>
';
/*  Example:
    <li><a href="/">Home</a></li>
    it goes: <li><a href="   LINK GOES HERE  ">   LINK TITLE GOES HERE  </a></li>
*/

// FOOTER
$footer='
Modify this in the settings.php!

'; // Put your footer here!

// BUTTONS
$leaderboard_button_name='Leader Board'; // The name for the leader board tab
$search_button_name='Search Players'; // The name for the search tab
$search_again_button_name='Search Again'; // The name for the "Search Again" button on the player view page
$previous_page_button_name='Previous'; // The previous button name for going through pages of player data
$next_page_button_name='Next'; // The next button name for going through pages of player data


// SEARCH CUSTOMIZATION
$search_player_box_placeholder='Search for a player by their username'; // The placeholder for the form box on the search page









/* DO NOT TOUCH ANYTHING BELOW THIS LINE OR YOU COULD SCREW UP THE PANEL! */

$con = mysql_connect($dbhost,$dbuser,$dbpass);

mysql_select_db($dbname);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }



?>