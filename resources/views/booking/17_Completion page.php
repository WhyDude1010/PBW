<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
        }

        .container {
            background-color: white;
            width: 100%;
            max-width: 400px;
            min-height: 100vh;
            padding: 20px;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        /* Header */
        header {
            padding-top: 10px;
            position: absolute; /* Tetap di atas */
            top: 20px;
            left: 20px;
        }

        .back-btn {
            font-size: 24px;
            cursor: pointer;
            color: #333;
        }

        /* Main Content - Centered */
        .content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Menengahkan secara vertikal */
            align-items: center;     /* Menengahkan secara horizontal */
            text-align: center;
            padding: 0 40px;
            margin-top: -40px; /* Sedikit naik agar terlihat seimbang */
        }

        /* Heart Icon using SVG for precision */
        .heart-icon {
            margin-bottom: 30px;
        }

        /* Thank You Text */
        .content h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #000;
        }

        /* Description Text */
        .content p {
            font-size: 14px;
            color: #333;
            line-height: 1.5;
            font-weight: 400;
        }

    </style>
</head>
<body>

    <div class="container">
        <!-- Header -->
        <header>
            <div class="back-btn">←</div>
        </header>

        <!-- Main Content -->
        <main class="content">
            <!-- Ikon Hati SVG (Outline) -->
            <div class="heart-icon">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
            </div>

            <h2>Thank You!</h2>
            <p>Thank you for your booking. We appreciate your feedback to help us improve your experience.</p>
        </main>
    </div>

</body>
</html>