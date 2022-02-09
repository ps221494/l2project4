@extends('layouts.master')
@section('pagetitle','Login')
@section('content')
<div class="flex container w-full sm:-mx-6 mb-20 mt-4">
    <div class="w-full text-center">
        <h3>Bedankt dat u bij ons heeft besteled, hier onder kunt u de detail van u bestelling zien</h3>
        <p>de voortgang van de bereiding van de pizza kan zijn:</p>
        <h4>Ontvangen, Voorbereiden, In de oven, Bezorger onderweg</h4>
    </div>

</div>

@if ($message = Session::get('error'))
<div class="p-4 mb-3 bg-yellow-400 container text-center w-full rounded">
    <p class="text-green-800">{{ $message }}</p>
</div>
@endif

<div class="flex flex-col container">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
            <h4 class="py-4">Bestelling detail</h4>
            <div class="overflow-hidden shadow-md sm:rounded-lg">
                <table class="min-w-full">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Quantity
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Size
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Status
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                price
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        @foreach ($order->orderdetial as $detail)
                        <tr class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$detail->pizza->pname}}
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                {{$detail->quantity}}
                            </td>

                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                {{$detail->size}}
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                {{$detail->status}}
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                {{$detail->pizza->amount}}
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                <form method="POST" action="{{route('bestelling.destroy',$detail->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="px-3 py-2 bg-yellow-300 text-white text-xs font-bold uppercase rounded" value="Delete" />
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container mt-20">
    <div class="bg-gray-200 h-16 flex items-center rounded-lg">
        <h4 class="px-2">Customer Details</h4>
    </div>
    <div class="shadow border-b p-2 rounded-lg">
        <p>Name: {{$customer->first_name}} {{$customer->last_name}} </p>
        <p>Adress: {{$customer->address}}</p>
        <p>postcode: {{$customer->zipcode}}</p>
        <p>city: {{$customer->city}}</p>
        <p>phone: {{$customer->phone}} </p>
    </div>
</div>

@endsection