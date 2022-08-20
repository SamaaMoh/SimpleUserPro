  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
        <form method="POST" action="javascript:void(0)">
            @method('PUT')
                        @csrf
                        <input type="hidden" value="{{$user->id}}" name="id" id="id"/>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="btn-save" value="editUser" data-url="{{route('store')}}">Save changes
                </button>
              </div>                        
                       
                   </form>
      </div>

    </div>
  </div>

<script>
    $(function() {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    
        $('body').on('click', '#btn-save', function (event) {
          var url = $(this).data('url');
          var name = $("#name").val();
          var email = $("#email").val();
          var id = $('#id').val();
  
   
         
        // ajax
        $.ajax({
            type:"PUT",
            url: url,
            data: {
              id:id,  
              name:name,
              email:email
            },
            dataType: 'json',
            success: function(res){
             window.location.reload();
           }
        });
    });

    
});


    </script>