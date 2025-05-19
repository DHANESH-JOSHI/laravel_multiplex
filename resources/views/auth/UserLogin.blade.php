@extends('layouts.app')

@section('content')
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #ff5722 50%, #e0e0e0 50%);
            height: 100vh;
            overflow: hidden; /* Stop scrolling */

            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        @media (max-width: 576px) {
            .login-card {
                padding: 1.5rem 1rem;
                border-radius: 8px;
            }

            h2 {
                font-size: 1.5rem;
            }

            .btn {
                font-size: 1rem;
            }
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .login-box {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .form-control {
            height: 45px;
            border-radius: 5px;
        }

        .btn-orange {
            background-color: #ff5722;
            border: none;
        }

        .btn-orange:hover {
            background-color: #e64a19;
        }

        .logo {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #fff;
            letter-spacing: 2px;
        }

        .forgot-link {
            text-align: right;
            display: block;
            margin-top: 10px;
        }
    </style>

    <div class="logo mt-5">MULTIPLEX PLAY</div>

    <div class="login-container">
        <div class="login-box">
            <h2><i class="fas fa-user"></i> WatchNow</h2>
            <form method="POST" action="{{ route('user-send-otp') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autofocus>

                    @error('email')
                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input id="phone" type="text"
                           class="form-control @error('phone') is-invalid @enderror"
                           name="phone" value="{{ old('phone') }}" required>

                    @error('phone')
                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-orange w-100 text-white">
                    Send OTP
                </button>
            </form>
        </div>
    </div>
@endsection
