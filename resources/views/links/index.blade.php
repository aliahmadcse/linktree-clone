@extends('layouts.app')

@section('content')
    <div class="container">
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
    </div>
@endsection
