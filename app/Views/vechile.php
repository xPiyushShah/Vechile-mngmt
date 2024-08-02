<form id="vechiledata" method="post">
    <div class="form-group">
        <label for="series">Series</label>
        <input type="text" class="form-control" id="series" name="series" placeholder="Enter series">
    </div>
    <div class="form-group">
        <label for="brand">Brand Name</label>
        <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter brand name">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status">
            <option value="None">None</option>
            <option value="Available">Available</option>
            <option value="Out of Stock">Out of Stock</option>
            <option value="Booked">Booked</option>
            <option value="Discontinued">Discontinued</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div id="response"></div> <!--can remove used for js query  -->
<script>
   $(document).ready(function () {
    $('#vechiledata').on('submit', function (event) {
        event.preventDefault(); 
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>vechSave',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                // console.log(response); 
                    $('#modal_md').modal('hide'); 
                    alert('Customer added successfully!');
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
