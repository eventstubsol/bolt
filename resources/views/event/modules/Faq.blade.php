
@php
$faqs = App\Faq::where('event_id',$event_id)->get();
@endphp
<div class="page menu-filled" id="faq">
    <div class="page-header col-12">
        <div class="col-11 col-lg-9 mx-auto">
            <h2 class="mb-3 text-white">Frequently Asked Questions(FAQs)</h2>
        </div>
    </div>
    <div class="col-11 col-lg-9 mx-auto" id="faq-list">
        <div class="mb-3" id="accordion">
            <div class="card">
                <div class="card-body">
                    @if(count($faqs) > 0)
                        @foreach($faqs as $id => $faq)
                            <div class="faq-card mb-3">
                                <a class="text-dark" data-toggle="collapse" href="#collapse{{ $faq->id }}" aria-expanded="false">
                                    <h5 
                                    @if($id == 0)
                                    class="faq-title active"
                                    @else
                                    class="faq-title"
                                    @endif
                                    id="heading{{ $faq->id }}">{{$faq->question}}</h5>
                                </a>
                                <div id="collapse{{ $faq->id }}"
                                    @if($id == 0)
                                    class="collapse show"
                                    @else
                                    class="collapse"
                                    @endif
                                    aria-labelledby="heading{{ $faq->id }}" data-parent="#accordion">
                                    <div class="faq-content">{!! $faq->answer !!}</div>
                                </div>
                            </div>
                        @endforeach
                    @else
                            <fieldset>
                                <legend><center>No Data Available</center></legend>
                            </fieldset>
                    @endif
                </div>
            </div>
        </div> <!-- end #accordions-->
    </div>
</div>