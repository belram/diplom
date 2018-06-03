@if(isset($data))
        @foreach($data as $k=>$item)
            <ul id="{{ $k }}" class="cd-faq-group">
                <li class="cd-faq-title"><h2>{{ ucwords($k) }}</h2></li>
                @foreach($item as $line)
                    <li>
                        <a class="cd-faq-trigger" href="#0">{{ $line->question }}</a>
                        <div class="cd-faq-content">
                            <p>{{ $line->answer }}</p>
                        </div> <!-- cd-faq-content -->
                    </li>
                 @endforeach
            </ul>
        @endforeach
@endif


