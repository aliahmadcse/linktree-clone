@extends('layouts.links')

@section('content')
<div class="container">
<div class="row">
<img class="d-block text-center mb-4" style="border-radius:50%;margin-left:auto;margin-right:auto; border:2px solid {{ $user->text_color }};color:{{ $user->text_color }}" src="/uploads/avatars/{{$user->profile_pic}}" alt="Avatar">
</div>
    <div class="row">
        <h2 class="col-12 col-md-6 offset-md-3 text-center font-weight-bold">
            {{$user->first_name}} {{$user->last_name}}
        </h2>
    </div>
    <div class="row">
        <h3 class="col-12 col-md-6 offset-md-3 text-center text-black-50">
            {{$user->pronouns}}
        </h3>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            @foreach ($user->links as $link)
            <div class="link">
                <a href="{{ $link->link }}" data-link-id="{{ $link->id }}"
                    class="user-link d-block p-4 mb-4 rounded h3 text-center" target="_blank" rel="nofollow"
                    style="border:2px solid {{ $user->text_color }};color:{{ $user->text_color }}">
                    {{ $link->name }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
