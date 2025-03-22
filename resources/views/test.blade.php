@extends('app')

@section('content')

     <div class="header">
        <a href="/" class="back-btn">
            <i class="fas fa-arrow-left"></i>
        </a>
        <span class="header-title">📝 Matematika Testi</span>
    </div>

    <!-- Test Oynasi -->
    <div class="container mt-4">

        <div class="card test-box mt-3">
            <div class="card-body">
                <h5 class="question-text">1. 25 + 75 = ?</h5>

                <ul class="list-group mt-3">
                    <li class="list-group-item option" onclick="selectOption(this)">90</li>
                    <li class="list-group-item option" onclick="selectOption(this)">100</li>
                    <li class="list-group-item option" onclick="selectOption(this)">110</li>
                    <li class="list-group-item option" onclick="selectOption(this)">125</li>
                </ul>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">⬅️ Ortga</a>
                    <button class="btn btn-success">Keyingi ➡️</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .test-box {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .question-text {
            font-size: 18px;
            font-weight: bold;
        }

        .option {
            cursor: pointer;
            transition: 0.3s;
        }

        .option:hover {
            background: #f8f9fa;
        }

        .option.selected {
            background: #28a745;
            color: white;
            font-weight: bold;
        }
    </style>

    <script>
        function selectOption(element) {
            // Oldin tanlangan variantni olib tashlaymiz
            document.querySelectorAll('.option').forEach(option => {
                option.classList.remove('selected');
            });

            // Yangi tanlangan variantga class qo‘shamiz
            element.classList.add('selected');
        }
    </script>

@endsection
