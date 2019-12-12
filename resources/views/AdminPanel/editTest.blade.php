@extends("layouts.mainAdminPanel")


        @section("body")
            <link rel="stylesheet" href="{{asset("css/editTest.css")}}">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

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
              <h3>Edit Test :{{$test->name}}</h3>
            </div>
            <form action="/EditTest/{{$test->id}}" method="post">
            @csrf
                <div class="form-group">
                    <label for="testname">Test Name:</label>
                    <input type="text" class="form-control" name="testName" id="testname" aria-describedby="Test Name" placeholder="Enter Test name" value="{{$test->name}}">
                </div>

                <div class="form-group">
                        <label for="inputState">Related Course</label>
                        <select id="inputState" name="course" class="form-control">
                        <option selected>{{$related_course->name}}</option>
                        @foreach($courses as $course)
                            <option>{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>

            <div class="border-head" style="margin-top: 20px !important;">
              <h3>Edit Question of Test :{{$test->name}}</h3>
            </div>


            <div>
                <form action="/AddQuestion/{{$test->id}}" method="get">
                    @csrf
                    <input type="submit" value="Add Question" class="btn btn-success " style="float:right;margin-bottom:20px">
                </form>
            </div>


            <table class="table" style="font-size: 18px !important;">
                <colgroup>
                    <col span="1" style="width: 5%;">
                    <col span="1" style="width: 40%;">
                    <col span="1" style="width: 55%;">
                </colgroup>
                <tbody>

                    @foreach($questions as $key=>$question)

                                <tr class="active button" id="{{$key*2}}">
                                    <td>{{$question->id}}</td>
                                    <td>{{$question->question}}</td>
                                    <td>
                                        <div style="display: flex;justify-content: space-between;align-items: center;">
                                            <form action="/EditQuestion/{{$test->id}}/{{$question->id}}" method="get">
                                                @csrf
                                                <input type="submit" class="btn btn-success" value="Edit">
                                            </form>
                                            <form action="/DeleteQuestion/{{$test->id}}/{{$question->id}}" method="get">
                                                @csrf
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{$question->right_answer}}</td>
                                    <td>{{$question->possible}}</td>
                                </tr>


                    @endforeach
                </tbody>
            </table>

            <script type="application/javascript">
                $('.button').on('click', function() {
                    var id =parseInt($(this).attr('id'), 10)+1;
                    var next_tr=id+1;
                    $('tr:nth-child('+next_tr+')').toggleClass('active');
                });
            </script>
        @endsection
