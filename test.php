<?php

require "./vendor/autoload.php";

$urls = [
    'http://www.baidu.com/',
    'http://www.jaylee.cc/',
    'http://www.jaylee.cc/a.html',
    'http://www.jaylee.cc/b.html',
];

$scanner = new Jaylee\Test\Scanner($urls);

print_r($scanner->getInvalidUrls());



