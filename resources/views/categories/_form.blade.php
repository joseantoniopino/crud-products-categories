@csrf
<div class="row">
    <div class="col-2">
        <div class="form-group">
            <label for="name">Name</label>
            @if($action === 'create')
                <input type="hidden" name="id" value="{{\Illuminate\Support\Str::uuid()}}">
            @endif
            <input name="name" type="text" class="form-control" id="name" required value="{{old('name', $category->name)}}">
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" required value="{{old('name', $category->description)}}">
        </div>
    </div>
</div>

<div class="row">
    <div class="offset-11 col-1">
        <button type="submit" class="btn btn-primary float-right">{{$btnText}}</button>
    </div>
</div>
