<?php

declare(strict_types=1);

if (isset($_GET['url']) === false) {
	echo json_encode([
		'url' => null,
	]);
	die;
}

$link = $_GET['url'];
$file = basename($link, '.svg');

$im = new Imagick();
$im->readImageBlob(file_get_contents($link));
$im->setImageFormat('png24');
$im->writeImage('files/' . $file . '.png');
$im->clear();
$im->destroy();

echo json_encode([
	'url' => 'http://example.com/files/' . $file . '.png',
]);
