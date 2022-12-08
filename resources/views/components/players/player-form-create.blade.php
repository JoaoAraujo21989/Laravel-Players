<div class="container" style="margin: auto;
  width: 30%;
  padding: 30px;
  margin-top: 100px;">
<form method="POST" action="{{ url('players') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="image">Image</label>
        <input
            type="file"
            id="image"
            name="image"
            autocomplete="image"
            class="form-control
@error('image') is-invalid @enderror"
            value="{{ old('image') }}"
            required>
        @error('image')
        <span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="name">Name</label>
        <input
            type="text"
            id="name"
            name="name"
            autocomplete="name"
            placeholder="Type your name"
            class="form-control
            @error('name') is-invalid @enderror"
            value="{{ old('name') }}"
            required
            aria-describedby="nameHelp">

        <small id="nameHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input
            type="text"
            id="address"
            name="address"
            autocomplete="address"
            placeholder="Type your address"
            class="form-control
            @error('address') is-invalid @enderror"
            value="{{ old('address') }}"
            required

        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

        <div class="form-group">
    <select id="country" name="country_id" class="form-control mb-1>
       @foreach($countries as $country)
                <option value="{{$country->id}}" >
            {{$country->code}} - {{$country->name}}
            </option>
            @endforeach
    </select>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea
            name="description"
            class="form-control"
            placeholder="Type your description"
            required=""></textarea>
    </div>

    <div class="form-group">
    <label>Retired</label>
        <BR>

    <input type="radio" value="1" id="YES" name="retired">
    <label for="yes">Yes</label>

        <input type="radio" value="0" id="NO" name="retired">
        <label for="yes">No</label>

    </div>


    <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
</form>
</div>
