<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'address' => $request->user()->address, // Load the user's address
        ]);
    }

    /**
     * Update the user's profile information and password if provided.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Validate incoming data, including passwords if they exist
        $validatedData = $request->validated();
        
        // Update profile information
        $user = $request->user();
        $user->fill($validatedData);

        // If email is changed, mark email as unverified
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Check if password fields are present, validate and update password
        if ($request->filled('old_password') && $request->filled('password')) {
            // Verify the old password
            if (!Hash::check($request->input('old_password'), $user->password)) {
                return Redirect::route('profile.edit')->withErrors([
                    'old_password' => 'The current password is incorrect.',
                ]);
            }

            // Update with the new password
            $user->password = Hash::make($request->input('password'));
        }

        // Save user profile changes
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

     /**
     * Update the user's address.
     */
    public function updateAddress(Request $request)
    {
        $request->validate([
            'address_number' => 'required|string|max:255',
            'street' => 'nullable|string|max:255', // Make street optional
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);
    
        // Retrieve the user's current address or create a new one
        $user = Auth::user();
    
        // Combine the address parts
        $address = $request->address_number;
        if ($request->filled('street')) {
            $address .= ', ' . $request->street;
        }
        $address .= ', ' . $request->city . ', ' . $request->province . ' ' . $request->postal_code;
    
        // Update the user's address
        $user->address = $address;
        $user->save();
    
        return redirect()->route('profile.edit')->with('success', 'Address updated successfully.');
    }
    
    

}
