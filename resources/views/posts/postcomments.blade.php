
@foreach($postcomments as $post_comment)

    @if($post_comment->post_id == $post->id)

    <article class="media ml-6">
        <div id="collapsible-media-content-accordion-1" class="mesdia-content is-collapsible" data-parent="accordion_first">
            <div class="content">         
                <p id='content-{{ $post_comment->id }}' style='white-space: pre-line;'>
                    <strong>{{ $post_comment->user->first_name }}</strong> commented <small>{{ $post_comment->created_at->diffForHumans() }}</small>
                    {{ $post_comment->body }}
                </p>
            </div>
        </div>
    </article>

    @endif

@endforeach
