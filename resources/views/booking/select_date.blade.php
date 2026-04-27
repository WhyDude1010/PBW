<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MUA Booking SPA - Figma Precision</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f0f0f0; }
        .app-container {
            width: 236px; height: 489px;
            background-color: #FFFFFF; border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            position: relative; overflow: hidden; display: flex; flex-direction: column;
        }
        .btn-mua { background-color: #C19A84; color: white; transition: 0.2s; }
        .btn-mua:hover { background-color: #AD866F; }
        .text-mua { color: #C19A84; }
        .bg-step-active { background-color: #C19A84; border-color: white; }
        .hidden { display: none; }
        
        /* Styling Input & Select */
        select, input, textarea { font-size: 8px !important; border: 0.5px solid #E5E7EB !important; border-radius: 4px !important; padding: 4px 8px !important; outline: none; width: 100%; }
        label { font-size: 8px; font-weight: 700; margin-bottom: 2px; display: block; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

    <div class="app-container">
        
        <!-- HEADER & PROGRESS BAR -->
        <header class="pt-4 px-4">
            <div class="flex items-center mb-4">
                <button onclick="handleBack()" id="back-btn" class="invisible"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="3"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></button>
                <h1 id="header-title" class="flex-1 text-center font-bold text-[10px]">Select Date & Time</h1>
            </div>
            
            <!-- Stepper -->
            <div class="flex justify-between px-4 relative h-8">
                <div class="absolute top-[6px] left-6 right-6 h-[0.5px] bg-gray-100"></div>
                <div id="progress-line" class="absolute top-[6px] left-6 w-[45%] h-[0.5px] bg-[#C19A84]"></div>
                
                <div class="relative z-10 flex flex-col items-center">
                    <div class="w-3.5 h-3.5 bg-step-active rounded-full flex items-center justify-center border shadow-sm"><svg width="6" height="6" stroke="white" stroke-width="4"><path d="M20 6L9 17l-5-5" fill="none"/></svg></div>
                    <span class="text-[6px] font-bold mt-1">Booking</span>
                </div>
                <div class="relative z-10 flex flex-col items-center">
                    <div id="dot-2" class="w-3.5 h-3.5 bg-step-active rounded-full flex items-center justify-center border shadow-sm"><svg width="6" height="6" stroke="white" stroke-width="4"><path d="M20 6L9 17l-5-5" fill="none"/></svg></div>
                    <span class="text-[6px] font-bold mt-1">Appointment</span>
                </div>
                <div class="relative z-10 flex flex-col items-center">
                    <div id="dot-3" class="w-3.5 h-3.5 bg-gray-200 rounded-full border shadow-sm transition-colors"></div>
                    <span id="label-3" class="text-[6px] font-bold mt-1 text-gray-300">Service</span>
                </div>
            </div>
        </header>

        <!-- PAGE CONTENT -->
        <div class="flex-1 overflow-y-auto px-4 pb-4">
            
            <!-- SECTION 1: SELECT DATE & TIME -->
            <section id="step-1">
                <div class="bg-[#F9F9F9] p-2 rounded-lg mb-4">
                    <!-- Placeholder Kalender -->
                    <div class="flex justify-between items-center mb-2 px-1"><span class="text-[7px] font-bold">April 2021</span></div>
                    <div class="grid grid-cols-7 text-[6px] text-center gap-1 font-bold">
                        <div class="text-gray-400">Mo</div><div>Tu</div><div>We</div><div>Th</div><div>Fr</div><div>Sa</div><div>Su</div>
                        <div class="py-1">12</div><div class="py-1">13</div><div class="py-1 bg-mua text-white rounded-full bg-[#C19A84]">14</div><div class="py-1 text-gray-300">15</div>
                    </div>
                </div>

                <div class="mb-4">
                    <label>Pick Your Schedule</label>
                    <div class="flex items-center gap-2">
                        <input type="text" value="10:00" class="text-center">
                        <span class="text-gray-300">-</span>
                        <input type="text" value="12:30" class="text-center">
                    </div>
                </div>

                <div class="mb-6">
                    <label>Select Your Service Type</label>
                    <select id="service-type">
                        <option value="home">Home Service</option>
                        <option value="store">Studio Service</option>
                    </select>
                </div>

                <button onclick="checkAvailability()" class="btn-mua w-full py-2 rounded-lg text-[9px] font-bold uppercase tracking-wider">Check Availability</button>
            </section>

            <!-- SECTION 2A: STORE SERVICE PAGE -->
            <section id="step-2-store" class="hidden">
                <label class="mb-2">Detail MUA</label>
                <img src="https://images.unsplash.com/photo-1562322140-8baeececf3df?auto=format&fit=crop&q=80" class="w-full h-24 object-cover rounded-lg mb-3">
                <div class="space-y-1 mb-4">
                    <h2 class="text-[10px] font-bold">MUA Salon Studio</h2>
                    <p class="text-[7px] text-yellow-500 font-bold">★★★★★</p>
                    <p class="text-[7px] text-gray-400">email: muasalonstudio@gmail.com</p>
                    <p class="text-[7px] text-gray-800">Price: Rp 2.000.000 - 15.000.000</p>
                </div>
                <label>Location</label>
                <div class="flex items-center gap-2 mt-1">
                    <div class="p-1.5 bg-gray-50 rounded-full"><svg width="10" height="10" stroke="gray" fill="none"><path d="M12 21s-8-4.5-8-11.8A8 8 0 0120 9.2c0 7.3-8 11.8-8 11.8z"/></svg></div>
                    <span class="text-[8px] font-bold">Denpasar, Bali</span>
                </div>
                <button onclick="goToStep3()" class="btn-mua w-full py-2 rounded-lg text-[9px] font-bold mt-10 uppercase">Next</button>
            </section>

            <!-- SECTION 2B: HOME SERVICE PAGE -->
            <section id="step-2-home" class="hidden">
                <label class="mb-2">Your Location</label>
                <div class="w-full h-28 bg-gray-100 rounded-lg mb-4 flex items-center justify-center relative overflow-hidden">
                    <!-- Placeholder Map -->
                    <div class="absolute inset-0 bg-blue-50"></div>
                    <div class="z-10 w-2 h-2 bg-blue-500 rounded-full shadow-lg border border-white"></div>
                </div>
                <div class="space-y-3">
                    <div><label>Address</label><input type="text" placeholder="Jl. Raya Kuta..."></div>
                    <div class="flex gap-2">
                        <div class="flex-1"><label>From</label><input type="text" placeholder="Gg. Bunga"></div>
                        <div class="flex-1"><label>City</label><input type="text" placeholder="Kuta"></div>
                    </div>
                </div>
                <button onclick="goToStep3()" class="btn-mua w-full py-2 rounded-lg text-[9px] font-bold mt-6 uppercase">Next</button>
            </section>

            <!-- SECTION 3: ORDER CONFIGURATION PAGE -->
            <section id="step-3" class="hidden">
                <label class="text-[9px] border-b pb-1 mb-3">Your Service Details</label>
                <div class="space-y-3 mb-4">
                    <div><label>Package</label><select><option>Basic Package</option></select></div>
                    <div><label>Make Up Type</label><select><option>Natural Make Up</option></select></div>
                    <div>
                        <label>Add-ons Service</label>
                        <div class="space-y-1.5 px-1">
                            <div class="flex justify-between items-center text-[7px] font-bold">Lash Application <input type="checkbox" checked class="accent-mua scale-75"></div>
                            <div class="flex justify-between items-center text-[7px] font-bold">Hair Styling <input type="checkbox" class="accent-mua scale-75"></div>
                        </div>
                    </div>
                    <div class="space-y-1 text-[7px] font-bold text-gray-500 pt-1">
                        <div class="flex justify-between">Price</div>
                        <div class="flex justify-between">Service Fee <span class="text-black">Rp. 500.000</span></div>
                        <div class="flex justify-between">Home Service Fee <span class="text-black">Rp. 50.000</span></div>
                    </div>
                    <div><label>Notes for the MUA</label><textarea rows="2" placeholder="Tipe kulit berminyak..."></textarea></div>
                    <div class="flex justify-between items-center pt-2 border-t">
                        <span class="text-[10px] font-extrabold">Total</span>
                        <span class="text-[10px] font-extrabold text-mua">Rp 550.000</span>
                    </div>
                </div>
                <button class="btn-mua w-full py-2 rounded-lg text-[9px] font-bold uppercase">Confirmation</button>
            </section>
        </div>

        <!-- AVAILABILITY POPUP -->
        <div id="modal" class="hidden absolute inset-0 bg-black/60 z-[100] flex items-center justify-center p-6">
            <div class="bg-white rounded-2xl p-5 text-center w-full">
                <div class="w-12 h-12 border-2 border-black rounded-full mx-auto flex items-center justify-center mb-4">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                </div>
                <h3 class="text-[10px] font-bold mb-1">Check Availability</h3>
                <p class="text-[7px] text-gray-500 mb-5 leading-tight">Oh, no!, the schedule already taken</p>
                <button onclick="closeModal()" class="w-full bg-[#C19A84] text-white text-[8px] font-bold py-2 rounded-lg mb-2">Select Another Date</button>
                <button onclick="bookSuggested()" class="w-full border border-gray-300 text-gray-500 text-[8px] font-bold py-2 rounded-lg">Select From Available Artist</button>
            </div>
        </div>
    </div>

    <script>
        let currentStep = 1;
        let selectedService = 'home';

        function checkAvailability() {
            // Simulasi popup sesuai figma
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() { document.getElementById('modal').classList.add('hidden'); }

        function bookSuggested() {
            closeModal();
            // Lanjut ke Step 2 berdasarkan dropdown
            selectedService = document.getElementById('service-type').value;
            showPage(2);
        }

        function goToStep3() { showPage(3); }

        function showPage(step) {
            currentStep = step;
            // Hide all
            document.getElementById('step-1').classList.add('hidden');
            document.getElementById('step-2-store').classList.add('hidden');
            document.getElementById('step-2-home').classList.add('hidden');
            document.getElementById('step-3').classList.add('hidden');

            const backBtn = document.getElementById('back-btn');
            const title = document.getElementById('header-title');
            const dot3 = document.getElementById('dot-3');
            const label3 = document.getElementById('label-3');
            const line = document.getElementById('progress-line');

            if (step === 1) {
                document.getElementById('step-1').classList.remove('hidden');
                title.innerText = "Select Date & Time";
                backBtn.classList.add('invisible');
                line.style.width = "45%";
                dot3.classList.replace('bg-step-active', 'bg-gray-200');
                label3.classList.replace('text-black', 'text-gray-300');
            } 
            else if (step === 2) {
                document.getElementById(`step-2-${selectedService}`).classList.remove('hidden');
                title.innerText = selectedService === 'home' ? "Home Service" : "Store Service";
                backBtn.classList.remove('invisible');
                line.style.width = "45%";
            } 
            else if (step === 3) {
                document.getElementById('step-3').classList.remove('hidden');
                title.innerText = "Order Configuration";
                line.style.width = "100%";
                dot3.classList.replace('bg-gray-200', 'bg-step-active');
                dot3.innerHTML = `<svg width="6" height="6" stroke="white" stroke-width="4"><path d="M20 6L9 17l-5-5" fill="none"/></svg>`;
                label3.classList.replace('text-gray-300', 'text-black');
            }
        }

        function handleBack() {
            if (currentStep === 3) showPage(2);
            else if (currentStep === 2) showPage(1);
        }

        /** 
         * LOGIKA H-1 
         * (Dapat dipanggil di tombol Edit jika Anda memiliki sistem login/data tersimpan)
         */
        function checkHMinOne(bookingDateStr) {
            // Logika selisih hari di sini untuk membatasi fungsi edit
            console.log("Validasi H-1 untuk tanggal: " + bookingDateStr);
        }
    </script>
</body>
</html>