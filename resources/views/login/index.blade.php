@extends('login.layouts.main')

@section('content')
<div class="main">
    @if($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <input type="checkbox" id="chk" aria-hidden="true">

    <div class="signup">
        <form method="POST" action="{{ route('login.submit') }}" enctype="multipart/form-data">
            @csrf
            <label for="chk" aria-hidden="true">Login</label>
            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <button type="submit">Login</button>
        </form>
    </div>
</div>
@endsection