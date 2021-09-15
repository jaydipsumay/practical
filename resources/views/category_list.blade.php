@include('default.head')
<div class="container">
  <h1>Category List</h1>
  <br>
   @if (\Session::has('success'))
                <div class="alert alert-success">
                    {!! \Session::get('success') !!}
                </div>
            @endif
<div class="py-4" style="float:right">
            <a class="btn btn-primary " href="{{ route('new_category')}}" role="button">New Category</a>
          </div>
          <br>

  <table class="table" id="categoryTable">
  <thead>
    <tr>
      <th><input type="checkbox" onclick="check_uncheck_checkbox()">  All <br> <a href="#" onclick="delete_check_value()"><i class="fa fa-trash" aria-hidden="true" style="color: red;"></i></a> All</th>
      <th scope="col">Sr.</th>
      <th scope="col">Name</th>
      <th scope="col">status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
    $i=1;
    ?>
    @foreach($category as $item)
    <tr id="tr_{{$i}}">
      <th><input type="checkbox" class="check" name="check" value="{{ $item->id }}"></th>
      <th scope="row">{{$i}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->status}}</td>
       <?php
      $i++;
      ?>
     <td>
        <a href="{{ route('edit_category',['id' => $item->id])}}"><i class="fa fa-edit"></i> Edit</a>	&nbsp;
    <!-- onclick='delete_category({{$item->id}})' -->
        <a href="#" class="delete"  style="color: red;"><i class="fa fa-trash" aria-hidden="true" ></i> Delete</a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>

@include('default.footer') 
<script>
  $(document).ready( function () {
    $('#categoryTable').DataTable({
       responsive: true
    });
} );
var i=1;	
		function delete_check_value() {
			var checked_Values = $('.check:checkbox:checked').map(function() {
				return this.value;
			}).get();
			all_id = encodeURIComponent(checked_Values.join(","));
      link = href="{{  url('') }}/delete_multiple_category/"+all_id;
			window.location.href = link;
		}

function check_uncheck_checkbox() {
	
			if(i%2) {
				i++;
					$('input[name="check"]').each(function() { 
					this.checked = true; 
				});
			}
			else{
				i++;
				$('input[name="check"]').each(function() {
					this.checked = false;
				});
			} 
				
		}
    function delete_category(id){ 
       $.ajax(
      {
        url: "delete_category/"+id,
        type: 'get',
        data: {
            "id": id,
        },
        success: function (){
        }
      });
    }
    $(".delete").click(function(){
      $(this).parent().parent().remove();
    });
  

</script>