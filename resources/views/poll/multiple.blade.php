@extends("layouts.admin")

@section('title')
    Multiple Choice Question
@endsection

@section("styles")
    @include("includes.styles.datatables") 
@endsection

@section("page_title")
    Multiple Choice Question
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">MCQ</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div id="message" style="display: none" role="alert" class="alert alert-info mb-1"></div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('poll.multiple') }}" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label class="form-label">Question</label>
                        <input type="text" name="question[text]" class="form-control" placeholder="Enter Question" value="{{ old('question.question') }}">
                        <small>Ask To The point Questions</small><br>
                        
                        @error('question.question')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <fieldset>
                            <legend>Choices</legend>
                            <div class="form-group">
                                <label class="form-label">Choice 1</label><br>
                                <input type="checkbox" name="answers[][correct]" class="correct form-check-input" value="0">
                                <input type="text" name="answers[][answer]" class="form-control" placeholder="Enter Choice 1" value="{{ old('answers.0.answer') }}">
                                <small>Enter Choice 1</small>
                                
                                @error('answers.0.answer')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Choice 2</label><br>
                                <input type="checkbox" name="answers[][correct]" class="form-check-input" value="0">
                                <input type="text" name="answers[][answer]" class="correct form-control" placeholder="Enter Choice 2" value="{{ old('answers.1.answer') }}">
                                <small>Enter Choice 2</small>
                                
                                @error('answers.1.answer')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Choice 3</label><br>
                                <input type="checkbox" name="answers[][correct]" class="correct form-check-input" value="0">
                                <input type="text" name="answers[][answer]" class="form-control" placeholder="Enter Choice 3" value="{{ old('answers.2.answer') }}">
                                <small>Enter Choice 3</small>
                                
                                @error('answers.2.answer')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Choice 4</label><br>
                                <input type="checkbox" name="answers[][correct]" class="correct form-check-input" value="0">
                                <input type="text" name="answers[][answer]" class="form-control" placeholder="Enter Choice 4" value="{{ old('answers.2.answer') }}">
                                <small>Enter Choice 4</small>
                                
                                @error('answers.3.answer')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror
                            </div>


                        </fieldset>
                    </div>

                    <button type="submit" class="btn btn-success float-right">Create Question</button>

                </form>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
                        <!-- end row-->
@endsection

@section("scripts")
    @include("includes.scripts.datatables")

    <script type="text/javascript">
        $(document).ready(function(){
            $('.correct').on('click',function(){
                if($(this).is(':checked')){
                    $(this).val(1);
                    console.log(1);
                }
                else{
                    $(this).val(0);
                }
                
            });
        });
    </script>
    
@endsection
