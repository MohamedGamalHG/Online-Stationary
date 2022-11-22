@extends('Admin.main')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="alert alert-success" id="alertsave" style="display:none;">data saved done</div>
    <div class="alert alert-danger" id="ul-list" style="display: none">
        <ul >

        </ul>
    </div>
    <form action="{{route('product.store')}}" method="post" id="ajaxform" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input type="text" class="form-control" name="product_name" id="exampleInputEmail1">

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Product Price</label>
            <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" >

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Product Quantity</label>
            <input type="number" name="product_quantity" class="form-control" id="exampleInputEmail1" >

        </div>  <div class="form-group">
            <label for="exampleInputEmail1">Product Description</label>
            <input type="text" name="product_details" class="form-control" id="exampleInputEmail1" >

        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Upload Images</label>
            <input type="file" name="images[]" class="form-control-file" accept="image/*" multiple id="exampleFormControlFile1">
        </div>
        {{--<div class="form-group">
            <label for="exampleFormControlSelect1">Select Filter</label>
            <select name="filter_size" class="form-control" id="exampleFormControlSelect1">
                @foreach($subfilter as $sub)
                    @if($sub->filter->name  == 'Size')
                        <option value="{{$sub->id}}">{{$sub->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Filter</label>
            <select name="filter_color" class="form-control" id="exampleFormControlSelect1">
                @foreach($subfilter as $sub)
                    @if($sub->filter->name  == 'Color')
                        <option value="{{$sub->id}}">{{$sub->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>--}}
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Category</label>
            <select name="category" class="form-control" id="exampleFormControlSelect1">
                @foreach($categories as $sub)
                    <option value="{{$sub->id}}">{{$sub->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" id="send" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('js')
<script>
   $(document).on('click','#send',function (e){
        e.preventDefault();
        var form = new FormData($('#ajaxform')[0]);
        $.ajax({
            type:"post",
            enctype:'multipart/form-data',
            url:"{{route('product.store')}}",
            data:form,
            processData:false,
            contentType:false,
            cache:false,
            success:function (data){
                console.log(data)
                if(data.status == true) {
                    $('#alertsave').show();
                    window.scrollTo(0,0)
                    setTimeout(function (){$('#alertsave').hide();},3000)
                }
            },
            error:function (data){
                var parseData = JSON.parse(data.responseText);
                var error  = Object.values(parseData.errors);
                if(data.status == false)
                    $('#alertsave').show();
                if(parseData.status == false || data.status == 400) {
                        $('#ul-list').append(`<li> ${error[0]} </li>`).show();
                        setTimeout(function (){  $('#ul-list').hide()},3000)
                    }

            }

        })
    })
</script>
@endsection
