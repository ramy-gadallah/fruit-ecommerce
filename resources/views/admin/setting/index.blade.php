@extends('admin/layouts/master')

@section('title')
    {{ config()->get('app.name') ?? ''}} | {{ trns('settings') }}
@endsection
@section('page_name')
    الاعدادات
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> {{ trns('settings') }} {{ config()->get('app.name') ?? ''}}</h3>
                </div>
                <div class="card-body">
                    <form id="updateForm" method="POST" enctype="multipart/form-data"

                          action="{{route('settingUpdate',1)}}">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="logo" class="form-control-label">{{ trns('logo') }}</label>
                                    <input type="file" id="testDrop" class="dropify" name="logo"
                                           data-default-file="{{ isset($setting['logo']->value) ? getFile($setting['logo']->value) : getFile(null)  }}"/>
                                </div>
                                <div class="col-6">
                                    <label for="favicon" class="form-control-label">{{ trns('favicon') }}</label>
                                    <input type="file" id="testDrop" class="dropify" name="favicon"
                                           data-default-file="{{ isset($setting['favicon']->value) ? getFile($setting->favicon) : getFile(null) }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="location" class="form-control-label">{{ trns('location') }}</label>
                                    <input type="text" class="form-control" name="location" id="location"
                                           value="{{isset($setting['location']->value) ? $setting['location']->value : ''}}">
                                </div>
                                <div class="col-6">
                                    <label for="location_url" class="form-control-label">{{ trns('location_url') }}</label>
                                    <input type="url" class="form-control" name="location_url" id="location_url"
                                           value="{{isset($setting['location_url']->value) ? $setting->location_url : ''}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">

                                    <label for="email" class="form-control-label">{{ trns('email') }}</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           value="{{ isset($setting['email']->value) ? $setting->email : ''}}">
                                </div>
                                <div class="col-6">
                                    <label for="phone" class="form-control-label"> {{ trns('phone') }}</label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                           value="{{ isset($setting['phone']->value) ? $setting->phone : ''}}">
                                </div>
                                <div class="col-12">
                                    <label for="about_footer" class="form-control-label"> {{ trns('about_footer') }}</label>
                                    <textarea rows="5" type="text" class="form-control" name="about_footer" id="about_footer"
                                           ></textarea>
                                </div>

                                <div class="col-12">
                                    <label for="subscribe" class="form-control-label"> {{ trns('subscribe') }}</label>
                                    <textarea rows="5" type="text" class="form-control" name="subscribe" id="subscribe"
                                           ></textarea>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-12">
                                    <label for="terms" class="form-control-label"> {{ trns('terms') }}</label>
                                    <textarea class="form-control editor" rows="5" name="terms"
                                           id="terms">{{isset($setting) ? $setting->terms : ''}}</textarea>
                                </div>
                            </div> --}}
                            <hr>
                            <h4 class="text-center">{{  trns('social_media')}}</h4>

                            <div class="row">
                                <div class="col-6">
                                    <label for="facebook" class="form-control-label">{{ trns('facebook') }}</label>
                                    <input type="url" class="form-control" name="facebook"
                                            value="{{isset($setting['facebook']->value) ? $setting->facebook : ''}}">
                                </div>
                                <div class="col-6">
                                    <label for="twitter" class="form-control-label"> {{ trns('twitter') }}</label>
                                    <input type="url" class="form-control" name="twitter"
                                           value="{{isset($setting['twitter']->value) ? $setting->twitter : ''}}">
                                </div>
                                <div class="col-6">
                                    <label for="instagram" class="form-control-label"> {{ trns('instagram') }}</label>
                                    <input type="url" class="form-control" name="instagram"
                                            value="{{isset($setting['instagram']->value) ? $setting->instagram : ''}}">
                                </div>
                                <div class="col-6">
                                    <label for="linkedin" class="form-control-label"> {{ trns('linkedin') }}</label>
                                    <input type="url" class="form-control" name="linkedin"
                                            value="{{isset($setting['linkedin']->value) ? $setting->youtube : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="updateButton">{{ trns('update') }}</button>
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


