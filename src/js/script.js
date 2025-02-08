let orderCount = localStorage.getItem('orderCount') 
    ? parseInt(localStorage.getItem('orderCount')) 
    : 0;

document.getElementById('counter').innerHTML = orderCount;

function zoomanimation(animItem) {
    // Add the animation class to the item
    animItem.classList.add('item-animate');

    // Remove the animation class after the animation duration (300ms)
    setTimeout(() => {
        animItem.classList.remove('item-animate');
    }, 300); // Match the duration in your CSS transition
}

function updateQuantity(button, change) {
    const itemDiv = button.parentElement;
    const quantitySpan = itemDiv.querySelector('.quantity');
    const parentItem = itemDiv.closest('.item');
    let quantity = parseInt(quantitySpan.textContent);

    // Update the quantity, ensuring it doesn't go below 0
    quantity = Math.max(0, quantity + change);
    quantitySpan.textContent = quantity;

    zoomanimation(parentItem);
}

function showLastOrders() {
    fetch('../php/show_last_orders.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
    })
        .then(response => response.json())
        .then(data => {
            document.getElementById('order-summary').innerHTML = `${data.message}`;
        })
        .catch(err => {
            console.error(err);
            alert('An error occurred while getting previous orders.');
        });
}

function submitOrder() {
    zoomanimation(document.getElementById("submit"));

    const items = document.querySelectorAll('#items .item');
    const orders = [];
    let priceSum = 0.0;

    items.forEach(itemDiv => {
        const quantitySpan = itemDiv.querySelector('.quantity');
        const quantity = parseInt(quantitySpan.textContent);
        if (quantity > 0) {
            orders.push({
                item: itemDiv.getAttribute('data-item'),
                price: parseFloat(itemDiv.getAttribute('data-price')),
                quantity: quantity
            });
            quantitySpan.textContent = 0;
            priceSum += quantity * parseFloat(itemDiv.getAttribute('data-price'));
        }
    });

    if (orders.length === 0) {
        alert('No items selected!');
        return;
    }

    // Increment and store the updated order count in localStorage
    orderCount++;
    localStorage.setItem('orderCount', orderCount);

    const orderData = {
        order_id: orderCount,
        orders: orders
    };

    fetch('../php/submit_order.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(orderData)
    })
        .then(response => response.json())
        .then(data => {
            console.log(`${data.message}`);
        })
        .catch(err => {
            console.error(err);
            alert('An error occurred while submitting the order.');
        });
    showLastOrders();
    document.getElementById('counter').innerHTML = orderCount;
    document.getElementById('sum').innerHTML = priceSum;
}

function removeLastOrder() {
    zoomanimation(document.getElementById("submit"));

    if(!confirm("Letzte Bestellung zurücksetzen?")) {
        return 1;
    }

    fetch('../php/take_back_last_order.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
    })
        .then(data => {
            console.log(`${data.message}`);
        })
        .catch(err => {
            console.error(err);
            alert('An error occurred while removing the last order order.');
        });
    showLastOrders();
}

function clearCounter() {
    zoomanimation(document.getElementById("clearCounter"));

    if(!confirm("Kundinnenzähler zurücksetzen?")) {
        return 1;
    }

    orderCount = 0;
    localStorage.setItem('orderCount', "0");
    document.getElementById('counter').innerHTML = orderCount;
}
