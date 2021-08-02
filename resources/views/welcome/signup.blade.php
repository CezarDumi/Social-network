
<form action="/users/create" method="get">

    <input type="hidden" name="_token" value="{{ Session::token() }}">

    <h1 class='is-size-1'>Sign up</h1>

    <hr>

    <div class="field">
        <label class="label">Your e-mail</label>
        <div class="control">
            <input class="input" type="text" name="email"
            placeholder="Your email" value="{{ Request::old('email') }}">
        </div>
    </div>

    <div class="field">
        <label class="label">First Name</label>
        <div class="control">
            <input class="input" type="text" name="first_name"
            placeholder="First Name" value="{{ Request::old('first_name') }}">
        </div>
    </div>

    <div class="field">
        <label class="label">Last Name</label>
        <div class="control">
            <input class="input" type="text" name="last_name"
            placeholder="Last name" value="{{ Request::old('last_name') }}">
        </div>
    </div>

    <div class="field">
        <label class="label">Password</label>
        <div class="control">
            <input class="input" type="password" name="password"
            placeholder="Enter a kewl password" value="{{ Request::old('password') }}">
        </div>
    </div>

    <button type="submit" class="button is-success">Sign up</button>

</form>
