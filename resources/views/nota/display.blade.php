<x-layout title="Info Notas">
    <div class="titulo">
        <h1>
            Histórico de Notas
        </h1>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Aluno</th>
                <th scope="col">Nota</th>
                <th scope="col">Ações</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($displayNota as $nota)
            <tr>
                <th scope="row">{{$nota->id}}</th>
                <td>{{$nota->aluno}}</td>
                <td>{{$nota->nota}}</td>
                <td>
                    <form id="deleteForm{{$nota->id}}" action="{{route('nota.delete',['id' => $nota->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-default btn-lg" data-bs-toggle="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.  5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg>
                        </button>
                    </form>
                </td>
                <td>
                    <button type="button" class="btn btn-default btn-lg" data-bs-toggle="modal" data-bs-target="#myModal{{$nota->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                        </svg>

                    </button>
                </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="myModal{{$nota->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modificar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('nota.update', ['id' => $nota->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Aluno</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="aluno" value="{{$nota->aluno}}" name="novo_aluno">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nota</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nota" value="{{$nota->nota}}" name="novo_media">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary centerThing">Salvar Mudanças</button>
                                </div>
                            </form>
                        </div>
                        <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
                    </div>
                </div>
            </div>
            </form>
            @endforeach
        </tbody>
    </table>
</x-layout>