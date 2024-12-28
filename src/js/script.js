const products = document.querySelectorAll('.product');

products.forEach(product => {
    product.addEventListener('click', () => {
        product.classList.add('clicked');
        setTimeout(() => {
            product.classList.remove('clicked');
        }, 200);

        const name = product.getAttribute('data-name');
        const price = product.getAttribute('data-price');
        const order = {
            name: name,
            price: price
        };

        // Send the order to the PHP script to write to the CSV file
        fetch('php/order.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(order)
        })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error(error));
    });
});
