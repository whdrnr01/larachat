@extends('layouts.app')

@section('content')
    <div class="flex1 h-full">
    <chat-component :current-user="{{ auth()->id() }}"></chat-component>
    </div>
@endsection
