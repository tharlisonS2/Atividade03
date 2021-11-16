@extends("template.master")
    @section("titulo", "Principal")        
    @section("botoes")

        @endsection
        @section("listagem")
        <h1>Clubes</h1>
        <div class="d-inline-flex p-2 col-3 bd-highlight">
            @foreach($clubes as $clube)
           
                
                    <div class="col"><img src="{{ asset($clube->url); }}" maxwidth="100" height="100"></div>
                    
            @endforeach
            </div>
        @endsection
</body>
</html>