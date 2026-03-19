@extends('frontend.layout')
@section('content')

<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card border-0 shadow-lg p-4 p-md-5 rounded-4">
                
                {{-- Success Message Alert (Shows after Logout) --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 rounded-4 mb-4 small shadow-sm" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="text-center mb-4">
                    <h2 class="fw-bold" style="font-family: 'PT Serif', serif;">Welcome Back</h2>
                    <hr class="divided mx-auto">
                    <p class="text-muted small">Log in to your PSM Craft House account</p>
                </div>

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf 

                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control border-0 bg-light @error('email') is-invalid @enderror" 
                               id="loginEmail" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                        <label for="loginEmail"><i class="fa-solid fa-envelope me-2"></i>Email Address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-2">
                        <input type="password" name="password" class="form-control border-0 bg-light" 
                               id="loginPassword" placeholder="Password" required>
                        <label for="loginPassword"><i class="fa-solid fa-lock me-2"></i>Password</label>
                    </div>

                    <div class="text-end mb-4">
                        <a href="#" class="text-danger small text-decoration-none">Forgot Password?</a>
                    </div>

                    <button type="submit" class="btn btn-danger w-100 py-3 fw-bold rounded-pill shadow-sm mb-3">
                        Sign In
                    </button>

                    <div class="text-center">
                        <p class="small mb-0">Don't have an account? 
                            <a href="{{ route('register') }}" class="text-danger fw-bold text-decoration-none">Register Here</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection