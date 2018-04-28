<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$config = [];
try {
    $config = Yaml::parseFile(__DIR__ . '/app/config/config.yml');
} catch (Symfony\Component\Yaml\Exception\ParseException $e) {
    echo 'Error parse YAML';
    return;
}

$client = new Client([
    'base_uri'  => $config['base_uri'],
    'verify'    => false,
]);

try {
    $link = sprintf('itm/%s', $config['item_list'][0]);
    $response = $client->request('GET', $link)->getBody()->getContents();

    $crawler = new Crawler($response);
    $text = $crawler->filter('body #prcIsum')->attr('content');

    dump($text);
} catch (GuzzleHttp\Exception\GuzzleException $exception) {
    echo 'Error';
}

