@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <h2>{{ $user->name }}
                    @if($user->is_banned)
                        <span class="badge badge-danger">Banned</span></h2>
                    @endif
                <h3>{{ $user->email }}</h3>
            </div>
        </div>
        @auth()
            @if(auth()->user()->isAdmin())
                <form action="{{ route('admin.user.toggleBan', $user->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <input class="btn btn-default" type="submit" value="{{ $user->is_admin ? 'Unban' : 'Ban' }}" />
                </form>
            @endif
        @endauth
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('components.messages')
            </div>
        </div>
    </div>
@endsection
