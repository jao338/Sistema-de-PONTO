@if (session('msg'))
    <p>{{ session("msg") }}</p>
@endif

<div class="d-flex align-items-center mB-16">
    <form action="#" method="GET" class="w-100">
        <div class="input-group">
            
            <input type="text" class="form-control" placeholder="Buscar setores" name="inputSearchSectors">
            <button class="btn btn-outline-secondary" type="submit" name="btnSearchSectors">Buscar</button>
    
        </div>
    
    </form>
    
    <form action="/dashboard/sectors/create" method="GET" class="mL-16">
        @csrf
    
        <button type="submit" class="btn btn-outline-secondary" name="btnCreateSectors">Criar</button>
    
    </form>
</div>

<div class="row border-top border-start border-end pT-8 pB-8">

    <div class="d-flex align-items-center col-md-3 pL-8">
        <span class="fw-bold">Nome</span>
    </div>

    <div class="d-flex align-items-center col-md-6">
        <span class="fw-bold">Descrição</span>
    </div>

    <div class="d-flex align-items-center col-md-3">
        <span class="fw-bold">QTD. Funcionários</span>
    </div>

</div>

@if (!isset($sectors))
    
    <a class="row mB-16 pT-8 pB-8 border" href="/dashboard/sectors">

        <div class="d-flex align-items-center col-md-3 pL-8">
            <span>ADM</span>
        </div>

        <div class="d-flex align-items-center col-md-6">
            <span>Alguma coisa</span>
        </div>

        <div class="d-flex align-items-center col-md-3">
            <span>15</span>
        </div>
    </a>
@else
    
    @foreach ($sectors as $sector)
        
        <a class="row pT-8 pB-8 border" href="/dashboard/sectors">

            <div class="d-flex align-items-center col-md-3 pL-8">
                <span>{{ $sector->name }}</span>
            </div>

            <div class="d-flex align-items-center col-md-6">
                <span>{{ $sector->description }}</span>
            </div>

            <div class="d-flex align-items-center col-md-3">
                <span>{{ $sector->description }}</span>
            </div>
            
        </a>

    @endforeach

@endif


