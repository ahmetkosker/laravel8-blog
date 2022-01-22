@foreach($children as $subcategory)
<li> <a style="color:black;" href="{{ route('Category Product', $subcategory->id) }}">{{ $subcategory->title }}</a></li>
@endforeach