<?php
session_start();
require_once 'functions.php';
// require_once '../../\.env';

echo "<pre>";
print_r(scoreGen());
echo "</pre>";
?>