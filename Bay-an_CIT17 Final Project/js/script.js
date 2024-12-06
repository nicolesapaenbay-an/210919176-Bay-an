// Get the services grid element
const servicesGrid = document.querySelector('.services-grid');

// Fetch services data using AJAX
fetch('services.php')
    .then(response => response.json())
    .then(services => {
        // Iterate through the services array
        services.forEach(service => {
            // Create a service card element
            const serviceCard = document.createElement('div');
            serviceCard.classList.add('service-card');
            serviceCard.innerHTML = `
                <h3>${service.service_name}</h3>
                <p>${service.description}</p>
                <p>Duration: ${service.duration} minutes</p>
                <p>Price: $${service.price}</p>
                <a href="booking.php?service_id=${service.service_id}" class="btn">Book Now</a>
            `;
            // Append the service card to the grid
            servicesGrid.appendChild(serviceCard);
        });
    })
    .catch(error => {
        console.error('Error fetching services:', error);
    });

// ... (Add code for other functionalities like testimonial slider, date/time picker, form validation)