<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
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

        $email = $this->ask('Specify e-mail');
        if(User::email($email)->count()) {
            $this->error('E-mail ' . $email . ' belongs to another user');

            return;
        }

        $login = $this->ask('Specify login');

        if(User::name($login)->count()) {
            $this->error('User ' . $login . ' already exists');

            return;
        }

        $password = $this->secret('Specify password');

        User::insert([
            'email' => $email,
            'name' => $login,
            'password' => Hash::make($password)
        ]);

        $this->info('User ' . $login . ' successfully added');

    }
}
