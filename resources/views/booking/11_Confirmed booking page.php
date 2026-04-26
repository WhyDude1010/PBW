<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Summary - Confirmed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-inter {
            font-family: 'Inter', sans-serif;
        }
        /* Custom Colors */
        .bg-terracotta { background-color: #C19A84; }
        .bg-confirmed-green { background-color: #C1FBC1; }
        .text-confirmed-dark { color: #1E5128; }
        .bg-tips-cream { background-color: #F2E3D5; }
    </style>
</head>
<body class="bg-gray-50 flex justify-center items-center min-h-screen">

    <!-- Mobile Container -->
    <div class="bg-white w-full max-w-md min-h-screen shadow-lg flex flex-col relative">
        
        <!-- Header Section -->
        <div class="px-6 pt-8 flex items-center">
            <button class="mr-4">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <h1 class="text-xl font-bold flex-1 text-center mr-8">Booking Summary</h1>
        </div>

        <!-- Progress Bar Section -->
        <div class="px-10 mt-8 relative">
            <div class="flex justify-between items-center relative z-10">
                <!-- Step 1 Checked -->
                <div class="flex flex-col items-center">
                    <div class="w-7 h-7 rounded-full bg-terracotta flex items-center justify-center border-2 border-white shadow-sm">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 3L4.5 8.5L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold mt-2 text-gray-700">Booking</span>
                </div>
                <!-- Step 2 Checked -->
                <div class="flex flex-col items-center">
                    <div class="w-7 h-7 rounded-full bg-terracotta flex items-center justify-center border-2 border-white shadow-sm">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 3L4.5 8.5L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold mt-2 text-gray-700">Appointment</span>
                </div>
                <!-- Step 3 Inactive -->
                <div class="flex flex-col items-center">
                    <div class="w-7 h-7 rounded-full bg-gray-300 border-2 border-white shadow-sm"></div>
                    <span class="text-[10px] font-bold mt-2 text-gray-400">Service</span>
                </div>
            </div>
            <!-- Progress Line Background -->
            <div class="absolute top-3.5 left-14 right-14 h-[2px] bg-gray-100 -z-0"></div>
            <!-- Progress Line Active -->
            <div class="absolute top-3.5 left-14 w-[35%] h-[2px] bg-terracotta -z-0"></div>
        </div>

        <!-- Status & Description Section -->
        <div class="mt-10 px-6 flex flex-col items-center">
            
            <!-- CONFIRMED Badge - SEKARANG BENAR-BENAR DI TENGAH -->
            <div class="bg-confirmed-green text-confirmed-dark font-inter flex items-center justify-center rounded-[2px] mb-4" 
                 style="width: 108px; height: 22px; font-weight: 700; font-size: 12px; line-height: 100%;">
                CONFIRMED
            </div>

            <p class="text-center text-gray-800 text-[13px] leading-relaxed px-4">
                Your booking has been confirmed. Please arrive on time for your scheduled appointment.
            </p>
        </div>

        <!-- Tips Box -->
        <div class="mx-6 mt-8 bg-tips-cream p-5 rounded-2xl flex gap-3 items-start">
            <div class="mt-0.5">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-700">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="16" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                </svg>
            </div>
            <div>
                <h4 class="font-bold text-[14px] text-gray-800 mb-1">Tips</h4>
                <p class="text-[12px] text-gray-700 leading-snug">
                    Bookings will be automatically canceled if payment is not completed before the deadline.
                </p>
            </div>
        </div>

        <!-- Detail Status List -->
        <div class="mx-6 mt-8 space-y-5">
            <div class="flex justify-between items-center">
                <span class="text-[14px] font-bold text-gray-800">Status</span>
                <span class="text-[14px] font-bold text-gray-900">CONFIRMED</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-[14px] font-bold text-gray-800">Service Fee</span>
                <span class="text-[14px] font-bold text-gray-900">PAID</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-[14px] font-bold text-gray-800">Home Service Fee</span>
                <span class="text-[14px] font-bold text-gray-900">CONFIRMED</span>
            </div>
        </div>

        <!-- Spacer -->
        <div class="flex-grow"></div>

        <!-- Footer Section -->
        <div class="px-6 pb-10">
            <hr class="border-gray-200 mb-6">
            
            <div class="flex items-center gap-3 mb-6">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-gray-600">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="16" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                </svg>
                <p class="text-[12px] text-gray-600 font-medium">Payment has been successfully processed.</p>
            </div>

            <button class="w-full bg-terracotta text-white font-bold py-4 rounded-xl text-lg shadow-sm active:opacity-80 transition-all">
                View Booking
            </button>
        </div>

    </div>

</body>
</html>