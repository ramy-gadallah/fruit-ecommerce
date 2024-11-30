<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{ route('coupon.update', $ObjModel->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $ObjModel->id }}" name="id">
        <div class="row">

            <div class="col-12">
                <div class="form-group">
                    <label for="from" class="form-control-label">{{ trns('from') }}</label>
                    <input type="text" class="form-control" readonly name="from" id="from" value="{{$ObjModel->code}}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="from" class="form-control-label">{{ trns('from') }}</label>
                    <input type="date" class="form-control" name="from" id="from" value="{{$ObjModel->from}}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="to" class="form-control-label">{{ trns('to') }}</label>
                    <input type="date" class="form-control" name="to" id="to" value="{{$ObjModel->to}}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="discount" class="form-control-label">{{ trns('discount') }}</label>
                    <input type="text" class="form-control" name="discount" id="discount" value="{{$ObjModel->discount}}">
                </div>
            </div>


            <div class="col-6">
                <div class="form-group">
                    <label for="count" class="form-control-label">{{ trns('count') }}</label>
                    <input type="text" class="form-control" name="count" id="count" value="{{$ObjModel->count}}">
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
