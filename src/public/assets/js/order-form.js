document.getElementById('order-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch('/orders/add', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const ordersList = document.querySelector('ul');
                if (ordersList) {
                    const newOrder = document.createElement('li');
                    newOrder.innerHTML = `<a href="/orders/${data.order.id}">
                    Заказ #${data.order.id} - ${data.order.description}
                </a>`;
                    ordersList.appendChild(newOrder);
                } else {
                    const newList = document.createElement('ul');
                    const newOrder = document.createElement('li');
                    newOrder.innerHTML = `<a href="/orders/${data.order.id}">
                    Заказ #${data.order.id} - ${data.order.description}
                </a>`;
                    newList.appendChild(newOrder);
                    document.body.insertBefore(newList, document.querySelector('.order-form'));
                }
                this.reset();
            } else {
                alert('Ошибка: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
            alert('Произошла ошибка при добавлении заказа.');
        });
});