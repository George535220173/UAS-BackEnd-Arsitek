$(document).ready(function() {
    $('#time_taken').daterangepicker({
        locale: {
            format: 'DD MMMM YYYY'
        },
        opens: 'left',
        showDropdowns: true
    });

    $.each(projectDates, function(id, dateRange) {
        $('#time_taken' + id).daterangepicker({
            locale: {
                format: 'DD MMMM YYYY'
            },
            opens: 'left',
            showDropdowns: true,
            startDate: dateRange.split(' - ')[0],
            endDate: dateRange.split(' - ')[1]
        }).on('apply.daterangepicker', function(ev, picker) {
            var startDate = picker.startDate;
            var endDate = picker.endDate;

            if (endDate.isBefore(startDate)) {
                alert('End date cannot be before start date');
                picker.element.val(startDate.format('DD MMMM YYYY') + ' - ' + startDate.format('DD MMMM YYYY'));
            }
        });
    });

    $('#time_taken').on('apply.daterangepicker', function(ev, picker) {
        var startDate = picker.startDate;
        var endDate = picker.endDate;

        if (endDate.isBefore(startDate)) {
            alert('End date cannot be before start date');
            $(this).val(startDate.format('DD MMMM YYYY') + ' - ' + startDate.format('DD MMMM YYYY'));
        }
    });
});