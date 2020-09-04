@extends('layouts.app')

@section('content')

<div class="container">
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