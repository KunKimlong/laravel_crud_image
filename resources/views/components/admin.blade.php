<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/style/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
</head>
<body>
    <div class="content">
        <div class="left">
            <div class="profile">
                <div class="img">
                    <img src="assets/image/{{auth()->user()->profile}}" width="100px" height="100px">
                </div>
                <h6>Welcome to Teacher {{auth()->user()->name}}</h6>
            </div>
            <hr size="4" color="white">
            <div class="all_btn">
                <ul>
                    <li class="drop">
                        <div class="drop-title">
                            <h5>Data</h5>
                            <img src="{{asset('assets/icon/arrow.png')}}" alt="">
                        </div>
                        <ul class="drop_item">
                            <a href="{{route('addstudent')}}"><li>Add Data</li></a>
                            <a href="{{route('view')}}"><li>View Data</li></a>
                        </ul>
                    </li>
                    <li class="drop">
                        <div class="drop-title">
                            <h5><a href="{{route('gotologout')}}">Logout</a></h5>
                        </div>
                        
                    </li>
                </ul>
            </div>
        </div>
        <div class="right">
            <div class="head">
                <div class="image">
                    <img src="../Image/logohead.jpg" alt="">
                </div>
                <div class="title">
                    <h1>Student Infomation Dashboard</h1>
                </div>
            </div>
            <div class="data">
                <div class="detail-data">
                  {{$slot}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
            