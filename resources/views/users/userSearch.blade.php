<div class="d-flex align-items-center mB-16">
    <form action="/dashboard/users/search" method="GET" class="w-100">
        <div class="input-group">
            
            <input type="text" class="form-control" placeholder="Buscar" name="searchUsers">
            <button class="btn btn-outline-secondary" type="submit" name="btnSearchUsers">Buscar</button>
    
        </div>
    
    </form>
    
    <form action="/dashboard/users/create" method="GET" class="mL-16">
        @csrf
    
        <button type="submit" class="btn btn-outline-secondary" name="btnCreateUsers">Criar</button>
    
    </form>
</div>

<div class="row border-top border-start border-end pT-8 pB-8">

    <div class="d-flex align-items-center col pL-8">
        <span class="fw-bold">Nome</span>
    </div>

    <div class="d-flex align-items-center col">
        <span class="fw-bold">Departamento</span>
    </div>

    <div class="d-flex align-items-center col">
        <span class="fw-bold">Ver</span>
    </div>

    <div class="d-flex align-items-center col">
        <span class="fw-bold">Editar</span>
    </div>

    <div class="d-flex align-items-center col">
        <span class="fw-bold">Excluir</span>
    </div>

</div>

@if (!isset($users))

    <div class="row mB-16 pT-8 pB-8 pT-8 border">
    
        <div class="d-flex align-items-center col pL-8">
            <span>Nome</span>
        </div>
    
        <div class="d-flex align-items-center col">
            <span>T.I</span>
        </div>

    </div>
    
    @else

    @foreach ($users as $user)
    
        <div class="row pT-8 pB-8 pT-8 border">
        
            <div class="d-flex align-items-center col pL-8">
                <span>{{ $user->name }}</span>
            </div>
    
            <div class="d-flex align-items-center col">
                <span>T.I</span>
            </div>

            <div class="d-flex align-items-center col">
                <a href="/dashboard/users/{{ $user->id }}" class="btn btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                    </svg> 
                </a>
            </div>

            <div class="d-flex align-items-center col">
                <a href="/users/profile" class="btn btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                </a>
            </div>

            <div class="d-flex align-items-center col">

                <form action="/dashboard/users/destroy/{{ $user->id }}" method="POST">
                    
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-outline-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                        </svg>
                    </button>
                </form>

            </div>

        </div>

    @endforeach

@endif
    
