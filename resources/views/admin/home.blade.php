@extends('layouts.app')

@section('content')
<div class="container">

                    @if (session('error'))
                    <div class="alert alert-danger">
                      {{ session('error') }}
                    </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

    
    <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Creation Date</th>
                        <th scope="col">Updated Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <button type="button" class="btn changeStatus {{$user->getStatusClass()}}" data-url="{{route('changeStatus', $user->id)}}">{{ $user->getStatus() }}</button>
                        </td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-primary edit"  data-url="{{route('update', $user->id)}}" >Edit</a>
                            <a href="javascript:void(0)" class="btn btn-primary delete" data-url="{{route('delete', $user->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</div>
<!-- boostrap model -->
    <div class="modal fade" id="ajax-user-model" aria-hidden="true">
      
    </div>
<script>
    $(function() {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
        $('body').on('click', '.edit', function () {
        var url = $(this).data('url');
         
          $.ajax({
            type:"GET",
            url: url,
            data: {},
            dataType: 'HTML',
            success: function(res){
              $('#ajaxUserModel').html("Edit User");
              $('#ajax-user-model').html(res);
              $('#ajax-user-model').modal('show');
           }
        });
    });
    
    
        $('body').on('click', '.delete', function () {
       const result = window.confirm('Do you want to delete?');
        if (result) {
        var url = $(this).data('url');
         
        // ajax
        $.ajax({
            type:"DELETE",
            url: url,
            data: {},
            dataType: 'json',
            success: function(res){
              window.location.reload();
           }
        });
       }
    });
    
    $('body').on('click', '.changeStatus', function () {
        var btn = $(this);
        var url = $(this).data('url');
         
        // ajax
        $.ajax({
            type:"PUT",
            url: url,
            data: {},
            dataType: 'json',
            success: function(res){
              if(btn.hasClass('btn-success')){
                  btn.removeClass('btn-success');
                  btn.addClass('btn-danger');
                   btn.html('inactive');
                  
              }else{
                  btn.removeClass('btn-danger');
                  btn.addClass('btn-success');
                  btn.html('active');
              }
           }
        });
       });
            
});


    </script>
@endsection
