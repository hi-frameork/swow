--TEST--
swow_misc: trig deprecation and errors in coroutine
--SKIPIF--
<?php
require __DIR__ . '/../include/skipif.php';
skip('no proper deprecation in this version of PHP', PHP_VERSION_ID >= 80200 || PHP_VERSION_ID < 70200);
?>
--INI--
memory_limit=128M
--FILE--
<?php
require __DIR__ . '/../include/bootstrap.php';
use Swow\Coroutine;

Coroutine::run(function () {
    // E_ERROR
    $_ = str_repeat('the quick brown twosee jumps over the lazy black dixyes', 128 * 1048576);
});

echo "Never here\n";
?>
--EXPECTF--
%AFatal error: [Fatal error in R%d] Allowed memory size of %d bytes exhausted (tried to allocate %d bytes)
Stack trace:
#0 %swarning_in_coro_3.php(%d): %s
#1 [internal function]: {closure}()
#2 {main}
  triggered in %swarning_in_coro_3.php on line %d