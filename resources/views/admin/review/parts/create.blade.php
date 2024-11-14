<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{ route('reviews.store') }}">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name" class="form-control-label">{{ trns('name') }}</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="title" class="form-control-label">{{ trns('title') }}</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="description" class="form-control-label">{{ trns('description') }}</label>
                    <textarea rows="6" type="text" class="form-control" name="description" id="description"></textarea>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="image" class="form-control-label">{{ trns('image') }}</label>
                    <input type="file" class="form-control dropify" name="image" id="image">
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
