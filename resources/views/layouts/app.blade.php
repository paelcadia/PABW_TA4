<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <style>
        :root {
            color-scheme: light;
            --blue-900: #123b66;
            --blue-700: #1769aa;
            --blue-600: #2185d0;
            --blue-100: #e8f3fc;
            --blue-050: #f4f9fd;
            --text: #203449;
            --muted: #64788c;
            --border: #d8e6f1;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            color: var(--text);
            background: linear-gradient(180deg, var(--blue-050), #fff 45%);
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
        }

        header {
            padding: 30px 20px 24px;
            color: white;
            text-align: center;
            background: linear-gradient(135deg, var(--blue-900), var(--blue-600));
            box-shadow: 0 4px 16px rgb(18 59 102 / 18%);
        }

        header h1 {
            margin: 0 0 18px;
            font-size: clamp(1.8rem, 4vw, 2.4rem);
            letter-spacing: 0.02em;
        }

        nav {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        nav a {
            padding: 8px 16px;
            border: 1px solid rgb(255 255 255 / 45%);
            border-radius: 999px;
            text-decoration: none;
            color: white;
            font-size: 0.95rem;
            font-weight: 600;
            transition: background-color 160ms ease, color 160ms ease, transform 160ms ease;
        }

        nav a:hover,
        nav a:focus-visible {
            color: var(--blue-900);
            background-color: white;
            transform: translateY(-1px);
        }

        main {
            width: 100%;
            flex: 1;
            padding: 36px 20px;
        }

        .container {
            max-width: 860px;
            margin: 0 auto;
        }

        h2 {
            margin: 0 0 22px;
            color: var(--blue-900);
            font-size: clamp(1.45rem, 3vw, 1.85rem);
            line-height: 1.3;
        }

        h3 {
            margin: 0 0 12px;
            color: var(--blue-700);
        }

        .card {
            padding: 24px;
            margin-bottom: 18px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background-color: white;
            box-shadow: 0 8px 24px rgb(18 59 102 / 7%);
        }

        .card p {
            margin: 10px 0;
        }

        .card strong {
            color: var(--blue-900);
        }

        label {
            display: block;
            margin-bottom: 4px;
            color: var(--blue-900);
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            margin: 4px 0 18px;
            border: 1px solid #bfd2e2;
            border-radius: 8px;
            color: var(--text);
            background-color: #fcfeff;
            font: inherit;
            transition: border-color 160ms ease, box-shadow 160ms ease;
        }

        input::placeholder {
            color: #8a9cad;
        }

        input:focus {
            border-color: var(--blue-600);
            outline: none;
            box-shadow: 0 0 0 3px rgb(33 133 208 / 16%);
        }

        button {
            padding: 11px 20px;
            border: 0;
            border-radius: 8px;
            color: white;
            background: linear-gradient(135deg, var(--blue-700), var(--blue-600));
            font: inherit;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 12px rgb(23 105 170 / 20%);
            transition: box-shadow 160ms ease, transform 160ms ease;
        }

        button:hover,
        button:focus-visible {
            transform: translateY(-1px);
            box-shadow: 0 7px 16px rgb(23 105 170 / 28%);
        }

        .status {
            display: inline-block;
            padding: 3px 10px;
            border: 1px solid #c7e2f6;
            border-radius: 999px;
            color: var(--blue-700);
            background-color: var(--blue-100);
            font-weight: bold;
        }

        footer {
            padding: 17px 20px;
            color: #eaf5ff;
            background-color: var(--blue-900);
            text-align: center;
            font-size: 0.9rem;
        }

        @media (max-width: 600px) {
            header {
                padding: 24px 16px 20px;
            }

            main {
                padding: 26px 16px;
            }

            .card {
                padding: 19px;
            }

            nav {
                gap: 8px;
            }

            nav a {
                padding: 7px 12px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>

<header>
    <h1>LaporBanjir</h1>

    <nav>
        <a href="{{ route('lapor.form') }}">Form Laporan</a>
        <a href="{{ route('lapor.daftar') }}">Daftar Laporan</a>
    </nav>
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<footer>
    © 2025 LaporBanjir - Muhammad Rafael Arcadia Senjaya - 707012500119
</footer>

</body>
</html>