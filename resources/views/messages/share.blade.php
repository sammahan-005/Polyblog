@extends('base')

@section('title', 'Partager le message')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            
            <div class="text-center mb-5">
                <div class="d-inline-block p-3 bg-danger bg-opacity-10 rounded-circle mb-3">
                    <i class="bi bi-heart-fill text-danger display-4"></i>
                </div>
                <h1 class="fw-black text-dark text-uppercase">Étape 2 : Partage</h1>
                <p class="text-muted">Copie le message ci-dessous et partage-le dans 5 groupes WhatsApp pour valider ta participation.</p>
            </div>

            <div class="card border-0 shadow-sm rounded-5 overflow-hidden mb-4">
                <div class="card-body p-4 bg-light border-bottom border-2 border-dashed border-secondary border-opacity-25">
                    <p id="shareText" class="fs-5 fw-medium text-dark mb-0 lh-base">
                        🔥 Rejoins-moi sur Black Box, l'app de confessions 100% anonyme ! 🤫 Clique ici pour voir mes secrets ou partager les tiens : https://polyblog.onrender.com 🎁 Concours Saint Valentin en cours !
                    </p>
                </div>
                <div class="card-footer p-0 border-0">
                    <button onclick="copyToClipboard()" id="copyBtn" class="btn btn-dark w-100 py-4 rounded-0 fw-black fs-5">
                        <i class="bi bi-clipboard-check me-2"></i> COPIER LE MESSAGE
                    </button>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ url()->previous() }}" class="btn btn-link text-secondary text-decoration-none fw-bold">
                    <i class="bi bi-arrow-left me-1"></i> Retour au concours
                </a>
            </div>

        </div>
    </div>
</div>

<script>
    function copyToClipboard() {
        const text = document.getElementById('shareText').innerText;
        const textArea = document.createElement("textarea");
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.select();
        
        try {
            document.execCommand('copy');
            const btn = document.getElementById('copyBtn');
            btn.innerHTML = '<i class="bi bi-check2-circle me-2"></i> COPIÉ DANS LE PRESSE-PAPIER !';
            btn.classList.replace('btn-dark', 'btn-success');
            
            
            setTimeout(() => {
                window.location.href = "whatsapp://send?text=" + encodeURIComponent(text);
            }, 500);
            
        } catch (err) {
            alert('Appuie long sur le texte pour copier.');
        }
        document.body.removeChild(textArea);
    }
</script>

<style>
    .fw-black { font-weight: 900; }
    body { background-color: #f8f9fa; }
</style>
@endsection