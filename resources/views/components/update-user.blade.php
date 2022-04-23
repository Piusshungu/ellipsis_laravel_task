<form method="POST" action="{{ route('users.update',$user) }}">
    @csrf
    @method('put')
    <div class="row mb-3">

        <div class="col-md-12">
            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="current-name" value="{{$user->name ?? ''}}">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">

        <div class="col-md-12">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email"  autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
    </div>
</form>