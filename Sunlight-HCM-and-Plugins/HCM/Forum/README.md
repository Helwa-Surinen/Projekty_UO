# Sunlight HCM and Plugins
<strong>Vícevrstvé Fórum pro Sunlight CMS v. 8</strong>
<hr>

Především děkuji autorovi SunLight CMS. Tyto HCM moduly jsou vlastně předělaný HCM recentpos a Levelcontent, za což patří díky Pavlovi Batečkovi (ShiraNai7 - http://sunlight.shira.cz/ ) a Jirkovi Daňkovi ( https://jdanek.eu/ ).

Vícevrstvé fórum je vlastně klasické fórum, kdy si vytvoříte více zanoření. Mohla by k tomu posloužit skupina a také to s ní funguje. Ale pro skupinu je jiné stylování css. Tak jsem to pojmul následovně. Vytvoříme první stránku fóra jako sekci. Pod ní vytvoříme jednotlivá vlákna jako forum. Pokud chceme, abychom měli třetí vrstvu fóra, k těmto jednotlivým vláknům vytvoříme opět stránku jako sekci. A pod ní vytvoříme další fóra. Takto by to mohlo jít dál do hloubky. Je na vás, jak to pojmete. Libovolně kombunujte.

K tomuto účelu jsem vytvořil konkrétní HCM moduly, které umožní vidět pár prvků, které se mohou hodit.
<ul>
   <li>g_forumlist.php<br><em>g_forumlist vypíše poslední příspěvky v počtu, který zadáte. Hodí se umístit na stránky - sekce. Je možné zadat parametry podobně jako v recentpos.</em></li>
   <li>g_last.php<br><em>g_last vypíše poslední nejnovější příspěvek. Umístění v tabulce fóra na stránkách - sekce. Opět lze zadat parametry podobně, jako v recentpos, určit ze kterých fór má hledat údaje.</em></li>
   <li>g_forum_by_level.php<br><em>g_forum_by_level vypíše tabulku fóra, kterou máte ošetřenou level přístupem.</em></li>
   <li>g_last_level.php<br><em>g_last_level je vlastně HCM g_last s tím, že má přesně určeno, které ID stránek má vypsat ze skrytého Fóra s přístupem podle levelu. Pokud jich je více, bude potřeba zkopírovat HCM a pojmenovat podle danného fora. Zatím je to nejjednodušší řešení.</em></li>
</ul>

Pro lepší pochopení uvádím obrázky a example kod pro obsah stránek - sekce.

<strong>Admin část</strong><br>
<img src='https://raw.githubusercontent.com/golfincz/Sunlight-HCM-and-Plugins/HCM/HCM/Forum/forum_admin.png' alt='Admin část' /><br>
<strong>Veřejná část</strong><br>
<img src='https://raw.githubusercontent.com/golfincz/Sunlight-HCM-and-Plugins/HCM/HCM/Forum/forum_public.png' alt='Veřejná část' /><br>
<strong>Ukázka kodu vloženého do první stránky Fórum - sekce.</strong><br>
https://github.com/golfincz/Sunlight-HCM-and-Plugins/blob/HCM/HCM/Forum/example_sekce_forum_kod.html
