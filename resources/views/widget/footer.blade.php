<script type="text/javascript" src="../admin_asset/js/jquery.js"></script>
<script type="text/javascript" src="../admin_asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../admin_asset/js/jquery.scrollUp.min.js"></script>
<script type="text/javascript" src="../admin_asset/js/price-range.js"></script>
<script type="text/javascript" src="../admin_asset/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="../admin_asset/js/main.js"></script>
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
</body>
</html>
