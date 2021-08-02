<form action="{{ route('signin') }}" method="post">

    <input type="hidden" name="_token" value="{{ Session::token() }}">

    <h1 class='is-size-1'>Sign In</h1>

    <hr>

    <div class="field">
        <label class="label">Your e-mail</label>
        <div class="control">
            <input class="input" type="text" name="email"
            placeholder="Your email" value="{{ Request::old('email') }}">
        </div>
    </div>

    <div class="field">
        <label class="label">Password</label>
        <div class="control">
            <input class="input" type="password" name="password"
            placeholder="Enter a kewl and correct password" value="{{ Request::old('password') }}">
        </div>
    </div>

    <button type="submit" class="button is-success">Sign In</button>

</form>