@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Job History') }}</div>

                    <div class="card-body">
                        @if(count($myjob) > 0)
                            @foreach($myjob as $job)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $job->job_title }}</h5>
                                        <p class="card-text">{{ $job->description }}</p>
                                        <a href="{{ route('showjob', $job->id) }}" class="btn btn-primary mr-2">Detail</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <p>No job available.</p>
                        @endif
                    </div>
                        <div class="container">
                            
                            <div class="row">
                                @foreach ($pelamar as $user)
                                @if($job->id == $user->job_id && count($pelamar) > 0) 
                                    <h1>Daftar Pelamar</h1>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $user->name }}</h5>
                                                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                                                <p class="card-text"><strong>Role:</strong> {{ $user->role }}</p>
                                                <p class="card-text"><strong>ID:</strong> {{ $user->id }}</p>
                                                <p class="card-text"><strong>Address:</strong> {{ $user->address }}</p>
                                                <p class="card-text"><strong>Work Experience:</strong> {{ $user->work_experience }}</p>
                                                <p class="card-text"><strong>Education:</strong> {{ $user->education }}</p>
                                                <p class="card-text"><strong>Other Details:</strong> {{ $user->other_details }}</p>
                                                <p class="card-text"><strong>Portfolio URL:</strong> {{ $user->portfolio_url }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <p>No job available.</p>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

