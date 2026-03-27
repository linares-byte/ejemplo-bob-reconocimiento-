@if(session('success'))
    <div class="alert alert-success" id="alerta">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" id="alerta">
        {{ session('error') }}
    </div>
@endif

<script>
    setTimeout(() => {
        let alerta = document.getElementById('alerta');
        if(alerta){
            alerta.style.display = 'none';
        }
    }, 3000);
</script>