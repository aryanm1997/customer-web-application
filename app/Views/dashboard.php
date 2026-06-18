<!DOCTYPE html>
<html>
<head>
    <title>Customer Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

    <style>
        body{
            background:#f4f6f9;
        }

        .navbar-brand{
            font-weight:700;
        }

        .card{
            border:none;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
        }

        .page-title{
            font-size:24px;
            font-weight:600;
        }

        .dt-buttons{
            margin-bottom:10px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            Customer Management
        </a>

        <div class="ms-auto d-flex align-items-center">

            <span class="text-white me-3">
                Welcome,
                <strong><?= session()->get('name'); ?></strong>
            </span>

            <a href="<?= site_url('logout'); ?>"
               class="btn btn-light btn-sm">
                Logout
            </a>

        </div>
    </div>
</nav>

<div class="container-fluid mt-4">

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">

                        <h4 class="page-title">
                            Customer List
                        </h4>

                        <div>

                            <a href="<?= site_url('customers/create'); ?>"
                               class="btn btn-success">
                                Add New Customer
                            </a>

                            <button id="editBtn"
                                    class="btn btn-warning">
                                Edit Selected
                            </button>
                            <a href="<?= site_url('copy-data') ?>"
           class="btn btn-info">
            Copy Data
        </a>

                        </div>

                    </div>

                    <table id="customerTable"
                           class="table table-bordered table-striped">

                        <thead class="table-dark">

                        <tr>
                            <th width="50">Select</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Phone</th>
                            <th>Postbox</th>
                            <th>Region</th>
                            <th>Company</th>
                            <th>Contact Email</th>
                        </tr>

                        </thead>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script>

$(document).ready(function(){

    $('#customerTable').DataTable({

        processing:true,

        ajax:"<?= site_url('customers/list'); ?>",

        pageLength:10,

        lengthMenu:[
            [10,20,50,100],
            [10,20,50,100]
        ],

        columnDefs: [
            // Make only Name (1), Address (2), Phone (4), Postbox/ZIP (5) and Company (7) searchable
            { targets: [0,3,6,8], searchable: false }
        ],

        columns:[

            {
                data:'customer_id',

                orderable:false,

                render:function(data){

                    return `
                    <input
                        type="checkbox"
                        class="customerCheck"
                        value="${data}">
                    `;
                }
            },

            {data:'name'},
            {data:'address'},
            {data:'city'},
            {data:'phone'},
            {data:'postbox'},
            {data:'region'},
            {data:'company'},
            {data:'email'}

        ]

    });

    $('#editBtn').click(function(){

        let id = $('.customerCheck:checked')
                    .first()
                    .val();

        if(!id)
        {
            alert('Please select a customer');
            return;
        }

        window.open(
            "<?= site_url('customers/edit'); ?>/"+id,
            '_blank'
        );

    });

});
</script>

</body>
</html>