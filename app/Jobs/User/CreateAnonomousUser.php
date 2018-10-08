<?php

namespace App\Jobs\User;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Repos\User\UserRepo;
use App\Models\User;

class CreateAnonomousUser
{
    use Dispatchable, Queueable;

    protected $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email) 
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserRepo $userRepo)
    {       
        $userModel = new User([
            'email' => $this->email
        ]);

        return $userRepo->store($userModel);
    }
}
