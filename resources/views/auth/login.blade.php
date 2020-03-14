@include('widget.header')
@include('widget.dropdown')

<section id="form">
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="login-form">
                <h2>Đăng nhập tài khoản</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                    name="password" required autocomplete="current-password" placeholder="Mật khẩu" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span>
                        <input class="form-check-input" type="checkbox" 
                        name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Ghi nhớ') }}
                        </label>
                    </span>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Đăng nhập') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Quên mật khẩu?') }}
                        </a>
                    @endif
                    <a class="btn btn-link" href="{{ route('register') }}">
                        {{ __('Tạo tài khoản mới?') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@include('widget.endoffile')
@include('widget.footer')
