<ol class="breadcrumb">
  <li><a href="/">Home</a></li>
  @foreach(request()->breadcrumbs()->segments() as $sement )
    @if($sement->name() == 'En' || $sement->name()== 'Kh')
      @php
        continue;
      @endphp
    @endif
    <li>
      &nbsp; / &nbsp; <a href="{{$sement->url()}}">{{ optional($sement->model())->title ?: $sement->name() }}</a>
    </li>
  @endforeach
</ol>