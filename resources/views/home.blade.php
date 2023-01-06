<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>random</title>
</head>
<body>
<div class="container
">
    <nav class="navbar fixed-top bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand text-white" href="https://www.instagram.com/">@hafiyzaid</a>
        <a class="navbar-brand text-white" href="https://github.com/hafiyzaid/openai-randomtext.git">github</a>
        </div>
    </nav>
</div>

<div class="container text-center py-5 my-5">
    <form  class="form" method="get" id="questform">
        <div class="form-group col-md-10">
            insert incomplete sentence
            <input type="text" class="form-control text-center" name="question" placeholder="give me....">
            <div class="btn btn-primary my-3" id="btnAsk">ask</div>
        </div>
        <div class=" col-md-10">
           <div id="answer"></div>
        </div>

       
        
    </form>
</div>





</body>

  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href=""></use></svg>
      </a>
      <span class="mb-3 mb-md-0 text-muted"> built with <a href="https://openai.com/">OpenAI</a> </span>
    </div>
   

  </footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
    $( document ).ready(function() {
        $('#btnAsk').click(function(e){ 
        $('#answer').empty();
        $.ajax({
            data: $('#questform').serialize(),
            url: "{{ url('/text-result') }}",
            type: "get",
            dataType: 'json',

            success: function(data) {
               
                $('#answer').append(data.answer)           
            }
         })
        })
    });
</script>

</html>