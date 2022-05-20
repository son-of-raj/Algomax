<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
      <h5 class="h-100 d-flex justify-content-center align-items-center" style="margin: 8%;"><b>File Upload Page</b></h5>
      <div class="h-100 d-flex justify-content-center align-items-center">
      <div class="shadow p-3 mb-5 bg-white rounded"> 
        @if(session()->has('status'))
        <center>
        <p class="alert alert-success">{{session('status')}}
          <br>
          <br>
          <button type="button" value="Upload" class="btn btn-primary"><a href="{{ url('/view')}}" style="color: white;text-decoration: none;">View</a></button>
        </p>
      </center>
        <br>
      @endif
      <form action="FileUpload" method="post" enctype="multipart/form-data" style="margin: 5%;">
        @csrf
        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-4 col-form-label">Import YAML file</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 offset-sm-5">
                <button type="submit" value="Upload" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </form>
  </div>
  </div>
  </div>
    </body>
</html>
