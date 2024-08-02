<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand ml-10" href="#">
            <span>heor</span>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto d-flex justify-content-space-between ">
                <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>customer">Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>vechile">Vehicles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>purchase">Payments</a>
                </li>
            </ul>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
         crossorigin="anonymous"></script>
</body>

</html>