@component('mail::message')
# New product!

{{ $product->name }} was created.

@component('mail::button', ['url' => route('products.edit', $product)])
Inspect
@endcomponent

{{ config('app.name') }}
@endcomponent
