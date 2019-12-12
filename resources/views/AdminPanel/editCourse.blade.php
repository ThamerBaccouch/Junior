@extends("layouts.mainAdminPanel")


        @section("body")

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(isset($success))
                 <div class="alert alert-success">
                 <ul>
                     <li>{{$success}}</li>
                 </ul>
                 </div>
            @endif

            <div class="border-head">
              <h3>Edit Course :{{$course->name}}</h3>
            </div>
            <form action="/EditCourse/{{$course->id}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="title">Test Name:</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="Course Title" placeholder="Enter Course title" value="{{$course->name}}">
                </div>
                <div class="form-group">
                    <label for="course">Course file :</label>
                    <input type="file" class="form-control-file" id="course" name="course">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>

            <form action="{{$course->path}}" method="get" style="float:right">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="View">
            </form>

            <div class="border-head" style="margin-top: 20px !important;">
              <h3>Edit Tests of Course :{{$course->name}}</h3>
            </div>


            <div>
                <form action="/AddTest" method="get">
                    @csrf
                    <input type="submit" value="Add Test" class="btn btn-success " style="float:right;margin-bottom:20px">
                </form>
            </div>


            <table class="table" style="font-size: 18px !important;">
                <colgroup>
                    <col span="1" style="width: 5%;">
                    <col span="1" style="width: 70%;">
                    <col span="1" style="width: 15%;">
                </colgroup>
                <tbody>

                    @foreach($tests as $test)
                                <tr class="active">
                                    <td>{{$test->id}}</td>
                                    <td>{{$test->name}}</td>
                                    <td>
                                        <div style="display: flex;justify-content: space-between;align-items: center;">
                                            <form action="/EditTest/{{$test->id}}" method="get">
                                                @csrf
                                                <input type="submit" class="btn btn-success" value="Edit">
                                            </form>
                                            <form action="/DeleteTestFromCourse/{{$test->id}}" method="get">
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

