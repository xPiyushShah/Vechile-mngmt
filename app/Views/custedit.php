<form id="editCustomerForm">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $edit->name ?>" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $edit->email ?>" required>
    </div>

    <div class="mb-3">
        <label for="mobile" class="form-label">Mobile Number</label>
        <input type="tel" class="form-control" id="mobile" name="number" value="<?= $edit->number ?>">
    </div>
    <button type="submit" class="btn btn-primary w-100">Save</button>
</form>
<script>
    $(document).ready(function () {
        $('#editCustomerForm').on('submit', function (event) {
            event.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>update/<?= $edit->id ?>',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (response) {
                    $('#modal_md').modal('hide');
                    alert('Customer Data Updated!');
                    getData();
                },
                error: function (xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        });
    });
</script>