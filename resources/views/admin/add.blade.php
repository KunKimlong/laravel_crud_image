<x-admin>
    <div class="data-title">
        <h3>Add Student</h3>
    </div>
    <div class="add">
        <form action="{{route('storestudent')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Name:</label>
            <input type="text" class="@if($errors->first('name')) is-invalid @endif" name="name" id=""  placeholder="Name:">
            @if ($errors->first('name'))
                Error
            @endif
            <label for="">Gender:</label>
            <select name="gender" id="block" class="@if($errors->first('gender')) is-invalid @endif">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <label for="">Score Activity:</label>
            <input type="text" class="@if($errors->first('acrivity')) is-invalid @endif" name="acrivity" id="" placeholder="Score Activity:">
            <label for="">Score Attendent:</label>
            <input type="text" class="@if($errors->first('attendent')) is-invalid @endif" name="attendent" id="" placeholder="Score Attendent:">
            <label for="">Score Exam:</label>
            <input type="text" class="@if($errors->first('exam')) is-invalid @endif" name="exam" id="" placeholder="Score Exam:">
            <label for="">Photo:</label>
            <input type="file" class="@if($errors->first('photo')) is-invalid @endif" name="photo" id="">
            <button class="btn-lightblue" type="submit">Submit</button>
            <button class="btn-clear" type="reset">Reset</button>
        </form>
    </div>
</x-admin>