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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Сілтеме тастауға құпия сөз жіберілді!') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                --}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form mb-3">
                            <label for="email">Электронды пошта <span>*</span></label>
                            <input type="text" class="form-control {{ isset($errors) && $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                                   placeholder="Электронды пошта жазу:" name="email" required>
                            @if(isset($errors) && $errors->has('email'))
                                <div class="invalid-feedback">{{$errors->first('email')}}</div>
{{--                                @error('email')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
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
