@extends('layouts.app')
@section('content') 
 <!-- todo---->
  
 <!-- js api  add test result for spcific team & get group test results -->
  
 
<main id="main">
    
<div class="container-fluid admin">
    <div class="row">
          <div class="col-md-12 offset-0">
          <h1 class="center" style="margin: 15px; text-align: center;">كل الأسئلة</h1><br/>
          <div class="row">     
            @foreach ($questions as $row)
             <div class="col-6">
         
            <ul class="list-group">
                <li class="list-group-item list-group-item-primary"><h3>{{$row->question}}</h3></li>
                @foreach ($row->question_choice as $c) 
                        @if ($c->is_right =='y')
                          <li class="list-group-item list-group-item "  ><b>{{$c->choice}}</b></li>
                        @endif
                        @if ($c->is_right =='n')
                          <li class="list-group-item" >{{$c->choice}}</li>
                        @endif
                    
                    @endforeach
                    <!-- <li class="list-group-item list-group-item-success">كتاب</li> -->
                    <li class="list-group-item" ><i class="bx bx-trash" style="">
                     </i>
                     <a onClick="return confirm('هل تريد الحزف')" title="حذف" href="delete_q?id={{ $row->id}}&topic_id={{$topic_id}}"><i class="bi-trash"></i></a>
                     | <a title="تعديل" href="edit_q?id={{ $row->id}}&topic_id={{$topic_id}}"><i class="bi-pencil"></i></a>
                    </li>
               </ul><br></div> 
               @endforeach
            </div>
          </div>
       
<!-- 
          <div class="col-md-4">
            <div class="card-body">  
            <h4>إضافة سؤال</h4>
            <form action="{{ url('/add_q')}}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <input type="hidden" name="topic_id" value="{{$topic_id}}"> 
                
                   
                  <div class="form-group">
                  <label for="q">السؤال</label>
                    @error('q')
                      <div class="text-danger">{{ $message }}</div>
                     @enderror
                  <input type="text" name="q" class="form-control" id="q" aria-describedby="emailHelp" placeholder="أكتب السؤال هنا">
                  <small id="emailHelp" class="form-text text-muted">الرجاء كتاب السؤال</small>
                  </div>
                  
                  <div class="form-group">
                  <label for="a">الخيار الاول</label>
                    @error('a')
                      <div class="text-danger">{{ $message }}</div>
                     @enderror
                  <input type="text" name="a[]" class="form-control" id="a" aria-describedby="emailHelp" placeholder="أكتب الاجابة هنا">
                  <small id="emailHelp" class="form-text text-muted">الرجاء كتاب الاجابة</small>
                  </div>

                  <div class="form-group">
                  <label for="a">الخيار الثاني</label>
                    @error('a')
                      <div class="text-danger">{{ $message }}</div>
                     @enderror
                  <input type="text" name="a[]" class="form-control" id="a" aria-describedby="emailHelp" placeholder="أكتب الاجابة هنا">
                  <small id="emailHelp" class="form-text text-muted">الرجاء كتاب الاجابة</small>
                  </div>

                  <div class="form-group">
                  <label for="a">الخيار الثالث</label>
                    @error('a')
                      <div class="text-danger">{{ $message }}</div>
                     @enderror
                  <input type="text" name="a[]" class="form-control" id="a" aria-describedby="emailHelp" placeholder="أكتب الاجابة هنا">
                  <small id="emailHelp" class="form-text text-muted">الرجاء كتاب الاجابة</small>
                  </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">الاجابة الصحيحة</label>
                        <select class="form-control" name="correct_index" id="correct_index">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        </select><br/>
                    </div>
                    
 
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">إضافة</button>
                   </div>
              </form>

          </div>
            </div> -->
</div>
</div>
   </main><!-- End #main -->
 

@stop