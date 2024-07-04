<x-layout>
  <h1 class="centertxt">Nota</h1>
  <form method="post" action="/nota/store">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Aluno</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Aluno" name="aluno">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Nota</label>
      <input type="double" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nota" name="media">
    </div>
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary centerThing">Resultado</button>
    </div>
  </form>

  <label>RESULTADO</label><br>
  <label>Nota: {{$data["media"]}}</label><br>
  <label>Resultado: {{$data["status"]}}</label><br>
  <br><br><br>
</x-layout>