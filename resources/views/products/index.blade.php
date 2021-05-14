@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $products */
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('includes.alert')

            <div class="card">
                <div class="card-header flex justify-between items-end">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Create</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        @foreach($products as $product)
                            @php /** @var \App\Models\Product $product */ @endphp
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product) }}">{{ $product->name }}</a>
                                </td>
                                <td>
                                    <div class="flex space-x-2">
                                        <form method="POST" action="{{ route('products.destroy', $product) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

        </div>

        @if($products->hasPages())
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-6">
                <div class="card">
                    <div class="card-body">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>

</x-app-layout>
