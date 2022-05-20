<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="antialiased">
  <h4>Candidates data of YAML File</h4>
    <div class="row m-5">
      @if(empty($data))
      <br>
      <h4>No Data Found</h4>
      <a class="upload" href="\">click here to upload</a>
      @else
        @foreach ($data as $candidateData)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> {{$candidateData['candidate_name']}}</h5>
                        <hr class="underline" style="height: 4px;" />
                        <p class="card-text">{{$candidateData['candidate_job']}}</p>
                        <h6 class="skills">Skills</h6>
                        @foreach ($candidateData['candidate_skills'] as $candidateSkillsData)
                        <a class="slist">{{$candidateSkillsData}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>
    </div>
    <style>
        .card-title {
            color: rgb(37 182 205 / 100%);
            font-weight: bold;
        }

        h1 {
            text-align: center;
        }

        .underline {
            opacity: 100;
            margin: 0;
            border: 0;
            border-radius: 14px;
            width: 6%;
            color: rgb(37 182 205 / 100%);
        }

        .border-bottom {
            opacity: 100;
            margin: 0;
            border: 0;
            border-radius: 14px;
            width: 100%;
            height: 6px;
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 27%, rgba(0, 212, 255, 1) 100%);
        }

        .card-text {
            margin-top: 14px;
            font-weight: bolder;
            opacity: 70%;
        }

        p {
            margin-bottom: 0rem;
        }

        .skills {
            font-weight: bolder;
            margin-top: 4px;
            color: rgb(37 182 205 / 100%);
            font-weight: bold;

        }

        a {
            margin-right: 12px
        }

        .card {
            border-bottom: 6px solid rgb(37 182 205 / 100%);
            margin-bottom: 4%;
        }

        .slist {
            background-color: #25b6cd;
            border-radius: 6px;
            color: white;
            padding: 1px 10px 0px 1%;
            line-height: 17px;
            font-weight: 600;
            margin: 1em 0 0.5em 0;
            clear: left;
            letter-spacing: 1px;
            font-size: 11px;
            width: fit-content;
            text-decoration: none
        }
        h4{
          font-size: 1.5rem;
    text-align: center;
    margin-top: revert;
    font-weight: bolder;
        }
.upload{
          font-size: 1rem;
    text-align: center;
    margin-top: revert;
    font-weight: bolder;
        }

    </style>
</body>

</html>
