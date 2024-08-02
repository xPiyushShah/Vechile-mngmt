<form id="editpurData">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required  value="<?= $edit->name?>">
    </div>
    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" class="form-control" id="brand" name="brand" required  value="<?= $edit->brand?>"> 
    </div>
    <div class="mb-3">
        <label for="amounts" class="form-label">Total Amount</label>
        <input type="text" class="form-control" id="amount" name="amount"  required readonly  value="<?= $edit->amount?>">
    </div>
    <div class="mb-3">
        <label for="amount" class="form-label">Purchasing Amount</label>
        <input type="text" class="form-control" id="amounts" name="amounts"  required   value="<?= $edit->amounts?>">
    </div>
    <div class="mb-3">
        <label for="difference" class="form-label">Difference</label>
        <input type="text" class="form-control" id="difference" name="difference" readonly value="<?= $edit->difference?>">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" id="status" name="status" readonly value="<?= $edit->status?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
     $(document).ready(function () {
    $('#editpurData').on('submit', function (event) {
        event.preventDefault(); 
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>updated/<?=$edit->id?>',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                // console.log(response); 
                    $('#modal_md').modal('hide'); 
                    purData();
            },
            error: function (xhr, status, error) {
                console.error('Error details:', status, error, xhr.responseText);
                alert('An error occurred: ' + error);
            }
        });
    });
});
</script>