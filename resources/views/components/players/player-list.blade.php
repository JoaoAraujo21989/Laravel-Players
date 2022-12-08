
<h1> Players List </h1>
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="container" style="
       text-align: center;">
<table
    class="table" border=2px


    <thead class="thead">
    <tr>
        <th scope="col">#</th>
        <th scope="col">IMAGE</th>
        <th scope="col">NAME</th>
        <th scope="col">ADDRESS</th>
        <th scope="col">COUNTRY</th>
        <th scope="col">RETIRED</th>
        <th scope="col">ACTIONS</th>
    </tr>
    </thead>
    <tbody>

    @foreach($players as $player)
        <tr>
            <th scope="row">{{$player->id}}</th>
            <td>
                @if ($player->image)
                    <img class="w-100 img-responsive" src="{{ asset('storage/'.$player->image) }}" alt="" title=""></a>
                @else
                    <p>
                        No Image
                    </p>
                @endif
            </td>
            <td>{{$player->name}}</td>
            <td>{{$player->address}}</td>
            <td>{{$player->country->name}}</td>
            <td>
                @if ($player->retired > 0)
                    <div class="text-primary" >  <i class="bi bi-emoji-laughing-fill"></i></div>
                @else
                    <div class="text-danger"> <i class="bi bi-emoji-frown-fill"></i></div>
                @endif
            </td>
            <td>
                <a href="{{url('players/' . $player->id)}}" type="button" class="btn btn-success">SHOW</a>

                @if(Auth::user() && Auth::user()->is_admin == 1)
                <a href="{{url('players/' . $player->id . '/edit')}}" type="button" class="btn btn-primary">EDIT</a>
                <form action="{{url('players/' . $player->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $players->links() }}
</div>
@auth
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import and Export Excel data
        </div>
        <div class="card-body">
            <form action="{{ route('import-players') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                <input type="file" name="file"
                       class="form-control">
                <br>
                <button class="btn btn-success">
                    Import User Data
                </button>
                <a class="btn btn-warning"
                   href="{{ route('export-players') }}">
                    Export User Data
                </a>
            </form>
        </div>
    </div>
</div>
@endauth
