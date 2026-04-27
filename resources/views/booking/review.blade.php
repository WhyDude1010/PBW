<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating and Review</title>
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
            margin-bottom: 30px;
        }

        .content h4 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        /* Stars Rating */
        .stars-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 40px;
        }

        .star {
            color: #f1c40f; /* Warna kuning bintang */
            font-size: 35px;
        }

        /* Feedback Section */
        .feedback-section {
            text-align: left;
            padding: 0 5px;
        }

        .feedback-section label {
            display: block;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        textarea {
            width: 100%;
            height: 180px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            font-size: 14px;
            resize: none;
            color: #333;
            outline: none;
        }

        textarea::placeholder {
            color: #bbb;
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

        .okay-btn {
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

        /* Icon centang untuk stepper */
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
            <h3>Rating & Review</h3>
            
            <h4>Leave Your Rating</h4>
            
            <!-- Stars -->
            <div class="stars-container">
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
            </div>

            <!-- Feedback -->
            <div class="feedback-section">
                <label>Feedback</label>
                <textarea placeholder="Leave your experience about your own MUA experience"></textarea>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="divider"></div>
            <button class="okay-btn">Okay</button>
        </div>
    </div>

</body>
</html>