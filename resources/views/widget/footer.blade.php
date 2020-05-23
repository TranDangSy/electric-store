<script type="text/javascript" src="../admin_asset/js/jquery.js"></script>
<script type="text/javascript" src="../admin_asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../admin_asset/js/jquery.scrollUp.min.js"></script>
<script type="text/javascript" src="../admin_asset/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="../admin_asset/js/typeahead.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
<script>
$(document).ready(function($) {
    var engine1 = new Bloodhound({
        remote: {
            url: 'search/name?value=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    $(".search-input").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, [
        {
            source: engine1.ttAdapter(),
            name: 'products',
            display: function(q) {
                return q.name;
            },
            templates: {
                empty: [
                    '<div class="header-title">Name</div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                ],
                suggestion: function (q) {
                    return '<a href="product/' + q.id + '/' + q.slug + '.html' +'" class="list-group-item">' + q.name + '</a>';
                }
            }
        }
    ]);
});
</script>
<script>
	$(document).ready(function(){
	   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	   $(".likePost").click(function(){
		  $.ajax({
			 url: '{{route('ajaxLike')}}',
			 type: 'POST',
			 data: {
				_token: CSRF_TOKEN,
				id: $(this).data("like"),
			 },
			 dataType: 'JSON',
			 success: function() {
				location.reload();
			 }
		  });
	   });
	});
</script>
<script>
    $("#input-id").rating();
</script>
    {!! Toastr::message() !!}
</body>
</html>
