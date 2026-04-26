<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Tracking</title>
    <!-- Menggunakan font Inter agar terlihat modern -->
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
            align-items: flex-start;
            min-height: 100vh;
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
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .back-btn {
            font-size: 24px;
            cursor: pointer;
            margin-right: auto;
        }

        header h2 {
            font-size: 20px;
            font-weight: 700;
            flex-grow: 1;
            text-align: center;
            margin-right: 24px; /* offset back-btn */
        }

        /* Stepper */
        .stepper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            margin-bottom: 40px;
            padding: 0 20px;
        }

        .step-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 2;
            flex: 1;
        }

        .step-circle {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: #ddd;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .step-item.active .step-circle {
            background-color: #c8967d;
        }

        .step-label {
            font-size: 12px;
            color: #333;
        }

        /* Garis antar step */
        .stepper::before {
            content: '';
            position: absolute;
            top: 12px;
            left: 50px;
            right: 50px;
            height: 2px;
            background-color: #c8967d;
            z-index: 1;
        }

        /* Content Area */
        .content {
            text-align: center;
            flex-grow: 1;
        }

        .content h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .content p {
            font-size: 14px;
            color: #555;
            line-height: 1.5;
            margin-bottom: 30px;
            padding: 0 20px;
        }

        /* Timer Card */
        .timer-card {
            background-color: #f5e9e2;
            border-radius: 15px;
            padding: 30px 20px;
            margin-bottom: 20px;
        }

        .timer-card h4 {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .timer-display {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }

        .timer-label {
            font-size: 16px;
            color: #333;
        }

        /* Footer Section */
        .footer {
            margin-top: auto;
            padding-bottom: 10px;
        }

        .divider {
            height: 1px;
            background-color: #eee;
            margin-bottom: 15px;
        }

        .info-box {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .info-icon {
            background-color: white;
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
            margin-top: 2px;
        }

        .info-text {
            font-size: 13px;
            color: #333;
            line-height: 1.4;
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

        /* Icon checkmark */
        .check {
            width: 10px;
            height: 6px;
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
            <h2>Service Tracking</h2>
        </header>

        <!-- Stepper -->
        <div class="stepper">
            <div class="step-item active">
                <div class="step-circle"><div class="check"></div></div>
                <div class="step-label">Booking</div>
            </div>
            <div class="step-item active">
                <div class="step-circle"><div class="check"></div></div>
                <div class="step-label">Appointment</div>
            </div>
            <div class="step-item">
                <div class="step-circle"></div>
                <div class="step-label">Service</div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <h3>Service in Progress</h3>
            <p>Your makeup artist is on the way. Please be ready at the scheduled time.</p>

            <div class="timer-card">
                <h4>Time remaining</h4>
                <div class="timer-display">00 : 10 : 00</div>
                <div class="timer-label">until artist coming</div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="divider"></div>
            <div class="info-box">
                <div class="info-icon">i</div>
                <p class="info-text">Payment confirmed. Late arrival will be auto-canceled.</p>
            </div>
            <button class="next-btn">Next</button>
        </div>
    </div>

</body>
</html>