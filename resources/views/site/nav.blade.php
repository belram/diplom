@if(isset($pages))
    <ul class="cd-faq-categories">
        @foreach($pages as $k=>$item)
            <li><a {{ ($k ==0) ? 'class="selected"' : ''}} href="#{{ $item->alias }}">{{ ucwords($item->topic) }}</a></li>
        @endforeach
    </ul>
@endif


