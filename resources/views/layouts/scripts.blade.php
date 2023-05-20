<script src="{{ asset('js/jquery1.min.js') }}"></script>
<script src="{{ asset('js/bootstraps1.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
    $(document).ready(function() {
        const fetch_data = (page, collection) => {
            if (collection === undefined) {
                collection = "";
            }
            $.ajax({
                type: 'GET',
                dataType: 'html',
                url: "{{ url('') }}/?page=" + page + "&collection=" + collection,
                success: function(data) {
                    $('#collectionData').html(data);
                }
            })
        }

        $('body').on('change', '#product_type', function() {
            var collection = $('#product_type').val();
            var page = $('#hidden_page').val(1);
            fetch_data(page, collection);
        });

        $('body').on('click', '.pager a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);
            var collection = $('#product_type').val();
            fetch_data(page, collection);
        });
    });
</script>
