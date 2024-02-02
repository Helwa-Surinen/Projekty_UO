<?php
// ******************************************************************
// Uloženo v UTF8 kódování
// ******************************************************************
// HCM pro zobrazení určitého fora podle levelu
// Zároveň přidány poslední odpovědi v jednom výpisu pro tabulku Fora (není hotové)
// Created by Golfin eranova.cz
// ******************************************************************
// Poslední aktualizace souboru: 20.9.2021

use Sunlight\Hcm;
use Sunlight\User;

return function ($min_uroven = 0, $result = "", $nevyhovujici_text = "") {
   $result = "";
   if (User::getLevel() >= (int) $min_uroven) {
         $result .= "<table class='topic-table'>\n";
         $result .= "<tbody>\n";
         $result .= "<tr class='topic-normal'>\n";
         $result .= "<td class='topic-icon-cell'><a href='/sunlight/forum/skryta-sekce/'><img src='/sunlight/plugins/templates/eranova/images/icons/topic-normal.png' alt='Téma bez odpovědí' /></a></td>
				<td class='topic-main-cell'><a href='/sunlight/forum/skryta-sekce/'><strong>Skrytá sekce</strong></a><br /><small>Viditelné pro uživatele s úrovní 5000</small></td>\n";
		 $result .= "<td>\n";
		 $result .= Sunlight\Hcm::run('g_last_level');	// vytvořen extra HCM g_last_level pro toto konkrétní skryté fórum
		 $result .= "</td>\n";
         $result .= "</tr>\n";
         $result .= "</tbody>\n";
         $result .= "</table>\n";
      }

      return $result;
};