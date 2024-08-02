<form id="addCustomerForm" >
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3">
        <label for="mobile" class="form-label">Mobile Number</label>
        <input type="tel" class="form-control" id="mobile" name="number" ">
        <div class=" form-text">
    </div>
    </div>
    <button type="submit" class="btn btn-primary w-100">Save</button>
</form>
<script>
    $(document).ready(function () {
    $('#addCustomerForm').on('submit', function (event) {
        event.preventDefault(); 
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>addData',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                // console.log(response); 
                if (response.status === 'success') { 
                    $('#modal_md').modal('hide'); 
                    alert('Customer added successfully!');
                    getData();
                } else {
                    alert('Failed to add customer.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error details:', status, error, xhr.responseText);
                alert('An error occurred: ' + error);
            }
        });
    });
});
</script>