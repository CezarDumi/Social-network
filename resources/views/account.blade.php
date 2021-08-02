@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
  
  <h1 class='is-size-3'>Your account</h1>

  <hr>

  <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">

  @csrf

    <div class="form-group">
      <div class="form-group">
        <label class="label py-3">Your name</label>
        <input class="input" name="first_name" type="text" name="email" value="{{ $user->first_name }}" id="first_name">
      </div>

      <label class="label py-3">Your picture</label>
    <div class="file has-name is-fullwidth">
      <label class="file-label">
        <input class="file-input" type="file" name="image" id="image">
        <span class="file-cta">
          <span class="file-icon">
            <i class="fas fa-upload"></i>
          </span>
          <span class="file-label">
            Choose a file…
          </span>
        </span>
        <span class="file-name">
          {{ $user->avatar() }}
        </span>
      </label>
    </div>

    <input class="button" type="submit" value="Update account">

    </form>
  </div>
  @if (Storage::disk('avatars')->has($user->first_name . '-' . $user->id . '.jpg'))
    <section class="row new-post">
      <div class="col-md-6 col-md-offset-3">
        <img src="{{ $user->avatar() }}" alt="" class="img-responsive" class="center">
          </div>
    </section>
  @endif
@endsection
