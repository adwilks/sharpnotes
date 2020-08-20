

    $(document).ready(function() {
    $('#note-modal-form').on('submit', function(event){
        event.preventDefault();
        if ($('#note-title').val() == "") {
            alert("A note title is required");
        } else {
            $.ajax({
                url:"postnote.php",
                method:"POST",
                data:$('#note-modal-form').serialize(),
                success:function (data){
                    $('#note-modal-form')[0].reset();
                    $('#note-modal').modal('hide');

                }
            })
        }

    })
})

