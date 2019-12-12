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
              <h3>Edit Question</h3>
            </div>
            <form action="" method="post">
            @csrf
                <div class="form-group">
                    <label for="question">Question:</label>
                    <input type="text" class="form-control" id="question" placeholder="Enter Question" name="question" value="{{$question->question}}">
                </div>

                 <div class="form-group">
                    <label for="rightAnswer">Right Answer:</label>
                    <input type="text" class="form-control" id="rightAnswer" placeholder="Enter the right answer" name="rightAnswer" value="{{$question->right_answer}}">
                </div>

                <div class="form-group">
                    <label for="possible">Possible Answers:</label>
                    <textarea class="form-control" id="possible" name="possible" rows="3" placeholder="Enter possible answers">{{$question->possible}}</textarea>
                    <small id="course" style="font-size: 15px" class="form-text text-muted">Answers should be seperated with <strong>:</strong>, example answer1:answer2:answer3 .</small>
                </div>

                <div class="form-group">
                        <label for="inputState">Related Test</label>
                        <select id="inputState" name="test" class="form-control">
                        <option selected>{{$related_test->name}}</option>
                        @foreach($tests as $test)
                            <option>{{$test->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>

    @endsection
