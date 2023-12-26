@if (!isset($sectors))
    
    <h1>Você não pode visualizar essa página.</h1>
    
@else

    <div class="d-flex align-items-center mB-16">
        <form action="/dashboard/sectors/search" method="GET" class="w-100">
            @csrf
            <div class="input-group">
                
                <input type="text" class="form-control" placeholder="Buscar" name="sectorsSearch">
                <button class="btn btn-outline-secondary" type="submit" name="btnSearchSectors">Buscar</button>
        
            </div>
        
        </form>
        
        <form action="/dashboard/sectors/create" method="GET" class="mL-16">

            @csrf
            <button type="submit" class="btn btn-outline-secondary" name="btnCreateSectors">Criar</button>
        
        </form>
    </div>

    <table class="table table-borderless table-responsive shadow">
        <thead>
    
            <tr class="border-top border-bottom">
                <th scope="col" class="border-end pL-16">Nome</th>
                <th scope="col" class="border-end pL-16">Descrição</th>
                <th scope="col" class="border-end pL-16">Ver</th>
                <th scope="col" class="border-end pL-16">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
            
        </thead>
        <tbody>
            
            @if (isset($sectors) && count($sectors) > 0)
            
                @foreach ($sectors as $sector)
                    <tr class="border-bottom">
                        <th scope="row" class="border-end pL-16">{{ $sector->name }}</th>
                        <td class="border-end pL-16">{{ $sector->description }}</td>
                        <td class="border-end pL-16">
                            <a href="/dashboard/sectors/{{ $sector->id }}" class="btn btn-outline-secondary">
                    
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                </svg> 
                            </a>
                        </td>
                        <td class="border-end pL-16">
                            <a href="/dashboard/sectors/edit/{{ $sector->id }}" class="btn btn-outline-secondary">
                    
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                        
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-secondary" id="deleteSector" data-bs-toggle="modal" data-bs-target="#modalSector">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            
            @else
                <tr class="border-bottom">
                    <th scope="row" class="border-end pL-16">XX/XX/XX</th>
                    <td class="border-end pL-16">XX:XX:XX</td>
                    <td class="border-end pL-16">XX:XX:XX</td>
                    <td class="border-end pL-16">XX:XX:XX</td>
                    <td>XX:XX:XX</td>
                </tr>
            @endif
    
        </tbody>
    
    </table>

@endif

<div class="modal fade" id="modalSector" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmação</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <span>Você tem certeza que deseja excluir este setor?</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Não</button>

                <form action="/dashboard/sectors/destroy/{{ $sector->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-success">Sim</button>
                </form>
                    
            </div>
        </div>
    </div>
</div>
