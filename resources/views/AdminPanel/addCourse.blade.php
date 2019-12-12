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
              <h3>Add Course</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="title">Course Title:</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter Question" name="title">
                </div>

                <div class="form-group">
                    <label for="course">Course file :</label>
                    <input type="file" class="form-control-file" id="course" name="course">
                </div>


                <button type="submit" class="btn btn-success">Submit</button>
            </form>

    @endsection
