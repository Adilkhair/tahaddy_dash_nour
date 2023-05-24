@extends('layouts.app')
@section('content') 
 
 
<main id="main">
   
<div class="container">
   
<div class="container-fluid admin">
     
        <div class="card col-md-6 offset-2" style="margin: auto">
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
                 <h1>تعديل القسم  </h1>
                
            <form action="{{ url('/edit_dept_action')}}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id" value="{{ $topic[0]->id }}">

                   
                  <div class="form-group">
                  <label for="">عنوان القسم</label>
                    
                  <input type="text" name="name"  value="{{$topic[0]->name}}" class="form-control" id="q" aria-describedby="emailHelp" placeholder="أكتب السؤال هنا">
                  </div>
                  
                  <div class="form-group">                  
                   <select name="status"  class="form-control"  id="status" >
                      <option>مفعل</option>
                      <option>غير مفعل</option> 
                    </select>
                  </div>
  
 
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">تعديل</button>
                   </div>
              </form>
            </div>
        </div>
       </div>
</div>
   </main><!-- End #main -->
 

@stop