<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Done - Payment</title>
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

        /* Stepper - Semua Aktif */
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
            background-color: #c8967d; /* Warna cokelat aktif */
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

        /* Garis antar step penuh */
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
            margin-bottom: 12px;
        }

        .content p {
            font-size: 14px;
            color: #555;
            line-height: 1.4;
            margin-bottom: 35px;
            padding: 0 30px;
        }

        /* Payment Card */
        .payment-card {
            background-color: #f5e9e2;
            border-radius: 15px;
            padding: 25px 20px;
            text-align: left;
        }

        .payment-card h4 {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #000;
        }

        .payment-option {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .payment-option:last-child {
            margin-bottom: 0;
        }

        .option-label {
            font-size: 16px;
            font-weight: 700;
            color: #000;
        }

        /* Radio Button Palsu */
        .radio-circle {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background-color: #d9d9d9;
            cursor: pointer;
        }

        /* Footer Section */
        .footer {
            margin-top: auto;
            padding-bottom: 10px;
        }

        .divider {
            height: 1px;
            background-color: #ddd;
            margin-bottom: 15px;
        }

        .info-box {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .info-icon {
            border: 1.5px solid black;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
            font-weight: bold;
            margin-right: 10px;
            flex-shrink: 0;
        }

        .info-text {
            font-size: 13px;
            color: #333;
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

        /* Icon checkmark putih */
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
        <!-- Header -->
        <header>
            <div class="back-btn">←</div>
        </header>

        <!-- Stepper (Semua tahap sudah selesai) -->
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
            <h3>Service is Done</h3>
            <p>Your makeup artist is done its job. Please complete the final payment</p>

            <!-- Payment Card -->
            <div class="payment-card">
                <h4>Complete your payment within 24 hours</h4>
                
                <div class="payment-option">
                    <span class="option-label">Bank Transfer</span>
                    <div class="radio-circle"></div>
                </div>

                <div class="payment-option">
                    <span class="option-label">Credit Card</span>
                    <div class="radio-circle"></div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="divider"></div>
            <div class="info-box">
                <div class="info-icon">i</div>
                <p class="info-text">Awaiting your last payment</p>
            </div>
            <button class="next-btn">Next</button>
        </div>
    </div>

</body>
</html>