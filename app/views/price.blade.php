@extends('Layouts.layout')
@section('content')
<div class="home_vendor_page" id="createBactch" style="background: white;">
    <div class="container-fluid">
    <div id="classInfo1">
    <form role="form" class="form-horizontal" action="/prices" method="post" enctype="multipart/form-data" id="classInfo">
          
        <div class="row row_padding">
            <p  class="create_class">Create your Class
            </p>
            <div class="col-lg-12 img-responsive class_desc">
            </div>
        </div>
    @for ($j = 1; $j < 4; $j++)    
        <div class="row row_padding">
            <div class="form-group ">
                <label class="col-sm-3 col-md-3 control-label label1" for="price_no_of_classes">No Of Sessions
                    <span class="important_required">*</span>
                </label>
                <div class="col-sm-3 col-md-2">
                    <input type="text" class="form-control" id="price_no_of_classes" name="price[{{$j}}][price_no_of_classes]" value="@if(isset($batchDetails)){{$batchDetails->price_no_of_classes}}@else{{Input::old('price_no_of_classes')}}@endif">
                </div>
                <label class="col-sm-3 col-md-3 control-label input1" for="price">Price<span class="important_required">*</span></label>
                <div class="col-sm-3 col-md-3">
                    <input type="text" class="form-control" id="price" name="price[{{$j}}][price]" value="@if(isset($batchDetails)){{$batchDetails->price}}@else{{Input::old('price[$j][price]')}}@endif">
                </div>
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label  class="col-sm-3 control-label label1">
                    Batch have Classes on<span class="important_required">*</span>
                </label>

                <div class="col-sm-6">
				<ul class="ul-without-bullets">
				
                    @foreach($weekdays as $data)
					<li>
                        <input type="checkbox" name="price[{{$j}}][price_class[]]" value="{{$data}}"
                        @if(isset($batchDetails))
                            <?php if(in_array($data, $batchDetails->price_class)): echo 'checked="checked"'; endif; ?>
                        @else
                            {{Input::old('price[$j][price_class[]]')}}
                        @endif/>
                        <?php
                            echo ucfirst($data);
                        ?>
						</li>
                    @endforeach
					</ul>
                </div>
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label for="price_trial" class="col-sm-3 control-label label1">Trial Available<span class="important_required">*</span></label>
                
                <div class="col-sm-6">
                    <ul class="radio ul-without-bullets">
                        <?php $i=1; ?>
                        @foreach($trial as $data)
						<li>
                        <label>
                            <input name="price[{{$j}}][price_trial]" id="price_trial" value={{$i}} @if(isset($batchDetails)){{($batchDetails->price_trial==$i)?'checked':''}}@else{{"Input::old('price[$j][price_trial]')"}}@endif type="radio" ><span class="radio_data">{{$data}}</span>
                        </label>
						</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
        @endfor
        <div class="btn_save_div" >
            <button type="submit" class="btn btn-success btn-lg"> @if(isset($batchDetails)) <i class="fa fa-save"></i>  Save @else <i class="fa fa-plus"></i>  Create @endif</button>
            <button type="reset" class="btn btn-warning btn-lg"><i class="fa fa-power-off"></i> Reset</button>
        </div>
    </form>
    </div>
    </div>
    </div>
@stop