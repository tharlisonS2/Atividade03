<!DOCTYPE html>

<head>
   <title> @yield("titulo")</title>
   <link rel="stylesheet"href="{{asset('css/bootstrap.css')}}"/>
   <link rel="stylesheet"href="{{asset('css/custom.css')}}"/>
   <link rel="stylesheet" href="{{ asset('css/all.css') }}" />
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">   
</head>
<body>
    <nav id="menu-h">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="{{route('posicao')}}">Cadastrar Posições</a></li>
                <li><a href="{{route('clube')}}">Cadastrar Clubes</a></li>
                <li><a href="{{route('jogador')}}">Cadastrar Jogadores</a></li>
                <li><a href="#">@yield("titulo")</a></li>
            </ul>
    </nav>
    @if (Session::get("acao") == "salvo")
		<div class="alert alert-success" role="alert">
			Salvo com sucesso!
		</div>
	@endif
		
	@if (Session::get("acao") == "deletado")
		<div class="alert alert-danger" role="alert">
			Excluído com sucesso!
		</div>
	@endif
    @if(Session::get("acao")=="atualizado")
        <div class="alert alert-info" role="alert">
            Dados Atualizados!
        </div>
    @endif
    @if(Session::get("acao")=="errodata")
        <div class="alert alert-danger" role="alert">
            Data invalida!
        </div>
    @endif
    <div class= "container">
        <div>
            @yield("botoes")
            @yield("cadastro")
            @yield("listagem")
        </div>
        
    </div>
</body>
</html>