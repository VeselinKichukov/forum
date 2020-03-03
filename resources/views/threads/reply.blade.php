<div class="card">
    <div class="card-header">
        <div class="level">
            <h6 class="flex">
                <a href="#" >
                    {{$reply->owner->name}}
                </a>
                said {{$reply->created_at->diffForHumans()}} ...
            </h6>

            <div>
                <form method="POST" action="/replies/{{ $reply->id }}/favourites">
                    @csrf
                    <button type="submit" class="btn btn-outline-success" {{ $reply->isFavourited() ? 'disabled' : '' }}>
                        {{ $reply->favourites_count}} {{ Str::plural('Favourite', $reply->favourites_count) }}
                    </button>
                </form>
            </div>

        </div>
    </div>

    <div class="card-body">
        <div class="body">
            {{$reply->body}}
        </div>
    </div>
</div>
<br>
