@extends('layouts.base')
@section('content')
    <section class="no-padding-top">
        <div class="container-fluid">
            <form action="{{ route('pr.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="block">
                    <div class="title"><strong>Product Update</strong></div>
                    <div class="block-body">



                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $product->title }}" name="title" class="form-control">
                                <span style="color: red;">{{ $errors->first('title') }}</span>
                            </div>
                        </div>
                        <div class="line"></div>

                        <div class="form-group row">
                            <label for="about" class="col-sm-3 form-control-label">About</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="about" id="about">{{ $product->about }}</textarea>
                                <span style="color: red;">{{ $errors->first('about') }}</span>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <label for="about" class="col-sm-3 form-control-label">Image</label>
                            <div class="col-sm-9">
                               <input type="file" name="image" class="form-control">
                                <span style="color: red;">{{$errors->first('image')}}</span>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Categories</label>
                            <div class="col-sm-9">
                                <select name="category_id" class="form-control mb-3 mb-3">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>

                                    @endforeach

                                </select>
                            </div>

                        </div>



                        <div class="line"> </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Price</label>
                            <div class="col-sm-9 input-group">
                                <input type="text" name="price" value="{{ $product->price }}" class="form-control">
                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                <span style="color: red;">{{ $errors->first('price') }}</span>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <div class="col-sm-9 ml-auto">
                                <button type="reset" class="btn btn-secondary">Clean</button>
                                <button type="submit" name="update" value="update" class="btn btn-primary">Save
                                    changes</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>


    </section>



@endsection
