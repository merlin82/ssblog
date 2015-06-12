<?php
require 'flight/Flight.php';

Flight::set('base_url', 'http://localhost/myblog/');
Flight::set('mongo.blogsdb.host', 'mongodb://localhost:27017');
Flight::set('mongo.usersdb.host', 'mongodb://localhost:27017');

Flight::set('mongo.blogsdb.name', 'blogsdb');
Flight::set('mongo.usersdb.name', 'usersdb');
