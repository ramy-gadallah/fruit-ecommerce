<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('users.update',$user->id)}}" >
    @csrf
        @method('PUT')
        <input type="hidden" value="{{$user->id}}" name="id">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name" class="form-control-label">{{ trns('name') }}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="name" class="form-control-label">{{  trns('email')}}</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="password" class="form-control-label">{{ trns('password') }}</label>
                    <input type="password" class="form-control" name="password"  id="password" >
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="password_confirmation" class="form-control-label">{{ trns('password_confirmation') }}</label>
                    <input type="password" class="form-control" name="password_confirmation"  id="password_confirmation">
                </div>
            </div>


            <div class="col-6">
                <div class="form-group">
                    <label for="address" class="form-control-label">{{ trns('address') }}</label>
                    <input type="text" class="form-control" name="address"  id="address" value="{{$user->address}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="phone" class="form-control-label">{{ trns('phone') }}</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone}}">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="slug" class="form-control-label">{{ trns('slug') }}</label>
                    <input type="text" readonly class="form-control" name="slug" id="slug" value="{{$user->slug}}">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="role_id" class="form-control-label">{{ trns('image') }}</label>
                    <input type="file" class="form-control dropify" name="image" id="image" data-default-file="{{asset('storage/'.$user->image)}}">                       `
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trns('close') }}</button>
            <button type="submit" class="btn btn-success" id="updateButton">{{ trns('update') }}</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
