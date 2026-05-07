@extends('layouts.app')
@section('title', 'Create Account — Beautique MUA')
@section('flow_step', 'Sign Up')

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
.auth-form-side { background:var(--white); display:flex; flex-direction:column; justify-content:center; padding:48px 52px; overflow-y:auto; }
.auth-form-side h3 { font-family:var(--font-serif); font-size:30px; font-weight:700; color:var(--dark); margin-bottom:6px; }
.auth-form-side .sub { font-size:13.5px; color:var(--muted); margin-bottom:32px; }
.auth-form-side .sub a { color:var(--rose); font-weight:600; }
.form-row { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
.show-pass { position:absolute; right:14px; top:50%; transform:translateY(-50%); background:none; border:none; cursor:pointer; color:var(--muted); display:flex; padding:4px; }
.show-pass:hover { color:var(--rose); }
.terms-text { font-size:12px; color:var(--muted); line-height:1.6; }
.terms-text a { color:var(--rose); }
@media(max-width:800px) {
    .auth-wrap { grid-template-columns:1fr; }
    .auth-panel { display:none; }
    .auth-form-side { padding:40px 28px; }
    .form-row { grid-template-columns:1fr; }
}
</style>

<div class="auth-wrap">
    <div class="auth-panel">
        <div class="auth-panel-logo">Beautique</div>
        <div class="auth-panel-body">
            <h2>Join<br>Beautique,<br><em>Today.</em></h2>
            <p>Create your account in under a minute and start discovering Indonesia's finest makeup artists.</p>
        </div>
        <div class="auth-panel-features">
            <div class="auth-feat"><div class="auth-feat-dot"></div><span>Free to sign up</span></div>
            <div class="auth-feat"><div class="auth-feat-dot"></div><span>Track all your bookings in one place</span></div>
            <div class="auth-feat"><div class="auth-feat-dot"></div><span>Exclusive member-only offers</span></div>
        </div>
    </div>

    <div class="auth-form-side">
        <h3>Create Account</h3>
        <p class="sub">Already have one? <a href="{{ route('login') }}">Sign in</a></p>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="first_name">First Name</label>
                    <div class="input-icon-wrap">
                        <span class="icon material-icons-round">person_outline</span>
                        <input id="first_name" name="first_name" type="text" class="form-control" placeholder="Sari" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="last_name">Last Name</label>
                    <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Dewi" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="reg-email">Email Address</label>
                <div class="input-icon-wrap">
                    <span class="icon material-icons-round">mail_outline</span>
                    <input id="reg-email" name="email" type="email" class="form-control" placeholder="hello@example.com" required autocomplete="email">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="phone">Phone Number</label>
                <div class="input-icon-wrap">
                    <span class="icon material-icons-round">phone_outlined</span>
                    <input id="phone" name="phone" type="tel" class="form-control" placeholder="+62 812 3456 7890">
                </div>
            </div>
            <div class="form-group" style="position:relative">
                <label class="form-label" for="reg-password">Password</label>
                <div class="input-icon-wrap">
                    <span class="icon material-icons-round">lock_outline</span>
                    <input id="reg-password" name="password" type="password" class="form-control" placeholder="Min 8 characters" required style="padding-right:44px">
                    <button type="button" class="show-pass" onclick="togglePass('reg-password','reg-icon')">
                        <span class="material-icons-round" id="reg-icon" style="font-size:19px">visibility_off</span>
                    </button>
                </div>
            </div>
            <div class="form-group" style="margin-bottom:20px">
                <label class="form-label" for="password_confirm">Confirm Password</label>
                <div class="input-icon-wrap">
                    <span class="icon material-icons-round">lock_outline</span>
                    <input id="password_confirm" name="password_confirmation" type="password" class="form-control" placeholder="Repeat password" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-check" style="align-items:flex-start;gap:10px">
                    <input type="checkbox" name="terms" required style="margin-top:2px">
                    <span class="terms-text">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary btn-block" style="border-radius:var(--radius-sm);padding:15px;">
                Create My Account <span class="material-icons-round" style="font-size:18px">arrow_forward</span>
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function togglePass(id, iconId) {
    const inp  = document.getElementById(id);
    const icon = document.getElementById(iconId);
    if(inp.type === 'password') { inp.type = 'text'; icon.textContent = 'visibility'; }
    else { inp.type = 'password'; icon.textContent = 'visibility_off'; }
}
</script>
@endpush
