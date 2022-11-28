<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('list') }}" class="btn btn-warning btn btn-primary btn-lg btn-block">Voltar</a></div>
                <div class="card-header"><a href="{{ route('list.addProf') }}" class="btn btn-success btn btn-primary btn-lg btn-block">Cadastrar Novo Professor(a)</a></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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
</div>
</body>
