<?php
    

    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Applicant;
    use App\Models\Jobs;
    
    class ApplayController extends Controller
    {
        public function handleRequest(Request $request, $job_id)
        {
            if ($request->isMethod('post')) {
                $validatedData = $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'address' => ['required', 'string', 'max:255'],
                    'work_experience' => ['required', 'string'],
                    'education' => ['required', 'string'],
                    'other_details' => ['required', 'string'],
                    'portfolio_url' => ['required', 'url'],
                    'applicant_id' => ['required', 'numeric'],
                    'job_id' => ['required', 'numeric'],
                ]);
    
                // Simpan data ke dalam model Applicant
                $applicant = Applicant::create($validatedData);
    
                if ($applicant) {
                    return redirect()->route('home')->with('success', 'Job application submitted successfully!');
                } else {
                    return redirect()->route('home')->with('error', 'Failed to submit job application.');
                }
            } else {
                $job = Jobs::find($job_id);
                return view('applay', ['job' => $job]);

            };
            
        }
        protected function create(array $data)
            {
                    return Jobs::create([
                    'name' => $data['name'],
                    'address' => $data['address'],
                    'work_experience' => $data['work_experience'],
                    'education' => $data['education'],
                    'other_details' => $data['other_details'],
                    'portfolio_url' => $data['portofolio_url'],
                    'applicant_id' => $data['applicant_id'],
                    'job_id' => $data['job_id'],
            ]);
            }
            public function routeKedua()
            {
                $job = session('job');
            
                return view('applay', compact('job'));
            }
           
            public function jobhistori()
            {
                $userId = auth()->user()->id;
            
                // Mengambil data Applicant berdasarkan ID pengguna
                $jobHistory = Applicant::where('applicant_id', $userId)->get();
            
                // Pastikan relasi many-to-many antara Applicant dan Jobs sudah didefinisikan dalam model Applicant
            
                return view('jobhistory', ['jobHistory' => $jobHistory]);
            }
            public function applicant()
            {
                $userId = auth()->user()->id;
            
                // Mengambil data Applicant berdasarkan ID pengguna
                $pelamar = Applicant::where('applicant_id', $userId)->get();
            
                // Pastikan relasi many-to-many antara Applicant dan Jobs sudah didefinisikan dalam model Applicant
            
                return view('myjob', compact('pelamar'));
            }
            
}
    
   