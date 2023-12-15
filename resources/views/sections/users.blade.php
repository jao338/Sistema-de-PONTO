<div class="d-flex align-items-center mB-16">
    <form action="#" method="GET" class="w-100">
        <div class="input-group">
            
            <input type="text" class="form-control" placeholder="Buscar usuários" name="inputSearchSectors">
            <button class="btn btn-outline-secondary" type="submit" name="btnSearchSectors">Buscar</button>
    
        </div>
    
    </form>
    
    <form action="/dashboard/users/create" method="GET" class="mL-16">
        @csrf
    
        <button type="submit" class="btn btn-outline-secondary" name="btnCreateSectors">Criar</button>
    
    </form>
</div>

<div class="row border-top border-start border-end pT-8 pB-8">

    <div class="d-flex align-items-center col-md-3 pL-8">
        <span class="fw-bold">Nome</span>
    </div>

    <div class="d-flex align-items-center col-md-3">
        <span class="fw-bold">Departamento</span>
    </div>

    <div class="d-flex align-items-center col-md-3">
        <span class="fw-bold">Horário de entrada</span>
    </div>

    <div class="d-flex align-items-center col-md-3">
        <span class="fw-bold">Horário de entrada</span>
    </div>

</div>

@if (!isset($users))

    <div class="row mB-16 pT-8 pB-8 pT-8 border">
    
        <div class="d-flex align-items-center col-md-3 pL-8">
            <span>Nome</span>
        </div>
    
        <div class="d-flex align-items-center col-md-3">
            <span>T.I</span>
        </div>
    
        <div class="d-flex align-items-center col-md-3">
            <span>08:00:00</span>
        </div>
    
        <div class="d-flex align-items-center col-md-3">
            <span>13:00:00</span>
        </div>
    </div>
    
    @else

    @foreach ($users as $user)
    
        <div class="row pT-8 pB-8 pT-8 border">
        
            <div class="d-flex align-items-center col-md-3 pL-8">
                <span>{{ $user->name }}</span>
            </div>
    
            <div class="d-flex align-items-center col-md-3">
                <span>T.I</span>
            </div>
    
            <div class="d-flex align-items-center col-md-3">
                <span>08:00:00</span>
            </div>
    
            <div class="d-flex align-items-center col-md-3">
                <span>13:00:00</span>
            </div>
            
        </div>

    @endforeach

@endif
    
