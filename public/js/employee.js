     function accept_number(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        function accept_text(e) {
                    var keyCode = e.keyCode || e.which;
                    var regex = /^[A-Za-z ]+$/;
                    //Validate TextBox value against the Regex.
                    var isValid = regex.test(String.fromCharCode(keyCode));
                    if (!isValid) {
                        return false;
                    }
                    return isValid;
                }





$('input[name="profession"]').change(function() {
                let profession = $(this).val();
                if (profession === 'salaried') {
                    $('.company-name-container').show();
                    $('.job-started-from-container').show();
                    $('.business-name-container').hide();
                    $('.location-container').hide();
                } else if (profession === 'self-employed') {
                    $('.company-name-container').hide();
                    $('.job-started-from-container').hide();
                    $('.business-name-container').show();
                    $('.location-container').show();
                }
            }).trigger('change');


            $('#add-education').click(function() {
                let educationHtml = `
                    <div class="mb-3">
                        <label class="form-label">Education</label>
                        <input type="text" name="education[]" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Year of Completion</label>
                        <input type="number" name="year_of_completion[]" class="form-control" min="1900" max="${new Date().getFullYear()}">
                    </div>
                `;
                $('#education-container').append(educationHtml);
            });
  $('#city_id').empty().append('<option value="">No City Found</option>');
 $('#state_id').change(function() {
                let stateId = $(this).val();
               // alert(stateId);

                $.ajax({
                    url: state_route,
                    type: 'GET',
                    data: { state_id: stateId },
                    success: function(response) {
                        if(response.status){
                               // alert(response.city);
                             $('#city_id').empty();
                                                    $('#city_id').append('<option value="">Select City</option>');
                                                    $.each(response.city, function(index, city) {
                                                        $('#city_id').append('<option value="' + city.id + '">' + city.city_name + '</option>');
                                                    });
                        }
                        else
                        {

                        $('#city_id').empty().append('<option value="">'+response.message+'</option>');
                        }
                    }
                });
            });
