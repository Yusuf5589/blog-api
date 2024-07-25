<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class ScheduleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:schedule-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
            $date = Carbon::now()->toDateString();
            Blog::where('beginning_date',"<=", $date)->update([
                'status' => 1
            ]);
            Blog::where('finish_date',">", $date)->update([
                'status' => 1
            ]);
            Blog::where('finish_date',"<", $date)->update([
                'status' => 0
            ]);
    }
}
