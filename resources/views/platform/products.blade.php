@extends('app')

@section('title', 'Список товаров')

@section('content')
    <div class="container">
        <!-- Таблица с товарами -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Изображение</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr data-product-id="{{ $product->id }}">
                    <td>
                        @if ($product->image)
                            <img src="{{ asset('storage/public/' . $product->image) }}" alt="{{ $product->name }}" width="200" height="100">
                        @else
                            <span class="text-muted">Нет изображения</span>
                        @endif
                    </td>
                    <td class="product-name">{{ $product->name }}</td>
                    <td class="product-price">{{ $product->price }} ₽</td>
                    <td class="product-quantity">{{ $product->quantity }}</td>
                    <td>
                        <!-- Кнопка для открытия модального окна -->
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#productModal-{{ $product->id }}">
                            Просмотр
                        </button>

                        <!-- Кнопка удаления -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите удалить этот товар?')">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Модальное окно -->
                <div class="modal fade" id="productModal-{{ $product->id }}" tabindex="-1" aria-labelledby="productModalLabel-{{ $product->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel-{{ $product->id }}">Редактирование: {{ $product->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Форма редактирования -->
                                <form id="editForm-{{ $product->id }}" method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if ($product->image)
                                                <img src="{{ asset('storage/public/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded">
                                            @else
                                                <span class="text-muted">Нет изображения</span>
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <!-- Название -->
                                            <div class="form-group">
                                                <label for="name-{{ $product->id }}">Название</label>
                                                <input type="text" name="name" id="name-{{ $product->id }}" class="form-control" value="{{ $product->name }}" required>
                                            </div>

                                            <!-- Калибр -->
                                            <div class="form-group">
                                                <label for="caliber-{{ $product->id }}">Калибр</label>
                                                <input type="text" name="caliber" id="caliber-{{ $product->id }}" class="form-control" value="{{ $product->caliber }}" required>
                                            </div>

                                            <!-- Тип крепления -->
                                            <div class="form-group">
                                                <label for="mount_type-{{ $product->id }}">Тип крепления</label>
                                                <input type="text" name="mount_type" id="mount_type-{{ $product->id }}" class="form-control" value="{{ $product->mount_type }}" required>
                                            </div>

                                            <!-- Материал корпуса -->
                                            <div class="form-group">
                                                <label for="body_material-{{ $product->id }}">Материал корпуса</label>
                                                <input type="text" name="body_material" id="body_material-{{ $product->id }}" class="form-control" value="{{ $product->body_material }}" required>
                                            </div>

                                            <!-- Материал первой камеры -->
                                            <div class="form-group">
                                                <label for="first_chamber_material-{{ $product->id }}">Материал первой камеры</label>
                                                <input type="text" name="first_chamber_material" id="first_chamber_material-{{ $product->id }}" class="form-control" value="{{ $product->first_chamber_material }}" required>
                                            </div>

                                            <!-- Количество камер -->
                                            <div class="form-group">
                                                <label for="chamber_count-{{ $product->id }}">Количество камер</label>
                                                <input type="number" name="chamber_count" id="chamber_count-{{ $product->id }}" class="form-control" value="{{ $product->chamber_count }}" required>
                                            </div>

                                            <!-- Снижение звукового давления -->
                                            <div class="form-group">
                                                <label for="sound_reduction-{{ $product->id }}">Снижение звукового давления</label>
                                                <input type="text" name="sound_reduction" id="sound_reduction-{{ $product->id }}" class="form-control" value="{{ $product->sound_reduction }}" required>
                                            </div>

                                            <!-- Ресурс -->
                                            <div class="form-group">
                                                <label for="lifespan-{{ $product->id }}">Ресурс</label>
                                                <input type="text" name="lifespan" id="lifespan-{{ $product->id }}" class="form-control" value="{{ $product->lifespan }}" required>
                                            </div>

                                            <!-- Покрытие -->
                                            <div class="form-group">
                                                <label for="coating-{{ $product->id }}">Покрытие</label>
                                                <input type="text" name="coating" id="coating-{{ $product->id }}" class="form-control" value="{{ $product->coating }}" required>
                                            </div>

                                            <!-- Описание -->
                                            <div class="form-group">
                                                <label for="description-{{ $product->id }}">Описание</label>
                                                <textarea name="description" id="description-{{ $product->id }}" class="form-control">{{ $product->description }}</textarea>
                                            </div>

                                            <!-- Цена -->
                                            <div class="form-group">
                                                <label for="price-{{ $product->id }}">Цена</label>
                                                <input type="number" name="price" id="price-{{ $product->id }}" class="form-control" value="{{ $product->price }}" step="0.01" required>
                                            </div>

                                            <!-- Количество -->
                                            <div class="form-group">
                                                <label for="quantity-{{ $product->id }}">Количество</label>
                                                <input type="number" name="quantity" id="quantity-{{ $product->id }}" class="form-control" value="{{ $product->quantity }}" required>
                                            </div>

                                            <!-- Изображение -->
                                            <div class="form-group">
                                                <label for="image-{{ $product->id }}">Изображение</label>
                                                <input type="file" name="image" id="image-{{ $product->id }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <!-- Кнопка для сохранения изменений -->
                                <button type="button" class="btn btn-primary" onclick="saveChanges({{ $product->id }})">Сохранить</button>
                                <!-- Кнопка закрытия -->
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        function saveChanges(productId) {
            const form = document.getElementById(`editForm-${productId}`);
            if (!form) {
                console.error('Форма не найдена.');
                return;
            }

            const formData = new FormData(form);

            // CSRF-токен
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            if (!csrfToken) {
                console.error('CSRF-токен не найден.');
                return;
            }

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest',
                },
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP Error: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Обновляем данные в таблице
                        updateProductRow(productId, data.product);

                        // Закрываем модальное окно вручную
                        const modal = document.getElementById(`productModal-${productId}`);
                        if (modal) {
                            modal.classList.remove('show');
                            modal.style.display = 'none';

                            // Удаляем затемнение (backdrop)
                            const backdrop = document.querySelector('.modal-backdrop');
                            if (backdrop) {
                                backdrop.remove();
                            }

                            // Убираем блокировку прокрутки
                            document.body.classList.remove('modal-open');
                            document.body.style.overflow = '';
                        }
                    } else {
                        alert(data.message || 'Ошибка при обновлении.');
                    }
                })
                .catch(error => {
                    console.error('Ошибка:', error);
                    alert('Произошла ошибка при отправке данных.');
                });
        }
        function updateProductRow(productId, productData) {
            const row = document.querySelector(`tr[data-product-id="${productId}"]`);
            if (row) {
                row.querySelector('.product-name').textContent = productData.name;
                row.querySelector('.product-price').textContent = `${productData.price} ₽`;
                row.querySelector('.product-quantity').textContent = productData.quantity;

                // Обновляем изображение
                const imageCell = row.querySelector('td img');
                if (imageCell) {
                    imageCell.src = productData.image ? `{{ asset('storage') }}/${productData.image}` : '';
                }
            }
        }
    </script>
@endpush
