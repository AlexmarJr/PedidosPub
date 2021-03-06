<HTML>
        <HEAD>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <TITLE>Historico (Administrador)</TITLE>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        </HEAD>
        <BODY style="background-color: gray">
          <div style="padding-bottom: 20px">
          <header>
              <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white">
                  <img src="img/book.png" style="width: 2%">
                 
                
                 
                    <ul class="navbar-nav mr-auto" style="padding-left: 50px">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('index')}}">Realizar Pedido&nbsp;&nbsp;&nbsp;|<span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('search')}}">Consultar Pedido&nbsp;&nbsp;&nbsp;|<span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('searchEnviados')}}">Historico de Pedidos<span class="sr-only">(página atual)</span></a>
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
                    
                  
                  <a class="nav-link" href="{{route('logoff')}}" style="background-color:red;color:white;border-radius: 25%">Logoff<span class="sr-only"></span></a>
                </nav>
          </header>
        </div>
        <form action="{{route('filter')}}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf

        <input type="hidden" value="" id="excelValor" name="excelValor">

                <div class="row" style="margin-left: 10px;">
                        <div class="col-sm-3">
                          <select class="form-control" id='orderMonth' name='congSelect'> 
                            <option value="" disabled selected hidden>Congregação</option>
                            <option value="Cajazeiras 9">Cajazeiras 9</option>
                            <option value="Cajazeiras 8">Cajazeiras 8</option>
                            <option value="Parque São José">Parque São Jose</option>
                            <option value="Jaguaripe">Jaguaripe</option>
                            <option value="Fazenda Grande 2">Fazenda Grande 2</option>
                            <option value="Administrador">Administrador</option>
                          </select>
                        </div>

                        <div class="col-sm-3">
                          <button class="btn btn-primary" type="submit" >Filtrar</button>

                          <a style="margin-left:50%" href="{{route('Excel')}}" class="btn btn-warning">Baixar Excel</a>
                        </div>
                        
        </form >
        
              <div class="container float-left" style="background-color: white;margin-top: 20px;margin-left: 16px;border-radius: 2%">
                  <table class="table">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Mês</th>
                        <th scope="col">Congregação</th>
                        <th scope="col">Publicação</th>
                        <th scope="col">Idioma</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Status</th>
                      </tr>
                      @foreach($publ as $value)
                      <tr>
                        <td scope="row">{{$value->id}}</td>
                        <td>{{ \Carbon\Carbon::parse($value->created_at)->format('Y')}}</td>
                        <td>{{ \Carbon\Carbon::parse($value->created_at)->format('F')}}</td>
                        <td>{{$value->congregacao}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->idioma}}</td>
                        <td>{{$value->quant}}</td>
                        @if ($value->status == '1') <td style='color:green'>Enviado</td> @else <td style='color:red'>Não Enviado</td> @endif
                        <td><a href="{{route('delete.admin', $value->id)}}" class="btn btn-danger">Excluir</a></td>
                      </tr>
                      @endforeach
                    </table>
              </div>
          
        </BODY>
        <script>
        function test(){
            var x = document.getElementById("quant").value;
            alert(x);
        }

        function wipe(){
            Swal.fire({
                title: 'Voçê Tem Certeza?',
                text: "Voçê ira armazenar todos os pedidos",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Não',
                confirmButtonText: 'Sim'
                }).then((result) => {
                if (result.value) {
                    Swal.fire(
                    'Pronto!',
                    'Todos Pedidos Foram Armazenados',
                    'success'
                    )
                }
            })
        }


        function excelValues(){


        }
        </script>
      </HTML>