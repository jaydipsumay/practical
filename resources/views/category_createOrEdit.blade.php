@include('default.head')
<div class="container">
    @if($category->exists)
    <h3>Edit Category</h3>
    @else
    <h3>New Category</h3>
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

          <form method="post" id="saveCategory" action="{{ $category->exists ? route('save_edit_category', ['id' => $category->id]) : route('save_new_category') }}" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" value="{{ old('name', $category->name) }}">
        </div>
        <label for="form-check">Status</label>
        <div class="px-5">
          <input type="radio" id="Status1" name="Status" value="1" @if($category->exists) @if($category->status==1) checked @endif @endif>
          <label for="Status1">1</label>
          <input type="radio" id="Status2" name="Status" value="0" @if($category->exists) @if($category->status==0) checked @endif @endif>
          <label for="Status2">0</label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@include('default.footer') 
<script>
  $(function() {
  $("#saveCategory").validate({
    rules: {
            category_name : {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                    },
            Status: {
                  required: true,
                  }
          },
    messages : {
            category_name: {
                  required: "Please enter category Name",
                  minlength: "category Name should be at least 2 characters",
                  maxlength: "category Name is too long",
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