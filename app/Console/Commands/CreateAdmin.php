<?php

namespace App\Console\Commands;

use App\Model\Admin;
use App\Model\Role;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:add {username} {password} {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Admin User';

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
        $username = $this->argument('username') ?? 'admin';
        $password = $this->argument('password') ?? '111111';
        $role_id = $this->argument('role') ?? '111';

        $admin = Admin::create([
            'username' => $username,
            'password' => \Hash::make( $password ),
        ]);

        $admin->roles()->attach($role_id);

        $this->info('Admin Create Success id='.$admin->id);
    }
}
