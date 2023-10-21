<x-admin>
    <div class="data-title">
        <h3>View Student</h3>
    </div>
    <table class="table table-hover table-dark text-center align-middle">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Attendent</th>
            <th>Activites</th>
            <th>Exxam</th>
            <th>Total</th>
            <th>Average</th>
            <th>Grade</th>
            <th>Profile</th>
            <th>Action</th>
        </tr>
        @foreach ($result as $stu)
        <tr>
            <td>{{$stu->id}}</td>
            <td>{{$stu->name}}</td>
            <td>{{$stu->gender}}</td>
            <td>{{$stu->attendet}}</td>
            <td>{{$stu->activites}}</td>
            <td>{{$stu->exam}}</td>
            <td>{{$stu->total}}</td>
            <td>{{$stu->average}}</td>
            <td>{{$stu->grade}}</td>
            <td>
                <img src="assets/image/{{$stu->profile}}" width="100px" height="100px" alt="">
            </td>
            <td>
                <a href="{{route('gotoupdate',$stu->id)}}" class="btn btn-warning">Update</a>
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>
</x-admin>