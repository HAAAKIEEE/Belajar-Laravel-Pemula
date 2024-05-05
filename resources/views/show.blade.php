<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

  
    

{{-- memangginl menggunakan id student dan menampilkan ukm  --}}
 <p>Id    :{{$student->id}}</p>
 <p>Name  :{{$student->name}}</p>
 <p>Score :{{$student->score}}</p>
<p>Activities :</p>
 @foreach ($student->activities as $activity)
 <p> {{$activity->name}}</p>
     
 @endforeach   

    {{-- memangginl menggunakan id ukm dan menampilkan nama murid --}}
        {{-- <p>{{$activity->name}}</p>

       @foreach ($students as $student) 
       <p> {{$student->name}}</p><br>
           
       @endforeach  --}}

 {{-- atau menggunakan ini  juga sama --}}
 {{-- <p>{{ $student->name }}</p>

 @if ($activities)
     @foreach ($activities as $activity)
         <p>{{ $activity->name }}</p><br>
     @endforeach
 @else
     <p>Tidak ada aktivitas yang terkait dengan siswa ini.</p>
 @endif --}}

 {{-- mencek nama murid berdasarkan id teacher --}}
    {{-- <p>your student is:</p>

       @foreach ($students as $student)
       <p> {{$student->name}}</p><br>
           
       @endforeach --}}
    </body> 
</html>