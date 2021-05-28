<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Top navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<main class="container">
    <div class="bg-light p-5 rounded">
        <form>
            <div class="mb-3">
                <label for="username" class="form-label">Name</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div class="form-check">
                    <input type="radio" name="gender" value="male" id="gender-male" class="form-check-input">
                    <label for="gender-male" class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="gender" value="female" id="gender-female" class="form-check-input">
                    <label for="gender-female" class="form-check-label">Female</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="programming_language" class="form-label">Programming language</label>
                <select name="programming_language" id="programming_language" class="form-control">
                    <optgroup label="Backend">
                        <option value="php">PHP</option>
                        <option value="python">Python</option>
                        <option value="java">Java</option>
                    </optgroup>
                    <optgroup label="Frontend">
                        <option value="js">JavaScript</option>
                        <option value="html">HTML</option>
                        <option value="css">CSS</option>
                    </optgroup>
                </select>
            </div>

            <button type="button" class="btn btn-success">Send</button>
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>