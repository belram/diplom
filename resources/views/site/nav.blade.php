@if(isset($pages))
    <ul class="cd-faq-categories">
        @foreach($pages as $k=>$item)
            <li><a {{ ($k ==0) ? 'class="selected"' : ''}} href="#{{ $item }}">{{ ucwords($item) }}</a></li>
        @endforeach
    </ul>
@endif

