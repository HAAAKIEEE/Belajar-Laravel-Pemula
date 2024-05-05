<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- menggunakan lang id en --}}
<h1>{{__('message.welcome')}}</h1>
{{-- menggunakan Json di lang --}}
<h1>{{__('Hello Handsome')}}</h1>

    <p>Locale : {{App::getLocale()}}</p>
    <p>{{__('Language')}} :
    <a href="{{route('set_locale','en')}}">English</a> {{__('or')}}
    <a href="{{route('set_locale','id')}}">Indonesia</a>
</p> 
    
    @if (Auth::check())
    <form action="{{route('logout')}}" method="post">
        
    @csrf
    <button type="submit">Logout</button>
    </form>    
    <p>{{__('Name')}}: {{$user->name}}</p>
    <p>Email : {{$user->email}}</p>
    <p>{{__('Role')}} : {{$user->role}}</p>


        <p>Id : {{$id}}</p>
    @else
        <a href="{{route('login')}}">Login</a>
        <a href="{{route('register')}}">Register</a>

    @endif

    <table border="1px">
        <tr>
            <th>ID</th>
            <th>{{__('Name')}}</th>
            <th>{{__('Score')}}</th>
            <th>Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>
                <a href="{{route('show',$student->id)}}">
                {{$student->name}}</td>
                </a>
            <td>{{$student->score}}</td>
            <td>
                <form action="{{route('edit',$student)}}" method="get">
                    @csrf
                    <button type="submit"> {{__('Edit')}}</button>
                </form>
                <form action="{{route('delete',$student)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit"> {{__('Delete')}}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>


{{__('Current page')}}: {{$students->currentPage()}} <br>
    {{__('Total pages')}}: {{$students->total()}} <br>
   {{__('Data per page')}}: {{$students->perPage()}} <br>

    {{$students->Links('pagination::bootstrap-4')}}
</body>
</html>