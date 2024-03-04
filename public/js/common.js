function closeAlert(i) {
    if(i == 1)
    {
        document.getElementById('errorAlert').style.display = 'none'; 
    }
    document.getElementById('succeedAlert').style.display = 'none';
}
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#country').on('change', function() {
    var idCountry = this.value;
    $("#state").html('');
    $.ajax({
        url: "/fetch-states",
        type: "POST",
        data: {
            country_id: idCountry
        },
        dataType: 'json',
        success: function(result) {
            $('#state').html('<option value="">Select State</option>');
            $.each(result.states, function(key, value) {
                $("#state").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
            });
            $('#district').html('<option value="">Select City</option>');
        }
    });
});

$('#state').on('change', function() {
    var idState = this.value;
    $("#district").html('');
    $.ajax({
        url: "fetch-cities",
        type: "POST",
        data: {
            state_id: idState,
        },
        dataType: 'json',
        success: function(res) {
            $('#district').html('<option value="">Select District</option>');
            $.each(res.districts, function(key, value) {
                $("#district").append('<option value="' + value
                    .id  + '">' + value.name + '</option>');
            });
        }
    });
});