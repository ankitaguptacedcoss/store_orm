<?php
require_once '../libraries/php-activerecord/ActiveRecord.php';
 ActiveRecord\Config::initialize(function($cfg)
 {
     $cfg->set_model_directory('../Model');
     $cfg->set_connections(array(
        'development' => 'mysql://root:secret@mysql-server/store'));
 });
