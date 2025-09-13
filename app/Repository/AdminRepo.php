<?php

namespace App\Repository;

use App\DTO\AdminDTO;
use App\Exceptions\InvalidCredential;
use App\Exceptions\UserNotFound;
use App\Models\admins;
use Illuminate\Support\Facades\Hash;

class AdminRepo
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(AdminDTO $data)
    {
        $admin = admins::create(
            [
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password,
                'role' => $data->role
            ]
        );
        return AdminDTO::fromModel($admin);
    }

    public function update(AdminDTO $data,int $id)
    {
        $admin = admins::find($id);
        if(!$admin)
        {
            throw new UserNotFound();
        }
        $admin->update(
            [
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password,
                'role' => $data->role
            ]
        );
        return AdminDTO::fromModel($admin);
    }

    public function findByEmail(string $email)
    {
        $admin = Admins::where('email',$email)->first();
        if(!$admin)
        {
            throw new UserNotFound();
        }
        else
        {
            return AdminDTO::fromModel($admin);
        }
    }

    public function delete(string $email)
    {
        $admin = Admins::where('email',$email)->first();
        if(!$admin)
        {
            throw new UserNotFound();
        }
        return $admin->delete();
    }

    public function login(string $email,string $password)
    {
        $admin = admins::where('email',$email)->first();
        if($admin)
        {
            $stored_pass = $admin->password;
            if($stored_pass == Hash::make($password))
            {
                return AdminDTO::fromModel($admin);
            }
            else{
                throw new InvalidCredential();
            }
        }
        else{
            throw new UserNotFound();
        }
    }
}
