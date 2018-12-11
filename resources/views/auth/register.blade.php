@extends('layouts2.header')
@section('content')
    <div class="ads-grid_shop">
        <div class="shop_inner_inf">
            <h3 class="head">Реєстація</h3>
            <p class="head_para">Заповніть всі поля.</p>
            <div class="inner_section_w3ls">
                <div class="col-md-12 contact_grid_right">
                  <form style='text-align: center;' method="POST" action="{{ route('register') }}">
                   @csrf
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                     <label for="name">{{ __("Ім'я") }}</label>
                     <input minlength = '2' maxlength="30" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                     @if ($errors->has('name'))
                      <span style='color:red' class="invalid-feedback">
                       <strong>{{ $errors->first('name') }}</strong>
                      </span>
                     @endif
                    </div>
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                     <label for="surname">{{ __("Прізвище") }}</label>
                      <input minlength = '2' maxlength="30" id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}"  name="surname" value="{{ old('surname') }}" required>
                       @if ($errors->has('surname'))
                        <span  style='color:red' class="invalid-feedback">
                         <strong>{{ $errors->first('surname') }}</strong>
                        </span>
                       @endif
                     </div>
                     <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                      <label for="email">{{ __('E-Mail') }}</label>
                      <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" required >
                      @if ($errors->has('email'))
                       <span  style='color:red' class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                       </span>
                      @endif
                     </div>
                     <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                      <label for="password" >{{ __('Пароль') }}</label>
                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" minlength = '6' maxlength="30" required>
                      @if ($errors->has('password'))
                      <span  style='color:red' class="invalid-feedback">
                       <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                     <label for="password-confirm">{{ __('Підтвердження паролю') }}</label>
                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" minlength = '6' maxlength="30" required>
                    </div>
                      <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                        <input type="submit" style='width:100px; margin: 20px auto;' class="btn btn-primary" value="Уперед" > </input>
                      </div>
                  </form>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection

