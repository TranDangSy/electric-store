@include('widget.header')
@include('widget.dropdown')

<section id="form">
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="signup-form">
                <h2>Đăng kí tài khoản</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Tên" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
    
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
    
                    <input id="password-confirm" type="password" class="form-control" 
                    name="password_confirmation" required autocomplete="new-password" placeholder=" Nhập lại mật khẩu">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Đăng kí') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@include('widget.endoffile')
@include('widget.footer')
