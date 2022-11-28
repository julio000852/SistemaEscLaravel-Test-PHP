<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Editar</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ route('list.updateProf', $professor->id) }}" method="post">
                        @csrf
                            <h3 class="text-center text-info">Editar Professor(a): {{ $professor->name_prof }}</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Turma/escola do Professor(a):</label><br>
                                <select class="form-control" id="exampleFormControlSelect1" name="turmProf" required>
                                    @foreach ($school as $s)
                                        <option>{{ $s->id }} - {{ $s->name_turm }} - {{ $s->name_school }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Nome do Professor(a):</label><br>
                                <input type="text" name="name"  class="form-control" value="{{ $professor->name_prof }}" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Editar">
                            </div>
                            <div class="card-header"><a href="{{ route('list.prof') }}" class="btn btn-warning btn btn-primary btn-lg btn-block">Voltar</a></div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
