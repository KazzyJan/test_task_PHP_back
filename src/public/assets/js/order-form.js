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
                const currentPage = new URLSearchParams(window.location.search).get('page') || 1;
                const ordersList = document.querySelector('ul');
                if (ordersList) {
                    if (ordersList.children.length < 10 || currentPage == 1) {
                        const newOrder = document.createElement('li');
                        newOrder.innerHTML = `<a href="/orders/${data.order.id}">Заказ #${data.order.id} - ${data.order.description}</a>`;
                        ordersList.appendChild(newOrder);
                    }
                }


                const totalPages = data.totalPages;

                updatePagination(totalPages);

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

function updatePagination(totalPages) {
    const paginationContainer = document.querySelector('.pagination ul');
    if (paginationContainer) {
        paginationContainer.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const pageItem = document.createElement('li');
            const pageLink = document.createElement('a');
            pageLink.href = `/orders?page=${i}`;
            pageLink.textContent = i;
            pageItem.appendChild(pageLink);
            paginationContainer.appendChild(pageItem);
        }
    }
}
