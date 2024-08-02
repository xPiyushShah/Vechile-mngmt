<form id="purData">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" class="form-control" id="brand" name="brand" required>
    </div>
    <div class="mb-3">
        <label for="amounts" class="form-label">Total Amount</label>
        <input type="text" class="form-control" id="amount" name="amount"  required readonly >
    </div>
    <div class="mb-3">
        <label for="amount" class="form-label">Purchasing Amount</label>
        <input type="text" class="form-control" id="amounts" name="amounts"  required  >
    </div>
    <div class="mb-3">
        <label for="difference" class="form-label">Difference</label>
        <input type="text" class="form-control" id="difference" name="difference" readonly>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" id="status" name="status" readonly>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div id="records">
</div>
<div id="result">
</div>
<script>
$(document).ready(function () {
    $('#purData').on('submit', function (event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '<?= base_url('Home/pursave') ?>',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                $('#modal_md').modal('hide');
                alert('Purchase Saved!');
                purData();
            },
            error: function (xhr, status, error) {
                alert('An error occurred: ' + error);
            }
        });
    });

    $('#brand').on('input', function () {
        fetchData();
    });

    $('#amounts').on('input', function () {
        updateDifference();
    });

    function fetchData() {
        const inputValue = $('#brand').val();
        $.ajax({
            url: '<?= base_url('fetchData') ?>',
            type: 'GET',
            data: { brand: inputValue },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    $('#records').empty();
                    let fetchedAmount = 0; 
                    response.data.forEach((item) => {
                        $('#records').append(`
                            <span>Amount:</span> ${item.amount || 'N/A'} <br>
                            <span>Brand:</span> ${item.brand || 'N/A'}
                        `);
                        fetchedAmount = parseFloat(item.amount) || 0; 
                    });
                    $('#amount').val(fetchedAmount);
                    updateDifference(); 
                }
            },
            error: function () {
                $('#result').html('<p>An error occurred while fetching data.</p>');
            }
        });
    }
    function updateDifference() {
        const fetchedAmount = parseFloat($('#amount').val()) || 0; 
        const purchasingAmount = parseFloat($('#amounts').val()) || 0;     
        const mb = fetchedAmount - purchasingAmount;
     
        $('#difference').val(mb.toFixed(2)); 
        if (mb > 0) {
            status = 'Pending'; 
        } else if (mb === 0) {
            status = 'Booked'; 
        } else {
            status = 'Overpaid'; 
        }
        console.log(status)
        $('#status').val(status); 
    }
});

</script>