<!DOCTYPE html>
<html>
<head>
    <title>Copy Customer Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            Customer Data Copy
        </div>

        <div class="card-body">

            <button
                id="copyBtn"
                class="btn btn-primary">

                Copy Data

            </button>

            <div id="msg" class="mt-3"></div>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

$('#copyBtn').click(function(){

    $.ajax({

        url: "<?= site_url('api/copy-customers') ?>",

        type: "POST",

        success: function(response)
        {
            $('#msg').html(
                '<div class="alert alert-success">'+
                response.message+
                '</div>'
            );
        },

        error: function()
        {
            $('#msg').html(
                '<div class="alert alert-danger">Copy Failed</div>'
            );
        }

    });

});

</script>

</body>
</html>