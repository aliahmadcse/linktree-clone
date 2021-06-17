@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-12 card" >
            <div class="card-body">
            <img src="/uploads/avatars/{{ $user->profile_pic }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->username }}'s Profile Picture</h2>
            <form enctype="multipart/form-data" action="/dashboard/profile-pic" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="profile_pic">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                <h2 class="card-title">Your Links</h2>
                <table class="table table-stripped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Url</th>
                        <th>Visits</th>
                        <th>Last Visit</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($links as $link)
                        <tr>
                            <td>{{ $link->name }}</td>
                            <td><a href="{{ $link->link }}">{{ $link->link }}</a></td>
                            <td>{{ $link->visits_count }}</td>
                            <td>{{ $link->latestVisit ? $link->latestVisit->created_at->format('M j Y - H:ia') : 'N/A' }}
                            </td>
                            <td><a href="/dashboard/links/{{ $link->id }}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="/dashboard/links/new" class="btn btn-primary">Add Link</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                <h2 class="card-title text-center">Editing User Settings</h2>

                <form action="/dashboard/settings" method="POST">
                    @csrf
                    <div class="row d-flex justify-content-center align-items-center">

                        {{-- background color --}}
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <label for="background_color">Background Color</label>
                                <input id="background_color"
                                       class="form-control {{ $errors->first('background_color') ? 'is-invalid' : '' }}"
                                       type="text" name="background_color" placeholder="#3f234a"
                                       value="{{ old('background_color') ? old('background_color') : $user->background_color }}">

                                @if ($errors->first('background_color'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('background_color') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- Text color --}}
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <label for="text_color">Text Color</label>
                                <input id="text_color"
                                       class="form-control {{ $errors->first('text_color') ? 'is-invalid' : '' }}"
                                       type="text" name="text_color" placeholder="#ff2345"
                                       value="{{ old('text_color') ? old('text_color') : $user->text_color }}">

                                @if ($errors->first('text_color'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('text_color') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- submit button --}}
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-primary {{ session('success')?'is-valid':'' }}">Save
                                    Settings</button>
                                @if (session('success'))
                                    <div class="valid-feedback">{{ session('success') }}</div>
                                @endif
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
