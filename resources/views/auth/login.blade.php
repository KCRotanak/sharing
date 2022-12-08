@extends('frontend.layouts.app')

@section('content')
    <div class="login-form py-4" style="margin-top: 150px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <span class="shape"></span>
                        <div class="card-header text-center bg-transparent">
                            <i class="fas fa-user-circle"></i>
                            <h2>Admin Login</h2>
                        </div>
                        <div class="card-body py-4">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger" role="alert">

                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" name="email"
                                        type="email" placeholder="Email Address" required autocomplete="email" autofocus>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                                        placeholder="Password" name="password" required autocomplete="current-password"
                                        id="id_password">
                                    <span class="input-icon2"><i class="far fa-eye" id="togglePassword"></i></span>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <a href=""> Forget Password</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn">Log In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
