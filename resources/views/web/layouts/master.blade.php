<!DOCTYPE html>
<html lang="en">
@include('web.layouts.head')
<body>
<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div>
<!--PreLoader Ends-->
<!-- header -->
@include('web.layouts.header')
<!-- end header -->
@yield('content')
<!-- footer -->
@include('web.layouts.footer')
<!-- end footer -->

@include('web.layouts.js')
@yield('script')
@toastr_js
@toastr_render
</body>
</html>
