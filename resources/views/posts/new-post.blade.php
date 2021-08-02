
<form class='form' action="{{ route('posts.store') }}" method="post">

    @csrf

    <br>

    <div class="field">
        <div class="control">
            <textarea class="textarea has-fixed-size" name="body" placeholder="Write something."></textarea>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button class="button is-link">Create Post</button>
        </div>
    </div>

</form>

