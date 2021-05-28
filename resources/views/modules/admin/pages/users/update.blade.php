@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Пользователи</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Пользователи</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <a href="{{route('user.index')}}" class="btn btn-outline-primary mt-1 mb-4">
                        <i class="ti ti-arrow-left"></i> Назад
                    </a>
                </header>
{{--                @if($user)--}}
{{--                    <div class="card-header  border-dark">--}}
{{--                        <img src="{{asset($user->image_path)}}" style="max-height: 500px; max-width: 500px"--}}
{{--                             alt="user image" onerror="this.src='{{asset('images/notfound.png')}}'">--}}
{{--                    </div>--}}

{{--                @endif--}}
                <div class="card-body pt-0">
                    <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                        <x-admin.input-form-group-list
                            :errors="$errors"
                            :elements="$user_web_form"/>
                        <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')

    <script>

        // $(function () {
        //
        //     $("#phone").mask("+7(999) 999-99-99");
        //     // $("#phone").pattern("^(\\([0-9]{3}\\)|[0-9]{3}-)[0-9]{3}-[0-9]{4}$\n");
        // });

        // $(document).ready(function($){
        //
        //     $("#phone").mask("+7(999) 999-99-99");
        // });

        // var phoneMask = IMask(
        //     document.getElementById('phone'), {
        //         mask: '+{7}(000)000-00-00'
        //     });


    </script>
@endsection
