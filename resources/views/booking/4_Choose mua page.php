<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose MUA</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #fff;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 400px;
            min-height: 100vh;
            padding: 20px 10px;
            display: flex;
            flex-direction: column;
        }

        /* Title & Stepper */
        .header-title {
            text-align: center;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .stepper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            margin-bottom: 30px;
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
            background-color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 8px;
        }

        .step-item.active .step-circle {
            background-color: #c8967d;
        }

        .step-label {
            font-size: 11px;
            color: #333;
        }

        .stepper::before {
            content: '';
            position: absolute;
            top: 12px;
            left: 50px;
            right: 50px;
            height: 2px;
            background-color: #f2e1d9;
            z-index: 1;
        }

        /* Main Layout (Sidebar + Cards) */
        .main-content {
            display: flex;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        /* Sidebar Filter */
        .sidebar {
            width: 35%;
            padding-right: 10px;
            border-right: 1px solid #ddd;
        }

        .filter-title {
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 10px;
            text-align: center;
        }

        .filter-group {
            margin-bottom: 15px;
        }

        .filter-label {
            font-weight: 700;
            font-size: 13px;
            margin-bottom: 8px;
            display: block;
            text-align: center;
        }

        .divider {
            height: 1px;
            background-color: #ccc;
            margin: 10px 0;
        }

        select {
            width: 100%;
            padding: 5px;
            border: 1px solid #999;
            border-radius: 4px;
            font-size: 11px;
            background-color: white;
            margin-bottom: 10px;
        }

        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            font-size: 11px;
            gap: 5px;
        }

        .checkbox-item input {
            width: 14px;
            height: 14px;
        }

        /* Cards Area */
        .cards-area {
            width: 65%;
            padding-left: 15px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .mua-card {
            border: 1px solid #ddd;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .mua-card img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }

        .mua-info {
            padding: 10px;
        }

        .mua-name {
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .mua-style {
            font-size: 12px;
            color: #333;
            line-height: 1.3;
            margin-bottom: 12px;
        }

        .view-btn {
            width: 100%;
            padding: 8px;
            background-color: #ddd;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }

        /* Checkmark icon */
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
        <h2 class="header-title">Choose MUA</h2>

        <!-- Stepper -->
        <div class="stepper">
            <div class="step-item active">
                <div class="step-circle"><div class="check"></div></div>
                <div class="step-label">Booking</div>
            </div>
            <div class="step-item">
                <div class="step-circle"></div>
                <div class="step-label">Appointment</div>
            </div>
            <div class="step-item">
                <div class="step-circle"></div>
                <div class="step-label">Service</div>
            </div>
        </div>

        <div class="main-content">
            <!-- Sidebar Filter -->
            <aside class="sidebar">
                <div class="filter-title">Filter</div>
                <div class="divider"></div>
                
                <div class="filter-group">
                    <label class="filter-label">Type</label>
                    <select>
                        <option>Wedding</option>
                    </select>
                </div>
                
                <div class="divider"></div>

                <div class="filter-group">
                    <label class="filter-label">Location</label>
                    <select>
                        <option>Bali</option>
                    </select>
                </div>

                <div class="divider"></div>

                <div class="filter-group">
                    <label class="filter-label" style="text-align: left;">Style Make Up</label>
                    <div class="checkbox-group">
                        <label class="checkbox-item"><input type="checkbox"> Natural</label>
                        <label class="checkbox-item"><input type="checkbox"> Korean Dewy</label>
                        <label class="checkbox-item"><input type="checkbox"> Glam</label>
                        <label class="checkbox-item"><input type="checkbox"> Soft Glam</label>
                        <label class="checkbox-item"><input type="checkbox"> Latina</label>
                        <label class="checkbox-item"><input type="checkbox"> Bold Look</label>
                    </div>
                </div>
            </aside>

            <!-- MUA Cards Area -->
            <main class="cards-area">
                
                <!-- Card 1 -->
                <div class="mua-card">
                    <img src="https://i.ibb.co/9H0fW2D/makeup-tools.jpg" alt="makeup1.jpg">
                    <div class="mua-info">
                        <div class="mua-name">Sarah Wijaya</div>
                        <div class="mua-style">Style Make Up:<br>Bridal, Wedding</div>
                        <button class="view-btn">View Profile</button>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="mua-card">
                    <img src="https://i.ibb.co/9H0fW2D/makeup-tools.jpg" alt="makeup2.jpg">
                    <div class="mua-info">
                        <div class="mua-name">Sarah Wijaya</div>
                        <div class="mua-style">Style Make Up:<br>Bridal, Wedding</div>
                        <button class="view-btn">View Profile</button>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="mua-card">
                    <img src="https://i.ibb.co/9H0fW2D/makeup-tools.jpg" alt="makeup3.jpg">
                    <div class="mua-info">
                        <div class="mua-name">Sarah Wijaya</div>
                        <div class="mua-style">Style Make Up:<br>Bridal, Wedding</div>
                        <button class="view-btn">View Profile</button>
                    </div>
                </div>

            </main>
        </div>
    </div>

</body>
</html>