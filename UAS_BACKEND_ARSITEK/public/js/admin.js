$(document).ready(function () {
    $('#time_taken').daterangepicker({
        locale: {
            format: 'DD MMMM YYYY'
        },
        opens: 'left',
        showDropdowns: true
    });

    // insialisasi data range
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

    // validasi tanggal range untuk main input
    $('#time_taken').on('apply.daterangepicker', function (ev, picker) {
        var startDate = picker.startDate;
        var endDate = picker.endDate;

        if (endDate.isBefore(startDate)) {
            alert('End date cannot be before start date');
            $(this).val(startDate.format('DD MMMM YYYY') + ' - ' + startDate.format('DD MMMM YYYY'));
        }
    });
});

// validasi image files dan article link sebelum submit ke form
function validateForm(event) {
    const form = event.target;
    const fileInputs = form.querySelectorAll('input[type="file"]');
    const urlInput = form.querySelector('input[name="article_link"]');
    let valid = true;
    let errorMessage = '';

    // validasi image files
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

    // validasi url
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

    // Subkategori dinamis berdasarkan kategori utama
    document.addEventListener('DOMContentLoaded', function () {
        const mainCategorySelect = document.querySelectorAll('[id^="main_category_"]');
        const subCategorySelect = document.querySelectorAll('[id^="sub_category_select"]');

        mainCategorySelect.forEach(mainCategory => {
            mainCategory.addEventListener('change', function () {
                const selectedMainCategory = this.value;
                subCategorySelect.forEach(subCategory => {
                    const options = subCategory.querySelectorAll('option');
                    options.forEach(option => {
                        if (option.getAttribute('data-main-category') === selectedMainCategory || option.value === '') {
                            option.style.display = 'block';
                        } else {
                            option.style.display = 'none';
                        }
                    });
                    subCategory.value = ''; // Reset pilihan subkategori
                });
            });

            // Memicu event change untuk memfilter subkategori saat halaman dimuat
            mainCategory.dispatchEvent(new Event('change'));
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Ambil tab aktif dari localStorage
        let activeTab = localStorage.getItem('activeTab');

        // Kalau ada tab yang tersimpan, aktifkan
        if (activeTab) {
            const tab = document.querySelector(`[href="#${activeTab}"]`);
            if (tab) {
                tab.click();
            }
        }

        // Simpan tab aktif ke localStorage saat diklik
        document.querySelectorAll('.nav-link').forEach(tab => {
            tab.addEventListener('click', function () {
                localStorage.setItem('activeTab', this.getAttribute('href').substring(1));
            });
        });
    });