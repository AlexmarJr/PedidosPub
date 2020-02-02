<HTML>
  <HEAD>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <TITLE>Pedidos Publicações</TITLE>
  </HEAD>
  <BODY style="background-color: gray">
    <div style="padding-bottom: 20px">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white">
            <img src="img/book.png" style="width: 2%">
           
          
            <div class="row" >
              <ul class="navbar-nav mr-auto" style="padding-left: 50px">
              @if ($userName != 'admin')
              <li class="nav-item active">
                  <p class="nav-link">Realizar Pedido&nbsp;&nbsp;&nbsp;|<span class="sr-only">(página atual)</span></p>
                </li>
              @endif
              @if ($userName == 'admin')
                <li class="nav-item active">
                  <a class="nav-link" href="{{route('index')}}">Realizar Pedido&nbsp;&nbsp;&nbsp;|<span class="sr-only">(página atual)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('search')}}">Consultar Pedido&nbsp;&nbsp;&nbsp;|<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('searchEnviados')}}">Historico de Pedidos<span class="sr-only"></span></a>
                </li>
                @endif
              </ul>
            </div>
            <a class="nav-link" href="{{route('logoff')}}" style="background-color:red;color:white;border-radius: 25%;margin-left:60%">Logoff<span class="sr-only"></span></a>
          </nav>
    </header>
  </div>
  <form action="{{route('store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
  @csrf
  @if(isset($head))
  <input type="hidden" name="id" value="{{$head->id}}">
  @endif
        <div class="row" style="margin-left: 10px;">
            <div class="col-sm-3">
              <select class="form-control" required id='selectPub' name='selectPub'> 
                <option value="" disabled selected hidden>Publicação</option>
                <option disabled style="color: red">Biblia</option>
                <option value="Tradução do Novo Mundo da Biblia Sagrada"  @if(isset($head) && ($head->name == 'Tradução do Novo Mundo da Biblia Sagrada')) selected @endif >Tradução do Novo Mundo da Biblia Sagrada</option>
                <option value="Tradução do Novo Mundo da Biblia Sagrada(Edição Pequena)" @if(isset($head) && ($head->name == 'Tradução do Novo Mundo da Biblia Sagrada(Edição Pequena)')) selected @endif >Tradução do Novo Mundo da Biblia Sagrada>Tradução do Novo Mundo da Biblia Sagrada(Edição Pequena)</option>
                <option disabled style="color: red">Livros</option>
                <option value="Dê Testemunho Cabal sobre o Reino de Deus"  @if(isset($head) && ($head->name == 'Dê Testemunho Cabal sobre o Reino de Deus')) selected @endif  >Dê Testemunho Cabal sobre o Reino de Deus</option>
                <option value="Venha ser Meu Seguidor" @if(isset($head) && ($head->name == 'Venha ser Meu Seguidor')) selected @endif >Venha ser Meu Seguidor</option>
                <option value="Adoração Pura de Jeová é Restaurada" @if(isset($head) && ($head->name == 'Adoração Pura de Jeová é Restaurada')) selected @endif >Adoração Pura de Jeová é Restaurada</option>
                <option value="Achegue-se" @if(isset($head) && ($head->name == 'Achegue-se')) selected @endif>Achegue-se</option>
                <option value="Aprenda com as Histórias da Biblia" @if(isset($head) && ($head->name == 'Aprenda com as Histórias da Biblia')) selected @endif>Aprenda com as Histórias da Biblia</option>
                <option value="Aprenda com o Grande Instrutor" @if(isset($head) && ($head->name == 'Aprenda com o Grande Instrutor')) selected @endif>Aprenda com o Grande Instrutor</option>
                <option value="Cante de Coração a Jeová" @if(isset($head) && ($head->name == 'Cante de Coração a Jeová')) selected @endif>Cante de Coração a Jeová</option>
                <option value="Os Jovens Perguntam - Respostas Práticas, Volume 1" @if(isset($head) && ($head->name == 'Os Jovens Perguntam - Respostas Práticas, Volume 1')) selected @endif>Os Jovens Perguntam - Respostas Práticas, Volume 1</option>
                <option value="Os Jovens Perguntam - Respostas Práticas, Volume 2" @if(isset($head) && ($head->name == 'Os Jovens Perguntam - Respostas Práticas, Volume 2')) selected @endif>Os Jovens Perguntam - Respostas Práticas, Volume 2</option>
                <option value="Cante de Coração a Jeová - Sem Pauta" @if(isset($head) && ($head->name == 'Cante de Coração a Jeová - Sem Pauta')) selected @endif>Cante de Coração a Jeová - Sem Pauta</option>
                <option value="Cante de Coração a Jeová - Edição Grande" @if(isset($head) && ($head->name == 'Cante de Coração a Jeová - Edição Grande')) selected @endif>Cante de Coração a Jeová - Edição Grande</option>
              </select>
            </div>

          <div class="col-sm-3">
            <select class="form-control" required id='languagePub' name='languagePub'>
              <option value="" disabled selected hidden>Idioma</option>
              <option value='PT' @if(isset($head) && ($head->idioma == 'PT')) selected @endif >Português</option>
              <option value='EN' @if(isset($head) && ($head->idioma == 'EN')) selected @endif >Inglês</option>
              <option value='ESP' @if(isset($head) && ($head->idioma == 'ESP')) selected @endif >Espanhõl</option>
            </select>
          </div>
          
          <div class="input-group col-sm-2">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup" name="inputGroup">Quantidade</span>
            </div>
              <input type="number" id="quant" name="quant" @if(isset($head)) value="{{$head->quant}}" @endif class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
              <input type="hidden" value="{{$cong}}" id="congregacao" name="congregacao">
              <input type="hidden" value="{{$userName}}" id="adminStatus" name="adminStatus">
              
          </div>

          <div class="input-group col-sm-2">
            <button type="submit" class="btn btn-light">Enviar</button>
          </div>
        </div>

        <div class="container float-left" style="background-color: white;margin-top: 20px;margin-left: 25px;border-radius: 2%">
            <table class="table">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Publicação</th>
                  <th scope="col">Idioma</th>
                  <th scope="col">Quantidade</th>
                  <th scope="col">Ações</th>
                </tr>
                @foreach($publ as $value)
                 @if($value->congregacao == $cong)
                  <tr>
                    <th scope="row">{{$value->id}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->idioma}}</td>
                    <td>{{$value->quant}}</td>                                             
                    <td><a href="{{ route('delete', $value->id) }}" class="btn btn-danger">Excluir</a> <a href="{{ route('read', $value->id) }}" class="btn btn-warning">Editar</a> </td>
                  </tr>
                @endif
                @endforeach
                
              </table>
        </div>
    </form>
  </BODY>
  <script>
  
  </script>
</HTML>