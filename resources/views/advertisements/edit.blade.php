@extends('layouts2.header')
@section('content')
    <div class="ads-grid_shop">
        <div class="shop_inner_inf">
            <h3 class="head">Змінити подію</h3>
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
                                <div class="inner_cont col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        @foreach($images as $image)
                                            <div class="img_edit col-lg-3 col-md-3 col-sm-5 col-xs-11">
                                                <img src="{{URL::to(Storage::url($image->image))}}" alt="">
                                            </div>
                                            <div class="inner_img col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                <form id="delete-advimages-{{$image->id}}" action="{{ url('/advimages/'.$image->id) }}" method="POST" style="display: inline">
                                                    {{method_field('DELETE')}}
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" ><i class="fa  fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        @endforeach
                                    @if(count($images)<3)
                                        <form class="my_img_adder inner_img col-lg-4 col-md-4 col-sm-6 col-xs-12" enctype="multipart/form-data" action="{{url('/adv/' . $advertisement->id)}}" method="post">
                                            {{method_field('PATCH')}}
                                            {{ csrf_field() }}
                                            <input  class='form-control' type="file" name="image" id="image">
                                            <button type="submit"></button>
                                        </form>
                                    @endif
                                </div>
                            <div id='errors_container' role="alert">
                                <ul id="errors">
                                </ul>
                            </div>
                                    <div class="inner_section_w3ls">
                                        <div class="col-md-12 contact_grid_right">
                                            <form id="create_adv" method="post" action="{{url('/advertisements/' . $advertisement->id)}}" enctype="multipart/form-data" >
                                                {{method_field('PATCH')}}
                                                {{ csrf_field() }}
                                                <div style='margin-top:10px;' class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                                                    <label for="title" class="col-xs-12 blue_label col-sm-6 col-form-label">Заголовок</label>
                                                    <input value="{{$advertisement->title}}" type="text"  class="col-xs-12 col-sm-12  col-form-label" placeholder="Введіть заголовок" name="title" id="title">
                                                </div>
                                                <div style='margin-top:10px;' class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                                                    <label for="description" class="blue_label col-xs-12 col-sm-6 col-form-label">Опис</label>
                                                    <textarea type="text"  rows='10' class="col-xs-12 col-sm-12 col-form-label" placeholder="Опишіть свою подію" name="description" id="description">{{$advertisement->description}}</textarea>
                                                </div>
                                                <div style='text-align: center;margin-top:10px;' class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact_left_grid">
                                                    <input type="submit" style='width:100px; margin: 20px auto;' class="btn btn-primary" value="Змінити" > </input>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection