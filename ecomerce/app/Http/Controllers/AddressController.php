<?php
namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'country' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $address = $user->address ?? new Address();

        $address->fill($request->all());
        $address->user_id = $user->id;
        $address->save();

        return redirect()->route('profile.edit')->with('success', 'Address updated successfully');
    }
}
