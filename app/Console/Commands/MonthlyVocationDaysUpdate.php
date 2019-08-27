<?php

namespace App\Console\Commands;

use App\Mail\VocationDays;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MonthlyVocationDaysUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $Employees = User::all();

        foreach ($Employees as $one) {

            if($one->full_time == 1){
                $one->vocation_days += 2;
            } else {
                $one->vocation_days += 1;
            }
            $one->save();

            $name = $one->name;
            $vocationDaysGot = $one->vocation_days;

            Mail::to($one->email)->queue(
                new VocationDays($vocationDaysGot,$name)
            );


        }

    }
}
