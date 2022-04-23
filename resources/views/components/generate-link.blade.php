<form method="POST" action="{{ route('links.store') }}">
    @csrf
    <div class="row">
        <div class="col-6">
            <input type="text" name="url" class="form-control" placeholder="URL" required>
            @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col">
            <input type="number" min="6" name="ttl" class="form-control" placeholder="TTL (Minutes)"
                required>
            @error('ttl')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">Generate Short Link</button>
        </div>
    </div>

</form>