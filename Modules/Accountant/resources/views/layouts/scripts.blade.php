{{-- jquery --}}
<script src="{{ asset('build/js/jquery-3.7.1.min.js') }}"></script>

<!-- JAVASCRIPT -->
<script src="{{ asset('build/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('build/libs/metismenujs/metismenujs.min.js') }}"></script>
<script src="{{ asset('build/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('build/libs/eva-icons/eva.min.js') }}"></script>
<script src="{{ asset('build/js/custom.js') }}"></script>
{{-- select2 --}}
<script src="{{ asset('build/js/select2-custom.js') }}"></script>
<script src="{{ asset('build/js/select2.full.min.js') }}"></script>

<script>
    // image preview
    $("body").on("change", ".image", function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    // select2
    $('.select2').select2();
</script>

@yield('scripts')
