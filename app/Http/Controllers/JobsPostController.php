<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobsPostController extends Controller
{
    // ... kode lainnya

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'job_title' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'in:full-time,part-time,remote'],
            'kategori' => ['required', 'string', 'max:255'],
            'contact_info' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'salary' => ['required', 'numeric'],
            'provider_id' => ['required', 'numeric'],
        ]);
    }

    protected function create(array $data)
    {
        return Jobs::create([
            'job_title' => $data['job_title'],
            'address' => $data['address'],
            'job_type' => $data['job_type'],
            'kategori' => $data['kategori'],
            'contact' => $data['contact_info'],
            'description' => $data['description'],
            'salary' => $data['salary'],
            'provider_id' => $data['provider_id']
        ]);
    }
   
    public function handleRequest(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validator($request->all())->validate();

            $this->create($request->all());

            // Logika lain, seperti redirect atau tindakan lain setelah penyimpanan data

            return redirect()->back()->with('success', 'Job posted successfully!');
        } else {
            return view('jobs_post');
        }
    }
    public function show($id)
    {
        $job = Jobs::findOrFail($id);
        return view('showjob', ['job' => $job]);
    }
    public function routePertama($id)
    {
        $job = Jobs::findOrFail($id);
    
        session(['job' => $job]);
    
        return redirect()->route('applay');
    }
    public function update(Request $request, $id)
    {
        $job = Jobs::findOrFail($id);

        // Validasi data yang dikirim dari form update
        $validatedData = $request->validate([
            'job_title' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'in:full-time,part-time,remote'],
            'kategori' => ['required', 'string', 'max:255'],
            'contact_info' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'salary' => ['required', 'numeric'],
        ]);
        

        $job->update($validatedData);

        return redirect()->route('showjob', ['id' => $id])->with('success', 'Job updated successfully!');
    }

    public function destroy($id)
    {
        $job = Jobs::findOrFail($id);
        $job->delete();

        return redirect()->route('home')->with('success', 'Job deleted successfully!');
    }
    public function edit($id)
    {
        $job = Jobs::where('id', $id)->first(); // Ambil data job berdasarkan 'name'

        return view('editjob', compact('job'));
    }
}
