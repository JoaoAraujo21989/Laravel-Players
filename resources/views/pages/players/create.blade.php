@extends('master.main')

@section('styles')
@stop

@section('scripts')
@stop

@section('content')

    @component('components.players.player-form-create', ['countries' => $countries]))
    @endcomponent

@stop
