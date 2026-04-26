<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class TestJob implements ShouldQueue
{
    use Queueable;

    protected User $user;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(2);
        //Log::info('Job completed for User ID: ' . $this->user->id);

        // demostrating failed jobs in horizon
        //throw new \Exception('Test exception: there was an error');
    }

    public function tags(): array
    {
        return ['TestJob', 'User:' . $this->user->id];
    }
}
