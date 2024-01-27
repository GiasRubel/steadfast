@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>{{ __('Create Url') }}</span>
                            <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('url.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="long_url" class="col-md-4 col-form-label text-md-end">{{ __('Long Url') }}</label>

                                <div class="col-md-6">
                                    <input id="long_url" name="long_url" type="text" class="form-control @error('long_url') is-invalid @enderror" />

                                    @error('long_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

