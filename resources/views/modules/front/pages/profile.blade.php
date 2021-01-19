@extends('modules.front.layouts.app-main')
@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <style>

    </style>
@endsection

@section('content')
    <section class="profile pb-5 mb-5">
        <div class="container p-4">
            <div class="profile-header pt-5">
                <p class="pb-5">Главная – Личный кабинет</p>
                <div class="avatar d-flex ">
                    <div class="pr-3">
                        <img
                            src="{{asset('modules/front/assets/img/avatar.png')}}" alt="" >
                    </div>
                    <div class="">
                        <h2>Аскар Кайрат</h2>
                        <p>Пройдено курсов – 0</p>
                    </div>
                </div>
            </div>
            <div class="vue_panel pt-5 d-flex row " id="app">
                <div class="col-md-3">
                    <div class="list-group list-group-flush">
                        <router-link :to="{ name: 'profile' }" class="list-group-item list-group-item-action p-4">
                            Мой профиль
                        </router-link>
                        <router-link :to="{ name: 'courses' }" class="list-group-item list-group-item-action p-4">
                            Мои курсы
                        </router-link>
                        <router-link :to="{ name: 'profit' }" class="list-group-item list-group-item-action p-4">
                            Заработок
                        </router-link>
                        <router-link :to="{ name: 'withdrawal' }" class="list-group-item list-group-item-action p-4">
                            Вывод средств
                        </router-link>
                        <router-link :to="{ name: 'settings' }" class="list-group-item list-group-item-action p-4">
                            Настройки
                        </router-link>
                        <router-link :to="{ name: 'support' }" class="list-group-item list-group-item-action p-4">
                            Помощь
                        </router-link>
                    </div>
                </div>
                <div class="col-md-9">

                        <router-view/>

                </div>


            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>

    <script type="text/javascript">
    </script>
@endsection
