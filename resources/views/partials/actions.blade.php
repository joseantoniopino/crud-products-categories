<div class="d-inline-block">
    <a class="btn btn-primary" href="{{route('products.show',$id)}}"><i class="fa fa-eye"></i> View</a>
    <a class="btn btn-success" href="{{route('products.edit', $id)}}"><i class="fa fa-edit"></i> Edit</a>
    <button type="button" class="btn btn-danger remove" onclick="callDeleteAlert('{{$id}}');"><i class="fa fa-trash"></i> Delete</button>
</div>
