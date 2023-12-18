@if (!isset($user))
    
    <div class="row">
        <div class="col-md-6">
            <h2 class="fs-2 pB-8">Visualizando o usuário <span class="fw-bold">...</span></h2>

            <p>O usuário pertence ao departamento <span class="fw-bold">...</span></p>
        </div>

        <div class="d-flex justify-content-end align-items-center col-md-6">

            <a href="#" class="btn btn-secondary mR-8">Editar</a>

            <a href="#" class="btn btn-secondary">Excluir</a>

        </div>
    </div>

@else
    
    <div class="row">
        <div class="col-md-6">
            <h2 class="fs-2 pB-8">Visualizando o usuário <span class="fw-bold">{{ $user->name }}</span></h2>

            <p>O usuário pertence ao departamento <span class="fw-bold"></span></p>
        </div>

        <div class="d-flex justify-content-end align-items-center col-md-6">

            <a href="/users/profile" class="btn btn-outline-secondary mR-8">
                    
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                </svg>
        
            </a>

            <form action="/dashboard/users/destroy/{{ $user->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-secondary">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                    </svg>

                </button>
            </form>
        </div>
    </div>

@endif