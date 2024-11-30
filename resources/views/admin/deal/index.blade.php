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
                    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{ route('deals.update',1) }}">
                        @csrf
                        @method($deals != null ? 'PUT' : 'POST' )
                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <label for="logo" class="form-control-label">{{ trns('image') }}</label>
                                    <input type="file" id="testDrop" class="dropify" name="image"
                                        data-default-file="{{ isset($deals) ? getFile('storage/' . $deals->image) : getFile(null) }}" />
                                </div>

                                <div class="col-12">
                                    <label for="title" class="form-control-label">{{ trns('title') }}</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ isset($deals) ? $deals->title : '' }}">
                                </div>

                                <div class="col-12">
                                    <label for="subtitle" class="form-control-label">{{ trns('subtitle') }}</label>
                                    <input type="text" class="form-control" name="subtitle" id="subtitle"
                                        value="{{ isset($deals) ? $deals->subtitle : '' }}">
                                </div>

                                <div class="col-12">
                                    <label for="discount" class="form-control-label">{{ trns('discount') }}</label>
                                    <input type="text" class="form-control" name="discount" id="discount"
                                        value="{{ isset($deals) ? $deals->discount : '' }}">
                                </div>
                                <div class="col-12">
                                    <label for="counter" class="form-control-label">{{ trns('counter') }}</label>
                                    <input type="date"  class="form-control" name="counter" id="counter"
                                        value="{{ isset($deals) ? $deals->counter : '' }}">
                                </div>

                                <div class="col-12">
                                    <label for="description" class="form-control-label">{{ trns('description') }}</label>
                                    <textarea rows="6" type="text" class="form-control" name="description" id="description">
                                            {{ isset($deals) ? $deals->description : '' }}
                                        </textarea>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="product_id">{{ trns('product') }}</label>
                                        <select class="form-select" name="product_id" id="product_id">
                                            <option value="">{{ trns('select_category') }}</option>

                                            @foreach ($products as $product)
                                                <option {{ isset($deals) ?($deals->product_id == $product->id ? 'selected' : '') : '' }}
                                                    value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success"
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
