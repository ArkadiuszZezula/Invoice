$(document).ready(function () {

    /**
     * Saved new buyer. Modal.
     */
    $('#saveBuyer').on('click', function () {
        var buyerName = $('#buyerName').val();
        var buyerNip = $('#buyerNip').val();
        $.ajax({
            type: "POST",
            url: "/buyer/add",
            data: {
                'buyerNip': buyerNip,
                'buyerName': buyerName
            },
            dataType: "json",
            success: function (data) {
                $("#invoice_id_buyer").append('<option value='
                    + data.id + '>' + date.name + '</option>');
                $('#modalBuyerForm').modal('toggle');
                alert('Buyer was saved');
            },
            error: function (data) {
                alert(data.responseText);
            },
            done: function () {
                $('#modalBuyerForm').modal('toggle');
            }
        });
    });

});