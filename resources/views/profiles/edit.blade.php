@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center">
                        {{ $userProfile->user->name }}'s Profile <br>
                        Update your Information.
                    </h3>
                </div>

                <div class="panel-body">

                    @include('partials.updateForm')

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
