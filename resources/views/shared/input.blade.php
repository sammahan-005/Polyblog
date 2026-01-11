@php
    $type??= 'text';
    $name??= '';
    $label??= '';
    $placeholder??= '';
    
@endphp
<div class="mb-3">
@if ($type == 'textarea')
    
        <label for="{{ $name }}" class="form-label fw-semibold">{{ $label }}</label>
        <textarea class="form-control border-warning @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}" rows="6" placeholder="{{ $placeholder }}" required></textarea>
    

@else
    
        <label for="{{ $name }}" class="form-label fw-semibold">{{ $label }}</label>
        <input type="{{ $type }}" class="form-control border-warning @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" required>
    

@endif

@error($name)
    <div class="invalid-feedback">{{$message}}</div>
@enderror
</div>