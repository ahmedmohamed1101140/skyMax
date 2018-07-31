@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$sec_url[1]}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action="{{url('/test')}}" method="post">
                            @csrf
                            Souq Product URL
                            <input style="width: 100%" type="text" name="url">
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
