@extends("template.master")
@section("titulo", "Cadastro de Clubes")
@section("cadastro")
<form action="/clube" method="POST" class="row" enctype="multipart/form-data">
@csrf
    <h4>Cadastro de Clubes</h4>
    <input type="hidden" name="id" value="{{$clube->id}}"/>
    <div class="form-group col-6">
			<label for="nome">Nome: </label>
			<input type="text" name="nome" class="form-control" value="{{$clube->nome}}" required />
		</div>
    <div class="form-group col-3">
    <label for="nome">Escudo: </label>
			<input type="file" name="nomeEscudo" class="form-control" value="{{$clube->url}}" required />
		</div>
		<div class="form-group col-3">
    </br>
			<a href="/clube" class="btn btn-primary bottom"> 
				<i class="fas fa-plus"></i>Novo</a>
			<button type="submit" class="btn btn-success bottom"><i class="fas fa-save"></i>Salvar</button>
		</div>
    
            
</form>
@endsection
@section("listagem")
</br><h4>Listagem</h4>
        <table  class="table table-striped">
            <colgroup>
			    <col width="150">
			    <col width="80">
			    <col width="10">
			    <col width="10">
		    </colgroup>
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Nome</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
            @foreach($clubes as $clube)
            <tr>
				<td>
					<img src="{{ asset($clube->url); }}" maxwidth="100" height="100">
				</td>
                <td>{{$clube->nome}}</td>
                    <td><a href="/clube/{{$clube->id}}/edit"><button class="btn btn-warning"><i class="far fa-edit"></i>Editar</button></a></td>
                <td>
    		        <form action="/clube/{{$clube->id}}" method="POST">
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