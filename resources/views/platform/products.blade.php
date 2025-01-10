@section('content')
    <div class="container">
        <h1>Список товаров</h1>
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
                <tr>
                    <td>
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50" height="50">
                        @else
                            <span class="text-muted">Нет изображения</span>
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }} ₽</td>
                    <td>{{ $product->quantity }}</td>
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
                    <div class="modal-dialog modal-xl"> <!-- Используем modal-xl для увеличения ширины -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel-{{ $product->id }}">{{ $product->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded">
                                        @else
                                            <span class="text-muted">Нет изображения</span>
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <p><strong>Калибр:</strong> {{ $product->caliber }}</p>
                                        <p><strong>Тип крепления:</strong> {{ $product->mount_type }}</p>
                                        <p><strong>Материал корпуса:</strong> {{ $product->body_material }}</p>
                                        <p><strong>Материал первой камеры:</strong> {{ $product->first_chamber_material }}</p>
                                        <p><strong>Количество камер:</strong> {{ $product->chamber_count }}</p>
                                        <p><strong>Снижение звукового давления:</strong> {{ $product->sound_reduction }}</p>
                                        <p><strong>Ресурс:</strong> {{ $product->lifespan }}</p>
                                        <p><strong>Покрытие:</strong> {{ $product->coating }}</p>
                                        <p><strong>Описание:</strong> {{ $product->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- Кнопка редактирования -->
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">
                                    Редактировать
                                </a>
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
