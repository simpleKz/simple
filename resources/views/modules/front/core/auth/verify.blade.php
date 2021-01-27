@extends('modules.front.layouts.app-main')
@section('styles')
    <style>
        .card-header{
            background-color: #00656D;
            color: #FFFFFF;
        }
    </style>
@endsection
@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Поштаны растау</h1>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5 mb-5">
                    <div class="card-header">{{ __('Поштаны растаңыз') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Электрондық пошта мекенжайыңызға растау үшін жаңа сілтеме жіберілді.') }}
                            </div>
                        @endif

                        {{ __('Біз сізге растау туралы хабарлама жібердік. Поштаны тексеріңіз. ') }}
{{--                        {{ __('Не пришло сообщение?') }}--}}
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                    class="btn btn-link p-0 m-0 align-baseline">{{ __('Қайта жіберу') }}</button>
                            .
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
