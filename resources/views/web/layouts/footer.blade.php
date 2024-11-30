<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    @foreach ($partners as $partner )
                    <div class="single-logo-item">
                        <a style="text-decoration: none" href="{{ $partner->link}}" target="_blank">
                            <img src="{{asset('storage/'.$partner->image)}}" alt="">
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end logo carousel -->
<!-- footer -->
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-box about-widget">
                    <h2 class="widget-title">About us</h2>
                    <p>{{$setting['about_footer']}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box get-in-touch">
                    <h2 class="widget-title">Get in Touch</h2>
                    <ul>
                        <li>{{isset($setting['location']) ? $setting['location'] : ''}}</li>
                        <li><a href="mailto:gadallahramy31@gmail.com">{{isset($setting['email']) ? $setting['email'] : ''}}</a></li>
                        <li><a href="tel:{{isset($setting['phone']) ? $setting['phone'] : ''}}">{{isset($setting['phone']) ? $setting['phone'] : ''}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box pages">
                    <h2 class="widget-title">Pages</h2>
                    <ul>
                        <li><a href="{{route('web.home.index')}}">Home</a></li>
                        <li><a href="{{route('web.about.index')}}">About</a></li>
                        <li><a href="{{route('web.shop.index')}}">Shop</a></li>
                        <li><a href="{{route('web.news.index')}}">News</a></li>
                        <li><a href="{{route('web.contact.index')}}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box subscribe">
                    <h2 class="widget-title">Subscribe</h2>
                    <p>{{$setting['subscribe']}}</p>
                    <form id="createForm">
                        @csrf
                        <input type="email" placeholder="Email" name="email" id="email">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->
<!-- copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <p>Copyrights &copy; 2024 - <a href="https://www.linkedin.com/in/ramy-mohamed-242351307?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">Ramy Gadallah</a>, All Rights
                    Reserved.<br>
                    design By - <a href="https://www.linkedin.com/in/ramy-mohamed-242351307?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">Ramy Gadallah</a>
                </p>
            </div>
            <div class="col-lg-6 text-right col-md-12">
                <div class="social-icons">
                    <ul>
                        <li><a href="https://wa.me/{{$setting['phone']}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                        <li><a href="{{$setting['facebook']}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{$setting['twitter']}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="{{$setting['instagram']}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="{{$setting['linkedin']}}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end copyright -->
@section('script')
<script>
    $(document).ready(function() {
        $('#createForm').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                method: "POST",
                enctype: 'multipart/form-data',
                url: "{{ route('newLetter.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,

                success: function(data) {
                    if (data.status == 200) {
                        $('#create').modal('hide');
                        toastr.success(data.message);
                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 4000);
                        $('#createForm')[0].reset();
                        clearModalContents();
                    }
                },
                error: function(xhr, status, error) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        toastr.error(value);
                        $('#createForm')[0].reset();
                        clearModalContents();
                    });
                }
            });
        });
    });
</script>
@endsection
