<?php

/*
 * This is a command line utility for Serverless-PHP
 */
declare(strict_types=1);
require_once "vendor/autoload.php";

use Symfony\Component\Console\Output\OutputInterface;

$app = new Silly\Application("Helps to create components!", "v0.001-alpha");

$app->command('create [what] [name]', function ($what, $name, OutputInterface $output) {

    $what = strtolower($what);
    if (isset($name)) {
        $dir = __DIR__ . "/src/app/" . dirname($name);
        if (!is_dir($dir))
            mkdir($dir, 0777, true);
        $inf = basename($name);
    } else {
        $output->writeln("<error>Argument Name Missing!</error>");
        exit;
    }

    switch ($what) {
        case "handler":
            $handlerName = str_replace(" ", "", ucwords(strtolower(trim($inf)))) . "Handler";
            $handlerPath = $dir . "/" . $handlerName . ".php";
            if (file_exists($handlerPath)) {
                $output->writeln("<error>Handler " . $handlerPath . " Already Exits!</error>");
            } else {
                $data = file_get_contents(__DIR__ . "/cli/templates/handler.php");
                $file = fopen($handlerPath, 'w');
                fwrite($file, str_replace("HandlerName", $handlerName, $data));
                $output->writeln("<info>" . $handlerName . " Created Successfully At " . $handlerPath . "</info>");
                $output->writeln("<info>Add this handler to ./src/app/routes.php to use it in the app.</info>");
            }
            break;
        case "class":
            $className = str_replace(" ", "", ucwords(strtolower(trim($inf))));
            $classPath = $dir . "/" . $className . ".php";
            if (file_exists($classPath)) {
                $output->writeln("<error>Class " . $classPath . " Already Exits!</error>");
            } else {
                $data = file_get_contents(__DIR__ . "/cli/templates/class.php");
                $file = fopen($classPath, 'w');
                fwrite($file, str_replace("ClassName", $className, $data));
                $output->writeln("<info>Class " . $className . " Created Successfully At " . $classPath . "</info>");

            }
            break;

        default:
            $output->writeln('<error>Invalid Option For Create!</error>');
    }

})->setHelp("1) To create handler -> php sls create handler path/to/handlername 2) To create path -> php sls create class path/to/classname ")->addUsage("To Create New Elements like handlers, classes");

$app->run();