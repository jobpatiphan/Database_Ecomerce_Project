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
    public function updateAddress(Request $request): RedirectResponse
    {
        // Validate address input
        $request->validate([
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update or create the address
        $user->address()->updateOrCreate(
            ['user_id' => $user->id], // Ensure the address is linked to the user
            $request->only(['street', 'city', 'state', 'postal_code', 'country'])
        );

        // Redirect back with a success message
        return back()->with('status', 'Address updated successfully!');
    }
}
