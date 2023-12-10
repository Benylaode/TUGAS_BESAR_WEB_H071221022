@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Job Listings</h2>
    
    <!-- Kategori Pekerjaan -->
    <div class="btn-group mb-4">
      <button type="button" class="btn btn-secondary">Design</button>
      <button type="button" class="btn btn-secondary">Digital Marketing</button>
      <button type="button" class="btn btn-secondary">Otomotif</button>
      <button type="button" class="btn btn-secondary">Ekonomi</button>
      <!-- Tambahkan kategori lain di sini -->
    </div>
    
    <div class="row">
        @foreach ($jobs as $job)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $job->job_title }}</h5>
                        <p class="card-text">{{ $job->description }}</p>
                        <a href="{{ route('showjob', $job->id) }}" class="btn btn-secondary mr-2">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    

    
    <!-- Pagination -->
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center">
          <li class="page-item disabled">
              <a class="page-link text-secondary" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item active" aria-current="page">
              <a class="page-link bg-secondary border-secondary" href="#">1 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link text-secondary" href="#">2</a></li>
          <li class="page-item"><a class="page-link text-secondary" href="#">3</a></li>
          <li class="page-item">
              <a class="page-link text-secondary" href="#">Next</a>
          </li>
      </ul>
  </nav>
  
    
  </div>
@endsection
