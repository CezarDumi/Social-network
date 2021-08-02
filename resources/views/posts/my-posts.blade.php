
@foreach($posts as $post)
<article class="media">
    <div class="media-content">

        <div class="content">
            <p id='content-{{ $post->id }}' style='white-space: pre-line;'>
                <strong>{{ $post->user->first_name }}</strong> <small>{{ $post->created_at->diffForHumans() }}</small>
                {{ $post->body }}
            </p>
            
            <form id='form-{{ $post->id }}' class='form is-hidden' action="{{ route('posts.update', $post->id) }}" method="post">

                @csrf
                @method('put')

                <br>

                <div class="field">
                    <div class="control">
                        <textarea class="textarea has-fixed-size" name="body"
                            placeholder="Write something.">{{ $post->body }}</textarea>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-link">Edit Post</button>
                    </div>
                </div>

            </form>
        </div>

        @include('posts.reactions')
        
        <nav class="level is-mobile">
            <div class="level-left">
                <a class="level-item">This post has {{ $post->postCommentCount() }} comments</a>
                @if(Auth::user() == $post->user)
                    <a class="level-item edit-current-post" id='edit-button-{{ $post->id }}'>Edit</a>
                @endif
            </div>
        </nav>
        @include('posts.postcomments')
        
    </div>

    @if(Auth::user() == $post->user)
        <div class="media-right">
            <form action="{{ url("posts/" . $post->id) }}" method="post">
                @csrf
                @method('delete')
                <button class="delete"></button>
            </form>
        </div>
    @endif

</article>
@endforeach

<script>
    $(".edit-current-post").click(function() {
        var postId = this.id.split('-')[2];
        $('#form-' + postId).removeClass('is-hidden');
        $('#content-' + postId).addClass('is-hidden');
    });
</script>
