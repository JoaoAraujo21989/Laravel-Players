<div class="container" style="margin: auto;
  width: 30%;
  padding: 30px;
  margin-top: 100px;">
    <form method="POST" action="{{ url('players/' . $player->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ $player -> name}}"
                autocomplete="name"
                placeholder="Type your name"
                class="form-control

        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input
                type="text"
                id="address"
                name="address"
                value="{{ $player -> address}}"
                autocomplete="address"
                placeholder="Type your address"
                class="form-control
        </div>

         <div class="form-group">
            <label for="country">Country</label>
            <select
                id="country_id"
                name="country_id"
                class="form-control
                mb-1">

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
                placeholder="Type your description"> {{ $player -> description}} </textarea>
        </div>

        <div class="form-group">
            <label>Retired</label>
            <BR>

            <input type="radio" value="1" id="YES" name="retired" {{($player -> retired =="1")? "checked":""}}>
            <label for="yes">Yes</label>

            <input type="radio" value="0" id="NO" name="retired" {{($player -> retired =="0")? "checked":""}}>
            <label for="yes">No</label>

        </div>


        <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
    </form>
</div>
