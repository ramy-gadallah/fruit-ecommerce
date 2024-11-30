<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('partners.update',$ObjModel->id)}}" >
    @csrf
        @method('PUT')
        <input type="hidden" value="{{$ObjModel->id}}" name="id">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="link" class="form-control-label">{{ trns('link') }}</label>
                    <input type="text" class="form-control" name="link" id="link" value="{{isset($ObjModel) ? $ObjModel->link : ''}}">
                </div>

                <div class="form-group">
                    <label for="image" class="form-control-label">{{ trns('image') }}</label>
                    <input type="file" class="form-control dropify" name="image" id="image" data-default-file="{{isset($ObjModel) ? getFile('storage/'.$ObjModel->image) : getFile(null)}}">
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
