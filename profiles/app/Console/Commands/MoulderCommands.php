<?php

namespace App\Console\Commands;


use App\Post;

use Exception;
use Illuminate\Console\Command;

class MoulderCommands extends Command
{
    // console command name
    protected $signature = 'mould:item';

    // command description
    protected $description = 'Creates an item';

    // type of class generated
    protected $type = 'controller';

    // name of class generated
    private $controllerClass;

    // function to fire
    public function fire()
    {
        $this->setControllerClass();

        $path = $this->getPath($this->controllerClass);

        if ($this->alreadyExists($this->getNameInput())) {
            $this->error($this->type.' already exists!');

            return false;
        }

        $this->makeDirectory($path);

        $this->files->put($path, $this->buildClass($this->controllerClass));

        $this->info($this->type.' created successfully.');

        $this->line("<info>Created Controller :</info> $this->controllerClass");


    }

    // set controller class name
    private function setControllerClass()
    {
        $name = ucwords(strtolower($this->argument('name')));

        $modelClass = $this->parseName($name);

        $this->repositoryClass = $modelClass . 'Controller';

        return $this;
    }

    // constructor
    public function __construct()
    {

    }

    // execute the command
    public function handle()
    {

    }
}
