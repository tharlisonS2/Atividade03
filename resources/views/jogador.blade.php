@extends("template.master")
@section("titulo", "Cadastro de Jogadores")
@section("cadastro")
<form action="/jogador" method="POST" class="row">
@csrf
<input type="hidden" name="id" value="{{$jogador->id}}"/>
<h4>Cadastro de Jogadores</h4>

    <div class="form-group col-5">
			<label for="nome">Nome: </label>
			<input type="text" name="nome" class="form-control" value="{{$jogador->nome}}" required />
	</div>

    <div class="form-group col-5">
    <label for="nome">Data de Nascimento: </label>
			<input type="date" name="dataNascimento" class="form-control" value="{{$jogador->dataNascimento}}" required />
	</div>

    <div class="form-group col-5">
       <label for="nome">Posição do jogador: </label>
            <select name="posicao" class="form-control" required>
				<option></option>
				@foreach ($posicoes as $posicao)
					@if ($posicao->id == $jogador->posicao)
						<option value="{{ $posicao->id }}" selected="selected">{{ $posicao->nome }}</option>
					@else
						<option value="{{ $posicao->id }}">{{ $posicao->nome }}</option>
					@endif
				@endforeach
			</select>
	</div>
    <div class="form-group col-5">
        <label for="nome">Clube do jogador: </label>
        <select name="clube" class="form-control" required>
			<option></option>
			@foreach ($clubes as $clube)
				@if ($clube->id == $jogador->clube)
					<option value="{{ $clube->id }}" selected="selected">{{ $clube->nome }}</option>
				@else
					<option value="{{ $clube->id }}">{{ $clube->nome }}</option>
				@endif
			@endforeach
		</select>
	</div>
		<div class="form-group col-11">
    </br>
    
			<a href="/jogador" class="btn btn-primary bottom"> 
				<i class="fas fa-plus"></i>Novo</a>
			<button type="submit" class="btn btn-success bottom"><i class="fas fa-save"></i>Salvar</button>
		</div>
</form>
@endsection
@section("listagem")
</br><h4>Listagem</h4>
        <table  class="table table-striped responsive">
            <colgroup>
			    <col width="50">
			    <col width="170">
			    <col width="150">
			    <col width="10">
			    <col width="10">
			    <col width="10">
			    <col width="10">
		    </colgroup>
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Nome</th>
                    <th>Posição</th>
                    <th>Check</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                    <th>Adquirir</th>
                    
                </tr>
            </thead>
            <tbody>
            @foreach($jogadores as $jogador)
                <tr>
                <td><img src="{{ asset($clube->url); }}" maxwidth="100" height="100"></td>
                    <td>{{$jogador->nome}}</td>
                    <td>@foreach ($clubes as $clube)
				        @if($posicao->id == $jogador->posicao)
					        {{$posicao->nome}}
                            @break
				        @endif
			            @endforeach</td>
            @if($jogador->check=="false")
				<td><input type="radio" name="check" disabled></td>
            @else
                <td><input type="radio" name="{{$jogador->id}}" checked></td>
            @endif
                    <td><a href="/jogador/{{$jogador->id}}/edit"><button class="btn btn-warning"><i class="far fa-edit"></i>Editar</button></a></td>
                    <td>
                        <form action="/jogador/{{$jogador->id}}" method="POST">
                        @csrf
                            <input type="hidden" name="_method" value="DELETE"/>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja Excluir?')"><i class="far fa-trash-alt"></i>Excluir</button>
                        </form>
                    </td>
                    @if($jogador->check=="false")
                    <td>
                    <form action="/jogador/{{$jogador->id}}" method="POST">
                        @csrf
                            <input type="hidden" name="_method" value="PUT"/>
                           <button type="submit" class="btn btn-success" onclick="return confirm('Deseja Adquirir?')"><i class="far fa-star"></i>Adquirir</button>
                        </form>
                      
                    </td>
                    @elseif($jogador->check!="false")
                <td><button type="submit" class="btn btn-success disabled"><i class="far fa-star"></i>Adquirir</button></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

@endsection