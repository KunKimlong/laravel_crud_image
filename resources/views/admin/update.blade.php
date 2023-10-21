<x-admin>
    <div class="data-title">
        <h3>Update Student</h3>
    </div>
    {{-- {{$result}} --}}
    <div class="add">
        <form action="{{route("update",$result->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Name:</label>
            <input type="text" class="@if($errors->first('name')) is-invalid @endif" name="name" id="" value="{{$result->name}}"  placeholder="Name:">
            @if ($errors->first('name'))
                Error
            @endif
            <label for="">Gender:</label>
            <select name="gender" id="block" class="@if($errors->first('gender')) is-invalid @endif">
                <option value="Male" @if ($result->gender=='Male') selected  @endif>Male</option>
                <option value="Female" @if ($result->gender=='Female') selected  @endif>Female</option>
            </select>
            <label for="">Score Activity:</label>
            <input type="text" class="@if($errors->first('acrivity')) is-invalid @endif" value="{{$result->activites}}" name="acrivity" id="" placeholder="Score Activity:">
            <label for="">Score Attendent:</label>
            <input type="text" class="@if($errors->first('attendent')) is-invalid @endif" value="{{$result->attendet}}" name="attendent" id="" placeholder="Score Attendent:">
            <label for="">Score Exam:</label>
            <input type="text" class="@if($errors->first('exam')) is-invalid @endif"value="{{$result->exam}}" name="exam" id="" placeholder="Score Exam:">
            <label for="">Photo:</label>
            <input type="file" class="@if($errors->first('photo')) is-invalid @endif" name="photo" id="">
            <input type="hidden" name="old_image" value="{{$result->profile}}" id="">
            <img src="../assets/image/{{$result->profile}}" alt="" width="100px" height="100px">
            <button class="btn-lightblue" type="submit">Update</button>
            <button class="btn-clear" type="reset">Reset</button>
        </form>
    </div>
</x-admin>