
@if(count($errors) > 0)
    <div class="row">
        <div class="col-md-4 col-md-offset-4 error">
            <ul>
                @foreach($errors->all() as $error)
                    <article class="message is-danger">
                        <div class="message-header">
                          <p>Oops!</p>
                          <button class="delete" aria-label="delete"></button>
                        </div>
                        <div class="message-body">
                            {{ $error }}
                        </div>
                      </article>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@if(Session::has('message'))
    <div class="row">
        <div class="col-md-4 col-md-offset-4 succes">  
            <article class="message is-success">
                <div class="message-header">
                  <p>Nice!</p>
                  <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                    {{ Session::get('message') }}
                </div>
              </article>
        </div>
    </div>
@endif
