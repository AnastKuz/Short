@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Make your link shorter</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Type your link here:</h5>
                    <form action="{{route('shorten')}}" method="POST">
                        @csrf
                        <input type="url" name="original_link"><br>
                        <input type="submit" value="Shorten" class="btn btn-primary mt-3">
                    </form>
                    {{--<h4 class="mt-3">Your new link:</h4>
                    <p>{{$link->short_link}}</p>--}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
