<?php

namespace App\Console\Commands\User;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Role;

class ChangeRoleUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change:role {email} {roles*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change user role';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();
        $arr = [];
        $roles = Role::all();
        foreach($roles as $role){
            if(in_array($role->title, $this->argument('roles'))){
                array_push($arr, $role->id);
            }
        }
        $user->saveRoles($arr);
        $this->info('Role of '.$user->email.' was change successfully!');
        
    }
}
