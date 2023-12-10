@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Job') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updatejob', ['id' => $job->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="job_title" class="col-lg-4 col-form-label text-lg-right">{{ __('Job Title') }}</label>
                            <div class="col-lg-6">
                                <input id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ $job->job_title }}" required autofocus>
                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="job_type" class="col-lg-4 col-form-label text-lg-right">{{ __('Job Type') }}</label>
                            <div class="col-lg-6">
                                <select id="job_type" class="form-control @error('job_type') is-invalid @enderror" name="job_type" required>
                                    <option value="full-time">Full-time</option>
                                    <option value="part-time">Part-time</option>
                                    <option value="remote">Remote</option>
                                </select>
                                @error('job_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-lg-4 col-form-label text-lg-right">{{ __('Address') }}</label>
                            <div class="col-lg-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $job->address }}" required>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-lg-4 col-form-label text-lg-right">{{ __('Description') }}</label>
                            <div class="col-lg-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="3" required>{{ $job->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="salary" class="col-lg-4 col-form-label text-lg-right">{{ __('Salary') }}</label>
                            <div class="col-lg-6">
                                <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ $job->salary }}" required>
                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kategori" class="col-lg-4 col-form-label text-lg-right">{{ __('Kategori') }}</label>
                            <div class="col-lg-6">
                                <input id="kategori" type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ $job->kategori }}" required>
                                @error('kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-lg-6 offset-lg-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
