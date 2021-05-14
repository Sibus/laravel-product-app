<div class="form-group">

    <div class="form-group">
        <label for="art">Article</label>
        <input
            id="art"
            class="form-control"
            type="text"
            name="art"
            value="{{ old('art', $product->art ?? null) }}"
        >
    </div>

    <div class="form-group">
        <label for="name">Name</label>
        <input
            id="name"
            class="form-control"
            type="text"
            name="name"
            value="{{ old('name', $product->name ?? null) }}"
        >
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="custom-select">
            @foreach (App\Models\Product::getStatusList() as $value => $label)
                <option
                    value="{{ $value }}"
                    @if ($value === old('status', $product->status ?? null)) selected="selected" @endif
                >{{ $label }}</option>
            @endforeach
        </select>
    </div>

</div>
