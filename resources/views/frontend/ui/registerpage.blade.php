@extends('frontend.layout')
@section('content')

<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg p-4 p-md-5 rounded-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold" style="font-family: 'PT Serif', serif;">Create Account</h2>
                    <hr class="divided mx-auto">
                    <p class="text-muted small">Join our community of handicraft lovers</p>
                </div>

                <form action="{{ route('register.post') }}" method="POST">
                    @csrf <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control border-0 bg-light @error('name') is-invalid @enderror" 
                               id="regName" placeholder="Full Name" value="{{ old('name') }}" required>
                        <label for="regName"><i class="fa-solid fa-user me-2"></i>Full Name</label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control border-0 bg-light @error('email') is-invalid @enderror" 
                               id="regEmail" placeholder="name@example.com" value="{{ old('email') }}" required>
                        <label for="regEmail"><i class="fa-solid fa-envelope me-2"></i>Email Address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control border-0 bg-light @error('password') is-invalid @enderror" 
                               id="regPassword" placeholder="Password" required>
                        <label for="regPassword"><i class="fa-solid fa-lock me-2"></i>Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" name="password_confirmation" class="form-control border-0 bg-light" 
                               id="confirmPassword" placeholder="Confirm Password" required>
                        <label for="confirmPassword"><i class="fa-solid fa-shield-halved me-2"></i>Confirm Password</label>
                    </div>

                    <div class="form-check mb-4 small">
                        <input class="form-check-input" type="checkbox" value="" id="termsCheck" required>
                        <label class="form-check-label text-muted" for="termsCheck">
                            I agree to the <a href="#" class="text-danger text-decoration-none">Terms & Conditions</a>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-danger w-100 py-3 fw-bold rounded-pill shadow-sm mb-3">
                        Register Now
                    </button>

                    <div class="text-center">
                        <p class="small mb-0">Already have an account? 
                            <a href="{{ route('login') }}" class="text-danger fw-bold text-decoration-none">Login Here</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection