@extends("template.master")
@section("titulo", "Cadastro de Posição")

@section("cadastro")

<form action="/posicao" method="POST" class="row">
<h4>Cadastro de Posição</h4>
@csrf
    <input type="hidden" name="id" value="{{$posicao->id}}"/>
    <div class="form-group col-8">
			<label for="nome">Nome: </label>
			<input type="text" name="nome" class="form-control" value="{{$posicao->nome}}" required />
		</div>
		<div class="form-group col-4">
        </br>
			<a href="/posicao" class="btn btn-primary bottom"> 
				<i class="fas fa-plus"></i>Novo</a>
			<button type="submit" class="btn btn-success bottom"><i class="fas fa-save"></i>Salvar</button>
		</div>
    
            
</form>
@endsection
@section("listagem")
    </br><h4>Listagem</h4>
        <table  class="table table-striped">
            <colgroup>
			    <col width="240">
			    <col width="60">
			    <col width="60">
		    </colgroup>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posicoes as $posicao)
            <tr>
                    <td>{{$posicao->nome}}</td>
                        <td><a href="/posicao/{{$posicao->id}}/edit"><button class="btn btn-warning"><i class="far fa-edit"></i>Editar</button></a></td>
                    <td>
                        <form action="/posicao/{{$posicao->id}}" method="POST">
                        @csrf
                            <input type="hidden" name="_method" value="DELETE"/>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja Excluir?')"><i class="far fa-trash-alt"></i>Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endsection