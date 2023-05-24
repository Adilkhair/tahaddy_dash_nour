@extends('layouts.app')
@section('content') 
<main id="main">
<div class="container">
<div class="row">
    <div class="col-sm-12 col-md-12">
       <div class="row" style="background-color: #EFEFEF; margin-bottom: 10px; margin-top: 10px">
         <div class="col-9">
           <b>إضافة نموذج</b> 
         </div>
          <div class="col-3">
            <b><a href="http://localhost/shaqra_laravel/public/student_forms/{{$student_id }}" style="float: left; padding-right: 10px">رجوع>></a></b>
  
           </div>
     </div>

<form method="post" action="http://localhost/shaqra_laravel/public/save_std_quest">
    @csrf
<input type="hidden" name="form_id" value="{{$form_template->id }}" >
<input type="hidden" name="student_id" value="{{$student_id }}" >
<h2 style="text-align: center; padding: 15px; text-decoration: underline;"><?php echo $form_template->form_name; ?></h2>
<?php echo $form_template->form_html; ?>

  <!--   
  <div class="form-group row">
    <label for="level" class="col-4 col-form-label">المستوي</label> 
    <input type="hidden" name="q[]" value="المستوي" class="form-control">
    <div class="col-8">
      <select id="level" name="a[]" class="custom-select" aria-describedby="levelHelpBlock" required="required">
        <option value="الاول">الاول</option>
        <option value="االثاني">الثاني</option>
        <option value="الثالث">الثالث</option>
        <option value="الرابع">الرابع</option>
      </select> 
      <span id="levelHelpBlock" class="form-text text-muted">إختر المستوي</span>
    </div>
  </div>
  <div class="form-group row">
    <label for="std_name" class="col-4 col-form-label">إسم الطالبة</label> 
    <input type="hidden" name="q[]" value="إسم الطالبة" class="form-control">

    <div class="col-8">
      <input id="std_name" name="a[]" placeholder="إدخل إسم الطالبة" type="text" class="form-control"  required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="univ_no" class="col-4 col-form-label">الرقم الجامعي</label> 
    <input type="hidden" name="q[]" value="الرقم الجامعي">
    <div class="col-8">
      <input id="univ_no" name="a[]" placeholder="إدخل الرقم الجامعي" type="text" class="form-control"  required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="track" class="col-4 col-form-label">التخصص</label> 
    <input type="hidden" name="q[]" value="التخصص">

    <div class="col-8">
      <input id="track" name="a[]" placeholder="إدخل التخصص" type="text" class="form-control"  required="required">
    </div>
  </div>
  <fieldset>
  <legend>حزف</legend>
  <div class="form-group row">
    <label for="course_name_id" class="col-4 col-form-label">إسم المقرر ورمزه</label> 
    <input type="hidden" name="q[]" value="إسم المقرر ورمزه">

    <div class="col-8">
      <input id="course_name_id" name="a[]" placeholder="إدخل إسم المقرر ورمزه" type="text" class="form-control"  required="required">
    </div>
  
    <label for="hour" class="col-4 col-form-label">عدد الساعات</label> 
    <input type="hidden" name="q[]" value="عدد الساعات">

    <div class="col-8">
      <input id="hour" name="a[]" placeholder="إدخل عدد الساعات" type="text" class="form-control"  required="required">
    </div>
   
    <label for="shuba_no" class="col-4 col-form-label">رقم الشعبة</label> 
    <input type="hidden" name="q[]" value="رقم الشعبة">

    <div class="col-8">
      <input id="shuba_no" name="a[]" placeholder="رقم الشعبة" type="text" class="form-control"  required="required">
    </div>
  </div>
  </fieldset>

  <fieldset>
  <legend>إضافة</legend>
  <div class="form-group row">
    <label for="course_name_id" class="col-4 col-form-label">إسم المقرر ورمزه</label> 
    <input type="hidden" name="q[]" value="إسم المقرر ورمزه">

    <div class="col-8">
      <input id="course_name_id" name="a[]" placeholder="إدخل إسم المقرر ورمزه" type="text" class="form-control"  required="required">
    </div>
  
    <label for="hour" class="col-4 col-form-label">عدد الساعات</label> 
    <input type="hidden" name="q[]" value="عدد الساعات">

    <div class="col-8">
      <input id="hour" name="a[]" placeholder="إدخل عدد الساعات" type="text" class="form-control"  required="required">
    </div>
   
    <label for="shuba_no" class="col-4 col-form-label">رقم الشعبة</label> 
    <input type="hidden" name="q[]" value="رقم الشعبة">

    <div class="col-8">
      <input id="shuba_no" name="a[]" placeholder="رقم الشعبة" type="text" class="form-control"  required="required">
    </div>
  </div>
  </fieldset>
   <br/>
  <div class="form-group row">
    <label for="supervisor_name" class="col-4 col-form-label">المرشد الاكاديمي</label> 
    <input type="hidden" name="q[]" value="المرشد الاكاديمي">

    <div class="col-8">
      <input id="supervisor_name" name="a[]" placeholder="إدخل المرشد الاكاديمي" type="text" class="form-control"  required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="request_sta" class="col-4 col-form-label">حالة الطلب</label> 
    <input type="hidden" name="q[]" value="حالة الطلب">

    <div class="col-8">
      <input id="request_sta"  name="a[]" placeholder="حالة الطلب" type="text" class="form-control"  required="required">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">حفظ</button>
    </div>
  </div>
</form>
 -->


  

    
    </div> <!--container -->
  </div><!--row-->
   </main><!-- End #main -->
 

@stop