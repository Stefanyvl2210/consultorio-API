<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class SendSurveyEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:surveys';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Survey emails 3 days after the appointment has happened';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /*DB::table('survey')->insert([
            'results' => null,
            'need_checkup' => false,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);*/
        $surveys = DB::table('survey')->whereDate('created_at', Carbon::now()->subDays(3))->get();
        if(count($surveys) > 0){
            echo "Aqui va la logica de Cristian";
        }
    }
}
