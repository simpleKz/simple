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
                    <h2 class="h4 card-header-title">Пользователи</h2>
                    <a href="{{route('user.edit')}}" class="btn btn-outline-primary mt-3">
                        Добавить <i class="ti ti-plus"></i>
                    </a>
                </header>
                <div class="card-body pt-0">
                    @if($users->items())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                <th>Телефон</th>
{{--                                <th>Действия</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->phone}}</td>
{{--                                    <td class="d-inline-block">--}}
{{--                                        <a href="{{route('author.edit', ['user_id' => $user->id])}}" class="btn btn-outline-primary btn-sm">--}}
{{--                                            <i class="ti ti-pencil"></i>--}}
{{--                                        </a>--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$users->links()}}
                    @else <h6>У вас пока нет пользователей!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
