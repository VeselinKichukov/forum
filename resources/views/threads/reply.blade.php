<reply :attributes="{{ $reply }}" inline-template>
    <div id="reply-{{ $reply->id }}" class="card mb-3">
        <div class="card-header">
            <div class="level">
                <h6 class="flex">
                    <a href="{{ route('profile',$reply->owner->name) }}">
                        {{$reply->owner->name}}
                    </a>
                    said {{$reply->created_at->diffForHumans()}} ...
                </h6>
                @if(Auth::check())
                    <div>
                        <favourite :reply="{{ $reply }}"></favourite>
                    </div>
                @endif
            </div>
        </div>

        <div class="card-body">
            <div class="body">
                <div v-if="editing">
                    <div class="form-group">
                        <textarea class="form-control" v-model="body"></textarea>
                    </div>

                    <button class="btn btn-outline-primary btn-sm" @click="update">Update</button>
                    <button class="btn btn-outline-dark btn-sm" @click="editing = false">Cancel</button>

                </div>
                <div v-else v-text="body"></div>

            </div>
        </div>

        @can('update', $reply)
            <div class="card-footer level">

                <button class="btn btn-outline-primary btn-sm mr-1" @click="editing = true">Edit</button>
                <button class="btn btn-outline-danger btn-sm" @click="destroy"> Delete</button>

            </div>
        @endcan
    </div>
</reply>
