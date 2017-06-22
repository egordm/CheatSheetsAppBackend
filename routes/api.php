<?php

$app->get('/', 'MainController@index');
$app->get('/cheatsheet/{id}', 'MainController@cheatsheet');