<div class="d-flex align-items-center mB-16">
    <form action="#" method="GET" class="w-100">
        <div class="input-group">
            
            <input type="text" class="form-control" placeholder="Buscar setores" name="inputSearchSectors">
            <button class="btn btn-outline-secondary" type="submit" name="btnSearchSectors">Buscar</button>
    
        </div>
    
    </form>
    
    <form action="/dashboard/sectors/create" method="POST" class="mL-16">
        @csrf
    
        <button type="submit" class="btn btn-outline-secondary" name="btnCreateSectors">Criar</button>
    
    </form>
</div>

<a class="row mB-16 pT-8 pB-8 border" href="/dashboard/sectors">

    <div class="d-flex align-items-center col-md-3 pL-8">
        <span>Nome do setor</span>
    </div>

    <div class="d-flex align-items-center col-md-9">
        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
    </div>
</a>


