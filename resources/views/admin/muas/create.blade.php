@extends('layouts.admin')
@section('title','Add New MUA')
@section('page_title','Add New MUA')
@section('page_meta','Create a new makeup artist profile')

@section('content')
<div style="max-width:720px;">
    <div class="page-card">
        <div class="page-card-header">
            <h4>Artist Profile</h4>
            <a href="{{ route('admin.muas.index') }}" class="btn btn-ghost btn-sm">← Back to list</a>
        </div>
        <div style="padding:28px;">
            <form action="{{ route('admin.muas.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Photo Upload -->
                <div class="form-group">
                    <label class="form-label">Profile Photo</label>
                    <div id="drop-zone" style="border:2px dashed var(--border);border-radius:var(--radius-md);padding:36px;text-align:center;cursor:pointer;transition:var(--transition);background:var(--cream);" onclick="document.getElementById('photo-input').click()">
                        <span class="material-icons-round" style="font-size:36px;color:var(--muted);display:block;margin-bottom:8px;">add_photo_alternate</span>
                        <p style="font-size:13px;color:var(--muted);">Click to upload photo or drag &amp; drop</p>
                        <p style="font-size:11px;color:#ccc;margin-top:4px;">PNG, JPG up to 5MB</p>
                        <input type="file" id="photo-input" name="photo" accept="image/*" style="display:none;" onchange="previewPhoto(this)">
                    </div>
                    <img id="photo-preview" src="" alt="Preview" style="display:none;width:80px;height:80px;border-radius:50%;object-fit:cover;margin-top:12px;border:3px solid var(--rose-light);">
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
                    <div class="form-group">
                        <label class="form-label" for="mua-name">Full Name *</label>
                        <div class="input-icon-wrap">
                            <span class="icon material-icons-round">person</span>
                            <input id="mua-name" name="name" type="text" class="form-control" placeholder="e.g. Sarah Wijaya" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="mua-location">Location *</label>
                        <select id="mua-location" name="location" class="form-control" required>
                            <option value="">Select city…</option>
                            <option>Bali</option><option>Jakarta</option><option>Surabaya</option>
                            <option>Bandung</option><option>Yogyakarta</option><option>Medan</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="mua-email">Contact Email *</label>
                    <div class="input-icon-wrap">
                        <span class="icon material-icons-round">mail_outline</span>
                        <input id="mua-email" name="email" type="email" class="form-control" placeholder="artist@example.com" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="mua-bio">Bio / About</label>
                    <textarea id="mua-bio" name="bio" class="form-control" rows="4" placeholder="Write a short introduction about this artist…" style="resize:vertical;"></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Makeup Styles *</label>
                    <div style="display:flex;flex-wrap:wrap;gap:10px;padding:4px 0;">
                        @foreach(['Natural','Korean Dewy','Soft Glam','Full Glam','Bridal','Editorial','Bold / Latina','Party','Traditional'] as $style)
                        <label style="display:flex;align-items:center;gap:7px;padding:7px 14px;border:1.5px solid var(--border);border-radius:var(--radius-pill);cursor:pointer;font-size:13px;font-weight:500;transition:var(--transition);" class="style-check-wrap">
                            <input type="checkbox" name="styles[]" value="{{ $style }}" style="accent-color:var(--rose);"> {{ $style }}
                        </label>
                        @endforeach
                    </div>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
                    <div class="form-group">
                        <label class="form-label">Price From (Rp)</label>
                        <input name="price_min" type="number" class="form-control" placeholder="500000">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Price Up To (Rp)</label>
                        <input name="price_max" type="number" class="form-control" placeholder="15000000">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-check">
                        <input type="checkbox" name="is_available" value="1" checked> Mark as Available immediately
                    </label>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px;">
                    <button type="submit" class="btn btn-primary">
                        <span class="material-icons-round" style="font-size:17px;">save</span> Save Artist
                    </button>
                    <a href="{{ route('admin.muas.index') }}" class="btn btn-ghost">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewPhoto(input){
    if(!input.files||!input.files[0]) return;
    const reader = new FileReader();
    reader.onload = e=>{
        const prev = document.getElementById('photo-preview');
        prev.src = e.target.result;
        prev.style.display='block';
    };
    reader.readAsDataURL(input.files[0]);
}
// Style checkbox visual
document.querySelectorAll('.style-check-wrap').forEach(el=>{
    el.addEventListener('change',()=>{
        el.style.borderColor = el.querySelector('input').checked ? 'var(--rose)' : 'var(--border)';
        el.style.background  = el.querySelector('input').checked ? 'var(--rose-light)' : '';
        el.style.color       = el.querySelector('input').checked ? 'var(--rose-dark)' : '';
    });
});
</script>
@endpush
