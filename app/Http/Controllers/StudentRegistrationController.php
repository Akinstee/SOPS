<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('student-registration');
    }

    public function processRegistration(Request $request)
    {
        // Validate the form data (customize based on your requirements)
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            // Add other validation rules for your fields
        ]);

        // Hash the password before storing it in the database
        $validatedData['password'] = Hash::make($request->password);

        // Save the user to the database
        User::create($validatedData);

        // Redirect to the login page with a success message
        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect('/dashboard'); // Redirect to the appropriate page
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

}