@extends('layouts.app')
@section('title', 'Select Date & Time — Beautique')

@section('content')
    <div class="min-h-screen bg-cream pt-[80px] lg:pt-[100px] pb-24">
        <div class="max-w-6xl mx-auto px-4 md:px-8 lg:px-12">

            <!-- Header & Stepper -->
            <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-8 gap-6">
                <div class="flex items-center gap-4">
                    <a href="{{ route('booking.choose-mua') }}"
                        class="w-10 h-10 rounded-full bg-white border border-border flex items-center justify-center text-dark hover:border-brand hover:text-brand transition-all shrink-0">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round">
                            <path d="M19 12H5M12 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h1 class="font-serif text-[28px] lg:text-[36px] font-bold text-dark leading-tight" id="page-title">
                            Select Date &amp; Time</h1>
                    </div>
                </div>

                <!-- Stepper -->
                <div class="flex items-center gap-2 lg:gap-4 overflow-x-auto pb-2 hide-scrollbar">
                    <div class="flex flex-col items-center gap-2">
                        <div
                            class="w-8 h-8 rounded-full bg-brand flex items-center justify-center text-white shadow-[0_4px_12px_rgba(199,155,132,0.3)] border-2 border-white">
                            <svg width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M2 6l3 3 5-5" />
                            </svg>
                        </div>
                        <span class="text-[11px] font-bold text-brand uppercase tracking-wider">Booking</span>
                    </div>
                    <div class="w-10 lg:w-16 h-0.5 bg-brand rounded-full mb-5"></div>
                    <div class="flex flex-col items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-brand flex items-center justify-center text-white shadow-[0_4px_12px_rgba(199,155,132,0.3)] border-2 border-white ring-4 ring-brand/20"
                            id="dot-2">
                            <svg id="icon-2" width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor"
                                stroke-width="2.5" class="hidden">
                                <path d="M2 6l3 3 5-5" />
                            </svg>
                        </div>
                        <span class="text-[11px] font-bold text-brand uppercase tracking-wider">Time</span>
                    </div>
                    <div class="w-10 lg:w-16 h-0.5 bg-border rounded-full mb-5" id="line-3"></div>
                    <div class="flex flex-col items-center gap-2 opacity-50" id="step3-wrap">
                        <div class="w-8 h-8 rounded-full bg-border flex items-center justify-center border-2 border-white"
                            id="dot-3">
                            <span class="w-2 h-2 rounded-full bg-muted" id="inner-dot-3"></span>
                            <svg id="icon-3" width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor"
                                stroke-width="2.5" class="hidden">
                                <path d="M2 6l3 3 5-5" />
                            </svg>
                        </div>
                        <span class="text-[11px] font-bold text-muted uppercase tracking-wider">Service</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
                <!-- Main Content Area -->
                <div
                    class="lg:col-span-7 xl:col-span-8 bg-white rounded-2xl border border-border shadow-sm overflow-hidden p-6 lg:p-10">

                    <!-- STEP 1: Date & Time -->
                    <div id="step-1" class="block">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <!-- Calendar -->
                            <div>
                                <div class="flex justify-between items-center mb-6">
                                    <button
                                        class="w-8 h-8 rounded-full border border-border flex items-center justify-center text-muted hover:border-brand hover:text-brand transition-colors"
                                        onclick="prevMonth()">
                                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                                    <span class="font-bold text-[16px] text-dark" id="cal-month">May 2026</span>
                                    <button
                                        class="w-8 h-8 rounded-full border border-border flex items-center justify-center text-muted hover:border-brand hover:text-brand transition-colors"
                                        onclick="nextMonth()">
                                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="grid grid-cols-7 gap-1 text-center mb-2">
                                    <div class="text-[11px] font-bold text-muted py-2">Mo</div>
                                    <div class="text-[11px] font-bold text-muted py-2">Tu</div>
                                    <div class="text-[11px] font-bold text-muted py-2">We</div>
                                    <div class="text-[11px] font-bold text-muted py-2">Th</div>
                                    <div class="text-[11px] font-bold text-muted py-2">Fr</div>
                                    <div class="text-[11px] font-bold text-muted py-2">Sa</div>
                                    <div class="text-[11px] font-bold text-muted py-2">Su</div>
                                </div>
                                <div class="grid grid-cols-7 gap-1 text-center" id="cal-grid"></div>
                            </div>

                            <!-- Time Slots -->
                            <div>
                                <h3 class="text-[13px] font-bold text-muted uppercase tracking-wider mb-4">Morning</h3>
                                <div class="grid grid-cols-3 gap-3 mb-6">
                                    <div class="slot px-2 py-2.5 border border-border rounded-xl text-center text-[13.5px] font-bold text-muted cursor-pointer hover:border-brand hover:text-brand transition-all"
                                        onclick="selectSlot(this)">08:00</div>
                                    <div class="slot px-2 py-2.5 border border-border rounded-xl text-center text-[13.5px] font-bold text-muted cursor-pointer hover:border-brand hover:text-brand transition-all"
                                        onclick="selectSlot(this)">09:00</div>
                                    <div
                                        class="slot unavailable px-2 py-2.5 border border-transparent bg-cream rounded-xl text-center text-[13.5px] font-bold text-muted/40 cursor-not-allowed line-through">
                                        10:00</div>
                                    <div class="slot px-2 py-2.5 border border-border rounded-xl text-center text-[13.5px] font-bold text-muted cursor-pointer hover:border-brand hover:text-brand transition-all"
                                        onclick="selectSlot(this)">11:00</div>
                                </div>
                                <h3 class="text-[13px] font-bold text-muted uppercase tracking-wider mb-4">Afternoon</h3>
                                <div class="grid grid-cols-3 gap-3 mb-6">
                                    <div class="slot px-2 py-2.5 border border-border rounded-xl text-center text-[13.5px] font-bold text-muted cursor-pointer hover:border-brand hover:text-brand transition-all"
                                        onclick="selectSlot(this)">13:00</div>
                                    <div
                                        class="slot unavailable px-2 py-2.5 border border-transparent bg-cream rounded-xl text-center text-[13.5px] font-bold text-muted/40 cursor-not-allowed line-through">
                                        14:00</div>
                                    <div class="slot px-2 py-2.5 border border-border rounded-xl text-center text-[13.5px] font-bold text-muted cursor-pointer hover:border-brand hover:text-brand transition-all"
                                        onclick="selectSlot(this)">15:00</div>
                                    <div class="slot px-2 py-2.5 border border-border rounded-xl text-center text-[13.5px] font-bold text-muted cursor-pointer hover:border-brand hover:text-brand transition-all"
                                        onclick="selectSlot(this)">16:00</div>
                                </div>
                            </div>
                        </div>

                        <hr class="border-border my-8">

                        <!-- Service Type -->
                        <h3 class="text-[13px] font-bold text-muted uppercase tracking-wider mb-4">Service Type</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                            <div class="type-opt selected border-2 border-brand bg-brand/5 rounded-xl p-5 text-center cursor-pointer transition-all"
                                onclick="selectType(this,'home')" id="type-home">
                                <svg class="w-6 h-6 mx-auto mb-2 text-brand" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                <strong class="block text-[15px] font-bold text-dark mb-1">Home Service</strong>
                                <span class="text-[13px] text-muted">Artist comes to you</span>
                            </div>
                            <div class="type-opt border-2 border-border bg-white rounded-xl p-5 text-center cursor-pointer hover:border-brand transition-all group"
                                onclick="selectType(this,'studio')" id="type-studio">
                                <svg class="w-6 h-6 mx-auto mb-2 text-muted group-hover:text-brand" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <strong class="block text-[15px] font-bold text-dark mb-1">Studio Visit</strong>
                                <span class="text-[13px] text-muted">Visit the MUA studio</span>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2A: Home Service Address -->
                    <div id="step-2-home" class="hidden">
                        <div
                            class="w-full h-40 bg-cream-dark rounded-xl mb-6 flex items-center justify-center relative overflow-hidden">
                            <!-- Mock Map -->
                            <div class="absolute inset-0 opacity-30"
                                style="background-image: radial-gradient(var(--color-brand) 1px, transparent 1px); background-size: 20px 20px;">
                            </div>
                            <div class="w-4 h-4 rounded-full bg-brand shadow-[0_0_0_8px_rgba(199,155,132,0.3)] z-10"></div>
                        </div>

                        <div class="space-y-5">
                            <div>
                                <label class="block text-[13.5px] font-bold text-dark mb-2">Street Address</label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-muted">
                                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <input type="text"
                                        class="w-full pl-11 pr-4 py-3 bg-cream border border-transparent rounded-xl focus:border-brand focus:bg-white focus:ring-2 focus:ring-brand/20 transition-all text-[14.5px] text-dark placeholder:text-muted/60"
                                        placeholder="Jl. Raya Kuta No. 25">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-[13.5px] font-bold text-dark mb-2">District / Gang</label>
                                    <input type="text"
                                        class="w-full px-4 py-3 bg-cream border border-transparent rounded-xl focus:border-brand focus:bg-white focus:ring-2 focus:ring-brand/20 transition-all text-[14.5px] text-dark placeholder:text-muted/60"
                                        placeholder="Kuta">
                                </div>
                                <div>
                                    <label class="block text-[13.5px] font-bold text-dark mb-2">City</label>
                                    <input type="text"
                                        class="w-full px-4 py-3 bg-cream border border-transparent rounded-xl focus:border-brand focus:bg-white focus:ring-2 focus:ring-brand/20 transition-all text-[14.5px] text-dark placeholder:text-muted/60"
                                        placeholder="Badung">
                                </div>
                            </div>
                            <div>
                                <label class="block text-[13.5px] font-bold text-dark mb-2">Notes for Artist</label>
                                <textarea rows="3"
                                    class="w-full px-4 py-3 bg-cream border border-transparent rounded-xl focus:border-brand focus:bg-white focus:ring-2 focus:ring-brand/20 transition-all text-[14.5px] text-dark placeholder:text-muted/60 resize-none"
                                    placeholder="e.g. oily skin, prefer natural look…"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2B: Studio Service -->
                    <div id="step-2-studio" class="hidden">
                        <div class="rounded-xl overflow-hidden mb-6 h-48 lg:h-64">
                            <img src="{{ asset('image/about-mua.jpeg') }}" alt="Studio" class="w-full h-full object-cover">
                        </div>
                        <h4 class="text-[20px] font-bold text-dark mb-2">Sarah Wijaya Studio</h4>
                        <p class="text-[14px] text-muted flex items-center gap-1.5 mb-2">
                            <svg width="16" height="16" fill="none" stroke="var(--color-brand)" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                </path>
                            </svg>
                            Jl. Raya Seminyak 88, Bali
                        </p>
                        <p class="text-[14px] text-muted mb-8">⭐ 4.9 &middot; Studio visit available</p>

                        <div class="bg-cream rounded-xl p-6">
                            <div class="flex justify-between items-center py-3 border-b border-border">
                                <span class="text-[14px] text-muted">Your Slot</span>
                                <strong class="text-[14px] text-dark" id="selected-slot-display-studio">Not
                                    selected</strong>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-border">
                                <span class="text-[14px] text-muted">Duration</span>
                                <strong class="text-[14px] text-dark">~ 2 hours</strong>
                            </div>
                            <div class="flex justify-between items-center py-3">
                                <span class="text-[14px] text-muted">Type</span>
                                <strong class="text-[14px] text-dark">Studio Visit</strong>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 3: Order Configuration -->
                    <div id="step-3" class="hidden">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-[13.5px] font-bold text-dark mb-2">Package</label>
                                <select
                                    class="w-full px-4 py-3.5 bg-cream border border-transparent rounded-xl focus:border-brand focus:bg-white focus:ring-2 focus:ring-brand/20 transition-all text-[14.5px] text-dark">
                                    <option>Basic Beauty (Rp 500.000)</option>
                                    <option>Creative Glam (Rp 2.500.000)</option>
                                    <option>Signature Bridal (Rp 7.000.000)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[13.5px] font-bold text-dark mb-2">Makeup Style</label>
                                <select
                                    class="w-full px-4 py-3.5 bg-cream border border-transparent rounded-xl focus:border-brand focus:bg-white focus:ring-2 focus:ring-brand/20 transition-all text-[14.5px] text-dark">
                                    <option>Natural</option>
                                    <option>Korean Dewy</option>
                                    <option>Soft Glam</option>
                                    <option>Full Glam</option>
                                    <option>Bold / Latina</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[13.5px] font-bold text-dark mb-3">Add-on Services</label>
                                <div class="space-y-3">
                                    <label
                                        class="flex items-center justify-between p-4 bg-white border border-border rounded-xl cursor-pointer hover:border-brand transition-colors">
                                        <div class="flex items-center gap-3">
                                            <input type="checkbox" checked
                                                class="w-4 h-4 rounded border-border text-brand focus:ring-brand bg-cream">
                                            <span class="text-[14.5px] font-semibold text-dark">Lash Application</span>
                                        </div>
                                        <span class="text-[13px] font-bold text-brand">+Rp 50k</span>
                                    </label>
                                    <label
                                        class="flex items-center justify-between p-4 bg-white border border-border rounded-xl cursor-pointer hover:border-brand transition-colors">
                                        <div class="flex items-center gap-3">
                                            <input type="checkbox"
                                                class="w-4 h-4 rounded border-border text-brand focus:ring-brand bg-cream">
                                            <span class="text-[14.5px] font-semibold text-dark">Hair Styling</span>
                                        </div>
                                        <span class="text-[13px] font-bold text-brand">+Rp 150k</span>
                                    </label>
                                    <label
                                        class="flex items-center justify-between p-4 bg-white border border-border rounded-xl cursor-pointer hover:border-brand transition-colors">
                                        <div class="flex items-center gap-3">
                                            <input type="checkbox"
                                                class="w-4 h-4 rounded border-border text-brand focus:ring-brand bg-cream">
                                            <span class="text-[14.5px] font-semibold text-dark">Touch-up Kit</span>
                                        </div>
                                        <span class="text-[13px] font-bold text-brand">+Rp 100k</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-border flex justify-end">
                        <button id="main-btn"
                            class="w-full sm:w-auto px-8 py-3.5 bg-brand hover:bg-brand-dark text-white rounded-xl font-bold text-[14.5px] transition-all flex items-center justify-center gap-2 hover:shadow-[0_8px_20px_rgba(199,155,132,0.3)] hover:-translate-y-0.5"
                            onclick="nextStep()">
                            Check Availability
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Right Column Sidebar -->
                <div class="lg:col-span-5 xl:col-span-4">
                    <div class="bg-white rounded-2xl border border-border p-6 shadow-sm sticky top-24">
                        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-border">
                            <img src="{{ asset('image/model-mua.jpeg') }}" alt="MUA"
                                class="w-16 h-16 rounded-full object-cover">
                            <div>
                                <h3 class="font-bold text-[16px] text-dark">Sarah Wijaya</h3>
                                <p class="text-[13px] text-muted">Professional Artist</p>
                            </div>
                        </div>

                        <h4 class="text-[13px] font-bold text-muted uppercase tracking-wider mb-4">Booking Summary</h4>

                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between items-start">
                                <span class="text-[14px] text-muted">Date</span>
                                <strong class="text-[14px] text-dark text-right" id="summary-date">May 15, 2026</strong>
                            </div>
                            <div class="flex justify-between items-start">
                                <span class="text-[14px] text-muted">Time</span>
                                <strong class="text-[14px] text-dark text-right" id="summary-time">Not selected</strong>
                            </div>
                            <div class="flex justify-between items-start">
                                <span class="text-[14px] text-muted">Location</span>
                                <strong class="text-[14px] text-dark text-right" id="summary-location">Home Service</strong>
                            </div>
                        </div>

                        <div class="bg-cream rounded-xl p-4 hidden" id="pricing-summary">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-[14px] text-muted">Package</span>
                                <strong class="text-[14px] text-dark">Rp 500.000</strong>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-[14px] text-muted">Add-ons</span>
                                <strong class="text-[14px] text-dark">Rp 50.000</strong>
                            </div>
                            <div class="flex justify-between items-center mb-4 pb-4 border-b border-border">
                                <span class="text-[14px] text-muted">Service Fee</span>
                                <strong class="text-[14px] text-dark">Rp 50.000</strong>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-[16px] font-bold text-dark">Total</span>
                                <strong class="text-[18px] font-bold text-brand">Rp 600.000</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Availability Modal -->
    <div id="avail-modal" class="fixed inset-0 bg-dark/60 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div
            class="bg-white rounded-2xl max-w-sm w-full p-8 text-center shadow-2xl transform scale-100 transition-transform">
            <div
                class="w-16 h-16 rounded-full border-2 border-border flex items-center justify-center mx-auto mb-5 text-muted">
                <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </div>
            <h3 class="text-[20px] font-bold text-dark mb-3">Schedule Taken</h3>
            <p class="text-[14.5px] text-muted mb-8 leading-relaxed">That time slot is already booked. Please select another
                time or choose from available artists.</p>
            <div class="space-y-3">
                <button onclick="closeModal()"
                    class="w-full bg-brand hover:bg-brand-dark text-white py-3.5 rounded-xl font-bold text-[14px] transition-colors">Select
                    Another Time</button>
                <button onclick="bookAnyway()"
                    class="w-full border border-border hover:border-brand text-muted hover:text-brand bg-white py-3.5 rounded-xl font-bold text-[14px] transition-colors">Continue
                    with Any Artist</button>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        let currentStep = 1, serviceType = 'home', selectedDay = 15, selectedSlotEl = null;
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        let viewDate = new Date(2026, 4, 1);

        function renderCal() {
            const grid = document.getElementById('cal-grid');
            const y = viewDate.getFullYear(), m = viewDate.getMonth();
            document.getElementById('cal-month').textContent = monthNames[m] + ' ' + y;
            grid.innerHTML = '';

            const firstDay = (new Date(y, m, 1).getDay() + 6) % 7;
            for (let i = 0; i < firstDay; i++) {
                const e = document.createElement('div'); grid.appendChild(e);
            }

            const days = new Date(y, m + 1, 0).getDate();
            const today = new Date();

            for (let d = 1; d <= days; d++) {
                const el = document.createElement('div');
                el.className = 'text-[13px] font-medium py-2 rounded-xl cursor-pointer transition-all flex items-center justify-center';
                el.textContent = d;
                const date = new Date(y, m, d);

                if (date < new Date(today.getFullYear(), today.getMonth(), today.getDate())) {
                    el.classList.add('text-border', 'cursor-not-allowed');
                } else {
                    el.onclick = () => selectDay(el, d);
                    if (d === today.getDate() && m === today.getMonth() && y === today.getFullYear()) {
                        el.classList.add('border', 'border-brand', 'text-brand');
                    } else {
                        el.classList.add('text-dark', 'hover:bg-cream');
                    }
                }

                if (d === selectedDay && m === 4 && y === 2026) {
                    el.className = 'text-[13px] font-bold py-2 rounded-xl cursor-pointer transition-all flex items-center justify-center bg-brand text-white shadow-sm';
                    el.dataset.selected = "true";
                }

                grid.appendChild(el);
            }
        }

        function prevMonth() { viewDate.setMonth(viewDate.getMonth() - 1); renderCal(); }
        function nextMonth() { viewDate.setMonth(viewDate.getMonth() + 1); renderCal(); }

        function selectDay(el, d) {
            document.querySelectorAll('#cal-grid div[data-selected="true"]').forEach(e => {
                e.className = 'text-[13px] font-medium py-2 rounded-xl cursor-pointer transition-all flex items-center justify-center text-dark hover:bg-cream';
                delete e.dataset.selected;
            });
            el.className = 'text-[13px] font-bold py-2 rounded-xl cursor-pointer transition-all flex items-center justify-center bg-brand text-white shadow-sm';
            el.dataset.selected = "true";
            selectedDay = d;
            document.getElementById('summary-date').textContent = monthNames[viewDate.getMonth()] + ' ' + d + ', ' + viewDate.getFullYear();
        }

        function selectSlot(el) {
            if (el.classList.contains('unavailable')) return;
            document.querySelectorAll('.slot').forEach(e => {
                if (!e.classList.contains('unavailable')) {
                    e.className = 'slot px-2 py-2.5 border border-border rounded-xl text-center text-[13.5px] font-bold text-muted cursor-pointer hover:border-brand hover:text-brand transition-all';
                }
            });
            el.className = 'slot px-2 py-2.5 border-2 border-brand bg-brand rounded-xl text-center text-[13.5px] font-bold text-white shadow-sm transition-all';
            el.dataset.selected = "true";
            selectedSlotEl = el;

            const time = el.textContent;
            document.getElementById('summary-time').textContent = time;
            document.getElementById('selected-slot-display-studio').textContent = time;
        }

        function selectType(el, type) {
            document.querySelectorAll('.type-opt').forEach(e => {
                e.className = 'type-opt border-2 border-border bg-white rounded-xl p-5 text-center cursor-pointer hover:border-brand transition-all group';
                e.querySelector('svg').className.baseVal = 'w-6 h-6 mx-auto mb-2 text-muted group-hover:text-brand';
            });

            el.className = 'type-opt selected border-2 border-brand bg-brand/5 rounded-xl p-5 text-center cursor-pointer transition-all';
            el.querySelector('svg').className.baseVal = 'w-6 h-6 mx-auto mb-2 text-brand';

            serviceType = type;
            document.getElementById('summary-location').textContent = type === 'home' ? 'Home Service' : 'Studio Visit';
        }

        function nextStep() {
            if (currentStep === 1) {
                if (!selectedDay) { alert('Please select a date.'); return; }
                if (!selectedSlotEl) {
                    document.getElementById('avail-modal').classList.remove('hidden');
                    return;
                }
                showStep(2);
            } else if (currentStep === 2) {
                showStep(3);
            } else if (currentStep === 3) {
                window.location.href = '{{ route("booking.summary") }}';
            }
        }

        function showStep(step) {
            currentStep = step;
            document.getElementById('step-1').classList.add('hidden');
            document.getElementById('step-2-home').classList.add('hidden');
            document.getElementById('step-2-studio').classList.add('hidden');
            document.getElementById('step-3').classList.add('hidden');

            const btn = document.getElementById('main-btn');
            const title = document.getElementById('page-title');

            if (step === 2) {
                document.getElementById(`step-2-${serviceType}`).classList.remove('hidden');
                title.textContent = serviceType === 'home' ? 'Your Location' : 'Studio Details';
                btn.innerHTML = 'Continue <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"></path></svg>';

                // Update stepper
                document.getElementById('icon-2').classList.remove('hidden');
                document.getElementById('dot-2').classList.remove('ring-4', 'ring-brand/20');

                document.getElementById('line-3').classList.replace('bg-border', 'bg-brand');

                document.getElementById('step3-wrap').classList.remove('opacity-50');
                const dot3 = document.getElementById('dot-3');
                dot3.classList.replace('bg-border', 'bg-brand');
                dot3.classList.replace('border-white', 'border-white');
                dot3.classList.add('ring-4', 'ring-brand/20');
                document.getElementById('inner-dot-3').classList.add('hidden');
                document.getElementById('step3-wrap').querySelector('span').classList.replace('text-muted', 'text-brand');

            } else if (step === 3) {
                document.getElementById('step-3').classList.remove('hidden');
                title.textContent = 'Order Configuration';
                btn.innerHTML = 'Confirm Booking <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"></path></svg>';

                document.getElementById('pricing-summary').classList.remove('hidden');

                // Update stepper
                const dot3 = document.getElementById('dot-3');
                dot3.classList.remove('ring-4', 'ring-brand/20');
                document.getElementById('icon-3').classList.remove('hidden');
            }
        }

        function closeModal() { document.getElementById('avail-modal').classList.add('hidden'); }
        function bookAnyway() { closeModal(); showStep(2); }

        renderCal();
    </script>
@endpush