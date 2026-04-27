<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Countdown</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-inter {
            font-family: 'Inter', sans-serif;
        }
        /* Custom Colors */
        .bg-terracotta { background-color: #C19A84; }
        .bg-confirmed-light { background-color: #C1FBC1; }
        .bg-cream-box { background-color: #F4E7E0; }
        .text-confirmed-dark { color: #1E5128; }
        
        /* Custom Position Header Title */
        .header-title-abs {
            position: absolute;
            top: 17px;
            left: 59px;
            width: 114px;
            height: 15px;
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            font-size: 12px;
            line-height: 100%;
            letter-spacing: 0%;
        }
    </style>
</head>
<body class="bg-gray-50 flex justify-center items-center min-h-screen">

    <!-- Mobile Container -->
    <div class="bg-white w-full max-w-md min-h-screen shadow-lg flex flex-col relative overflow-hidden">
        
        <!-- Header -->
        <div class="relative px-6 pt-8 pb-4">
            <button class="z-10 relative">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <h1 class="header-title-abs text-center">Confirmed Booking</h1>
        </div>

        <!-- Progress Bar -->
        <div class="px-12 mt-4 relative">
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
                    <div class="w-7 h-7 rounded-full bg-gray-200 border-2 border-white shadow-sm"></div>
                    <span class="text-[10px] font-bold mt-2 text-gray-400">Service</span>
                </div>
            </div>
            <!-- Lines -->
            <div class="absolute top-3.5 left-16 right-16 h-[1.5px] bg-gray-100 -z-0"></div>
            <div class="absolute top-3.5 left-16 w-[35%] h-[1.5px] bg-terracotta -z-0"></div>
        </div>

        <!-- Content Body -->
        <div class="mt-8 px-8 text-center flex flex-col items-center">
            <h2 class="font-bold text-[18px] text-gray-900 mb-2">Booking Countdown</h2>
            
            <!-- Badge Confirmed -->
            <div class="bg-confirmed-light text-confirmed-dark font-inter font-bold text-[12px] py-1 px-4 rounded-[2px] mb-6">
                CONFIRMED
            </div>

            <!-- Countdown Box -->
            <div class="bg-cream-box w-full py-8 px-6 rounded-[15px] mb-8">
                <p class="text-[14px] font-medium text-gray-800 mb-2">Schedule info until</p>
                <h3 class="text-[44px] font-bold tracking-widest text-black leading-tight">00 : 03 : 27</h3>
                <p class="text-[14px] font-medium text-gray-800 mt-2">until appointment</p>
            </div>
        </div>

        <!-- Details List -->
        <div class="px-8 space-y-4">
            <hr class="border-gray-200">
            
            <!-- Booking Details Dropdown -->
            <div class="flex justify-between items-center py-2">
                <span class="font-bold text-[16px] text-black">Booking Details</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 9l6 6 6-6"/>
                </svg>
            </div>
            
            <hr class="border-gray-200">

            <div class="space-y-3 pt-1">
                <div class="flex justify-between">
                    <span class="text-[14px] text-gray-800">Booking</span>
                    <span class="text-[14px] font-bold text-black">Today</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-[14px] text-gray-800">Schedule</span>
                    <span class="text-[14px] font-bold text-black">15 : 35</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-[14px] text-gray-800">Schedule Info</span>
                    <span class="text-[14px] font-bold text-black">Until Appointment</span>
                </div>
            </div>

            <hr class="border-gray-200">

            <!-- Status Badge Row -->
            <div class="flex justify-between items-center py-1">
                <span class="font-bold text-[16px] text-black">Status Badge</span>
                <span class="font-inter font-bold text-[12px] text-confirmed-dark uppercase">CONFIRMED</span>
            </div>

            <hr class="border-gray-200">

            <div class="space-y-4 pt-1">
                <span class="block font-bold text-[14px] text-black">Service Fee</span>
                <span class="block font-bold text-[14px] text-black">Home Service Fee</span>
            </div>

            <hr class="border-gray-200">

            <!-- Total Row -->
            <div class="flex justify-between items-center py-1">
                <span class="font-bold text-[18px] text-black">Total</span>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-auto px-8 pb-10 pt-6">
            <button class="bg-terracotta hover:opacity-90 w-full py-4 rounded-xl text-white font-bold text-[16px] shadow-sm transition-all">
                Confirm
            </button>
        </div>

    </div>

</body>
</html>