<?php
require_once 'nzpLoader.php';
nzpLoader::initDB(array("database"=>"lolitems"));
$db =& nzpLoader::getDB();
echo "<pre>";var_dump($db);echo "</pre>";