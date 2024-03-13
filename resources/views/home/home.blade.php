@extends('layouts.layouts')
@section('content')
    <div class="flex bg-gradient-to-br from-red-900 to-amber-600">
        <div class="w-1/4 h-screen flex flex-col items-center gap-y-3">
            <h1 class="text-white">Add Product</h1>
            <form class="flex flex-col px-3 gap-y-5 mt-4  w-100" action="{{ route('home.store') }}" method="post">
                @csrf
                <input class="py-1 px-2 rounded-xl text-center" type="text" name="name" placeholder="name">
                <input class="py-1 px-2 rounded-xl text-center" type="number" name="price" placeholder="price">
                <input class="py-1 px-2 rounded-xl text-center" type="number" name="stock" placeholder="stock">
                <div class="flex items-center  justify-around">
                    <label for=""> male</label>
                    <input type="radio" value="male" name="type">
                    <label for=""> female</label>
                    <input type="radio" value="female" name="type">
                </div>
                <button class="px-3 py-2 bg-white rounded-full text-black"> Insert</button>
            </form>
        </div>

        <table class="table bg-transparent">
            <thead>
                <tr class="py-2">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Type</th>
                    <th scope="col">Stock</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Buy</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->type }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @include('home.component.edit')
                        </td>
                        <td>
                            <form action="{{ route("home.destroy",$product) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="bg-red-600 px-3 py-2 rounded-full">Delete</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('home.buy',$product) }}">Buy</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
