<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) : bool {
        
        try {
            $validatedData = $request->validate([
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|max:500',
            ]);

     //dd('Validation passed');
            //dd($request->all());
            $user = new User();
            $user->email = $validatedData['email'];
            $user->password = $validatedData['password'];
            $user->find();

            return redirect('dashboard')->with('status', 'Blog Post Form Data Has Been inserted');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // If validation fails, redirect back with errors
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database errors
            \Log::error('Database error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'A database error occurred. Please try again later.']);
        } catch (\Exception $e) {
            // Handle unexpected errors
            \Log::error('Unexpected error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
        }

    }
}
