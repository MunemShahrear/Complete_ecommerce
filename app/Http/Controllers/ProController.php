<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProController extends Controller
{
    public function store(Request $request)
    {
        // Create a new Profile instance
        $profile = new Profile();
    
        // Assign values from the request to the profile attributes
        $profile->name = $request->input('name');
        $profile->lastname = $request->input('lastname');
        $profile->designation = $request->input('designation');
        $profile->birthday = $request->input('birthday');
        $profile->residence = $request->input('residence');
        $profile->address = $request->input('address');
        $profile->email = $request->input('email');
        $profile->office_email = $request->input('office_email');
        $profile->phone = $request->input('phone');
        $profile->office_phone = $request->input('office_phone');
        $profile->skype = $request->input('skype');
    
        // Check if the freelance_status checkbox is checked
        $profile->freelance_status = $request->has('freelance_status');
    
        // Save the profile to the database
        $profile->save();
    
        // Redirect to the create profile page or any other page as needed
        return redirect()->route('edit.profile');
    }
            public function updatep(Request $request)
        {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'nullable',
                'lastname' => 'nullable',
                'designation' => 'nullable',
                'birthday' => 'nullable',
                'residence' => 'nullable',
                'address' => 'nullable',
                'email' => 'nullable|email',
                'office_email' => 'nullable|email',
                'phone' => 'nullable',
                'office_phone' => 'nullable',
                'skype' => 'nullable',
                'freelance_status' => 'nullable',
            ]);

            // Retrieve the existing profile
            $profile = Profile::first();
           

            // Update the profile fields only if they have changed
           // $profile->name = $validatedData['name'];
            if (isset($validatedData['name'])) {
                $profile->name = $validatedData['name'];
            }
            if (isset($validatedData['lastname'])) {
                $profile->lastname = $validatedData['lastname'];
            }
            if (isset($validatedData['designation'])) {
                $profile->designation = $validatedData['designation'];
            }
            if (isset($validatedData['birthday'])) {
                $profile->birthday = $validatedData['birthday'];
            }
            if (isset($validatedData['residence'])) {
                $profile->residence = $validatedData['residence'];
            }
            if (isset($validatedData['address'])) {
                $profile->address = $validatedData['address'];
            }
            if (isset($validatedData['email'])) {
                $profile->email = $validatedData['email'];
            }
            if (isset($validatedData['office_email'])) {
                $profile->office_email = $validatedData['office_email'];
            }
            if (isset($validatedData['phone'])) {
                $profile->phone = $validatedData['phone'];
            }
            if (isset($validatedData['office_phone'])) {
                $profile->office_phone = $validatedData['office_phone'];
            }
            if (isset($validatedData['skype'])) {
                $profile->skype = $validatedData['skype'];
            }
            if (isset($validatedData['freelance_status'])) {
                $profile->freelance_status = $validatedData['freelance_status'];
            }

            else {
                $profile->freelance_status = 0;
            }
          
            //dd($profile);
            // Save the updated profile
            $profile->save();

            // Redirect back to the profile edit page with a success message
           return redirect()->route('dashboard')->with('success', 'Profile updated successfully.');
        }

}
