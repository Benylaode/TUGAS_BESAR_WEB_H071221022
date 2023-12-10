@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Job Details</div>

                    <div class="card-body">
                        <h2 class="card-title">{{ $job->job_title }}</h2>
                        <p class="card-text"><strong>Job Type:</strong> {{ $job->job_type }}</p>
                        <p class="card-text"><strong>Address:</strong> {{ $job->address }}</p>
                        <p class="card-text"><strong>Category:</strong> {{ $job->kategori }}</p>
                        <p class="card-text"><strong>Contact Info:</strong> {{ $job->contact }}</p>
                        <p class="card-text"><strong>Description:</strong> {{ $job->description }}</p>
                        <p class="card-text"><strong>Salary:</strong> {{ $job->salary }}</p>
                        @if((auth()->check() && auth()->user()->id == $job->provider_id && auth()->user()->role !=='applicant') || auth()->user()->role =='admin')
                        <a href="{{ route('editjob', $job->id) }}" class="btn btn-warning mr-2">Edit</a>
                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endif
                        @if(auth()->check() && auth()->user()->role =='applicant')
                        <a href="{{ route('applay', ['job_id' => $job->id]) }}" class="btn btn-secondary mr-2">Apply</a>
                        @endif
                        <a href="{{ url('/home') }}" class="btn btn-secondary">Back</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
