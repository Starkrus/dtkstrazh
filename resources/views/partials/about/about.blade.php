@include('partials.home.header')

{{-- Мета-теги для SEO --}}
@section('title', 'О компании | Производитель дульных тормозов-компенсаторов «Страж»')
@section('description', 'Мы — производители дульных тормозов-компенсаторов «Страж». Высокое качество, надежность и доставка по всей России. Подробнее о нашей миссии и ценностях.')

{{-- Микроразметка Schema.org --}}
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Производитель ДТКП «Страж»",
        "description": "Производство дульных тормозов-компенсаторов для АК-12, АК-74, СВД, Тигр, ПК/ПКМ.",
        "url": "https:/dtkstrazh.ru",
        "logo": ""https:/dtkstrazh.ru/build/images/logo.svg"",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+7 (922) 186-86-46",
            "contactType": "customer service",
            "email": "dtkstrazh@mail.ru",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "ул. Примерная, д. 123",
                "addressLocality": "Екатеринбург",
                "postalCode": "620000",
                "addressCountry": "RU"
            }
        }
    }
</script>

<section class="py-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-8">О нас</h1>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <p class="text-gray-700 mb-4">
                Мы — производители дульных тормозов-компенсаторов (ДТК) «Страж», специализирующиеся на создании высококачественного тактического снаряжения для профессионалов. Наша продукция, включая дульные тормоза для <strong>АК-12</strong>, <strong>АК-74</strong>, <strong>СВД</strong>, <strong>Тигр</strong> и <strong>ПК/ПКМ</strong>, соответствует самым высоким стандартам безопасности, надежности и эффективности.
            </p>

            <div class="grid md:grid-cols-2 gap-8 mt-8">
                <div>
                    <h2 class="text-xl font-semibold mb-4">Наша миссия</h2>
                    <p class="text-gray-600">
                        Мы стремимся обеспечивать профессионалов и энтузиастов стрелкового оружия высококачественными дульными тормозами-компенсаторами, которые повышают точность стрельбы, снижают отдачу и обеспечивают долговечность даже в экстремальных условиях.
                    </p>
                </div>
                <div>
                    <h2 class="text-xl font-semibold mb-4">Наши ценности</h2>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li><strong>Качество и надежность</strong> — используем только проверенные материалы, такие как нержавеющая сталь и алюминиевый сплав Д16Т.</li>
                        <li><strong>Инновации и развитие</strong> — постоянно совершенствуем наши технологии и продукцию.</li>
                        <li><strong>Профессионализм</strong> — каждый продукт проходит строгий контроль качества.</li>
                        <li><strong>Ответственность</strong> — гарантируем выполнение обязательств перед клиентами и партнерами.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Контакты</h2>
            <div class="space-y-2 text-gray-600">
                <p><strong>Телефон:</strong> +7 (922) 186-86-46</p>
                <p><strong>Email:</strong> dtkstrazh@mail.ru</p>
                <p><strong>Адрес:</strong> г. Екатеринбург</p>
            </div>
        </div>
    </div>
</section>

<footer class="mt-12">
    @include('partials.home.footer', [
        'companyName' => 'Military Equipment Store',
        'aboutText' => 'Мы специализируемся на производстве и продаже высококачественных дульных тормозов-компенсаторов «Страж».',
        'contactEmail' => 'info@military-store.ru',
    ])
</footer>
