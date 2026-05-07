@extends('layouts.app')
@section('title', 'Login — Beautique MUA')
@section('flow_step', 'Sign In')

@section('content')
<style>
.auth-wrap { display:grid; grid-template-columns:1fr 1fr; min-height:100vh; margin-top:-32px; }
.auth-panel { background:linear-gradient(160deg,var(--dark) 0%,#2d1a14 100%); display:flex; flex-direction:column; justify-content:space-between; padding:52px 48px; position:relative; overflow:hidden; }
.auth-panel::before { content:''; position:absolute; top:-120px; right:-120px; width:400px; height:400px; border-radius:50%; background:radial-gradient(circle,rgba(198,147,126,.2) 0%,transparent 70%); }
.auth-panel::after { content:''; position:absolute; bottom:-80px; left:-80px; width:300px; height:300px; border-radius:50%; background:radial-gradient(circle,rgba(238,215,206,.12) 0%,transparent 70%); }
.auth-panel-logo { font-family:var(--font-serif); font-size:28px; font-weight:700; color:var(--rose); letter-spacing:1px; position:relative; z-index:1; }
.auth-panel-body { position:relative; z-index:1; }
.auth-panel-body h2 { font-family:var(--font-serif); font-size:38px; font-weight:700; color:#fff; line-height:1.15; margin-bottom:16px; }
.auth-panel-body h2 em { color:var(--rose); font-style:italic; }
.auth-panel-body p { font-size:14px; color:rgba(255,255,255,.5); line-height:1.85; }
.auth-panel-features { position:relative; z-index:1; }
.auth-feat { display:flex; align-items:center; gap:12px; margin-bottom:12px; }
.auth-feat-dot { width:8px; height:8px; border-radius:50%; background:var(--rose); flex-shrink:0; }
.auth-feat span { font-size:13px; color:rgba(255,255,255,.5); }
.auth-form-side { background:var(--white); display:flex; flex-direction:column; justify-content:center; padding:56px 52px; }
.auth-form-side h3 { font-family:var(--font-serif); font-size:30px; font-weight:700; color:var(--dark); margin-bottom:6px; }
.auth-form-side .sub { font-size:13.5px; color:var(--muted); margin-bottom:36px; }
.auth-form-side .sub a { color:var(--rose); font-weight:600; }
.auth-divider { display:flex; align-items:center; gap:12px; margin:22px 0; }
.auth-divider hr { flex:1; border:none; border-top:1px solid var(--border); }
.auth-divider span { font-size:12px; color:#ccc; }
.show-pass { position:absolute; right:14px; top:50%; transform:translateY(-50%); background:none; border:none; cursor:pointer; color:var(--muted); display:flex; padding:4px; }
.show-pass:hover { color:var(--rose); }
.forgot-row { display:flex; justify-content:space-between; align-items:center; margin-bottom:22px; }
.forgot-link { font-size:12.5px; color:var(--rose); font-weight:600; }
.forgot-link:hover { text-decoration:underline; }
@media(max-width:800px) {
    .auth-wrap { grid-template-columns:1fr; min-height:auto; }
    .auth-panel { display:none; }
    .auth-form-side { padding:40px 32px; }
}
</style>

<div class="auth-wrap">
    <!-- Left branding panel -->
    <div class="auth-panel">
        <div class="auth-panel-logo">Beautique</div>
        <div class="auth-panel-body">
            <h2>Welcome<br>Back,<br><em>Beautiful.</em></h2>
            <p>Sign in to manage your bookings and connect with your favourite makeup artists.</p>
        </div>
        <div class="auth-panel-features">
            <div class="auth-feat"><div class="auth-feat-dot"></div><span>500+ verified makeup artists</span></div>
            <div class="auth-feat"><div class="auth-feat-dot"></div><span>Seamless booking experience</span></div>
            <div class="auth-feat"><div class="auth-feat-dot"></div><span>Secure, transparent payments</span></div>
        </div>
    </div>

    <!-- Right form -->
    <div class="auth-form-side">
        <h3>Sign In</h3>
        <p class="sub">No account? <a href="{{ route('register') }}">Create one free</a></p>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <div class="input-icon-wrap">
                    <span class="icon material-icons-round">mail_outline</span>
                    <input id="email" name="email" type="email" class="form-control" placeholder="hello@example.com" required autocomplete="email">
                </div>
            </div>
            <div class="form-group" style="position:relative">
                <label class="form-label" for="password">Password</label>
                <div class="input-icon-wrap">
                    <span class="icon material-icons-round">lock_outline</span>
                    <input id="password" name="password" type="password" class="form-control" placeholder="••••••••" required autocomplete="current-password" style="padding-right:44px">
                    <button type="button" class="show-pass" onclick="togglePass()" id="show-pass-btn">
                        <span class="material-icons-round" id="pass-icon" style="font-size:19px">visibility_off</span>
                    </button>
                </div>
            </div>
            <div class="forgot-row">
                <label class="form-check">
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <a href="#" class="forgot-link">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-primary btn-block" style="border-radius:var(--radius-sm);padding:15px;">
                Sign In <span class="material-icons-round" style="font-size:18px">arrow_forward</span>
            </button>
        </form>

        <div class="auth-divider"><hr><span>or</span><hr></div>

        <a href="{{ route('booking.choose-mua') }}" class="btn btn-ghost btn-block" style="border-radius:var(--radius-sm);padding:14px;justify-content:center;gap:8px;font-size:14px;">
            <span class="material-icons-round" style="font-size:18px">explore</span> Browse MUAs as Guest
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
function togglePass() {
    const inp = document.getElementById('password');
    const icon = document.getElementById('pass-icon');
    if(inp.type === 'password') { inp.type = 'text'; icon.textContent = 'visibility'; }
    else { inp.type = 'password'; icon.textContent = 'visibility_off'; }
}
</script>
@endpush
