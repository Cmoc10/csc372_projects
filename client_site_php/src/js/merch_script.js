document.addEventListener('DOMContentLoaded', () => {
    const merchItems = document.querySelectorAll('.merch-item');
    const merchDetails = document.getElementById('merch-details');
    // ONLY CHANGE WHAT IS IN THE QUOTES
    // IF YOU ARE ADDING A NEW ITEM, COPY AND PAST AN OLD ITEM
    // AND CHANGE EVERYTHING IN THE QUOTES INCLUDING THE NAME
    const merchData = {
        'rush-shirt': {
            title: 'Spring \'25 Rush Shirt',
            description: 'Limited edition rush shirt featuring our chapter\'s latest design. Soft cotton blend, comfortable fit.',
            price: '$25.00',
            sizes: 'S, M, L, XL',
            details: 'Screen-printed AEPI logo, 100% cotton'
        },
        'classic-hoodie': {
            title: 'Classic AEPI Hoodie',
            description: 'Warm and cozy hoodie with embroidered chapter logo. Perfect for chilly nights.',
            price: '$45.00',
            sizes: 'S, M, L, XL, XXL',
            details: 'Heavyweight fleece, front pouch pocket'
        },
        'baseball-cap': {
            title: 'Baseball Cap',
            description: 'Adjustable baseball cap with our chapter\'s emblem. Great for sunny days.',
            price: '$20.00',
            sizes: 'One Size Fits All',
            details: 'Embroidered logo, cotton twill fabric'
        },
        'crew-socks': {
            title: 'Crew Socks',
            description: 'Comfortable crew socks with subtle AEPI branding. Adds style to any outfit.',
            price: '$15.00',
            sizes: 'One Size Fits Most',
            details: 'Cushioned sole, breathable material'
        }
    };
    //DO NOT EDIT BELOW THIS LINE
    merchItems.forEach(item => {
        item.addEventListener('click', () => {
            // Remove active state from all items
            merchItems.forEach(i => i.classList.remove('active'));
            
            // Add active state to clicked item
            item.classList.add('active');

            // Get item details
            const itemId = item.getAttribute('data-id');
            const details = merchData[itemId];

            // Update details section
            merchDetails.innerHTML = `
                <h2>${details.title}</h2>
                <img src="${item.querySelector('img').src}" alt="${details.title}" class="content-img">
                <p>${details.description}</p>
                <div class="merch-specs">
                    <p><strong>Price:</strong> ${details.price}</p>
                    <p><strong>Sizes:</strong> ${details.sizes}</p>
                    <p><strong>Details:</strong> ${details.details}</p>
                </div>
                <button id="contact_button">Add to Cart</button>
            `;
        });
    });
});