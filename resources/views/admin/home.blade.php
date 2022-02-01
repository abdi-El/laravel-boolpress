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
                    {{-- questi prendono i dati dell'utente loggato --}}
                    <h5>L'utente {{Auth::user()->name}} può eseguire azione sui seguenti dati:</h5> 
                    <a href="{{route('admin.posts.index')}}" class="btn btn-primary"> Fammi vedere</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
