$('.save_data').on('click', function (event) {
    event.preventDefault();
    var url = $(this).data('url');
    var form = $(this).closest('form')[0];
    var formData = new FormData(form);
    var settings = {
        url: url,
        type: 'POST',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }

    $.ajax(settings).done(function (response) {
        var responseData = response;
        if (responseData.status == 'error') {
            console.log(responseData.message);
            swal.fire("Error!", responseData.message, "error");
            setTimeout(function () {
                location.reload();
            }, 2000);
        } else {
            swal.fire("Done!", responseData.message, "success");
            // refresh page after 2 seconds
            setTimeout(function () {
                location.reload();
            }, 2000);
        }
    });
});



$(".delete_data_confirm").on("click", function (event) {
    event.preventDefault();
    var _This = $(this);
    var submitBtn = $(this);
    var actionMethod = $(this).attr('data-url');
    var btnHTML = submitBtn.html();
    alert(actionMethod);
    console.log(actionMethod);

    var form = $(this).closest('form')[0];
    var formData = new FormData(form);
    // swal({
    //     title: "Alert",
    //     text: "Danger alert",
    //     type: "error",
    //     showCancelButton: true,
    //     confirmButtonText: 'Exit',
    //     cancelButtonText: 'Stay on the page'
    // });
    swal({
        title: "Delete?",
        // icon: 'question',
        text: "Please ensure and then confirm!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        cancelButtonColor: "#d33",
        //reverseButtons: !0,
        confirmButtonClass: "btn btn-primary",
        cancelButtonClass: "btn btn-danger ml-1",
        buttonsStyling: !1,

    }).then(function (e) {

        if (e.value === true) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'POST',
                url: actionMethod,
                data: { _token: CSRF_TOKEN },
                dataType: 'JSON',
                success: function (results) {
                    if (results.success === true) {
                        swal("Done!", results.message, "success");
                        // refresh page after 2 seconds
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    } else {
                        swal.fire("Error!", results.message, "error");
                    }
                }
            });

        } else {
            e.dismiss;
        }

    }, function (dismiss) {
        return false;
    })

});

//select product functionality
$(document).ready(function () {
    $("select.state").change(function () {
        var prodName = $(this).children("option:selected").val();
        var url = $(this).attr('data-url');
        var formData = new FormData();

        console.log(url);
        formData.append('prodName', prodName);
        console.log(formData);
        var settings = {
            url: url,
            type: 'POST',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }
        $.ajax(settings).done(function (response) {

            var responseData = response;
            if (responseData.status == 'Failure') {
                console.log(response);

            } else {
                var data = responseData.data;
                console.log(data);
                var amount = data.price;
                console.log(amount);
                $('#amount').val(amount);
            }

        });
    });

    $('#quantity').on('blur', function (event) {
        var quantity = $(this).val();
        var amount = $("#amount").val();
        var total = quantity * amount;
        $('#total').val(total);
    });
});

//Edit data ajax
$('.editData').on('click', function (event) {
    event.preventDefault();
    var url = $(this).data('url');

    var formData = new FormData();
    var settings = {
        url: url,
        type: 'GET',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }
    $.ajax(settings).done(function (response) {
        var responseData = response;
        if (responseData.status == 'error') {
            console.log(responseData.message);
        } else {
            var data = responseData.data;
            var name = data.name;
            var banner = data.banner;
            var status = data.status;
            $('#name').val(name);
            $('#banner').val(banner);
            $('#status').val(status);
            $('#editcategory').modal("show");

        }
    });
})

//Save data using Ajax




$('#qty').on('blur', function (event) {
    alert("how are you doing duru");
    // var quantity = $(this).val();
    // var amount =  $("#amount").val();
    // var total = quantity * amount ;
    // $('#total').val(total);
});

$('.qtyPlus').on('click', function (event) {
    event.preventDefault();
    var url = $(this).data('url');
    var quantityField = $(this).siblings('.quantity-field');
    var productId = $(this).closest('.product-lists').find('input[name="cid[]"]').val();
    var qty = quantityField.val();
    var qty = parseInt(qty);
    var qty = qty + 1;

    var formData = new FormData();


    formData.append('cid', productId);
    console.log(formData);
    var settings = {
        url: url,
        type: 'POST',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }

    $.ajax(settings).done(function (response) {
        var responseData = response;
        if (responseData.status == 'error') {
            console.log(responseData.message);
            swal.fire("Error!", responseData.message, "error");
            setTimeout(function () {
                location.reload();
            }, 2000);
        } else {

            swal.fire("Done!", responseData.message, "success");
            // refresh page after 2 seconds
            setTimeout(function () {
                location.reload();
            }, 2000);

        }
    });
});
