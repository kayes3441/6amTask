<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/bootstrap.min.js"></script>
<script src="{{ asset('/') }}front/assets/js/tiny-slider.js"></script>
<script src="{{ asset('/') }}front/assets/js/glightbox.min.js"></script>
<script src="{{ asset('/') }}front/assets/js/main.js"></script>

<!--summerNote -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!-- include plugin -->
<script src="[folder where script is located]/[plugin script].js"></script>


<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            popover: {
                image: [

                    // This is a Custom Button in a new Toolbar Area
                    ['custom', ['examplePlugin']],
                    ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ]
            }
        });
    });


</script>
