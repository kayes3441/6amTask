<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
        $('#datatable').DataTable();
    } );
</script>
<script>
    $(document).on('change',function ()
    {
        var brand =document.getElementById('brand_id');

        if(brand.value=='new')
        {
            $('#newBrandName').show();
        }
        if(brand.value!='new')
        {
            $('#newBrandName').hide();
        }
    })
</script>
