<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action='/login/admin' method="POST">
        @csrf
        <label for='email'>Enter an E-mail:</label>
        <input type='text' name='email'><br>
        <label for='password'>Enter your Password:</label>
        <input type='password' name='password'><br>
        <input type='submit'>
    </form>

    <!-- {{ isset($name) ? $name : 'There is no name' }} -->

    @if ($errors->any())
    <div style="border: 1px solid; border-color: red; background-color: pink; width:50%;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    
    


</body>

</html>