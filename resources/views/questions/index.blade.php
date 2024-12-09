@extends('layouts.app')
@section('content')
  
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - E-shop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .faq-item {
            background-color: #fafafa;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            cursor: pointer;
        }

        .faq-item h4 {
            margin: 0;
            font-size: 1.2em;
            font-weight: bold;
        }

        .faq-item p {
            margin: 10px 0 0;
            display: none; /* Skrytí odpovědi na začátku */
        }

        .faq-item.open p {
            display: block; /* Odpověď se zobrazí po kliknutí */
        }
    </style>
</head>

<body>
    
    <div class="container">
        <h1>Často kladené otázky</h1>

        <div class="faq-item">
            <h4>Jak si mohu objednat produkt?</h4>
            <p>Stačí přidat produkt do košíku a dokončit objednávku na pokladně.</p>
        </div>

        <div class="faq-item">
            <h4>Jaké způsoby platby podporujete?</h4>
            <p>Přijímáme platby kartou, bankovním převodem a na dobírku.</p>
        </div>

        <div class="faq-item">
            <h4>Doručujete do zahraničí?</h4>
            <p>Ano, nabízíme doručení do většiny evropských zemí.</p>
        </div>

        <div class="faq-item">
            <h4>Jak mohu změnit nebo zrušit objednávku?</h4>
            <p>Pokud chcete změnit nebo zrušit objednávku, kontaktujte nás co nejdříve.</p>
        </div>

        <div class="faq-item">
            <h4>Jak mohu sledovat svou objednávku?</h4>
            <p>Sledovací číslo Vám zašleme na e-mail, jakmile bude zásilka odeslána.</p>
        </div>
    </div>
    

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Získáme všechny FAQ položky
            const faqItems = document.querySelectorAll('.faq-item');

            // Přidáme událost kliknutí pro každý FAQ
            faqItems.forEach(item => {
                item.addEventListener('click', function () {
                    // Přepneme třídu 'open', aby se odpověď zobrazila/skryla
                    this.classList.toggle('open');
                });
            });
        });
    </script>
    @include('components.contact-form')
</body>
</html>


@endsection