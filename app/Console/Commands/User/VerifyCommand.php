<?php

namespace App\Console\Commands\User;

use Illuminate\Console\Command;
use App\Models\User;

class VerifyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verify:user {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verify created or registrated user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();
        $user->verify();

        $this->info('User '.$user->name.' verified successfully');

    }
}
