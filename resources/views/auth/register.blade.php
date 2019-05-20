@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div class="btn-facebook">
                    <div class="banner"></div></div>
                     <div class="btn-facebook">
                        <div style="width: 89%">
                      <div class="social">
                         <ul>
                               
                              <li > <a href="http://www.facebook.com" target="_blank" class="icon-facebook"></a></li>
                              <li><a href="http://twitter.com" target="_blank" class="icon-twitter"></a></li>     
                               <li><a href="http://www.instagram.com/" target="_blank" class="icon-instagram"></a></li>      
                             <li><a href="http://www.youtube.com" target="_blank" class="icon-youtube"></a></li>      
                         </ul>
                      
                       </div>
                       </div>
                    </div>
                </div>
                <br>
                <hr>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="entrar">
                                <button type="submit" class="btn btn-primary btn-block" >
                                    <i class="fa fa-btn fa-sign-in"></i> Registrarse
                                </button>
                           

                           
                             </div>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
            <div class="registrate">
        Si deseas publicar un anuncio en TLX por favor incia sesión  &nbsp;<a href="{{ url('/login') }}">Iniciar sesión</a></li>
        </div>
        </div>

    </div>
</div>
<br><br>
@include('content.footer')
@endsection
