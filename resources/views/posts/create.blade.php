@extends('layout.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css"> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>MUSCULAR</title>
</head>
<body>
@section('content')
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">MUSCULAR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="i\..">Accueil <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/posts')}}">Articles</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/login')}}">Profil</a>
                </li>
              </ul>
            </div>
          </nav>
    </header> 
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Creer une annonce') }}</div>
                <?php 

                    $pdo = new PDO("mysql:host=localhost;dbname=webmuscu", "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

                    if (!empty($_POST)) {

                        $_POST["name"] = htmlentities($_POST["name"], ENT_QUOTES);
                        $_POST["description"] = htmlentities($_POST["description"], ENT_QUOTES);


                        $requeteSQL = "INSERT INTO posts (name, description) VALUES ('$_POST[name]', '$_POST[description]')"; 
                        $result = $pdo->exec($requeteSQL); 
                    }
                    ?>
                <form method="POST" action="/create">
                    @csrf
                    <div class="form-group">
                    <label for="name" class="col-md-4 col-form-label ">{{ __('Nom :') }}</label>
                        <input type="" class="form-control" id="name" aria-describedby="" >
                    </div>
                    <div class="form-group">
                    <label for="name" class="col-md-4 col-form-label ">{{ __('Description :') }}</label>
                        <input type="" class="form-control" id="description" >
                    </div>
                    <button type="submit" class="btn btn-primary">Créer</button>
                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
      @endsection
</body>
</html>
          