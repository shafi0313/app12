{{-- height="300px" by default --}}
{{-- <x-forms.summernote-image-js name="name" /> --}}
<script>
    $(document).ready(function() {
        $('input[name="{{ $name }}"]').summernote({
            height: '{{ $height }}',
            callbacks: {
                onMediaDelete: function(target) {
                    let imgSrc = target[0].src;
                    $.ajax({
                        url: '{{ route('summernote_image.destroy') }}', // your delete image route
                        type: 'POST',
                        data: {
                            src: imgSrc,
                            _token: '{{ csrf_token() }}' // include CSRF token if needed
                        },
                        success: function(response) {
                            console.log('Image deleted');
                        },
                        error: function(response) {
                            console.log('Failed to delete image');
                        }
                    });
                }
            }
        });
    })
</script>
