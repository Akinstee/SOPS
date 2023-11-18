<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'gender', 'date_of_birth',
        'phone_number', 'whatsapp_available', 'city_of_origin', 'current_city',
        'employment_status', 'study_status', 'computer_access', 'skill_experience',
        'how_did_you_hear', 'acknowledgement',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Your additional properties, methods, and relationships go here

    /**
     * Save a new student to the database.
     *
     * @param array $data
     * @return \App\Models\Student
     */
    public static function createStudent(array $data)
    {
        // Hash the password before storing it in the database
        $data['password'] = bcrypt($data['password']);

        // Save the student to the database
        return static::create($data);
    }

    /**
     * Attempt to authenticate a student using the provided email and password.
     *
     * @param array $credentials
     * @return bool
     */
    public static function authenticateStudent(array $credentials)
    {
        return auth()->attempt($credentials);
    }
}
