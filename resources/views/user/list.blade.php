<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


</head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Listar/adcionar os Usuarios</h1>
                    
                    <div class="card-header"><a href="{{ route('list.school') }}">Escolas</a></div>
                    <div class="card-header"><a href="{{ route('list.turm') }}">Turmas</a></div>
                    <div class="card-header"><a href="{{ route('list.prof') }}">Professores(a)</a></div>
                </div>

                <h1>Listas das Escolas</h1>

                    @foreach ($school as $s)
                    <table class="table table-dark table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Status</th>
                            <th scope="col">Enep</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td scope="row">{{ $s->id }}</td>
                            <td>{{ $s->status }}</td>
                            <td>{{ $s->inep }}</td>
                            <td>{{ $s->endereco }}</td>
                            <td>{{ $s->name_school }}</td>
                            <td>
                              <a href="{{ route('list.editSchool', $s->id) }}" class="btn btn-warning">Editar</a>
                            </td>
                            <td>
                              <form action="{{ route('list.deleteSchool', $s->id) }}">
                              @csrf
                              @method('DELETE')
                                <button class="btn btn-danger delete-btn" id="js-del" type="submit">Deletar</button>
                              </form>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                   @endforeach

                   <h1>Lista de Turmas</h1>

                    @foreach ($turma as $s)
                    <table class="table table-dark table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Escola</th>
                            <th scope="col">Status</th>
                            <th scope="col">Turno</th>
                            <th scope="col">Nome</th>
                            <th>Editar</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td scope="row">{{ $s->id }}</td>
                            
                            <td>{{ $s->name_school }}</td>
                            <td>{{ $s->status }}</td>
                            <td>{{ $s->turn }}</td>
                            <td>{{ $s->name_turm }}</td>
                            <td>
                              <a href="{{ route('list.editTurm', $s->id) }}" class="btn btn-warning">Editar</a>
                            </td>
                            <td>
                              <form action="{{ route('list.deleteTurm', $s->id) }}">
                              @csrf
                              @method('DELETE')
                                <button class="btn btn-danger delete-btn" type="submit">Deletar</button>
                              </form>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                   @endforeach

                   <h1>Listas dos Professores</h1>

                   @foreach ($professor as $s)
                   <table class="table table-dark table-bordered">
                       <thead>
                         <tr>
                           <th scope="col">#</th>
                           <th scope="col">Escola</th>
                           <th scope="col">Turma</th>
                           <th scope="col">Nome</th>
                           <th>Editar</th>
                           <th scope="col">Delete</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <td scope="row">{{ $s->id }}</td>
                           <td>{{ $s->name_school }}</td>
                           <td>{{ $s->name_turm }}</td>
                           <td>{{ $s->name_prof }}</td>
                           <td>
                             <a href="{{ route('list.editProf', $s->id) }}" class="btn btn-warning">Editar</a>
                           </td>
                           <td>
                             <form action="{{ route('list.deleteProf', $s->id)}}">
                             @csrf
                             @method('DELETE')
                               <button class="btn btn-danger delete-btn" type="submit">Deletar</button>
                             </form>
                           </td>
                         </tr>
                       </tbody>
                     </table>
                  @endforeach
                  
            </div>
        </div>
    </div>
</div>
</body>
