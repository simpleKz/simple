<!doctype html>
<html lang="en">
<head>
    @include('modules.front.parts.head')
    @include('modules.front.parts.styles')
    <title>Simple</title>
    @yield('styles')
</head>
<body>


<x-front.front-header/>


<div class="content">
    @yield('content')
</div>
<x-front.front-footer/>
@include('modules.front.parts.scripts')
@yield('scripts')
</body>
</html>
