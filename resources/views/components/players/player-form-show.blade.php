<div class="container" style="margin: auto;
  width: 30%;
  padding: 30px;
  margin-top: 100px;">
    <form method="GET" action="{{ url('players') }}">
        @csrf


        <div class="form-group">
            <label for="image">Image</label>
            <input
                type="file"
                id="image"
                name="image"
                value="{{$player->image}}"
                autocomplete="image"
                class="form-control>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{$player->name}}"
                class="form-control"
                disabled>
            <small id="nameHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input
                type="text"
                id="address"
                name="address"
                class="form-control"
                value="{{ $player -> address}}"
            disabled>
        </div>

        <div class="form-group">
            <select id="country" name="country" class="form-control mb-1" disabled>
            @foreach($countries as $country)
                <option value="{{$country->id}}" @if($player->country_id == $country->id) selected  @endif>
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
                placeholder="{{$player -> description}}" disabled></textarea>
        </div>

        <div class="form-group">
            <label>Retired</label>
            <BR>
            <input type="radio" value="1" id="{{$player -> retired}}" name="retired" {{($player -> retired =="1")? "checked":""}} disabled>
            <label for="yes">Yes</label>
            <input type="radio" value="0" id="{{$player -> retired}}" name="retired" {{($player -> retired =="0")? "checked":""}} disabled>
            <label for="yes">No</label>
        </div>
        <button type="Back" class="btn btn-danger">BACK</button>
    </form>
</div>
