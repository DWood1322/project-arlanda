<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-4">
    
  <div class="row mb-4">
    <form action="/project" method="GET">
    <table class="border w-100 ">
      <tr>
        <td></td>
      <td>Project Name</td>
      <td>
        {{-- Client --}}

      </td>
      <td>
        {{-- status --}}
      </td>
      <th></th>
      <th></th>
      </tr>
      <tr>
        <th><h1>FILTER</h1></th>
        <td><input type="search" name="katakunci" id="" class="form-control" placeholder="Project Name" value="{{ Request::get('katakunci') }}"></td>
        <td> 
          {{-- <select id="client"  " name="kataclient" class="form-control" value="{{ Request::get('katakunci') }}">
            <option value="" >All Client</option>
            @foreach ($create as $item)
                <option value="{{ $item->client_id }}">{{ $item->client_name }}</option>
            @endforeach
        </select> --}}
    </td>
        <td> 
          {{-- <select id="status" name="katastatus" class="form-control">
            <option value="">Select Status</option>
            <option value="OPEN">OPEN</option>
            <option value="DOING">DOING</option>
            <option value="DONE">DONE</option>
        </select> --}}
    </td>
        <td><input class="btn btn-primary" type="submit" value="SEARCH">
        <input class="btn btn-primary" type="submit" name="clear" value="CLEAR"></td>
        
      
      </tr>
    

    </table>
    </form>
    
  </div>
  @if ($massage = Session::get('success'))
  <div class="pd-3">
      <div class="alert alert-success">
          {{$massage}}
      </div>
  </div>
@endif

        <a href="/create" type="button" class="btn btn-success">NEW</a>
        <button id="delete-selected-items"  class="btn btn-danger">DELETE</button>
        <div class="row">
      
          
          
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col"><input type="checkbox"  ></th>
                    <th scope="col">Action</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Client</th>
                    <th scope="col">Project Start</th>
                    <th scope="col">Project End</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        
                    
                  <tr>
                    <td>
                      <input type="checkbox" name="item_ids[]" value="{{ $item->project_id }}">
                  </td>
                    <td scope="row"><a href="/edit/{{ $item->project_id }}" type="button" class="btn btn-warning">EDIT</a>
                    <td>{{ $item->project_name }}</td>
                    <td>{{ $item->client_name}}</td>
                    <td>{{ date('d M Y', strtotime($item->project_start) ) }}</td>
                    <td>{{ date('d M Y', strtotime($item->project_end) ) }}</td>
                    <td>{{ $item->project_status }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
    {{ $data->links() }}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  {{-- <script>
    new DataTable('#example');
  </script> --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
      document.addEventListener('DOMContentLoaded', function () {
          const deleteButton = document.getElementById('delete-selected-items');
          
          deleteButton.addEventListener('click', function() {
              const selectedCheckboxes = document.querySelectorAll('input[name="item_ids[]"]:checked');
              const selectedIds = Array.from(selectedCheckboxes).map(checkbox => checkbox.value);
              
              if (selectedIds.length === 0) {
                  Swal.fire('Peringatan', 'Pilih setidaknya satu item untuk dihapus', 'warning');
                  return;
              }

              Swal.fire({
                  title: 'Hapus Item Terpilih?',
                  text: 'Apakah Anda yakin ingin menghapus item yang dipilih?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Ya, hapus!',
                  cancelButtonText: 'Tidak, batalkan'
              }).then((result) => {
                  if (result.isConfirmed) {
                      // Lakukan pemanggilan Ajax ke rute delete dengan data selectedIds
                      axios.delete(`/delete`, {
                          data: { item_ids: selectedIds }
                      })
                      .then(response => {
                          Swal.fire('Sukses', 'Item terpilih berhasil dihapus', 'success');
                          // Refresh halaman setelah penghapusan
                          location.reload();
                      })
                      .catch(error => {
                          Swal.fire('Error', 'Terjadi kesalahan', 'error');
                      });
                  }
              });
          });
      });
  </script>
  </body>
</html>