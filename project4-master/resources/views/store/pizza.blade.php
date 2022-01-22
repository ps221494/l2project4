@extends('layouts.master')
@section('pagetitle','Login')
@section('content')

@if ($message = Session::get('success'))
<div class="p-4 mb-3 bg-green-400 rounded">
    <p class="text-green-800">{{ $message }}</p>
</div>
@endif

@foreach ($order as $item)

{{$item->user->name}}

@endforeach

<div class="mt-5">
    <form action="{{route('cart.status')}}" method="post">
        @csrf
        <input type="submit" class="px-6 py-2 text-white bg-green-300" value="Bestelling plaatsen" />
    </form>
</div>
@endsection