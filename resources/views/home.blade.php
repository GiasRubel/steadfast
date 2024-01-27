@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>{{ __('Dashboard') }}</span>
                            <a href="{{ route('url.create') }}" class="btn btn-primary">Add URL</a>
                            <a href="{{ route('home') }}" class="btn btn-secondary">Refresh to see Count</a>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Long URL</th>
                                    <th>Short URL</th>
                                    <th>Click Count</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($urls as $url)
                                    <tr>
                                        <td>{{ $url->long_url }}</td>
                                        <td><a target="_blank" href="{{ $url->short_url }}">{{ $url->short_url }}</a></td>
                                        <td>{{ $url->click_count }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
