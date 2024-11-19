<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('category.update',$ObjModel->id)}}" >
    @csrf
        @method('PUT')
        <input type="hidden" value="{{$ObjModel->id}}" name="id">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name" class="form-control-label">{{ trns('name') }}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$ObjModel->name}}">
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
