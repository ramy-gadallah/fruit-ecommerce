<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('breadcrumb.update',$ObjModel->id)}}" >
    @csrf
        @method('PUT')
        <input type="hidden" value="{{$ObjModel->id}}" name="id">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name" class="form-control-label">{{ trns('name') }}</label>
                    <input type="text" class="form-control" name="page" id="page" value="{{$ObjModel->page}}">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="image" class="form-control-label">{{ trns('image') }}</label>
                    <input type="file" class="form-control dropify" name="image" id="image" data-default-file="{{getFile('storage/'.$ObjModel->image)}}"/>
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
