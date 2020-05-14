@extends('layouts.app')

@section('content')
    <thread-view :initial-replies-count="{{ $thread->replies_count }}" inline-template>
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        <div class="level">
                            <span class="flex">
                                <a href="{{route('profile', $thread->creator->name)}}">{{$thread->creator->name}}</a>
                        posted :
                        {{$thread->title}}
                            </span>
                            @can('update', $thread)
                                <form method="POST" action="{{ $thread->path() }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="submit">
                                        Delete Thread
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="body">
                            {{$thread->body}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="body">
                            <p> This thread was published {{ $thread->created_at->diffForHumans() }} by
                                <a href="#">{{ $thread->creator->name }}</a>, and currently
                                has <span v-text="repliesCount"></span> {{ Str::plural('comment', $thread->replies_count) }} .
                            </p>

                            <p>
                                <subscribe-button :active="{{ json_encode($thread->isSubscribedTo) }}"></subscribe-button>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <replies  @removed="repliesCount--" @added="repliesCount++"></replies>
        </div>
    </div>
    </thread-view>
@endsection
