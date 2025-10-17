<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Car;

class ListCars extends Command
{
    protected $signature = 'debug:list-cars';
    protected $description = 'List cars and their image values (temporary debug command)';

    public function handle()
    {
        $cars = Car::all();
        foreach ($cars as $c) {
            $this->line("{$c->car_id}|{$c->brand}|{$c->model}|{$c->image}");
        }
        return 0;
    }
}
