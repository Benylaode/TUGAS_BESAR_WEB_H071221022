@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Job History') }}</div>

                    <div class="card-body">
                        @if(count($jobHistory) > 0)
                            @foreach($jobHistory as $job)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title"><strong>ID YANG DI LAMAR </strong>{{ $job->job_id }}</h5>
                                        <a href="{{ route('showjob', $job->job_id) }}" class="btn btn-primary mr-2">Detail</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <p>No job history available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

