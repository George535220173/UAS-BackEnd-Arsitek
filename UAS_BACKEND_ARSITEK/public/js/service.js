document.addEventListener('DOMContentLoaded', function() {
    const serviceItems = document.querySelectorAll('#services-list li');

    serviceItems.forEach(item => {
        item.addEventListener('click', function() {
            serviceItems.forEach(i => i.classList.remove('active'));
            this.classList.add('active');
            // Logic to update service details can be added here
        });
    });
});
