<?php helper('url'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body{background:#f4f6f9} .card{border:none;box-shadow:0 2px 10px rgba(0,0,0,.08)}</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Customer Management</a>
        <div class="ms-auto d-flex align-items-center">
            <a href="<?= site_url('dashboard') ?>" class="btn btn-light btn-sm">Back</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Edit Customer</h4>

                    <form method="post" action="<?= site_url('customers/update/' . $customer['customer_id']) ?>">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="<?= $customer['name'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="2"><?= $customer['address'] ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control" value="<?= $customer['city'] ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?= $customer['phone'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Postbox</label>
                                <input type="text" name="postbox" class="form-control" value="<?= $customer['postbox'] ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Region</label>
                                <input type="text" name="region" class="form-control" value="<?= $customer['region'] ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Company</label>
                                <input type="text" name="company" class="form-control" value="<?= $customer['company'] ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contact Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $customer['email'] ?>">
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-success">Update Customer</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
