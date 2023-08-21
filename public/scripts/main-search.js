$(document).ready(function() {
    $('#search-form').on('input', function() {
        var inputData = $(this).val();
        
        $.ajax({
            url: '/search', // Укажите путь к вашему бэкенд-файлу
            method: 'POST',
            data: { input_data: inputData },
            success: function(response) {
                console.log('RESPONSE:', response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});