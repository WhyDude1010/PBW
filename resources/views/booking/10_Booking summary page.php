<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Summary</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        /* Custom Colors */
        .bg-terracotta { background-color: #C19A84; }
        .text-terracotta { color: #C19A84; }
        .border-terracotta { border-color: #C19A84; }
        .bg-cream { background-color: #F5E9E2; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-start md:items-center">

    <!-- Mobile Container -->
    <div class="bg-white w-full max-w-md min-h-screen md:min-h-[700px] md:rounded-[40px] md:shadow-2xl overflow-hidden flex flex-col relative px-6 py-8">
        
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <button class="p-2 -ml-2">
                <!-- Back Arrow Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </button>
            <h1 class="text-xl font-bold text-gray-800">Booking Summary</h1>
            <div class="w-6"></div> <!-- Spacer -->
        </div>

        <!-- Progress Bar -->
        <div class="relative flex justify-between items-center mb-10 px-4">
            <!-- Line Background -->
            <div class="absolute top-1/3 left-0 w-full h-[2px] bg-gray-200 z-0"></div>
            <!-- Progress Line (Active) -->
            <div class="absolute top-1/3 left-0 w-1/2 h-[2px] bg-terracotta z-0"></div>

            <!-- Step 1: Booking -->
            <div class="relative z-10 flex flex-col items-center">
                <div class="bg-terracotta w-7 h-7 rounded-full flex items-center justify-center border-2 border-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <span class="text-xs font-semibold mt-2 text-gray-600">Booking</span>
            </div>

            <!-- Step 2: Appointment -->
            <div class="relative z-10 flex flex-col items-center">
                <div class="bg-terracotta w-7 h-7 rounded-full flex items-center justify-center border-2 border-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <span class="text-xs font-semibold mt-2 text-gray-600">Appointment</span>
            </div>

            <!-- Step 3: Service -->
            <div class="relative z-10 flex flex-col items-center">
                <div class="bg-gray-300 w-7 h-7 rounded-full flex items-center justify-center border-2 border-white shadow-sm">
                </div>
                <span class="text-xs font-semibold mt-2 text-gray-400">Service</span>
            </div>
        </div>

        <!-- Status Pending -->
        <div class="text-center mb-8">
            <span class="bg-yellow-50 text-yellow-500 font-bold text-lg px-4 py-1 rounded tracking-widest inline-block mb-3">PENDING</span>
            <p class="text-sm text-gray-600 px-6 leading-relaxed">
                Complete payment within 24 hours to confirm your booking. Unpaid bookings will be canceled automatically.
            </p>
        </div>

        <!-- Down Payment Box -->
        <div class="bg-cream rounded-2xl p-6 mb-8">
            <div class="text-center mb-6">
                <h2 class="font-bold text-gray-800">Down Payment (DP)</h2>
                <p class="text-sm font-bold text-gray-800">Complete your payment within 24 hours</p>
            </div>

            <div class="space-y-4">
                <!-- Option: Bank Transfer -->
                <label class="flex items-center justify-between cursor-pointer group">
                    <span class="font-bold text-gray-800">Bank Transfer</span>
                    <input type="radio" name="payment" class="w-6 h-6 border-2 border-gray-300 rounded-full appearance-none checked:bg-gray-300 transition-all">
                </label>
                <!-- Option: Credit Card -->
                <label class="flex items-center justify-between cursor-pointer group">
                    <span class="font-bold text-gray-800">Credit Card</span>
                    <input type="radio" name="payment" class="w-6 h-6 border-2 border-gray-300 rounded-full appearance-none checked:bg-gray-300 transition-all">
                </label>
            </div>
        </div>

        <!-- Information Info -->
        <div class="flex items-start gap-3 mb-10 px-1">
            <div class="mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <p class="text-xs text-gray-500 leading-tight">
                Choose a payment method. Confirmation is automatic after payment.
            </p>
        </div>

        <!-- Button Next -->
        <div class="mt-auto pb-4">
            <button class="bg-terracotta hover:opacity-90 transition-opacity w-full py-4 rounded-xl text-white font-bold text-lg shadow-lg">
                Next
            </button>
        </div>

    </div>

</body>
</html>