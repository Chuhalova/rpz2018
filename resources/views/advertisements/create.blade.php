@extends('layouts2.header')
@section('content')
    <div class="ads-grid_shop">
        <div class="shop_inner_inf">
            <h3 class="head">Створити новy подію</h3>
            <p class="head_para">Заповніть всі поля.</p>
            @if(count($errors))
                <div class="errors_cont col-lg-12 col-md-12 col-sm-12 col-xs-12" role="alert">
                    <ul>
                        @foreach($errors->all() as $key => $value)
                            <li>{{ $value }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="inner_section_w3ls">
                <div class="col-md-12 contact_grid_right">
                    <form id="create_adv" method="post" action="/advertisements" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div style='margin-top:10px;' class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                            <label for="title" >Заголовок</label>
                            <input type="text"  placeholder="Введіть заголовок" name="title" id="title" value="{{ old('title') }}">
                        </div>
                        <div style='margin-top:10px;' class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                            <label for="description" >Опис</label>
                            <textarea style='margin:0 auto;' type="text"  rows='10' name="description" id="description" placeholder = 'Опишіть свою подію'>{{old('description')}}</textarea>
                        </div>
                        <div style='margin-top:10px;' class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                            <label for='par'>Група крові</label>
                            <select class='form-control' id="par" name="par">
                                <option value="">Оберіть групу крові</option>
                            </select>
                        </div>
                        <div id='for_child' style='margin-top:10px;display:none;' class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                            <label for="child">Обері резусність крові</label>
                            <select class='form-control' id="child" name="child">
                            </select>
                        </div>
                        <div style='margin-top:10px;' class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                            <label for="images">Фото для події</label>
                            <input class='form-control' type="file"  placeholder="Додайте фото(max:3)"  name="images[]" multiple>
                        </div>
                        <div style='text-align: center;margin-top:10px;' class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                            <input type="submit" style='width:100px; margin: 20px auto;' class="btn btn-primary" value="Додати" > </input>
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
