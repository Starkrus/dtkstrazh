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
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#productModal-{{ $product->id }}">
                            Просмотр
                        </button>

                        <!-- Модальное окно -->
                        <div class="modal fade" id="productModal-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel-{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="productModalLabel-{{ $product->id }}">{{ $product->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
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
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
