--TEST--
Test normal operation of password_needs_rehash() with argon2
--SKIPIF--
<?php
if (!defined('PASSWORD_ARGON2I')) die('Skipped: password_needs_rehash not built with Argon2');
?>
--FILE--
<?php

$hash = '$argon2i$v=19$m=65536,t=3,p=1$YkprUktYN0lHQTd2bWRFeA$79aA+6IvgclpDAJVoezProlqzIPy7do/P0sBDXS9Nn0';
var_dump(password_needs_rehash($hash, PASSWORD_ARGON2I));
var_dump(password_needs_rehash($hash, PASSWORD_ARGON2I, ['memory_cost' => 1<<17]));
var_dump(password_needs_rehash($hash, PASSWORD_ARGON2I, ['time_cost' => 2]));
var_dump(password_needs_rehash($hash, PASSWORD_ARGON2I, ['threads' => 2]));
echo "OK!";
?>
--EXPECT--
bool(false)
bool(true)
bool(true)
bool(true)
OK!