@extends('layouts2.header')
@section('content')
  <div class="ads-grid_shop">
    <div class="shop_inner_inf">
      <h3 class="head">Вхід</h3>
      <p class="head_para">Заповніть всі поля.</p>
      <div class="inner_section_w3ls">
        <div class="col-md-12 contact_grid_right">
          <form style='text-align: center;' method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 contact_left_grid">
              <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                  <span style='color:red;' class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 contact_left_grid">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                  <span style='color:red;' class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                @endif
            </div>
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                <input type="submit" style='width:100px; margin: 50px auto;' class="btn btn-primary" value="Увійти" > </input>
            </div>
          </form>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  @endsection
