<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = '/home';
    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|min:2|max:35',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    protected function create(array $data)
    {
           $user = new User;
           $user->name = $data['name'];
           $user->surname = $data['surname'];
           $user->email = $data['email'];
           $user->password = Hash::make($data['password']);
           $user->save();
          $role = Role::where('name', 'User')->first();
          $user->assignRole($role);
          return $user;
    }
}
