<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-4">
        @if ($errors->any())
        <div class="pt-3">
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $item)
                     <li>{{ $item }}</li>
                 @endforeach
             </ul>
         </div>
        </div>
    @endif
        <div class="row">
            <div class="card">
                <div class="card-body">
                     <!-- START FORM -->
     <form action="/insert" method="POST">
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">Project Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  name='project_name' id="project">
                </div>
            </div>
            <div class="form-group row mb-3 row">
                <label for="client" class="col-sm-2 col-form-label">Client</label>
                <div class="col-sm-10">
                    <select id="client"  " name="client_id" class="form-control">
                        <option value="" disabled selected>Select Client</option>
                        @foreach ($create as $item)
                            <option value="{{ $item->client_id }}">{{ $item->client_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
         
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Project start</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='project_start' id="start">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">project end</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control"  name='project_end' id="end">
                </div>
            </div>
            <div class="form-group row mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select id="status" name="project_status" class="form-control">
                        <option value="" disabled selected>Select Status</option>
                        <option value="OPEN">OPEN</option>
                        <option value="DOING">DOING</option>
                        <option value="DONE">DONE</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" >SIMPAN</button></div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->
        
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>