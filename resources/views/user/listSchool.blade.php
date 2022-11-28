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
                  <div class="card-header"><a href="{{ route('list.addSchool') }}" class="btn btn-success btn btn-primary btn-lg btn-block">Cadastrar Nova Escola</a></div>
                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
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
                  </div>
              </div>
          </div>
      </div>
  </div>
</body>
