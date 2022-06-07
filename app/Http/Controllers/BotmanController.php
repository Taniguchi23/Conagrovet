<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotmanController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {

            if ($message == 'hola') {
                $this->askName($botman);
            }else{
                $botman->reply("Que te parece si comienzamos por un hola");
            }

        });

        $botman->listen();
    }

    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('¡Hola! ¿Cuál es tu nombres?', function(Answer $answer) {

            $name = $answer->getText();

            $this->say('Mucho gusto en que puedo ayudarte '.$name);
        });
    }
}
