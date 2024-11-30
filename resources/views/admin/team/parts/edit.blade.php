<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{ route('team.update', $ObjModel->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $ObjModel->id }}" name="id">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name" class="form-control-label">{{ trns('name') }}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $ObjModel->name }}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="job_id" class="form-control-label">{{ trns('job') }}</label>
                    <select class="form-select" name="job_id" id="job_id">
                        <option value="">{{ trns('select_job') }}</option>
                        @foreach ($jobs as $job)
                            <option
                            value="{{ $job->id }}"
                            {{ $job->id == $ObjModel->job_id ? 'selected' : '' }}>{{ $job->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="image" class="form-control-label">{{ trns('image') }}</label>
                    <input type="file" class="form-control dropify" name="image" id="image" data-default-file="{{ asset('storage/' . $ObjModel->image) }}">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="facebook" class="form-control-label">{{ trns('facebook') }}</label>
                    <input type="text" class="form-control" name="facebook" id="facebook" value="{{ $ObjModel->facebook }}">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="twitter" class="form-control-label">{{ trns('twitter') }}</label>
                    <input type="text" class="form-control" name="twitter" id="twitter" value="{{ $ObjModel->twitter }}">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="instagram" class="form-control-label">{{ trns('instagram') }}</label>
                    <input type="text" class="form-control" name="instagram" id="instagram" value="{{ $ObjModel->instagram }}">
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
    $('.dropify').dropify();
</script>
