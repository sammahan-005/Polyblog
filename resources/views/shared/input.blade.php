@php
    $type??= 'text';
    $name??= '';
    $label??= '';
    $placeholder??= '';
    
@endphp
<div class="mb-3">
@if ($type == 'textarea')
    
        <div class="mb-4 message-input-container">
    <label for="{{ $name }}" class="form-label fw-black text-uppercase small px-2 text-dark" style="letter-spacing: 1px;">
        {{ $label }}
    </label>
    
    <div class="position-relative shadow-sm rounded-4 overflow-hidden">
        <textarea 
            class="form-control border-2 bg-light @error($name) is-invalid @enderror custom-textarea" 
            name="{{ $name }}" 
            id="{{ $name }}" 
            rows="6" 
            placeholder="{{ $placeholder }}" 
            required
            style="border-color: #eee; transition: all 0.3s ease;"></textarea>
            
        
    </div>

    @error($name)
        <div class="invalid-feedback d-block mt-2 fw-bold">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $message }}
        </div>
    @enderror
</div>

<style>
    .fw-black { font-weight: 900; }

    .custom-textarea {
        border-radius: 15px !important;
        padding: 1.2rem !important;
        resize: none; 
        font-size: 1.1rem;
    }

    
    .custom-textarea:focus {
        background-color: #fff !important;
        border-color: #ffc107 !important; 
        box-shadow: 0 10px 25px rgba(255, 193, 7, 0.1) !important;
        outline: none;
    }

    
    .custom-textarea::placeholder {
        color: #adb5bd;
        font-weight: 400;
        font-style: italic;
    }
</style>

@else
    
        <label for="{{ $name }}" class="form-label fw-semibold">{{ $label }}</label>
        <input type="{{ $type }}" class="form-control border-warning @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" required>
    

@endif

@error($name)
    <div class="invalid-feedback">{{$message}}</div>
@enderror
</div>