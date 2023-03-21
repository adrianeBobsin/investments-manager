<?php
 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        return User::create([
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'password' => Hash::make($request->input('password'))
        ]);
    }

    public function login(Request $request)
    {
      if (! Auth::attempt($request->only('email', 'password'), true)) {
        return response()->json(
            ['message' => __('auth.failed')],
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
      }

      $user = User::where('email', $request->get('email'))->firstOrFail();

      $token = $user->createToken('auth_token')->plainTextToken;

      return [
          'token_type'   => 'Bearer',
          'access_token' => $token,
      ];
    }
}