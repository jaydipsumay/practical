@include('default.head')
<div class="container">
   
     @if($product->exists)
    <h3>Edit Product</h3>
    @else
 <h3>New Product</h3>
    @endif
      <div class="py-4" style="float:right">
            <a class="btn btn-primary " href="javascript: history.go(-1)" role="button">Back</a>
          </div>
        <br>
        @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
        @endif
  
          <br>
          <form method="post" id="saveProduct" action="{{ $product->exists ? route('save_edit_product', ['id' => $product->id]) : route('save_new_product') }}" enctype="multipart/form-data">
      
      <div class="mb-3">
      
      <label for="category" class="py-1">Choose a category:</label>
      
       <select id="category" class="form-select" aria-label="Default select example" name="category">
      @foreach($category as $item)
        <option value="{{$item->id}}" @if($product->id == $item->id) selected @endif >{{$item->name}}</option>
      @endforeach
      </select> 
</div>

      <div class="mb-3">
            <label for="product_Name" class="form-label">product Name</label>
            <input type="text" class="form-control" id="product_Name" name="product_name" value="{{old('name', $product->product_name)}}">
        </div>
         <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{old('name', $product->description)}}">
        </div>
         <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{old('name', $product->price)}}">
        </div>
         <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input accept="image/*" type="file" class="form-control" id="image" name="image">
        </div>
         <div class="mb-3">
          @if($product->exists)
            <img src="{{  url('') }}/{{old('image', $product->image)}}" alt="Product img" width="40px" height="40px">
          @endif
          </div>

        <label for="form-check">Status</label>
        <div class="px-5">
          <input type="radio" id="Status1" name="Status" value="1" @if($product->exists) @if($product->status==1) checked @endif @endif>
          <label for="Status1">1</label>
          <input type="radio" id="Status2" name="Status" value="0" @if($product->exists) @if($product->status==0) checked @endif @endif>
          <label for="Status2">0</label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@include('default.footer')
<script>
    $(function() {
  $("#saveProduct").validate({
    rules: {
      category: "required",
      product_name: "required",
      description: "required",
      price: "required",
      Status: "required",
    },
    messages: {
      category: "Please enter required",
      product_name: "Please enter required",
      description: "Please enter required",
      price: "Please enter required",
      Status: "Please enter required",
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
$(function() {
  $("#saveCategory").validate({
    rules: {
            category : {
                    required: true,
                    },
            product_name : {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                    },
            description : {
                    required: true,
                    minlength: 3,
                    maxlength: 255
                    },
            price: {
                  required: true,
                  number: true,
                  min:1
                  },
            Status: {
                  required: true,
                  }
          },
    messages : {
            Status: {
                  required: "Please select category",
                  },
            product_name: {
                  required: "Please enter product Name",
                  minlength: "Product Name should be at least 2 characters",
                  maxlength: "Product Name is too long",
                  },
            description: {
                  required: "Please enter Description",
                  minlength: "Description should be at least 3 characters",
                  maxlength: "Description Name is too long",
                  },
            price: {
                  required: "Please enter price",
                  number:"Please numerical value",
                  min:"The price must be at least 1"
                  },
            Status: {
                  required: "Please enter Status",
                  },
          },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>