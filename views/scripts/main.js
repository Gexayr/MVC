$(document).ready( function () {
    $('#myTable').DataTable({
        "bLengthChange": false,
        "pageLength": 3,
        "columnDefs": [ {
            "targets": 'no-sort',
            "orderable": false,
        } ]
    });

    $('.description').blur(function () {
        let content = $(this).html();
        let id = $(this).closest('tr').data('id');

        let formData = new FormData();
        formData.append('content', content);
        formData.append('id', id);
        update(formData);
    });

    $('.status').change(function () {
        let id = $(this).closest('tr').data('id');
        let formData = new FormData();
        formData.append('id', id);
        if(this.checked) {
            formData.append('completed', 'completed');
        } else {
            formData.append('completed', 'created');
        }
        update(formData);
    });

    function update(data) {
        $.ajax({
            url: '/update',
            type: 'POST',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){
            },
            success: function(result){
                console.log(result)
            }
        });
    }
} );

