<?php
// ******************************************************************
// Ulo�eno v ANSI k�dov�n�
// ******************************************************************
// HCM pro zobrazen� 10-ti v�pis� Posledn�ch odpov�d� z F�ra
// Lze nastavit kter� fora maj� b�t vyps�na.
// Je pot�eba si vytvo�it v css t��dy post-answer-list a 
// posts.forum.lastact
// Created by Golfin eranova.cz
// ******************************************************************
// Posledn� aktualizace souboru: 17.9.2021

use Sunlight\Post\PostService;
use Sunlight\Database\Database as DB;
use Sunlight\GenericTemplates;
use Sunlight\Post\Post;
use Sunlight\Router;
use Sunlight\User;
use Sunlight\Util\Arr;
use Sunlight\Util\StringManipulator;

return function ($limit = null, $stranky = "", $typ = null) {
    // priprava
    $result = "<div class='post-answer-list'><h3>" . _lang('posts.forum.lastact') . "</h3></div>";
    if (isset($limit) && (int) $limit >= 1) {
        $limit = abs((int) $limit);
    } else {
        $limit = 10;
    }
    $post_types =  [
        'topic' => Post::FORUM_TOPIC,
    ];

    // nastaveni filtru
    if (!empty($stranky)) {
        $homes = Arr::removeValue(explode('-', $stranky), '');
    } else {
        $homes = [];
    }

    if (!empty($typ)) {
        if (isset($post_types[$typ])) {
            $typ = $post_types[$typ];
        } elseif (!in_array($typ, $post_types)) {
            $typ = Post::SECTION_COMMENT;
        }
        $types = [$typ];
    } else {
        $types = $post_types;
    }

    // dotaz
    [$columns, $joins, $cond] = Post::createFilter('post', $types, $homes);
    $userQuery = User::createQuery('post.author');
    $columns .= ',' . $userQuery['column_list'];
    $joins .= ' ' . $userQuery['joins'];
    $query = DB::query("SELECT " . $columns . " FROM " . DB::table('post') . " post " . $joins . " WHERE " . $cond . " ORDER BY id DESC LIMIT " . $limit);

    while ($item = DB::row($query)) {
        [$homelink, $hometitle] = Router::post($item);

        if ($item['author'] != -1) {
            $authorname = Router::userFromQuery($userQuery, $item);
        } else {
            $authorname = PostService::renderGuestName($item['guest']);
        }


		$result .= "<div class='topic-latest'>\n";
		$result .= "<a href='" . _e($homelink) . "'>" . $hometitle . "</a>\n";
		$result .= "<em>" . _lang('global.postauthor') . ": " .  $authorname . "</em>\n";
		$result .= "<em>" . GenericTemplates::renderTime($item['time'], 'post') . "</em>\n";
        $result .= "</div>\n\n";
    }

    return $result;
};