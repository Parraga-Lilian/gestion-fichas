<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" 
  integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/login.css')}}" />
</head>
<body>
    <div class="container px-4 py-5 mx-auto">
        <div class="card card0">
            <div class="d-flex flex-lg-row flex-column-reverse">
                <div class="card card1">
                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-10 my-5">
                            <div class="row justify-content-center px-3 mb-3">
                                <img id="logo" style="border-radius:50%;height:100px;width:120px;"
                                src="{{asset('imagenes/talento.png')}}">
                            </div>
                            <h3 class="mb-5 text-center heading">Sistema de perfiles</h3>
    
                            <h5 class="msg-info">Ingrese a su cuenta:</h5>
                            @include('layouts.partials.messages')
                                                  
                           <form method="post" action="{{ route('login.perform') }}" >
                               
                               <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                       
                               <div class="form-group form-floating mb-3">
                                   <label for="floatingName">Correo o Nombre de Usuario</label>
                                   <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
                                   @if ($errors->has('username'))
                                       <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                   @endif
                               </div>
                               
                               <div class="form-group form-floating mb-3">
                                   <label for="floatingPassword">Contraseña</label>
                                   <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                                   @if ($errors->has('password'))
                                       <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                   @endif
                               </div>
                            
                               <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
                               <div class="bottom text-center mb-5">
                                <p class="sm-text mx-auto mb-3">¿No tiene una cuenta?
                                    <a class="btn btn-white ml-2" href="/register">Crear nueva.</a></p>
                             </div>
                               @include('auth.partials.copy')
                           </form>
                      
                        </div>
                    </div>
                </div>
                <div class="card card2">
                    <div class="my-auto mx-md-5 px-md-5 right">
                        <h3 class="text-white">Somos más que solo un programa</h3>
                        <small class="text-white">Permitimos a las personas centrarse más en su trabajo y 
                            dedicar menos tiempo en el registro de información que de otra forma 
                            sería complejo de almanacenar y gestionar en general.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>