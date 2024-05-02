<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
use App\Mail\DailyEmployeeReportMail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DailyEmployeeReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $totalEmployees = Employee::whereDate('created_at', Carbon::today())->count();

        $adminRole = Role::where('name', 'admin')->first();
        $adminUsers = $adminRole->users;

        foreach ($adminUsers as $user) {
            Mail::to($user->email)->send(new DailyEmployeeReportMail($totalEmployees));
        }
    }
}
