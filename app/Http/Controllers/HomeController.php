<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Mouse;
use App\Models\User;
use App\Rules\CurrentPassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mice = Mouse::all();
        return view('home', ['mice' => $mice]);
    }

    public function detail($id)
    {
        $mice = Mouse::find($id);
        return view('detail', ['mice' => $mice]);
    }

    public function view_profile()
    {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function update_personal_data(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'in:male,female'],
            'profile_picture' => ['file', 'image', 'max:1024'],
        ]);

        $file = $request->file('profile_picture');
        if ($file) {
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->storeAs('public', $filename);
        }

        $user = $request->user();

        $user->update([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'profile_picture' => empty($filename) ? $user->profile_picture : $filename,
        ]);

        $request->session()->flash('message', 'Successfully updated personal data');
        return Redirect::back();
    }

    public function update_contact_data(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'numeric'],
        ]);

        $request->user()->update([
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        $request->session()->flash('message', 'Successfully updated contact data');
        return Redirect::back();
    }

    public function view_address_book()
    {
        $addresses = Auth::user()->addresses;
        return view('address_book', ['addresses' => $addresses]);
    }

    public function create_address()
    {
        return view('add_address_book');
    }

    public function store_address(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'phone_number' => ['required', 'numeric'],
            'address' => ['required'],
        ]);

        $user = Auth::user();

        Address::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'user_id' => $user->id,
        ]);

        $request->session()->flash('message', 'Successfully added address');
        return Redirect::route('view_address_book');
    }

    public function edit_address(Address $address)
    {
        return view('edit_address_book', ['address' => $address]);
    }

    public function update_address(Request $request, Address $address)
    {
        $request->validate([
            'name' => ['required'],
            'phone_number' => ['required', 'numeric'],
            'address' => ['required'],
        ]);

        $address->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        $request->session()->flash('message', 'Successfully updated address');
        return Redirect::route('view_address_book');
    }

    public function delete_address(Address $address)
    {
        Address::destroy($address->id);
        return Redirect::route('view_address_book');
    }

    public function view_settings()
    {
        $user = Auth::user();
        return view('settings', ['user' => $user]);
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new CurrentPassword],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->new_password),
            'password_updated_at' => Carbon::now(),
        ]);

        $request->session()->flash('message', 'Successfully updated password');
        return Redirect::back();
    }

    public function delete_account()
    {
        $user = Auth::user();
        User::destroy($user->id);
        return Redirect::route('login');
    }
}
