$(document).ready(function () {
    // Initialize date range picker for the main input
    $('#time_taken').daterangepicker({
        locale: {
            format: 'DD MMMM YYYY'
        },
        opens: 'left',
        showDropdowns: true
    });

    // Initialize date range pickers for each project edit form
    $.each(projectDates, function (id, dateRange) {
        $('#time_taken' + id).daterangepicker({
            locale: {
                format: 'DD MMMM YYYY'
            },
            opens: 'left',
            showDropdowns: true,
            startDate: dateRange.split(' - ')[0],
            endDate: dateRange.split(' - ')[1]
        }).on('apply.daterangepicker', function (ev, picker) {
            var startDate = picker.startDate;
            var endDate = picker.endDate;

            if (endDate.isBefore(startDate)) {
                alert('End date cannot be before start date');
                picker.element.val(startDate.format('DD MMMM YYYY') + ' - ' + startDate.format('DD MMMM YYYY'));
            }
        });
    });

    // Validate date range for the main input
    $('#time_taken').on('apply.daterangepicker', function (ev, picker) {
        var startDate = picker.startDate;
        var endDate = picker.endDate;

        if (endDate.isBefore(startDate)) {
            alert('End date cannot be before start date');
            $(this).val(startDate.format('DD MMMM YYYY') + ' - ' + startDate.format('DD MMMM YYYY'));
        }
    });
});

// Validate image files and article link before submitting the form
function validateForm(event) {
    const form = event.target;
    const fileInputs = form.querySelectorAll('input[type="file"]');
    const urlInput = form.querySelector('input[name="article_link"]');
    let valid = true;
    let errorMessage = '';

    // Validate image files
    fileInputs.forEach(input => {
        const files = input.files;
        for (const file of files) {
            if (!file.type.match('image.*')) {
                valid = false;
                errorMessage = 'Only image files are allowed for upload.';
                break;
            }
        }
    });

    // Validate URL
    if (valid && urlInput) {
        const urlPattern = /^(https?:\/\/)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,6}(\/[a-zA-Z0-9-._~:\/?#[\]@!$&'()*+,;=]*)?$/;
        if (!urlPattern.test(urlInput.value)) {
            valid = false;
            errorMessage = 'Please enter a valid URL.';
        }
    }

    if (!valid) {
        event.preventDefault();
        alert(errorMessage);
    }
}

document.getElementById('projectForm').addEventListener('submit', validateForm);
document.getElementById('articleForm').addEventListener('submit', validateForm);
