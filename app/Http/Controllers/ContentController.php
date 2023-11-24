<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
                public function updatec(Request $request)
            {
                // Validate the incoming request data
                $validatedData = $request->validate([
                    'greetings' => 'nullable',
                    'intro' => 'nullable',
                    'pro_image' => 'nullable',
                    'about_image' => 'nullable',
                    'about_intro' => 'nullable',
                ]);

                $content = Content::first();

                // Update the profile fields only if they have changed
                // $profile->name = $validatedData['name'];
                if (isset($validatedData['greetings'])) {
                    $content->greetings = $validatedData['greetings'];
                }
                if (isset($validatedData['intro'])) {
                    $content->intro = $validatedData['intro'];
                }

                if ($request->hasFile('pro_image')) {
                    $image = $request->file('pro_image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads'), $imageName); // Store the image in the 'uploads' directory
                    // You can also save the image details to a database if needed
                    // return 'Image uploaded successfully';
                    $content->pro_image = $imageName;
                }
                if ($request->hasFile('about_image')) {
                    $image = $request->file('about_image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads'), $imageName); // Store the image in the 'uploads' directory
                    // You can also save the image details to a database if needed
                    // return 'Image uploaded successfully';
                    $content->about_image = $imageName;
                }
                if (isset($validatedData['about_intro'])) {
                    $content->about_intro = $validatedData['about_intro'];
                }

                $content->save();

                // Redirect back to the profile edit page with a success message
                return redirect()->route('manage.content')->with('success', 'Content updated successfully.');
            }
}
