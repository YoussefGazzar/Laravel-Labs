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

                    {{ __('You are logged in!') }}

                    @can("ismanager")
                        <div>
                            <a class="btn btn-danger">I'm the manager</a>    
                        </diV>
                    @elsecan("isadmin")
                        <div>
                            <a class="btn btn-info">I'm the admin</a>    
                        </diV>
                    @else
                        <div>
                            <a class="btn btn-success">I'm the user</a>    
                        </diV>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
