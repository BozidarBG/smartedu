 <?php

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');

$router->post('users', 'UsersController@store');
$router->get('users', 'UsersController@index');
$router->get('users/{id}', 'UsersController@show');
$router->post('users/{id}', 'UsersController@update');
$router->post('delete-users/{id}', 'UsersController@delete');
