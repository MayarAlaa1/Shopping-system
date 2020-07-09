
<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
  <div class="container " style="text-align:center">
      <a href="{{route('categories.create')}}"  class="btn btn-success mb-5" style="align-center">
         New Category
         <i class="far fa-plus-square"></i> 
      </a>
  </div>
  <table class="table table-bordered table-hover table-dark" class="mx-auto" style="background-color: 	rgb(52, 57, 64)" id="cat_table">
    <thead class="thead-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Category Name</th>
        <th scope="col">Created At</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
        <tr>     
          <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->category_name }} </td>
            <td>{{$category->created At}}</td>
      @endforeach
    </tbody>
  </table> 
</div>

