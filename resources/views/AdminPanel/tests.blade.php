
@extends("layouts.mainAdminPanel")

    @section("body")
    <div class="border-head">
               <h3>All Tests</h3>
    </div>


     <div>
         <form action="/AddTest" method="get">
             @csrf
             <input type="submit" value="Add Test" class="btn btn-success " style="float:right;margin-bottom:20px">
         </form>
     </div>

    <table class="table" style="font-size: 18px !important;">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Test name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tests as $test)
            <tr>
                <th scope="row">{{$test->id}}</th>
                <td>{{$test->name}}</td>
                <td style="width:18%">
                    <div style="display: flex;justify-content: space-between;align-items: center;">
                        <form action="/EditTest/{{$test->id}}" method="get">
                            @csrf
                            <input type="submit" class="btn btn-success" value="Edit">
                        </form>
                        <form action="/DeleteTest/{{$test->id}}" method="get">
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
