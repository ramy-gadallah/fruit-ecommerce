@extends('admin/layouts/master')

@section('title')
    {{ config()->get('app.name') ?? '' }} | {{ trns('slider') }}
@endsection
@section('page_name')
    الاعدادات
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> {{ trns('slider') }} {{ config()->get('app.name') ?? '' }}</h3>
                </div>
                <div class="card-body">
                    <form id="updateForm" method="POST"   enctype="multipart/form-data"  action="{{ route('admin.slider.update', 1) }}" >
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="logo" class="form-control-label">{{ trns('image') }}</label>
                                    <input type="file" id="testDrop" class="dropify" name="image"
                                        data-default-file="{{ isset($ObjModel) ? getFile('storage/' . $ObjModel->image) : getFile(null) }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="title" class="form-control-label">{{ trns('title') }}</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ isset($ObjModel) ? $ObjModel->title : '' }}">
                                </div>

                                <div class="col-12">
                                    <label for="description" class="form-control-label">{{ trns('description') }}</label>
                                    <input type="text" class="form-control" name="description" id="description"
                                        value="{{ isset($ObjModel) ? $ObjModel->description : '' }}">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit"
                                class="btn btn-success"
                                    id="updateButton">{{ trns('update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        editScript();
    </script>
@endsection
