@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(session('token'))
                        <div class="alert alert-success" role="alert">
                            {{ session('token') }}
                        </div>
                    @endif

                    <form action="{{ route('user.get_token') }}" method="POST">
                        @csrf
                        @method('POST')
                        <button class="btn btn-outline-success" type="submit">
                            Get Token
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
