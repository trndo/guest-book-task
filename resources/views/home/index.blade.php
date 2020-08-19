@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @auth()
                @if(Auth::user()->is_banned)
                    You are banned!
                @endif
            @endauth
            <form action="{{ route('message.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="body">Leave your comment</label>
                    <textarea name="body" class="form-control" id="body" rows="3"></textarea>
                </div>
                @guest()
                    <div class="alert alert-info" role="alert">
                        Please, log in to leave a comment! <a href="{{ route('login') }}">Login</a>
                    </div>
                @endguest
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('components.messages')
        </div>
    </div>
</div>
</div>
@endsection
