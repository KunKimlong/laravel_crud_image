<x-admin>
    <div class="data-title">
        <h3 class="text-center">Logout Account</h3>
    </div>
    <div class="add">
        <h1>Are You sure you want to logout? </h1>
        <form action="{{route('logout')}}" method="post" class="d-flex">
            @csrf
            <a href="{{route('dashboard')}}" class="btn btn-success">NO</a>
            <button class="btn btn-danger mx-5">Yes</button>
        </form>
    </div>
</x-admin>

