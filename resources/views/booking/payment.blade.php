<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paid Complete</title>
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
        }

        /* Header */
        header {
            margin-bottom: 40px;
            padding-top: 10px;
        }

        .back-btn {
            font-size: 24px;
            cursor: pointer;
            width: fit-content;
        }

        /* Stepper - Semua Tahap Selesai */
        .stepper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            margin-bottom: 40px;
            padding: 0 10px;
        }

        .step-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 2;
            flex: 1;
        }

        .step-circle {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background-color: #c8967d;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 8px;
        }

        .step-label {
            font-size: 11px;
            color: #333;
            font-weight: 500;
        }

        .stepper::before {
            content: '';
            position: absolute;
            top: 13px;
            left: 15%;
            right: 15%;
            height: 2px;
            background-color: #e0bba8;
            z-index: 1;
        }

        /* Content Area */
        .content {
            text-align: center;
            flex-grow: 1;
        }

        .content h3 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        /* Success Card */
        .success-card {
            background-color: #effaf1; /* Hijau sangat muda */
            border-radius: 15px;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Lingkaran Centang Besar */
        .check-circle-large {
            width: 70px;
            height: 70px;
            background-color: #2ecc71; /* Hijau cerah */
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .big-check {
            width: 25px;
            height: 15px;
            border-left: 5px solid white;
            border-bottom: 5px solid white;
            transform: rotate(-45deg);
            margin-top: -5px;
        }

        .success-card h4 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .card-divider {
            width: 100%;
            height: 1px;
            background-color: #d0e5d5;
            margin-bottom: 15px;
        }

        .success-card p {
            font-size: 14px;
            color: #444;
            line-height: 1.5;
            padding: 0 10px;
        }

        /* Footer */
        .footer {
            margin-top: auto;
            padding-bottom: 10px;
        }

        .divider {
            height: 1px;
            background-color: #ddd;
            margin-bottom: 25px;
        }

        .next-btn {
            background-color: #c8967d;
            color: white;
            border: none;
            width: 100%;
            padding: 16px;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
        }

        /* Icon centang kecil untuk stepper */
        .check {
            width: 9px;
            height: 5px;
            border-left: 2px solid white;
            border-bottom: 2px solid white;
            transform: rotate(-45deg);
            margin-bottom: 2px;
        }
    </style>
</head>
<body>

    <div class="container">
        <header>
            <div class="back-btn">←</div>
        </header>

        <!-- Stepper -->
        <div class="stepper">
            <div class="step-item">
                <div class="step-circle"><div class="check"></div></div>
                <div class="step-label">Booking</div>
            </div>
            <div class="step-item">
                <div class="step-circle"><div class="check"></div></div>
                <div class="step-label">Appointment</div>
            </div>
            <div class="step-item">
                <div class="step-circle"><div class="check"></div></div>
                <div class="step-label">Service</div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <h3>Paid Complete</h3>

            <div class="success-card">
                <!-- Ikon Centang Besar -->
                <div class="check-circle-large">
                    <div class="big-check"></div>
                </div>

                <h4>All Set</h4>
                
                <div class="card-divider"></div>
                
                <p>Your session is complete. We hope you enjoyed the experience.</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="divider"></div>
            <button class="next-btn">Next</button>
        </div>
    </div>

</body>
</html>