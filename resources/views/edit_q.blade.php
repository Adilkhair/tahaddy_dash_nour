@extends('layouts.app')
@section('content') 
 
 
<main id="main">
   
<div class="container">
   
<div class="container-fluid admin">
     
        <div class="card col-md-6 offset-2">
            <div class="card-body">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                        </ul>
                    </div>
                  @endif
                 <h1>تعديل السؤال  </h1>
                
            <form action="{{ url('/edit_q_action')}}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="text" name="id" value="{{ $question[0]->id }}">

                   
                  <div class="form-group">
                  <label for="q">السؤال</label>
                    @error('q')
                      <div class="text-danger">{{ $message }}</div>
                     @enderror
                  <input type="text" name="q"  value="{{$question[0]->question}}" class="form-control" id="q" aria-describedby="emailHelp" placeholder="أكتب السؤال هنا">
                  <small id="" class="form-text text-muted">الرجاء كتاب السؤال</small>
                  </div>
                  
                  <div class="form-group">
                  <label for="a">الخيار الاول</label>
                    @error('a')
                      <div class="text-danger">{{ $message }}</div>
                     @enderror
                  <input type="text" name="a[]" required="required" value="{{$question[0]->question_choice[0]->choice}}" class="form-control" id="a" aria-describedby="emailHelp" placeholder="أكتب الاجابة هنا">
                  <small id="" class="form-text text-muted">الرجاء كتاب الاجابة</small>
                  </div>

                  <div class="form-group">
                  <label for="a">الخيار الثاني</label>
                    @error('a')
                      <div class="text-danger">{{ $message }}</div>
                     @enderror
                  <input type="text" name="a[]" required="required" value="{{$question[0]->question_choice[1]->choice}}"  class="form-control" id="a" aria-describedby="emailHelp" placeholder="أكتب الاجابة هنا">
                  <small id="" class="form-text text-muted">الرجاء كتاب الاجابة</small>
                  </div>

                  <div class="form-group">
                  <label for="a">الخيار الثالث</label>
                    @error('a')
                      <div class="text-danger">{{ $message }}</div>
                     @enderror
                  <input type="text" name="a[]" required="required" value="{{$question[0]->question_choice[2]->choice}}"  class="form-control" id="a" aria-describedby="emailHelp" placeholder="أكتب الاجابة هنا">
                  <small id="" class="form-text text-muted">الرجاء كتاب الاجابة</small>
                  </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">الاجابة الصحيحة</label>
                        <select class="form-control" name="correct_index" id="correct_index">
                        <option @if ( $question[0]->question_choice[0]->is_right === 'y' ) selected="selected" @endif>1</option>
                        <option @if ( $question[0]->question_choice[1]->is_right === 'y' ) selected="selected" @endif>2</option> 
                        <option @if ( $question[0]->question_choice[2]->is_right === 'y' ) selected="selected" @endif>3</option>
                        <option>3</option>
                        </select><br/>
                    </div>
                    
 
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">إضافة</button>
                   </div>
              </form>
            </div>
        </div>
       </div>
</div>
   </main><!-- End #main -->
 

@stop