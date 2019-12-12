@extends("layouts.mainAdminPanel")

    @section("body")

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="border-head">
              <h3>Add Test</h3>
            </div>
            <form action="" method="post">
            @csrf
                <div class="form-group">
                    <label for="TestName">Test Name:</label>
                    <input type="text" class="form-control" id="TestName" placeholder="Enter Test Name" name="TestName">
                </div>
                <div class="form-group">
                        <label for="inputState">Related Course</label>
                        <select id="inputState" name="course" class="form-control">
                        @foreach($courses as $course)
                            <option>{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-success">Submit</button>
            </form>

    @endsection
