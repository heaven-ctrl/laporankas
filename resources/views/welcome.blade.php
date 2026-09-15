<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Uang Kas RT 19</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            background: #f8fafc;
            color: #0f172a;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            height: 75px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 8%;
            background: white;
            border-bottom: 1px solid #e5e7eb;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
        }

        .logo h2 {
            font-size: 19px;
        }

        .logo p {
            font-size: 11px;
            color: #64748b;
        }

        .login-btn {
            text-decoration: none;
            background: #2563eb;
            color: white;
            padding: 11px 24px;
            border-radius: 9px;
            font-weight: 600;
            transition: 0.2s;
        }

        .login-btn:hover {
            background: #1d4ed8;
        }

        /* HERO */
        .hero {
            min-height: calc(100vh - 75px);
            padding: 70px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60px;
        }

        .hero-content {
            max-width: 600px;
        }

        .badge {
            display: inline-block;
            background: #dbeafe;
            color: #2563eb;
            padding: 8px 15px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 52px;
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .hero h1 span {
            color: #2563eb;
        }

        .hero p {
            color: #64748b;
            font-size: 17px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .hero-btn {
            display: inline-block;
            text-decoration: none;
            background: #2563eb;
            color: white;
            padding: 14px 28px;
            border-radius: 10px;
            font-weight: 600;
            transition: 0.2s;
        }

        .hero-btn:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        /* ILLUSTRATION */
        .illustration {
            width: 430px;
            height: 350px;
            position: relative;
        }

        .document {
            position: absolute;
            width: 280px;
            height: 330px;
            background: white;
            border-radius: 18px;
            right: 30px;
            top: 10px;
            padding: 28px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.12);
            transform: rotate(3deg);
        }

        .document-title {
            height: 18px;
            width: 150px;
            background: #2563eb;
            border-radius: 5px;
            margin-bottom: 25px;
        }

        .line {
            height: 10px;
            background: #e2e8f0;
            border-radius: 5px;
            margin-bottom: 14px;
        }

        .line.short {
            width: 65%;
        }

        .line.medium {
            width: 82%;
        }

        .chart {
            margin-top: 30px;
            height: 100px;
            display: flex;
            align-items: end;
            gap: 12px;
        }

        .bar {
            width: 30px;
            background: #2563eb;
            border-radius: 7px 7px 0 0;
        }

        .bar:nth-child(1) {
            height: 45px;
        }

        .bar:nth-child(2) {
            height: 70px;
        }

        .bar:nth-child(3) {
            height: 55px;
        }

        .bar:nth-child(4) {
            height: 90px;
        }

        .bar:nth-child(5) {
            height: 75px;
        }

        .coin {
            position: absolute;
            width: 65px;
            height: 65px;
            border-radius: 50%;
            background: #facc15;
            color: #854d0e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
            font-weight: bold;
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        .coin.one {
            left: 15px;
            top: 65px;
        }

        .coin.two {
            left: 65px;
            bottom: 25px;
            width: 50px;
            height: 50px;
            font-size: 21px;
        }

        /* FOOTER */
        footer {
            position: absolute;
            bottom: 20px;
            left: 0;
            width: 100%;
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
        }

        /* RESPONSIVE */
        @media (max-width: 850px) {
            .hero {
                flex-direction: column;
                text-align: center;
                padding-top: 50px;
            }

            .hero-content {
                max-width: 650px;
            }

            .illustration {
                transform: scale(0.85);
                margin-top: -30px;
            }

            .hero h1 {
                font-size: 40px;
            }
        }

        @media (max-width: 500px) {
            .navbar {
                padding: 0 5%;
            }

            .logo h2 {
                font-size: 16px;
            }

            .hero {
                padding: 45px 5%;
            }

            .illustration {
                transform: scale(0.65);
                margin-top: -70px;
                margin-bottom: -80px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div class="logo">

            <div class="logo-icon">
                K
            </div>

            <div>
                <h2>Kas RT 19</h2>
                <p>Sistem Informasi Kas</p>
            </div>

        </div>

        <a href="{{ route('login') }}" class="login-btn">
            Login
        </a>

    </nav>


    <!-- HERO -->
    <section class="hero">

        <div class="hero-content">

            <div class="badge">
                SISTEM LAPORAN UANG KAS
            </div>

            <h1>
                Laporan Uang Kas
                <span>RT 19</span>
            </h1>

            <p>
                Sistem informasi sederhana untuk membantu
                pengelolaan dan pencatatan uang kas RT 19
                secara lebih tertata, mudah, dan transparan.
            </p>

            <a href="{{ route('login') }}" class="hero-btn">
                Masuk ke Sistem →
            </a>

        </div>


        <!-- ILUSTRASI -->
        <div class="illustration">

            <div class="coin one">
                Rp
            </div>

            <div class="coin two">
                +
            </div>

            <div class="document">

                <div class="document-title"></div>

                <div class="line"></div>
                <div class="line medium"></div>
                <div class="line short"></div>

                <div class="chart">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>

            </div>

        </div>

    </section>


    <footer>
        © 2026 Sistem Laporan Uang Kas RT 19
    </footer>

</body>
</html>
