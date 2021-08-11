@extends('layouts.base')
@section('content')

<section class="no-padding-top">
    <div class="container-fluid">
        <div class="row">
            <div class="title"><strong>Products</strong> | <a href="{{route('pr.create')}}">ADD</a></div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($product as $item)
                        <tr class="">
                            <th scope="row">{{$item->id}}</th>
                            <td >{{$item->title}}</td>
                            <td ><img style="width: 30px; height: 30px;"  src="{{{ asset('assets/image/products/'.$item->image) }}}" alt=""></td>

                            <td>  <div class="badge badge-success badge-shadow">{{$item->category->name }}</div></td>
                            <td>{{$number = number_format($item->price, '1') }} So'm</td>
                            <td>
                                <a href="{{route('pr.show',['id'=>$item->id])}}" class="btn btn-primary">View</a>
                                <a href="{{route('pr.edit',['id'=>$item->id])}}" class="btn btn-secondary">Edit</a>
                               <form action="{{ route('pr.destroy', ['id'=>$item->id]) }}" class="d-inline-block" method="post">
                                @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                               </form>

                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>


        </div>
    </div>
</section>

@endsection
