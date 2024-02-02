<?php
// ******************************************************************
// Uloeno v ANSI kódování
// ******************************************************************
// HCM pro zobrazení Online statusu hry Ultima Online
// Vytvoøeno pro sphereserver
// Nutno vytvoøit tabulku v DB sn_online_status
/** CREATE TABLE IF NOT EXISTS `sn_online_status` (
 * `id` int(11) NOT NULL AUTO_INCREMENT,
 * `servname` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
 * `version` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
 * `servip` varchar(50) NOT NULL,
 * `servport` int(4) NOT NULL,
 * `adminemail` varchar(50) NOT NULL,
 * `age` int(7) NOT NULL,
 * `accounts` int(7) NOT NULL,
 * `chars` int(7) NOT NULL,
 * `guilds` int(7) NOT NULL,
 * `items` int(10) NOT NULL,
 * `clients` int(5) NOT NULL,
 * PRIMARY KEY (`id`)
 * ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
*/
// Created by Golfin eranova.cz
// ******************************************************************
// Poslední aktualizace souboru: 17.9.2021

use Sunlight\Database\Database as DB;

return function ($uid = null) {
    $result = "";
    $uid = (int) $uid;
    $query = DB::query("SELECT * FROM sn_online_status");
    while ($item = DB::row($query)) {

        $result .= "<table>\n";
		$result .= "<tr><td>Serv name</td><td>" . $item["servname"] . "</td></tr>\n";
		$result .= "<tr><td>version</td><td>" . $item["version"] . "</td></tr>\n";
		$result .= "<tr><td>ServIP</td><td>" . $item["servip"] . "</td></tr>\n";
		$result .= "<tr><td>ServPort</td><td>" . $item["servport"] . "</td></tr>\n";
		$result .= "<tr><td>AdminEmail</td><td>" . $item["adminemail"] . "</td></tr>\n";
		$result .= "<tr><td>age</td><td>" . $item["age"] . "</td></tr>\n";
		$result .= "<tr><td>accounts</td><td>" . $item["accounts"] . "</td></tr>\n";
		$result .= "<tr><td>chars</td><td>" . $item["chars"] . "</td></tr>\n";
		$result .= "<tr><td>guilds</td><td>" . $item["guilds"] . "</td></tr>\n";
		$result .= "<tr><td>items</td><td>" . $item["items"] . "</td></tr>\n";
		$result .= "<tr><td>clients</td><td>" . $item["clients"] . "</td></tr>\n";
        $result .= "</table>\n";
    }

    return $result;
};