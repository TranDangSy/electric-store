<script src="../admin_asset/js/jquery-3.3.1.js"></script>

@yield('scripts')

<script src="../admin_asset/js/sb-admin-2.min.js"></script>
<script src="../admin_asset/js/jquery.dataTables.min.js"></script>
<script src="../admin_asset/js/dataTables.bootstrap4.min.js"></script>
<script src="../admin_asset/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        
    });
} );

$('.form-delete').submit(function(){
    if (!confirm('Bạn có chắc muốn xóa không?')){
        return false;
    }
    else
        return true;
});

</script>

</body>
</html>
