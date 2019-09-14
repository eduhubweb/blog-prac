@extends('layouts.theme1.master')
@section('content')
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$title}}</h4>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($categories  as $category)
                           <tr>
                               <td>{{$serial++}}</td>
                               <td>{{$category->name}}</td>
                               <td>{{$category->details}}</td>
                               <td>
                                   <a href="{{route('category.edit',$category->id)}}">Edit</a>
                                  <form method="post" action="{{route('category.destroy',$category->id)}}">
                                      @csrf
                                      @method('delete')
                                      <button class="btn btn-danger text-white" onclick="return confirm('are you delete category')">Delete</button>
                                  </form>
                               </td>
                           </tr>
                       @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
    </div>
@endsection

