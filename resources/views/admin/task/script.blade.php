
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>  --}}

<script>
    $(document).ready( function () {
        $('#datatable').DataTable();
    } );
</script>

<script>
    $(document).on('change',function ()
    {
        var project =document.getElementById('project_id');

        if(project.value=='new')
        {
            $('#newProjectName').show();
        }
        if(project.value!='new')
        {
            $('#newProjectName').hide();
        }
    })


    $('#addForm form').submit(function (e){
        e.preventDefault();
        $.ajax({
            method:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$('#formSubmit').serialize(),
            success:function (response){
                if (response =='success')
                {
                    $('#addForm form')[0].reset()
                    Command: toastr["success"]("Submit Successfully", "Success")
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-center",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
            },
            error:function (err) {
                // console.log(err)
                let error = err.responseJSON;
                $.each(error.errors, function (index, value) {
                    $("#" + index + "_error").text(value[0]);

                });
            }
        })
    })


</script>
