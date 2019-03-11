@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Laravel Scout Search Tutorial</h1>
      <form method="GET" action="{{ url('search') }}">
            <div class="row">
                <div class="col-md-6">
                    <!-- <input type="text" name="search" id="searchText" class="form-control" placeholder="Search"> -->
                    <input type="text" class="form-control" name="search" onkeyup="searchText()" id="testText">
                    <input type="hidden" name="" value="{{ @csrf_token() }}" id="token">
                </div>
                <div class="col-md-6">
                    <button class="btn btn-info">Search</button>
                </div>
            </div>
        </form>
   <br/>
      <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            @if(isset($users))
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
            @else
            <tr>
                <td colspan="3" class="text-danger">Result not found.</td>
            </tr>
            @endif

            
        </table>
   </div>

   
  

   <script type="text/javascript">

       function searchText()
       {
            var search=$('#testText').val();
            var token=$('#token').val();
           

            $.ajax({
                type:'post',
                url:"{{ url('searchtext') }}",
                data:{
                    'search':search,
                    '_token':token,
                },

                success:function(data)
                {
                    $('.table').html(data);
                },
            });
       }

   </script>
@endsection