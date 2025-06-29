@extends('admin.layouts.template')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
</head>
<body>

    <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
      <div class="d-flex justify-content-between">
        <h3 class="text-dark pb-3">All Contact</h3>
      </div>
        
         <div class="table-responsive">
           <table id="datatable1" class="table table-striped table-info">
             <thead>
               <tr>
                 <th class="wd-10p">ID</th>
                 <th class="wd-15p">Name</th>
                 <th class="wd-15p">Email</th>
                 <th class="wd-10p">Phone</th>
                 <th class="wd-15p">Subject</th>
                 <th class="wd-20p">Message</th>
                 <th class="wd-15p">action</th>
               </tr>
             </thead>

             <tbody>
                @foreach ($allContact as $data)
               <tr>
                 <td>{{$data->id}}</td>
                 <td>{{$data->name}}</td>
                 <td>{{$data->email}}</td>
                 <td>{{$data->phone}}</td>
                 <td>{{$data->subject}}</td>
                 <td>{{$data->message}}</td>
                 <td>
                    <a href="{{route('contact.view', $data->id)}}">View</a> ||
                    <a onclick="return confirm('Are you sure ?')" href="{{route('contact.delete', $data->id)}}"><span class="tx-danger"> Delete</span></a>
                 </td>
               </tr>
               @endforeach
             </tbody>
          </table>
          <div class="d-flex justify-content-center mt-3">
              {!! $allContact->links('pagination::bootstrap-4') !!}
          </div>

         </div>
       </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <script>
    @if (Session::has('success'))
        toastr.success("{{Session::get('success')}}");
    @endif
    </script>

</body>
</html>
@endsection
