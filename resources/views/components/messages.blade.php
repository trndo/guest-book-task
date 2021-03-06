@forelse($messages as $message)
    <div class="card mt-5">
        <h5 class="card-header">
            <a href="{{ route('user.show', $message->user->id) }}">{{ $message->user->name }}</a>
        </h5>
        <div class="card-body">
            <h5 class="card-title">{{ $message->body }}</h5>
            <p class="card-text">{{ $message->created_at }}</p>
        </div>
        @auth()
            @if(auth()->user()->isAdmin())
                <form action="{{ route('admin.message.destroy', $message->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-default" type="submit" value="Delete" />
                </form>
            @endif
        @endauth
    </div>
@empty
    <div class="card mt-5">
        <h5 class="card-header">No messages</h5>
    </div>
@endforelse
<br>
{{ $messages->links() }}

