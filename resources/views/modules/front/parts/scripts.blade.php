<script src="{{asset('modules/front/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('modules/front/assets/js/popper.min.js')}}"></script>
<script src="{{asset('modules/front/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('modules/front/assets/js/tagcanvas.min.js')}}"></script>
<script src="{{asset('modules/front/assets/owl-carousel/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('modules/front/assets/js/main.js')}}"></script>
<script src="{{asset('js/toastr.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"
        integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw=="
        crossorigin="anonymous"></script>
<script>
    toastr.options.closeButton = true;
    @if(session()->has('success'))
    toastr.success("{!! session()->get('success') !!}");
    @endif

    @if(session()->has('info'))
    toastr.info("{!! session()->get('info') !!}");
    @endif

    @if(session()->has('error'))
    toastr.info("{!! session()->get('error') !!}");
    @endif

    @if(session()->has('warning'))
    toastr.info("{!!session()->get('warning') !!}");
    @endif

</script>


