<!DOCTYPE html>
<html lang="en" ng-app="todoApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Todo App') }}</title>

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <style>
        [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
            display: none !important;
        }
    </style>
</head>
<body ng-cloak>

    @include('layouts.partials.navigation')

    <div class="container">
        @yield('content')
    </div>

    {{-- Scripts --}}
    <script src="{{ elixir('js/all.js') }}"></script>
    {{-- CSRF Token --}}
    <script>angular.module("todoApp").constant("CSRF_TOKEN", '{{ csrf_token() }}');</script>
</body>
</html>
