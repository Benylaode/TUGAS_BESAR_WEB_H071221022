@extends('layouts.app')  {{-- Sesuaikan dengan layout yang Anda gunakan --}}

@section('content')
    <div class="container">
        <h1>Daftar Pengguna</h1>
        <table class="table table-secondary">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td> {{-- Gantilah dengan nama kolom yang sesuai --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
