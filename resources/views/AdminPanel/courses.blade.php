
@extends("layouts.mainAdminPanel")

    @section("body")
    <div class="border-head">
               <h3>All Courses</h3>
    </div>


     <div>
         <form action="/AddCourse" method="get">
             @csrf
             <input type="submit" value="Add Course" class="btn btn-success " style="float:right;margin-bottom:20px">
         </form>
     </div>


            <table class="table" style="font-size: 18px !important;">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Course Title</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <th scope="row">{{$course->id}}</th>
                <td>{{$course->name}}</td>
                <td style="width:18%">
                    <div style="display: flex;justify-content: space-between;align-items: center;">
                        <form action="{{$course->path}}" method="get">
                            @csrf
                            <input type="submit" class="btn btn-secondary" value="View">
                        </form>
                        <form action="/EditCourse/{{$course->id}}" method="get">
                            @csrf
                            <input type="submit" class="btn btn-success" value="Edit">
                        </form>
                        <form action="/DeleteCourse/{{$course->id}}" method="get">
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
        </table>

    @endsection
