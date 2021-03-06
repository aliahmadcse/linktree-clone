@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                <h2 class="card-title text-center">Create a new Link</h2>

                <form action="/dashboard/links/new" method="POST">
                    @csrf
                    <div class="row d-flex justify-content-center align-items-center">

                        {{-- link name --}}
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <label for="name">Link Name</label>
                                <input id="name" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                    type="text" name="name" placeholder="My LinkedIn Profile" value="{{ old('name') }}">

                                @if ($errors->first('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- Link Url --}}
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <label for="link">Link URL</label>
                                <input id="link" class="form-control {{ $errors->first('link') ? 'is-invalid' : '' }}"
                                    type="text" name="link" placeholder="https://www.linkedin.com/in/username/"
                                    value="{{ old('link') }}">

                                @if ($errors->first('link'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('link') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- submit button --}}
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save Link</button>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection