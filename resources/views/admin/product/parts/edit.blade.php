<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{ route('product.update', $ObjModel->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $ObjModel->id }}" name="id">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name" class="form-control-label">{{ trns('name') }}</label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ $ObjModel->name }}">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="name" class="form-control-label">{{ trns('description') }}</label>
                    <textarea type="text" rows="6" class="form-control" name="description" id="description"
                    >{{ $ObjModel->description }}</textarea>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="name" class="form-control-label">{{ trns('image') }}</label>
                    <input type="file" class="form-control dropify" name="image" id="image"
                        data-default-file="{{ asset('storage/' . $ObjModel->image) }}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="category_id" class="form-control-label">{{ trns('category') }}</label>
                    <select class="form-select" name="category_id" id="category_id">
                        <option value="">{{ trns('select_category') }}</option>
                        @foreach ($categories as $category)
                            <option {{ $ObjModel->category_id == $category->id ? 'selected' : '' }}
                                value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="category_id" class="form-control-label">{{ trns('unit') }}</label>
                    <select class="form-select" name="unit_id" id="unit_id">
                        <option value="">{{ trns('select_unit') }}</option>
                        @foreach ($units as $unit)
                            <option {{ $ObjModel->unit_id == $unit->id ? 'selected' : '' }}
                                value="{{ $unit->id }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="name" class="form-control-label">{{ trns('price') }}</label>
                    <input type="text" class="form-control" name="price" id="price"
                        value="{{ $ObjModel->price }}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="name" class="form-control-label">{{ trns('Quantity') }}</label>
                    <input type="text" class="form-control" name="quantity" id="quantity"
                        value="{{ $ObjModel->quantity }}">
                </div>
            </div>



            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trns('close') }}</button>
                <button type="submit" class="btn btn-primary" id="addButton">{{ trns('save') }}</button>
            </div>
        </div>

    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
