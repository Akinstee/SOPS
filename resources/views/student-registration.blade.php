@extends('layouts.app')

@section('content')
<div class="container">
    <h1><b>SOPS</b> Student Registration Form</h1>
    
    <form action="{{ route('student.register') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name">
        </div>

        <div class="mb-3">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name">
        </div>

        <div class="mb-3">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">
        </div>

        <div class="mb-3">
            <label for="phone_number">Phone Number</label>
            <input type="tel" class="form-control" name="phone_number" id="phone_number">
        </div>

        <div class="mb-3">
            <label for="available_on_whatsapp">Available on WhatsApp?</label>
            <select name="available_on_whatsapp" id="available_on_whatsapp" class="form-control">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="city_from">Which city are you from?</label>
            <input type="text" class="form-control" name="city_from" id="city_from">
        </div>

        <div class="mb-3">
            <label for="city_currently_living_in">Which city do you currently live in?</label>
            <input type="text" class="form-control" name="city_currently_living_in" id="city_currently_living_in">
        </div>

        <div class="mb-3">
            <label for="employed">Are you currently employed?</label>
            <select name="employed" id="employed" class="form-control">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="employment_type">Employment Type</label>
            <select name="employment_type" id="employment_type" class="form-control">
                <option value="full_time">Full Time</option>
                <option value="part_time">Part Time</option>
                <option value="self_employed">Self Employed</option>
                <option value="unemployed">Unemployed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </
