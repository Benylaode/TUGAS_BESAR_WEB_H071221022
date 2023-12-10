<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\User;
use App\Models\Applicant;
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
        $jobs = Jobs::all();
        return view('home', compact('jobs'));
    }
    public function user()
    {
        $users = User::all();
        return view('users', compact('users'));
    }
    public function profile(){
        return view('profile');
    }
    public function myjob()
    {    
        $userId = auth()->user()->id;
        $pelamar = Applicant::where('applicant_id', $userId)->get();
        $myjob = Jobs::where('provider_id', $userId)->get();
        return view('myjob', compact('pelamar', 'myjob'));
    }
    public function pembaruan(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi data yang dikirim dari form update
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'address' =>['required', 'string', 'max:255'],
            'contact_info' => ['required', 'numeric'],
        ]);
        

        $user->update($validatedData);

        return redirect()->route('profile', ['id' => $id])->with('success', 'Job updated successfully!');
    }
}
