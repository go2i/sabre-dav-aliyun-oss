<?php

use Sabre\DAV;

// The autoloader
require '../vendor/autoload.php';

Go2i\Sabre\AliyunOSS\OssClient::init(new Go2i\Sabre\AliyunOSS\OssClientConfig('', ''));

$rootDirectory = new Go2i\Sabre\AliyunOSS\OssDirectory();
$server = new DAV\Server($rootDirectory);

$lockBackend = new DAV\Locks\Backend\File('../data/locks');
$lockPlugin = new DAV\Locks\Plugin($lockBackend);
$server->addPlugin($lockPlugin);

$server->addPlugin(new DAV\Browser\Plugin());

$server->debugExceptions = true;

$server->exec();

