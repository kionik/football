<?php
require 'classes/autoload.php';
Application::getInstance()->set('data', require_once 'data.php');

function match($c1, $c2) {
    $data = Application::getInstance()->get('data');
    $command1 = new CommandStatistics($data[$c1]);
    $command2 = new CommandStatistics($data[$c2]);
    $match = new Match($command1, $command2);
    return $match->getResult();
}



