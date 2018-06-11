<div class="sortcontent">
<ul>
	@foreach (config('app.fenlei') as $key => $value)
  @if(isset($sortname) && ($sid-1) == $key)
	<li><a href="{{ route('wap.dashubaosort' ,['zid'=>$key+1 ,'page'=>1] ,false) }}" style="background-color: rgb(32, 129, 129); color: rgb(255, 255, 255);">{{$value}}</a></li>
  @else
  <li><a href="{{ route('wap.dashubaosort' ,['zid'=>$key+1 ,'page'=>1] , false) }}">{{$value}}</a></li>
  @endif
  @endforeach
</ul>
</div>
