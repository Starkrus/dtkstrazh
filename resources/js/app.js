import './bootstrap';

function saveChanges(productId) {
    const form = document.getElementById(`editForm-${productId}`);
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
        },
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Обновляем данные на странице без перезагрузки
                updateProductRow(productId, data.product);
                // Закрываем модальное окно
                bootstrap.Modal.getInstance(document.getElementById(`productModal-${productId}`)).hide();
                alert('Товар успешно обновлен!');
            } else {
                alert('Ошибка при обновлении товара.');
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
        });
}

function updateProductRow(productId, productData) {
    // Обновляем строку в таблице
    const row = document.querySelector(`tr[data-product-id="${productId}"]`);
    if (row) {
        row.querySelector('td:nth-child(2)').textContent = productData.name; // Название
        row.querySelector('td:nth-child(3)').textContent = productData.price; // Цена
        row.querySelector('td:nth-child(4)').textContent = productData.quantity; // Количество
    }
}
