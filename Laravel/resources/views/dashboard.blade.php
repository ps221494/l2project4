@extends('layouts.main')
@section('title')
{{ __('Dashboard') }}
@endsection

@section('content')

@if(Auth::check() && !Auth::user()->hasRole("klant"))
<p>je bent ingeloged</p>
@else
<a href="{{ route('bestelling.index')}}" class="p-2 h-10 text-lg text-gray-700 dark:text-gray-500 ">Mijn Bestelling</a>
@endif

@endsection