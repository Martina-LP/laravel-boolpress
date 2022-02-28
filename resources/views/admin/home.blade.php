@extends('layouts.dashboard')

@section('content')
    <h1 class="text-center">Welcome {{ $user->name }} !</h1>
    @if ($user->userInfo)
        <div>Phone Number: {{ $userInfo->phone }}</div>
        <div>Address: {{ $userInfo->address }}</div>
    @endif
@endsection
