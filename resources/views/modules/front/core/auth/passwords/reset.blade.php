{{--@extends('modules.admin.layouts.app-auth')--}}
@extends('modules.front.layouts.app-main')
@section('styles')
    <style>

        .card {
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 10px;
        }

        .card-header {
            background-color: #00656D;
            border-radius: 10px 10px 0px 0px !important;
            border: 2px solid rgba(0, 0, 0, .125);
            color: white;
            padding: 20px 0;
        }

        .enter-btn {
            color: #050606;
            border-color: #F8A555;
            background: #F8A555;
            border-radius: 5px;
            color: #FFFFFF;
        }

        .enter-btn:hover {
            color: #FFFFFF;
        }

        .info__card {
            margin: 0 auto;
        }

        .form span {
            color: red;
        }
    </style>
@endsection
@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Авторизация</h1>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5 mb-5">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

{{--                            <div class="form-group row">--}}
{{--                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                    @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                    @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form mb-3">
                                <label for="email">Email <span>*</span></label>
                                <input type="text" class="form-control {{ isset($errors) && $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder=""
                                       name="email" required value="{{old('email')}}">
                                @if(isset($errors) && $errors->has('email'))
                                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                                @endif
                            </div>
                            <div class="form mb-3">
                                <label for="password">Құпия сөз <span>*</span></label>
                                <input type="password" class="form-control {{ isset($errors) && $errors->has('password') ? ' is-invalid' : '' }}" id="password"
                                       placeholder=""
                                       name="password" required>
                                @if(isset($errors) && $errors->has('password'))
                                    <div class="invalid-feedback">{{$errors->first('password')}}</div>
                                @endif
                            </div>
                            <div class="form mb-3">
                                <label for="password_confirmation">Құпия сөзді қайталау <span>*</span></label>
                                <input type="password" class="form-control {{ isset($errors) && $errors->has('password') ? ' is-invalid' : '' }}" id="password_confirmation"
                                       placeholder=""
                                       name="password_confirmation" required>
                                @if(isset($errors) && $errors->has('password'))
                                    <div class="invalid-feedback">{{$errors->first('password')}}</div>
                                @endif
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="enter-btn btn pr-5 pl-5">Жіберу</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
