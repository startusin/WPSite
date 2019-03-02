<?php
$memcache_obj = new Memcache;
$memcache_obj->connect('127.0.0.1', 11211);
if ($memcache_obj->flush()) echo 'flushed';
