<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create project administartor`s account';

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
        $this->info("\nMaking an account of administrator");

        $login = $this->ask('Specify login');
        $password = $this->secret('Specify password');

        if(DB::table('users')->get()->where('name', $login)->count()) {
            $this->error('User ' . $login . ' already exists');
        } else {
            DB::table('users')->insert([
                'name' => $login,
                'password' => Hash::make($password)
            ]);

            $this->info('User ' . $login . ' successfully added');
        }

    }
}
