<form id="editvechiledata" method="post">
    <div class="form-group">
        <label for="series">Series</label>
        <input type="text" class="form-control" id="series" name="series" placeholder="Enter series"
            value="<?= $edits->series ?>">
    </div>
    </div>
    <div class="form-group">
        <label for="brand">Brand Name</label>
        <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter brand name"
            value="<?= $edits->brand ?>" readonly>
    </div>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="Enter price"
            value="<?= $edits->price ?>">
    </div>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status" value="<?= $edits->status ?>">
    </div>
    <option value="None">None</option>
    <option value="Available">Available</option>
    <option value="Out of Stock">Out of Stock</option>
    <option value="Booked">Booked</option>
    <option value="Discontinued">Discontinued</option>
    </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
    $(document).ready(function () {
        $('#editvechiledata').on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>updates/<?= $edits->id ?>',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (response) {
                    // console.log(response); 
                    $('#modal_md').modal('hide');
                    vechgetData();
                },
                error: function (xhr, status, error) {
                    console.error('Error details:', status, error, xhr.responseText);
                    alert('An error occurred: ' + error);
                }
            });
        });
    });
</script>