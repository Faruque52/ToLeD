

<!-- Include the jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include the jQuery UI datepicker script -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(document).ready(function() {
    // Initialize the datepicker
    $("#birth_date").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '1970:2014',
        dateFormat: 'yy-mm-dd'
    });

    // Email availability check
    $('#email').on('blur', function() {
        var email = $(this).val();
        checkEmailAvailability(email);
    });

    function checkEmailAvailability(email) {
        $.ajax({
            type: "POST",
            url: "{{ route('check.email.availability') }}",
            data: { email: email },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                console.log(res);
                if (res.exists) {
                    $('#availability-message').text('Email is already taken').css('color', 'red');
                } else {
                    $('#availability-message').text('Email is available').css('color', 'green');
                }
            },
            error: function(jqXHR, exception) {
                console.error(exception);
            }
        });
    }
 });

</script>