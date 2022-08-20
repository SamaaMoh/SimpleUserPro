<table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Status</th>
                        <th scope="col">Category</th>
                        <th scope="col">Creation Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->id}}</td>
                        <td>{{ $post->created_at }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $posts->links() !!}
            
            
            
            <script>
$(document).ready(function(){

 $(document).on('click', '#pager_data a', function(event){
    event.preventDefault(); 
    var page = $(this).attr('href').split('page=')[1];
    fetch_data(page);
 });

 function fetch_data(page)
 {
  var _token = $("input[name=_token]").val();
  $.ajax({
      url:"{{ route('home') }}",
      method:"GET",
      data:{_token:_token, page:page},
      success:function(data)
      {
       $('#pager_data').html(data);
      }
    });
 }

});
</script> 