
<nav class="level is-mobile">
    <div class="level-left">

            @foreach ($reactions as $reaction)

                <form action="{{ route('postReactions.store') }}" method="post">

                    @csrf
                    
                    <input type="hidden" name="reaction_id" value="{{ $reaction->id }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    
                    <div class="field has-addons">
                        <p class="control mr-1">
                            <button type="submit" class="button is-small {{ $post->hasCurrentUserReacted($reaction->id) ? 'is-success' : '' }}" {{ Auth::user() == $post->user ? 'disabled' : '' }} 
                                style="{{ (Auth::user() == $post->user && $post->postReactionCount($reaction->id) == 0) ? 'display: none' : '' }}">
                            <span class="mr-1 icon is-small">                                
                                <i class="ml-1 {{ $reaction->reaction_type }}"></i>
                              </span>
                              {{ $post->postReactionCount($reaction->id) }}
                          </button>
                          
                        </p>
                      </div>

                </form>

            @endforeach

    </div>
</nav>
