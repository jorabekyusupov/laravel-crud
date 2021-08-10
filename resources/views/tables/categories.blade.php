@extends('layouts.base')
@section('content')

<section class="no-padding-top">
    <div class="container-fluid">
        <div class="row">
          <div class="title"><strong>Categories</strong> | <a href="{{route('ct.create')}}">ADD</a></div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->name}}</td>
                                <td>
                                    <a href="{{ route('ct.edit', ['id'=>$item->id]) }}" class="btn btn-secondary">Edit</a>
                      
                                    <form action="{{ route('ct.destroy', ['id'=>$item->id]) }}" class="d-inline-block" method="post">
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
