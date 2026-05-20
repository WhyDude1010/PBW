@extends('layouts.mua')
@section('title','Schedule')
@section('page_title','Schedule')
@section('page_meta','Manage your availability and blocked dates')

@section('content')
<div x-data="schedulePage()" x-cloak>
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        <div class="xl:col-span-2 space-y-8">
            <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-border flex items-center justify-between">
                    <button type="button" @click="prevMonth()" class="w-8 h-8 rounded-full border border-border flex items-center justify-center text-muted hover:border-brand hover:text-brand transition-colors">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <h4 class="font-bold text-[16px] text-dark min-w-[160px] text-center" x-text="monthLabel"></h4>
                    <button type="button" @click="nextMonth()" class="w-8 h-8 rounded-full border border-border flex items-center justify-center text-muted hover:border-brand hover:text-brand transition-colors">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
                
                <!-- Days of Week Header -->
                <div class="grid grid-cols-7 border-b border-border bg-white">
                    <template x-for="(day, idx) in weekDays" :key="day">
                        <div class="py-3 text-[12px] font-bold text-muted uppercase tracking-wider text-center border-r border-border last:border-r-0"
                             :class="{'text-brand': idx === 5 || idx === 6}"
                             x-text="day"></div>
                    </template>
                </div>

                <!-- Calendar Grid -->
                <div class="grid grid-cols-7 border-l border-t border-border">
                    <template x-for="cell in calendarCells" :key="cell.dateKey">
                        <div @click="selectDate(cell)"
                            class="min-h-[110px] lg:min-h-[140px] p-1.5 flex flex-col transition-all cursor-pointer relative group border-b border-r border-border"
                            :class="{
                                'bg-white hover:bg-cream/30': cell.current && !cell.blocked,
                                'bg-cream/40': cell.current && cell.blocked,
                                'bg-white text-muted opacity-50 pointer-events-none': !cell.current
                            }">
                            <!-- Day Number -->
                            <template x-if="cell.day">
                                <div class="flex justify-center mb-1">
                                    <span class="w-6 h-6 flex items-center justify-center text-[12px] font-bold rounded-full transition-colors mt-0.5"
                                        :class="{
                                            'bg-brand text-white shadow-sm': cell.isToday,
                                            'text-dark group-hover:bg-cream group-hover:text-dark': !cell.isToday && cell.current && !cell.blocked,
                                            'text-muted': cell.blocked || !cell.current
                                        }"
                                        x-text="cell.day">
                                    </span>
                                </div>
                            </template>

                            <!-- Bookings List -->
                            <template x-if="cell.current && !cell.blocked">
                                <div class="flex-1 overflow-hidden space-y-1 mt-1 w-full">
                                    <template x-for="(bk, i) in cell.bookings.slice(0, 3)" :key="i">
                                        <div class="px-1 py-0.5 text-[8px] leading-tight rounded font-medium truncate w-full text-center flex flex-col items-center justify-center"
                                            :class="{
                                                'bg-brand/10 text-brand': bk.status === 'confirmed',
                                                'bg-amber-500/10 text-amber-700': bk.status === 'pending',
                                                'bg-emerald-500/10 text-emerald-600': bk.status === 'done'
                                            }"
                                            :title="bk.time + ' - ' + bk.client">
                                            <span class="font-bold opacity-75" x-text="bk.time"></span>
                                            <span x-text="bk.client" class="truncate w-full"></span>
                                        </div>
                                    </template>
                                    <template x-if="cell.bookings.length > 3">
                                        <div class="px-1 text-[9.5px] font-bold text-dark hover:text-brand transition-colors mt-1 w-full text-center">
                                            <span x-text="'+' + (cell.bookings.length - 3) + ' more'"></span>
                                        </div>
                                    </template>
                                </div>
                            </template>

                            <!-- Blocked State -->
                            <template x-if="cell.current && cell.blocked">
                                <div class="flex-1 flex items-center justify-center pointer-events-none w-full">
                                    <span class="text-[10px] font-bold text-muted uppercase tracking-wider px-2 py-1 rounded">Unavailable</span>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-border">
                    <h4 class="font-bold text-[16px] text-dark">Blocked Dates</h4>
                </div>
                <div class="p-5 space-y-3">
                    <template x-if="blockedDates.length === 0">
                        <p class="text-[13px] text-muted text-center py-4">No custom blocked dates.</p>
                    </template>
                    <template x-for="(bl, bidx) in blockedDates" :key="bidx">
                        <div class="flex items-center justify-between p-3 bg-cream/50 rounded-xl border border-border/50">
                            <div>
                                <div class="text-[13px] font-bold text-dark" x-text="bl.label"></div>
                                <div class="text-[11px] text-muted" x-text="bl.reason"></div>
                            </div>
                            <button type="button" @click="removeBlocked(bidx)" class="w-7 h-7 rounded-lg bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white flex items-center justify-center transition-colors">
                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                    </template>
                </div>
                <div class="px-5 pb-5">
                    <button type="button" @click="addBlockModal = true" class="w-full py-2.5 rounded-xl border-2 border-dashed border-border text-[13px] font-bold text-muted hover:border-brand hover:text-brand transition-colors flex items-center justify-center gap-2">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                        Add Blocked Date
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <!-- detailModal -->
<div x-show="detailModal"
    class="fixed inset-0 z-40 flex items-center justify-center p-4"
    style="display:none">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-dark/40 backdrop-blur-sm"
        @click="detailModal = false"
        x-transition.opacity>
    </div>

    <!-- Modal - New redesigned structure -->
    <div class="relative bg-white rounded-2xl shadow-xl w-full mx-auto sm:max-w-md flex flex-col"
        style="max-height: calc(100vh - 1rem); height: auto;"
        x-show="detailModal"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95">

        <!-- Header - Fixed -->
        <div class="shrink-0 px-4 sm:px-6 py-4 sm:py-5 border-b border-border bg-cream/30 flex items-center justify-between rounded-t-2xl">
            <h4 class="font-bold text-[14px] sm:text-[16px] text-dark"
                x-text="selectedDateLabel">
            </h4>

            <button type="button"
                @click="detailModal = false"
                class="text-muted hover:text-dark transition-colors flex-shrink-0">
                <svg width="20"
                    height="20"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Scrollable Content -->
        <div class="overflow-y-auto flex-1 px-4 sm:px-6 py-4 sm:py-6 space-y-4 sm:space-y-6">

            <!-- Working hours settings for this day -->
            <div>
                <h5 class="text-[11px] sm:text-[12px] font-bold text-muted uppercase tracking-wider mb-3">
                    Day Schedule
                </h5>

                <div class="p-3 sm:p-4 bg-cream/30 border border-border/50 rounded-xl space-y-3 sm:space-y-4">

                    <div class="flex items-center justify-between">
                        <span class="text-[13px] sm:text-[14px] font-bold text-dark">
                            Available
                        </span>

                        <button type="button"
                            @click.stop="toggleSelectedDayStatus()"
                            class="w-10 h-6 flex items-center rounded-full p-1 cursor-pointer transition-colors duration-200 focus:outline-none border-0 flex-shrink-0"
                            :class="!selectedDayBlocked ? 'bg-brand' : 'bg-border'">

                            <div class="bg-white w-4 h-4 rounded-full shadow-sm transition-transform duration-200"
                                :style="!selectedDayBlocked ? 'transform: translateX(16px);' : 'transform: translateX(0px);'">
                            </div>
                        </button>
                    </div>

                    <div x-show="!selectedDayBlocked"
                        x-transition
                        class="grid grid-cols-[1fr_auto_1fr] items-center gap-2 sm:gap-3 pt-2">

                        <input type="text"
                            x-model="selectedDayStart"
                            @change="updateDaySchedule()"
                            placeholder="09:00"
                            maxlength="5"
                            class="w-full min-w-0 py-2 sm:py-2.5 px-2 sm:px-3 text-center rounded-lg border border-border bg-white text-[12px] sm:text-[13.5px] font-bold text-dark focus:ring-1 focus:ring-brand focus:border-brand outline-none transition-colors">

                        <span class="text-[11px] sm:text-[12px] text-muted font-bold">
                            to
                        </span>

                        <input type="text"
                            x-model="selectedDayEnd"
                            @change="updateDaySchedule()"
                            placeholder="18:00"
                            maxlength="5"
                            class="w-full min-w-0 py-2 sm:py-2.5 px-2 sm:px-3 text-center rounded-lg border border-border bg-white text-[12px] sm:text-[13.5px] font-bold text-dark focus:ring-1 focus:ring-brand focus:border-brand outline-none transition-colors">
                    </div>
                </div>
            </div>

            <!-- Bookings -->
            <div>
                <h5 class="text-[11px] sm:text-[12px] font-bold text-muted uppercase tracking-wider mb-3">
                    Bookings (
                    <span x-text="selectedDayBookings.length"></span>
                    )
                </h5>

                <div class="space-y-2 sm:space-y-3">

                    <template x-if="selectedDayBookings.length === 0">
                        <div class="text-center py-4 sm:py-6 border-2 border-dashed border-border rounded-xl">
                            <p class="text-[12px] sm:text-[13px] text-muted font-medium">
                                No bookings on this day.
                            </p>
                        </div>
                    </template>

                    <template x-for="(bk, i) in selectedDayBookings"
                        :key="i">

                        <div class="p-3 sm:p-4 border border-border rounded-xl hover:border-brand/30 transition-colors">

                            <div class="flex items-center justify-between mb-2 gap-2">
                                <span class="font-bold text-[13px] sm:text-[14px] text-dark truncate"
                                    x-text="bk.client">
                                </span>

                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-bold uppercase tracking-wider flex-shrink-0"
                                    :class="{
                                        'bg-emerald-500/10 text-emerald-500': bk.status === 'confirmed',
                                        'bg-amber-500/10 text-amber-600': bk.status === 'pending',
                                        'bg-brand/10 text-brand': bk.status === 'done'
                                    }"
                                    x-text="bk.status">
                                </span>
                            </div>

                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-3 text-[11px] sm:text-[12px] text-muted font-medium">
                                <div class="flex items-center gap-1.5 text-dark font-bold flex-shrink-0">
                                    <svg width="14"
                                        height="14"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>

                                    <span x-text="bk.time"></span>
                                </div>

                                <span class="hidden sm:inline">•</span>
                                <span x-text="bk.package" class="truncate"></span>

                                <span class="hidden sm:inline">•</span>
                                <span x-text="bk.type" class="truncate"></span>
                            </div>

                            <template x-if="bk.status === 'confirmed'">
                                <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-border">

                                    <div class="text-[10px] sm:text-[11px] font-bold text-muted uppercase tracking-wider mb-2">
                                        Live Tracking
                                    </div>

                                    <div class="grid grid-cols-2 gap-1.5 sm:gap-2">

                                        <button type="button"
                                            @click.stop="updateTracking(bk, 'Preparing')"
                                            class="py-1 sm:py-1.5 px-2 rounded-lg border border-border text-[11px] sm:text-[12px] font-bold hover:border-brand hover:text-brand transition-colors"
                                            :class="{'bg-brand/10 border-brand text-brand': (bk.trackingStatus || 'Confirmed') === 'Preparing'}">
                                            Preparing
                                        </button>

                                        <button type="button"
                                            @click.stop="updateTracking(bk, 'On the Way')"
                                            class="py-1 sm:py-1.5 px-2 rounded-lg border border-border text-[11px] sm:text-[12px] font-bold hover:border-brand hover:text-brand transition-colors"
                                            :class="{'bg-brand/10 border-brand text-brand': (bk.trackingStatus || 'Confirmed') === 'On the Way'}">
                                            On the Way
                                        </button>

                                        <button type="button"
                                            @click.stop="updateTracking(bk, 'Arrived')"
                                            class="py-1 sm:py-1.5 px-2 rounded-lg border border-border text-[11px] sm:text-[12px] font-bold hover:border-brand hover:text-brand transition-colors"
                                            :class="{'bg-brand/10 border-brand text-brand': (bk.trackingStatus || 'Confirmed') === 'Arrived'}">
                                            Arrived
                                        </button>

                                        <button type="button"
                                            @click.stop="updateTracking(bk, 'Service In Progress')"
                                            class="py-1 sm:py-1.5 px-2 rounded-lg border border-border text-[11px] sm:text-[12px] font-bold hover:border-brand hover:text-brand transition-colors"
                                            :class="{'bg-brand/10 border-brand text-brand': (bk.trackingStatus || 'Confirmed') === 'Service In Progress'}">
                                            In Progress
                                        </button>

                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>
            </div>

        </div>

        <!-- Footer - Fixed -->
        <div class="shrink-0 p-3 sm:p-5 border-t border-border bg-cream/30 rounded-b-2xl">
            <button type="button"
                @click="detailModal = false"
                class="w-full bg-brand hover:bg-brand-dark text-white py-2.5 sm:py-3 rounded-xl font-bold text-[13px] sm:text-[14px] transition-colors">
                Done
            </button>
        </div>
    </div>
</div>



    <!-- Add Blocked Date Modal -->
    <div x-show="addBlockModal" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display:none">
        <div class="absolute inset-0 bg-dark/40 backdrop-blur-sm" @click="addBlockModal = false"></div>
        <div class="relative bg-white rounded-2xl border border-border shadow-xl w-full max-w-sm overflow-hidden" x-transition>
            <div class="px-6 py-5 border-b border-border bg-cream/30">
                <h4 class="font-bold text-[16px] text-dark">Block a Date</h4>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Date</label>
                    <input type="date" x-model="newBlock.date" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark cursor-pointer">
                </div>
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Reason</label>
                    <input type="text" x-model="newBlock.reason" placeholder="e.g. Personal Day, Holiday…" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-muted">
                </div>
            </div>
            <div class="px-6 py-4 border-t border-border bg-cream/30 flex items-center justify-end gap-3">
                <button type="button" @click="addBlockModal = false" class="px-5 py-2.5 rounded-xl text-[13px] font-bold text-muted hover:text-dark transition-colors">Cancel</button>
                <button type="button" @click="addBlocked()" class="px-5 py-2.5 rounded-xl bg-brand text-white text-[13px] font-bold hover:bg-brand-dark transition-colors">Block Date</button>
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div x-show="toast" x-transition.opacity class="fixed bottom-6 right-6 z-50 flex items-center gap-3 bg-dark text-white px-5 py-3.5 rounded-xl shadow-lg" style="display:none">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span class="text-[13px] font-bold" x-text="toastMsg"></span>
    </div>

</div>
@endsection

@push('scripts')
<script>
function schedulePage() {
    var monthNames = ['January','February','March','April','May','June','July','August','September','October','November','December'];

    var bookingsData = {
        '2026-05-10': [{ time: '09:00', client: 'Rina Maharani', package: 'Basic Beauty', type: 'Home Service', status: 'confirmed' }],
        '2026-05-11': [{ time: '14:00', client: 'Delia Santoso', package: 'Creative Glam', type: 'Studio Visit', status: 'pending' }],
        '2026-05-12': [{ time: '10:00', client: 'Citra Dewi', package: 'Editorial', type: 'Home Service', status: 'confirmed' }],
        '2026-05-13': [{ time: '08:00', client: 'Ayu Pratiwi', package: 'Signature Bridal', type: 'Home Service', status: 'pending' }],
        '2026-05-14': [{ time: '11:00', client: 'Sari Indah', package: 'Basic Beauty', type: 'Studio Visit', status: 'done' }],
        '2026-05-15': [{ time: '13:00', client: 'Mega Putri', package: 'Party Glam', type: 'Home Service', status: 'confirmed' }],
        '2026-05-20': [
            { time: '09:00', client: 'Lina Kusuma', package: 'Creative Glam', type: 'Studio Visit', status: 'confirmed' },
            { time: '14:00', client: 'Dewi Anggraini', package: 'Basic Beauty', type: 'Home Service', status: 'pending' }
        ],
        '2026-05-22': [
            { time: '08:00', client: 'Fitri Handayani', package: 'Signature Bridal', type: 'Home Service', status: 'confirmed' },
            { time: '10:00', client: 'Ratna Sari', package: 'Party Glam', type: 'Studio Visit', status: 'confirmed' },
            { time: '14:00', client: 'Wulan Putri', package: 'Creative Glam', type: 'Home Service', status: 'pending' }
        ],
        '2026-05-27': [{ time: '10:00', client: 'Anisa Rahman', package: 'Basic Beauty', type: 'Studio Visit', status: 'pending' }],
        '2026-06-02': [{ time: '09:00', client: 'Maya Putri', package: 'Creative Glam', type: 'Home Service', status: 'pending' }],
        '2026-06-05': [{ time: '11:00', client: 'Bella Kartika', package: 'Signature Bridal', type: 'Studio Visit', status: 'confirmed' }],
    };



    return {
        currentYear: 2026,
        currentMonth: 4,
        monthLabel: '',
        calendarCells: [],
        weekDays: ['Mo','Tu','We','Th','Fr','Sa','Su'],
        
        detailModal: false,
        selectedDateKey: null,
        selectedDateLabel: '',
        selectedDayBookings: [],
        selectedDayBlocked: false,
        selectedDayStart: '09:00',
        selectedDayEnd: '18:00',
        
        daySchedules: {}, 

        addBlockModal: false,
        newBlock: { date: '', reason: '' },
        blockedDates: [
            { date: '2026-05-25', label: '25 May 2026', reason: 'Personal Day' },
            { date: '2026-06-01', label: '1 Jun 2026', reason: 'Holiday' },
            { date: '2026-06-15', label: '15 Jun 2026', reason: 'Training Workshop' },
        ],

        toast: false,
        toastMsg: '',

        init() {
            this.buildCalendar();
            this.$watch('detailModal', val => {
                document.body.style.overflow = val ? 'hidden' : '';
            });
            this.$watch('addBlockModal', val => {
                document.body.style.overflow = val ? 'hidden' : '';
            });
        },

        buildCalendar() {
            this.monthLabel = monthNames[this.currentMonth] + ' ' + this.currentYear;
            var cells = [];
            var firstDay = (new Date(this.currentYear, this.currentMonth, 1).getDay() + 6) % 7;
            var daysInMonth = new Date(this.currentYear, this.currentMonth + 1, 0).getDate();
            var prevMonthDays = new Date(this.currentYear, this.currentMonth, 0).getDate();
            var today = new Date();
            var todayKey = today.getFullYear() + '-' + String(today.getMonth() + 1).padStart(2, '0') + '-' + String(today.getDate()).padStart(2, '0');

            for (var i = firstDay - 1; i >= 0; i--) {
                var pDay = prevMonthDays - i;
                cells.push({ day: pDay, current: false, dateKey: '' });
            }

            for (var d = 1; d <= daysInMonth; d++) {
                var key = this.currentYear + '-' + String(this.currentMonth + 1).padStart(2, '0') + '-' + String(d).padStart(2, '0');
                
                var isBlocked = false;
                for(var b=0; b<this.blockedDates.length; b++){
                    if(this.blockedDates[b].date === key) { isBlocked = true; break; }
                }

                if (this.daySchedules[key]) {
                    if (this.daySchedules[key].blocked) isBlocked = true;
                } else {
                    var dayOfWeek = new Date(this.currentYear, this.currentMonth, d).getDay();
                    if (dayOfWeek === 0) isBlocked = true;
                }

                cells.push({
                    day: d,
                    dateKey: key,
                    current: true,
                    isToday: (key === todayKey),
                    bookings: bookingsData[key] || [],
                    blocked: isBlocked
                });
            }

            while(cells.length % 7 !== 0) {
                cells.push({ day: (cells.length % 7) + 1, current: false, dateKey: '' });
            }

            this.calendarCells = cells;
        },

        prevMonth() {
            this.currentMonth--;
            if (this.currentMonth < 0) { this.currentMonth = 11; this.currentYear--; }
            this.buildCalendar();
        },

        nextMonth() {
            this.currentMonth++;
            if (this.currentMonth > 11) { this.currentMonth = 0; this.currentYear++; }
            this.buildCalendar();
        },

        selectDate(cell) {
            if (!cell.current) return;
            this.selectedDateKey = cell.dateKey;
            
            var parts = cell.dateKey.split('-');
            var m = parseInt(parts[1]) - 1;
            var d = parseInt(parts[2]);
            var y = parseInt(parts[0]);
            
            this.selectedDateLabel = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'][new Date(y, m, d).getDay()] + ', ' + d + ' ' + monthNames[m] + ' ' + y;
            this.selectedDayBookings = cell.bookings || [];
            this.selectedDayBlocked = cell.blocked;
            
            if (this.daySchedules[cell.dateKey]) {
                this.selectedDayStart = this.daySchedules[cell.dateKey].start;
                this.selectedDayEnd = this.daySchedules[cell.dateKey].end;
            } else {
                this.selectedDayStart = '09:00';
                this.selectedDayEnd = '18:00';
            }

            this.detailModal = true;
        },

        toggleSelectedDayStatus() {
            this.selectedDayBlocked = !this.selectedDayBlocked;
            
            var currentOverride = this.daySchedules[this.selectedDateKey] || { blocked: this.selectedDayBlocked, start: this.selectedDayStart, end: this.selectedDayEnd };
            currentOverride.blocked = this.selectedDayBlocked;

            this.daySchedules = Object.assign({}, this.daySchedules, {
                [this.selectedDateKey]: currentOverride
            });

            if (this.selectedDayBlocked) {
                var exists = false;
                for (var i = 0; i < this.blockedDates.length; i++) {
                    if (this.blockedDates[i].date === this.selectedDateKey) { exists = true; break; }
                }
                if (!exists) {
                    var parts = this.selectedDateKey.split('-');
                    var mNames = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                    var lbl = parseInt(parts[2]) + ' ' + mNames[parseInt(parts[1])-1] + ' ' + parts[0];
                    this.blockedDates.push({ date: this.selectedDateKey, label: lbl, reason: 'Custom Block' });
                }
            } else {
                var newBlocked = [];
                for (var i = 0; i < this.blockedDates.length; i++) {
                    if (this.blockedDates[i].date !== this.selectedDateKey) {
                        newBlocked.push(this.blockedDates[i]);
                    }
                }
                this.blockedDates = newBlocked;
            }

            this.buildCalendar();
        },

        updateDaySchedule() {
            var formatTime = function(t) {
                t = String(t).replace(/[^\d:]/g, '');
                if (!t) return '00:00';
                
                if (t.indexOf(':') === -1) {
                    if (t.length === 1 || t.length === 2) t = t + ':00';
                    else if (t.length === 3) t = '0' + t.substring(0,1) + ':' + t.substring(1);
                    else t = t.substring(0,2) + ':' + t.substring(2,4);
                }
                var parts = t.split(':');
                var h = parseInt(parts[0]) || 0;
                var m = parseInt(parts[1] || '0') || 0;
                if (h > 23) h = 23;
                if (m > 59) m = 59;
                return String(h).padStart(2, '0') + ':' + String(m).padStart(2, '0');
            };

            this.selectedDayStart = formatTime(this.selectedDayStart);
            this.selectedDayEnd = formatTime(this.selectedDayEnd);

            var currentOverride = this.daySchedules[this.selectedDateKey] || { blocked: this.selectedDayBlocked, start: this.selectedDayStart, end: this.selectedDayEnd };
            currentOverride.start = this.selectedDayStart;
            currentOverride.end = this.selectedDayEnd;

            this.daySchedules = Object.assign({}, this.daySchedules, {
                [this.selectedDateKey]: currentOverride
            });

            this.showToast('Time updated');
        },

        addBlocked() {
            if (!this.newBlock.date) return;
            var parts = this.newBlock.date.split('-');
            var y = parseInt(parts[0]), m = parseInt(parts[1])-1, d = parseInt(parts[2]);
            var label = d + ' ' + monthNames[m].substring(0, 3) + ' ' + y;
            
            this.blockedDates.push({
                date: this.newBlock.date,
                label: label,
                reason: this.newBlock.reason || 'Blocked'
            });

            var currentOverride = this.daySchedules[this.newBlock.date] || { blocked: true, start: '09:00', end: '18:00' };
            currentOverride.blocked = true;
            this.daySchedules = Object.assign({}, this.daySchedules, {
                [this.newBlock.date]: currentOverride
            });

            this.addBlockModal = false;
            this.newBlock = { date: '', reason: '' };
            this.buildCalendar();
            this.showToast('Date blocked successfully');
        },

        removeBlocked(idx) {
            var dateStr = this.blockedDates[idx].date;
            this.blockedDates.splice(idx, 1);
            
            if (this.daySchedules[dateStr]) {
                var currentOverride = this.daySchedules[dateStr];
                currentOverride.blocked = false;
                this.daySchedules = Object.assign({}, this.daySchedules, {
                    [dateStr]: currentOverride
                });
            }

            this.buildCalendar();
            this.showToast('Blocked date removed');
        },

        updateTracking(bk, status) {
            bk.trackingStatus = status;
            // Also save to global tracking for client simulation uniquely per client
            localStorage.setItem('mua_active_tracking_' + bk.client.replace(/\s+/g, '_').toLowerCase(), status);
            this.showToast('Tracking for ' + bk.client + ' updated to: ' + status);
        },

        showToast(msg) {
            this.toastMsg = msg;
            this.toast = true;
            setTimeout(() => { this.toast = false; }, 2500);
        }
    }
}
</script>
@endpush
