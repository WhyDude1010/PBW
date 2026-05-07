@extends('layouts.mobile')
@section('title','Thank You — Beautique')
@section('flow_step','Complete!')

@section('content')
<style>
.mobile-card{width:100%;max-width:480px;min-height:calc(100vh - 80px);border-radius:var(--radius-xl);box-shadow:0 24px 80px rgba(0,0,0,.1);background:var(--white);display:flex;flex-direction:column;overflow:hidden;}
.completion-body{flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:48px 32px;text-align:center;}
.heart-wrap{margin-bottom:28px;}
.heart-wrap svg{animation:heartbeat 2.2s ease-in-out infinite;}
.completion-body h2{font-family:var(--font-serif);font-size:36px;font-weight:700;color:var(--dark);margin-bottom:12px;}
.completion-body h2 em{color:var(--rose);font-style:italic;}
.completion-body p{font-size:14px;color:var(--muted);line-height:1.85;max-width:300px;margin-bottom:32px;}
/* Confetti dots */
.confetti{position:absolute;top:0;left:0;right:0;height:200px;overflow:hidden;pointer-events:none;}
.dot{position:absolute;border-radius:50%;animation:fall linear infinite;}
@keyframes fall{0%{transform:translateY(-20px) rotate(0deg);opacity:1}100%{transform:translateY(220px) rotate(360deg);opacity:0}}
.btn-group{display:flex;flex-direction:column;gap:12px;width:100%;}
.btn-outline-rose{display:flex;align-items:center;justify-content:center;gap:8px;padding:14px;border-radius:var(--radius-sm);border:1.5px solid var(--rose);color:var(--rose);font-weight:600;font-size:14px;transition:var(--transition);}
.btn-outline-rose:hover{background:var(--rose);color:#fff;}
</style>

<div class="mobile-card" style="position:relative;overflow:hidden;">
    <div class="confetti" id="confetti"></div>

    <div class="completion-body">
        <div class="heart-wrap">
            <svg width="88" height="88" viewBox="0 0 24 24" fill="none" stroke="var(--rose)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" fill="var(--rose-light)"/>
            </svg>
        </div>
        <h2>Thank<br><em>You!</em></h2>
        <p>Your booking journey is complete. We hope you felt truly beautiful. We can't wait to serve you again!</p>

        <div class="btn-group">
            <a href="{{ route('booking.choose-mua') }}" class="btn btn-primary" style="justify-content:center;border-radius:var(--radius-sm);padding:15px;">
                <span class="material-icons-round" style="font-size:18px">add_circle_outline</span> Book Another MUA
            </a>
            <a href="{{ route('landing') }}" class="btn-outline-rose">
                <span class="material-icons-round" style="font-size:18px">home</span> Back to Home
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Confetti
const colors = ['#C6937E','#EED7CE','#A07060','#FAF5F0','#F59E0B','#2ECC71'];
const c = document.getElementById('confetti');
for(let i=0;i<28;i++){
    const d = document.createElement('div');
    d.className='dot';
    const size = Math.random()*8+4;
    d.style.cssText=`width:${size}px;height:${size}px;background:${colors[Math.floor(Math.random()*colors.length)]};left:${Math.random()*100}%;animation-duration:${Math.random()*2+1.5}s;animation-delay:${Math.random()*2}s;`;
    c.appendChild(d);
}
</script>
@endpush