@extends('dashboard.main')
@section('content')
    <div class="container mt-3">
        <p>
            Selamat datang di STMIK Bandung Boilerplate <b>{{ session('user_email') }}</b>.
        </p>
    </div>
@endsection