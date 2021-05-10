@csrf
<div class="row">
    <div class="col-2">
        <div class="form-group">
            <label for="name">Name</label>
            @if($action === 'create')
                <input type="hidden" name="id" value="{{\Illuminate\Support\Str::uuid()}}">
            @endif
            <input name="name" type="text" class="form-control" id="name" required value="{{old('name', $product->name)}}">
        </div>
    </div>

    <div class="col-2">
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control select2" id="category_id" name="category_id" required>
                @foreach($categories as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-2">
        <div class="form-group">
            <label for="price">Price</label>
            <input name="price" type="number" class="form-control" id="price" step="0.01" min="0" required value="{{old('price', $product->price)}}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="custom-file">
            <input name="image" type="file" class="custom-file-input" id="image" value="{{old('image')}}" >
            <label class="custom-file-label" for="image">Image</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" required >{{old('description', $product->description)}}</textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-2">
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="with_stock">In stock: </label>
            <input type="hidden" name="with_stock" value=0>
            <input name="with_stock" class="form-check-input" type="checkbox" id="with_stock" value="1" {!! $product->with_stock == 1 ?  'checked': ''!!}>
        </div>
    </div>

    <div class="offset-9 col-1">
        <button type="submit" class="btn btn-primary float-right">{{$btnText}}</button>
    </div>
</div>
