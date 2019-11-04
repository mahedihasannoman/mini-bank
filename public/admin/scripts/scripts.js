/**
 * Populate sub categories based on category ID
 */

$(document).on('change', '.get-sub-categories', function () {
    var category_id = $(this).val();


    /**
     * Reset the subcategory dropdown first
     */

    $('#sub_category_id').empty();

    let url = base_url + '/category/getSubCategoryByCategoryId/' + category_id;

    axios.get(url)
        .then(response => {
            response.data.forEach(element => {
                    $('#sub_category_id').append($('<option>', {
                        value: element.id,
                        text: element.name
                    }));
                }
            );
        })
        .catch(response => {
            console.log(response);
        });
});


$(function () {


    /**
     * Validate deposit form submission -- frontend validation
     */

    $('#store_deposit').validate({
        rules: {
            amount: {
                required: true
            },
            transaction_date: {
                required: true
            },
            account_id: {
                required: true
            },
        },
        messages: {
            amount: {
                required: "Amount is required"
            },
            transaction_date: {
                required: "Transaction date is required"
            },
            account_id: {
                required: "Account is required"
            },
        }
    });


    $('#balance_transfer').validate({
        rules: {
            amount: {
                required: true
            },
            transaction_date: {
                required: true
            },
            from_account: {
                required: true
            },
            to_account: {
                required: true
            },
        },
        messages: {
            amount: {
                required: "Amount is required"
            },
            transaction_date: {
                required: "Transaction date is required"
            },
            from_account: {
                required: "From account is required"
            },
            to_account: {
                required: "To account is required"
            },
        }
    });
	
	
	
    $(".single_euro_digit").on("keypress keyup blur",function (event) {    
	   $(this).val($(this).val().replace(/[^\d].+/, ""));
		if ((event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});
	
});

