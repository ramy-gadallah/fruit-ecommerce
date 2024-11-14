@extends('admin/layouts/master')

@section('title')
    {{ config()->get('app.name') ?? '' }} | {{ trns('Home_About') }}
@endsection
@section('page_name')
    الاعدادات
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> {{ trns('Home_About') }} {{ config()->get('app.name') ?? '' }}</h3>
                </div>
                <div class="card-body">
                    <form id="updateForm" method="{{ $obj!=null ? 'PUT' : 'POST'}}" enctype="multipart/form-data"
                        action="{{ route('home_aboutUpdate', 1) }}">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="logo" class="form-control-label">{{ trns('image') }}</label>
                                    <input type="file" id="testDrop" class="dropify" name="image"
                                    data-default-file="{{ isset($obj) ? getFile('storage/'.$obj->image) : getFile(null)}}"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="link" class="form-control-label">{{ trns('link') }}</label>
                                    <input type="text" class="form-control" name="link" id="link"
                                        value="{{ isset($obj) ? $obj->link : '' }}">
                                </div>

                                <div class="col-12">
                                    <label for="title" class="form-control-label">{{ trns('title') }}</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                    value="{{ isset($obj) ? $obj->title : '' }}"
                                    >
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label for="subtitle" class="form-control-label">{{ trns('subtitle') }}</label>
                                        <input type="text" class="form-control" name="subtitle" id="subtitle"
                                        value="{{ isset($obj) ? $obj->subtitle : '' }}"
                                        >
                                    </div>

                                    <div class="col-12">
                                        <label for="description"
                                            class="form-control-label">{{ trns('description') }}</label>
                                        <textarea rows="6" type="text" class="form-control" name="description" id="description">
                                            {{ isset($obj) ? $obj->description : '' }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success"
                                    id="updateButton">{{ trns('update') }}</button>
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
