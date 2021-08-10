@extends('layouts.base')
@section('content')
    <section class="no-padding-top">
        <div class="container-fluid">
            <form action="{{ route('ct.update', ['id'=>$category->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="block">
                    <div class="title"><strong>Category Update</strong></div>
                    <div class="block-body">
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{$category->name}}" class="form-control">
                                <span>{{$errors->first('name')}}</span>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <div class="col-sm-9 ml-auto">
                                <button type="reset" class="btn btn-secondary">Clean</button>
                                <button type="submit" name="save" value="save" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


    </section>



@endsection
