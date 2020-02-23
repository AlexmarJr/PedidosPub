<HTML>
  <HEAD>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <TITLE>Configuração Usuarios </TITLE>
  </HEAD>
  <BODY style="background-color: gray">
    <div style="padding-bottom: 20px">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white">
            <img src="img/book.png" style="width: 2%">
           
          
            <div class="row" >
              <ul class="navbar-nav mr-auto" style="padding-left: 40px">
                <li class="nav-item active">
                  <a class="nav-link" href="{{route('index')}}">Realizar Pedido&nbsp;&nbsp;&nbsp;|<span class="sr-only">(página atual)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('search')}}">Consultar Pedido&nbsp;&nbsp;&nbsp;|<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('searchEnviados')}}">Historico de Pedidos<span class="sr-only"></span></a>
                </li>
                <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Configurações
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Comming Soon</a>
                            <a class="dropdown-item" href="#">Comming Soon</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('user_configurations')}}">Usuários</a>
                          </div>
                        </li>
              </ul>
            </div>
            <a class="nav-link" href="{{route('logoff')}}" style="background-color:red;color:white;border-radius: 25%;margin-left:60%">Logoff<span class="sr-only"></span></a>
          </nav>
    </header>
  </div>
  <form action="{{route('store_user')}}" method="post" autocomplete="off" enctype="multipart/form-data">
  @csrf
  @if(isset($head))
  <input type="hidden" name="id_user" value="{{$head->id}}">
  @endif
        <div class="row" style="margin-left: 10px;">
            <div class="col-sm-3">
              <input class="form-control" placeholder="Nome" type="text" name='name' @if(isset($head)) value="{{$head->name}}" @endif>
            </div>

          <div class="col-sm-2">
            <input class="form-control" placeholder="Sigla" type='text' name="cong" @if(isset($head)) value="{{$head->cong}}" @endif>
          </div>

          <div class="col-sm-2">
            <input class="form-control" placeholder="Senha" type='password' name="password" @if(isset($head)) value="{{$head->password}}" @endif>
          </div>

          <div class="input-group col-sm-2">
            <button type="submit" class="btn btn-light">Enviar</button>
          </div>
        </div>

        <div class="container float-left" style="background-color: white;margin-top: 20px;margin-left: 25px;border-radius: 2%">
            <table class="table">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Sigla</th>
                  <th scope="col">Ações</th>
                </tr>
                @foreach($users as $value)
                  <tr>
                    <th scope="row">{{$value->id}}</th>
                    <td>{{$value->cong}}</td>
                    <td>{{$value->name}}</td>                                            
                    <td><a href="{{ route('delete_user', $value->id) }}" class="btn btn-danger">Excluir</a> <a href="{{ route('read_user', $value->id) }}" class="btn btn-warning">Editar</a> </td>
                  </tr>
                @endforeach
                
              </table>
        </div>
    </form>
  </BODY>
  <script>
  
  </script>
</HTML>