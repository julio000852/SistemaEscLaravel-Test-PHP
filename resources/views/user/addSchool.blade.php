<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Adicionar Escola</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
            
                        
                        <form id="login-form" class="form" action="{{ route('list.addSchoolbank') }}" method="post">
                        @csrf
                            <h3 class="text-center text-info">Registro de Escola</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Status da Escola:</label><br>
                                <input type="text" name="status" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Inep da Escola:</label><br>
                                <input type="text" name="inep" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Endereço da Escola:</label><br>
                                <input type="text" name="endereco" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Nome da Escola:</label><br>
                                <input type="text" name="name"  class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Cadastrar">
                            </div>
                            <div class="card-header"><a href="{{ route('list.school') }}" class="btn btn-warning btn btn-primary btn-lg btn-block">Voltar</a></div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
