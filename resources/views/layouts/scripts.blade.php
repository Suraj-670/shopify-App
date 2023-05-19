<script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
    $("#pagination").show();
    $(document).ready(function() {
        $("#product_type").change(function() {
            var productType = $(this).val();
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: '{{ url('/products/productType') }}',
                data: 'product_type=' + productType,
                success: function(response) {
                    $("#collectionData").html(response);

                }

            })
        });
    });
</script>
