document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.project-details-favorite-btn').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // biar enggak default

            if (isAuthenticated) {
                const projectId = button.getAttribute('data-project-id');
                const icon = button.querySelector('i, svg');

                console.log('Button clicked:', button);
                console.log('Icon element:', icon);

                fetch(favoriteRoute, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ project_id: projectId })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Response data:', data);
                    if (icon) {
                        if (data.status === 'added') {
                            icon.classList.remove('text-muted');
                            icon.classList.add('text-warning');
                        } else {
                            icon.classList.remove('text-warning');
                            icon.classList.add('text-muted');
                        }
                    } else {
                        console.error('Icon element not found for button:', button);
                    }
                })
                .catch(error => console.error('Error:', error));
            } else {
                alert('You need to be logged in to add to favorites.');
            }
        });
    });
});
