<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        table {
            position: relative;
            top: 25px;
            border: 2px solid #dee2e6;
            border-radius: 0.375rem;
        }

        th,
        td {
            border: 1px solid #dee2e6;
        }

        h1 {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid black;
        }

        .ghoom {
            position: relative;
            left: 0;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        </span>
        <span class="ghoom">
            <button class="btn btn-primary" onclick="showModal('<?= base_url() ?>purshow','')">Add Purchase</button></span>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">S. No</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Vechile</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Pending amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody id="appedndata">

            </tbody>
        </table>
    </div>
    <div class="modal fade" id="modal_md" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header hdrbg">
                    <button type="button" class="btn-close closebtn" data-bs-dismiss="modal"></button>
                    <!-- <h5 class="modal-title"></h5> -->
                    <h5 class="fnt_head">
                        <b class="modal-title"></b>
                        <div class="vertical-line">
                            <span class="Bcgtop capsule"></span>
                            <span class="Bcgbttm capsule"></span>
                        </div>
                    </h5>
                </div>
                <div class="modal-body mbdclr">
                </div>
            </div>
        </div>
    </div>
    <script>
        function showModal(url, title) {
            $('#modal_md').on('shown.bs.modal', function () {
                $('.selectpicker').selectpicker('refresh');
            });
            $('#modal_md').modal('show', {
                backdrop: 'true'
            });
            $.ajax({
                url: url,
                success: function (response) {
                    $('#modal_md .modal-title').html(title);
                    $('#modal_md .modal-body').html(response);
                }
            });
        }
    </script>
    <script>
        function purData() {
            $.ajax({
                type: 'GET',
                url: '<?= base_url() ?>Home/purData',
                dataType: 'json',
                success: function (result) {
                    // console.log(result);
                    $('#appedndata').html(result)
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        }
        $(document).ready(function () {
            purData();
        });
    </script>
    <!-- toatrr -->
    <script href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- for botsarp version -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- for slect pciker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
</body>

</html>