<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>

      @if(count($errors)>0)
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      @endif
     @if($message = Session::get('success'))
     <strong>{{$message}}</strong>
     @endif
    <form method="post" action="{{ url('sendmail/send') }}">
    {{ csrf_field() }}
     <label>Enter Your Name:</label>
     <input type="text" name="name"/><br><br>
    <label>Enter your Email:</label>
    <input type="text" name="mail"/><br><br>
    <label>Enter your Message:</label>
    <textarea name="message"></textarea><br><br>
    <input type="submit" name="send" value="Send"/>
    </form>
    </div>
</body>
</html>