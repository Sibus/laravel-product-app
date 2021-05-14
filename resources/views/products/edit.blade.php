@php
    /** @var \App\Models\Product $product */
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') . '#' . $product->id }}
        </h2>
    </x-slot>

    <div class="container py-12">
        <div class="row justify-content-center">
            <div class="col-md-11">
                @include('includes.alert')
            </div>
        </div>

        <form method="POST" action="{{ route('products.update', $product) }}">
            @method('PATCH')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header flex justify-between items-center">
                            Update Product #{{ $product->id }}
                            <a href="{{ route('products.index') }}" class="btn btn-primary">Observe products</a>
                        </div>
                        <div class="card-body">
                            @include('products.includes.form', $product)
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-block btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
