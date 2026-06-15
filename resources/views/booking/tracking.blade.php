@extends('layouts.app')
@section('title', 'Service Tracking — Beautique')

@section('content')
    <div class="min-h-screen bg-cream pt-[80px] lg:pt-[100px] pb-24">
        <div class="max-w-6xl mx-auto px-4 md:px-8 lg:px-12">

            <!-- Header & Stepper -->
            <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-8 gap-6">
                <div class="flex items-center gap-4">
                    <a href="{{ route('booking.countdown', $booking->id) }}"
                        class="w-10 h-10 rounded-full bg-white border border-border flex items-center justify-center text-dark hover:border-brand hover:text-brand transition-all shrink-0">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round">
                            <path d="M19 12H5M12 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h1 class="font-serif text-[28px] lg:text-[36px] font-bold text-dark leading-tight">Service Tracking
                        </h1>
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
                        <div
                            class="w-8 h-8 rounded-full bg-brand flex items-center justify-center text-white shadow-[0_4px_12px_rgba(199,155,132,0.3)] border-2 border-white">
                            <svg width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M2 6l3 3 5-5" />
                            </svg>
                        </div>
                        <span class="text-[11px] font-bold text-brand uppercase tracking-wider">Appointment</span>
                    </div>
                    <div class="w-10 lg:w-16 h-0.5 bg-brand rounded-full mb-5"></div>
                    <div class="flex flex-col items-center gap-2">
                        <div
                            class="w-8 h-8 rounded-full bg-brand flex items-center justify-center text-white shadow-[0_4px_12px_rgba(199,155,132,0.3)] border-2 border-white ring-4 ring-brand/20">
                            <svg width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M2 6l3 3 5-5" />
                            </svg>
                        </div>
                        <span class="text-[11px] font-bold text-brand uppercase tracking-wider">Service</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">

                <!-- Left Content: Map & Timeline -->
                <div class="lg:col-span-7 xl:col-span-8 flex flex-col gap-8">

                    <!-- Live Status Banner -->
                    <div class="bg-white rounded-2xl border border-border shadow-sm p-8 text-center">
                        <div class="w-16 h-16 mx-auto bg-brand/10 text-brand rounded-full flex items-center justify-center mb-4" id="status-icon">
                            <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h2 class="font-serif text-[28px] font-bold text-dark mb-2" id="live-status-text">Booking Confirmed</h2>
                        <p class="text-[14px] text-muted" id="live-status-desc">Your artist will update their status shortly.</p>
                    </div>

                    <!-- Timeline -->
                    <div class="bg-white rounded-2xl border border-border shadow-sm p-6 lg:p-10">
                        <h3 class="font-serif text-[24px] font-bold text-dark mb-8">Service Progress</h3>

                        <div class="space-y-0 relative before:absolute before:inset-0 before:ml-[1.4rem] before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-linear-to-b before:from-brand before:via-border before:to-transparent" id="timeline-container">
                            <!-- JS will populate -->
                        </div>
                    </div>

                </div>

                <!-- Right Column: Info Sidebar -->
                <div class="lg:col-span-5 xl:col-span-4">
                    <div class="bg-white rounded-2xl border border-border p-6 lg:p-8 shadow-sm sticky top-24">

                        <div
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/10 text-amber-700 text-[11px] font-bold uppercase tracking-wider mb-6">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                            <span id="sidebar-status">Confirmed</span>
                        </div>

                        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-border">
                            <img src="{{ asset('image/model-mua.jpeg') }}" alt="MUA"
                                class="w-16 h-16 rounded-full object-cover border-2 border-cream">
                            <div>
                                <h3 class="font-bold text-[18px] text-dark">{{ $booking->muaProfile->user->name }}</h3>
                                <p class="text-[13px] text-muted">Professional Artist</p>
                            </div>
                        </div>

                        <div class="flex gap-2 mb-8">
                            <button
                                class="flex-1 py-3 rounded-xl border border-border bg-white text-dark font-bold text-[13px] hover:border-brand hover:text-brand transition-colors flex items-center justify-center gap-2">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                                Call
                            </button>
                            <button
                                class="flex-1 py-3 rounded-xl border border-border bg-white text-dark font-bold text-[13px] hover:border-brand hover:text-brand transition-colors flex items-center justify-center gap-2">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                                Chat
                            </button>
                        </div>

                        <div class="bg-cream rounded-xl p-5 mb-8">
                            <p class="text-[13.5px] text-dark font-medium leading-relaxed mb-4">
                                "Your makeup artist is heading to your location. Please ensure you have a well-lit area
                                ready with a table and chair."
                            </p>
                            <div class="flex items-center gap-2 text-muted text-[12.5px]">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Last updated: 2 mins ago
                            </div>
                        </div>

                        <a href="{{ route('booking.done', $booking->id) }}"
                            class="w-full inline-flex items-center justify-center gap-2 bg-dark hover:bg-black text-white py-4 rounded-xl font-bold text-[15px] transition-all shadow-[0_8px_20px_rgba(26,16,16,0.2)] hover:-translate-y-0.5">
                            Simulate Arrival &amp; Done
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>

                    </div>
                </div>

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

        @keyframes dash {
            to {
                stroke-dashoffset: -1000;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        const stages = [
            { id: 'Confirmed', title: 'Booking Confirmed', desc: 'Payment received & locked in.', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>' },
            { id: 'Preparing', title: 'Artist Preparing', desc: 'Sarah is preparing her makeup kit.', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>' },
            { id: 'On the Way', title: 'Artist En Route', desc: 'Sarah is on her way to your location.', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>' },
            { id: 'Arrived', title: 'Artist Arrived', desc: 'Sarah has arrived at your location.', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>' },
            { id: 'Service In Progress', title: 'Service In Progress', desc: 'Makeup session has started.', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>' },
            { id: 'Done', title: 'Service Completed', desc: 'Thank you for choosing Beautique!', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>' }
        ];

        function renderTimeline() {
            var currentStatus = localStorage.getItem('mua_active_tracking') || 'Confirmed';
            
            var currentIndex = stages.findIndex(s => s.id === currentStatus);
            if (currentIndex === -1) currentIndex = 0;

            document.getElementById('live-status-text').textContent = stages[currentIndex].title;
            document.getElementById('live-status-desc').textContent = stages[currentIndex].desc;
            document.getElementById('status-icon').innerHTML = '<svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">' + stages[currentIndex].icon + '</svg>';
            
            var sidebarStatus = document.getElementById('sidebar-status');
            sidebarStatus.textContent = currentStatus;

            var container = document.getElementById('timeline-container');
            container.innerHTML = '';

            stages.forEach((stage, idx) => {
                var isDone = idx < currentIndex;
                var isCurrent = idx === currentIndex;
                var isPending = idx > currentIndex;

                var circleClass = '';
                var textOpacity = '';
                
                if (isDone) {
                    circleClass = 'border-4 border-white bg-brand text-white shadow-sm z-10';
                    textOpacity = 'opacity-100';
                } else if (isCurrent) {
                    circleClass = 'border-4 border-white bg-dark text-white shadow-[0_0_0_4px_rgba(26,16,16,0.1)] z-10';
                    textOpacity = 'opacity-100';
                } else {
                    circleClass = 'border-4 border-white bg-border text-muted z-10';
                    textOpacity = 'opacity-50';
                }

                var html = `
                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group pb-8">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 ${circleClass}">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">${stage.icon}</svg>
                        </div>
                        <div class="w-[calc(100%-4rem)] md:w-[calc(50%-3rem)] p-4 md:p-5 rounded-xl border ${isCurrent ? 'border-dark bg-white shadow-sm' : 'border-border bg-cream/30'} text-right md:text-left md:group-even:text-right ${textOpacity}">
                            <strong class="block text-[14.5px] text-dark mb-1">${stage.title}</strong>
                            <p class="text-[13px] text-muted">${stage.desc}</p>
                        </div>
                    </div>
                `;
                container.innerHTML += html;
            });
        }

        renderTimeline();
        
        window.addEventListener('storage', function(e) {
            if (e.key === 'mua_active_tracking') {
                renderTimeline();
            }
        });
        
        setInterval(renderTimeline, 2000);
    </script>
@endpush