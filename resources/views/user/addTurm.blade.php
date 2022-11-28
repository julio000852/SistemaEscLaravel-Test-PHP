<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
            
                        
                        <form id="login-form" class="form" action="{{ route('list.addTurmbank') }}" method="post">
                        @csrf
                            <h3 class="text-center text-info">Registro de Turma</h3>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Escola Da Turma</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="escolaTurm" required>
                                @foreach ($school as $s)
                                  <option>{{ $s->id }} - {{ $s->name_school }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Estatus da turma:</label><br>
                                <input type="text" name="status" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Turno da turma:</label><br>
                                <input type="text" name="turn" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Nome da turma:</label><br>
                                <input type="text" name="nome"  class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Cadastrar">
                            </div>
                            <div class="card-header"><a href="{{ route('list.turm') }}" class="btn btn-warning btn btn-primary btn-lg btn-block">Voltar</a></div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
