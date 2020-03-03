@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="#">{{$thread->creator->name}}</a>
                        posted :
                        {{$thread->title}}
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
                                has {{ $thread->replies_count }} {{ Str::plural('comment', $thread->replies_count) }} .
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                @foreach($replies as $reply)
                    <br>
                    @include('threads.reply')
                @endforeach
                {{ $replies->links() }}
            </div>

            @if(auth()->check())
                <div class="col-md-8">
                    <form method="POST" action="{{ $thread->path() . '/replies'}}">
                        @csrf
                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" placeholder="Have something to say ?"
                                      rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-success">Submit</button>
                    </form>
                </div>
            @else
                <p class="text-center">Please <a href="{{route('login')}}">Sign in</a> to participate in this
                    discussion.</p>
            @endif

        </div>
    </div>
@endsection
