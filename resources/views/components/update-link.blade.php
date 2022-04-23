
    <form method="POST" action="{{ route('links.update', $link) }}">
        @method('put')
        @csrf
        <div class="row">
            <div class="col-6">
                <input type="text" name="url" class="form-control" value="{{ $link->destination_url ?? '' }}"
                    placeholder="URL" required>
                @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input type="text" name="ttl" class="form-control"
                    value="{{ \Carbon\Carbon::parse($link->deactivated_at)->diffInMinutes($link->activated_at) ?? '' }}"
                    placeholder="TTL (Minutes)" required>
                @error('ttl')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Update Short Link</button>
            </div>
        </div>

    </form>

    
