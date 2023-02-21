<?php
Config::set('site', 'mycms.mn');

// Өгөгдлийн сангийн тохиргоо
Config::set('db.database', 'puma');
Config::set('db.user', 'root');
Config::set('db.password', '');
Config::set('db.host', 'localhost');

// Системийн default утгуудыг бэлтгэх
Config::set('routes', array(
    'default' => '',
    'admin' => 'admin_',
));

Config::set('languages', array('mn', 'en', 'jp'));

Config::set('default_route', 'default');
Config::set('default_language', 'mn');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');

// Нууц үгд зориулсан давсыг бэлтгэх
Config::set('salt', 'lk34n0435xcv5?@#$#d');