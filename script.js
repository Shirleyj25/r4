$(document).ready(function () {
    $('#registrationForm').on('submit', function (e) {
        e.preventDefault(); // Prevent form submission
        
        // Collect form data
        const formData = $(this).serialize();

        // Send data to PHP backend using AJAX
        $.ajax({
            url: 'submit.php',
            type: 'POST',
            data: formData,
            success: function (response) {
                $('#result').html(response).fadeIn(); // Display the response
                $('#registrationForm')[0].reset(); // Reset form
            },
            error: function () {
                alert('An error occurred while submitting the form.');
            }
        });
    });
});
