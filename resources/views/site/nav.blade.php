@if(isset($topics))
    <ul class="cd-faq-categories">
        @foreach($topics as $k=> $item)
            <li><a {{ ($k ==0) ? 'class="selected"' : ''}} href="#{{ $item->alias }}">{{ $item->topic }}</a></li>
        @endforeach
    </ul>
@endif


