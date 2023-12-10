@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Profile') }}</div>
                @php
                $job = $job;
                @endphp
                <div class="card-body">
                    <form method="POST" action="{{ route('applay', ['job_id' => $job->id]) }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="work_experience" class="col-md-4 col-form-label text-md-end">{{ __('Work Experience') }}</label>

                            <div class="col-md-6">
                                <textarea id="work_experience" class="form-control @error('work_experience') is-invalid @enderror" name="work_experience" required>{{ old('work_experience') }}</textarea>

                                @error('work_experience')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="education" class="col-md-4 col-form-label text-md-end">{{ __('Education') }}</label>

                            <div class="col-md-6">
                                <textarea id="education" class="form-control @error('education') is-invalid @enderror" name="education" required>{{ old('education') }}</textarea>

                                @error('education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="other_details" class="col-md-4 col-form-label text-md-end">{{ __('Other Details') }}</label>

                            <div class="col-md-6">
                                <textarea id="other_details" class="form-control @error('other_details') is-invalid @enderror" name="other_details" required>{{ old('other_details') }}</textarea>

                                @error('other_details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="portfolio_url" class="col-md-4 col-form-label text-md-end">{{ __('Portfolio URL') }}</label>

                            <div class="col-md-6">
                                <input id="portfolio_url" type="text" class="form-control @error('portfolio_url') is-invalid @enderror" name="portfolio_url" value="{{ old('portfolio_url') }}" required>

                                @error('portfolio_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <input type="hidden" name="applicant_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="job_id" value="{{ $job->id }}">


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Contoh penggunaan job_id di dalam view 'applay' -->
                    <p>Job ID: {{ $job->id }}</p>

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


                                               