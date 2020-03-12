<script type="text/javascript" src="../admin_asset/js/jquery.js"></script>
<script type="text/javascript" src="../admin_asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../admin_asset/js/jquery.scrollUp.min.js"></script>
<script type="text/javascript" src="../admin_asset/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="../admin_asset/js/typeahead.bundle.min.js"></script>
<script type="text/javascript">
	function updateCart(qty, rowId){
            $.get(
                '{{ asset('cart/update') }}',
                {qty:qty, rowId:rowId},
                function(){
                        location.reload();
                }
            );
        }
</script>
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
    {!! Toastr::message() !!}
</body>
</html>
