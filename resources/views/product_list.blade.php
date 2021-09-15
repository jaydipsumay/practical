@include('default.head')

<div class="container">
    <h3>Product List</h3>
    @if (\Session::has('success'))
                <div class="alert alert-success">
                    {!! \Session::get('success') !!}
                </div>
    @endif

    @if (\Session::has('danger'))
                <div class="alert alert-danger">
                    {!! \Session::get('danger') !!}
                </div>
    @endif
<div class="py-4" style="float:right">
<a class="btn btn-primary float-right" href="{{ route('new_product')}}" role="button">New Product</a>
</div>
<br>

  <table class="table" id="productTable">
  <thead>
    <tr>
      <th><input type="checkbox" onclick="check_uncheck_checkbox()">  All <br> <a href="#" onclick="delete_check_value()"><i class="fa fa-trash" aria-hidden="true" style="color: red;"></i></a> All</th>
      <th scope="col">Sr.</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    ?>
    @foreach($Product as $item)
    <tr id="{{$i}}">
      <th><input type="checkbox" class="check" name="check" value="{{ $item->id }}"></th>
      <th scope="row">{{$i}}</th>
      <td><img src="{{  url('') }}/{{$item->image}}" alt="Product Image" width="40px" height="40px"></td>
      <td>{{$item->product_name}}</td>
      <td>{{$item->category->name}}</td>
      <td>{{$item->price}}</td>
      <td>{{$item->description}}</td>
      <td>{{$item->status}}</td>
      <td>
        <a href="{{ route('edit_product',['id' => $item->id])}}"><i class="fa fa-edit"></i> Edit</a>	&nbsp;
      
        <a style="color: red;" class="delete" href="#" onclick='delete_product({{$item->id}})'><i class="fa fa-trash" aria-hidden="true" ></i> Delete</a>
      </td>
      <?php
      $i++;
      ?>
    </tr>
  @endforeach
  </tbody>
</table>
</div>

@include('default.footer') 
<script>
  $(document).ready( function () {
    $('#productTable').DataTable({
       responsive: true
    });
      
} );
var i=1;	
		function delete_check_value() {
			var checked_Values = $('.check:checkbox:checked').map(function() {
				return this.value;
			}).get();
			all_id = encodeURIComponent(checked_Values.join(","));
      
			link = href="{{  url('') }}/delete_multiple_product/"+all_id;
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
     function delete_product(id){  
      
     $.ajax(
      {
        url: "delete_product/"+id,
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