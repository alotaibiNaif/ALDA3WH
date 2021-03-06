@include('cpac/style/header')
@include('cpac/style/slider')


@foreach($details as $detail)

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 ">
                <br>
                
<a  class="btn btn-default" onclick="goBack()"> <i class="fa fa-chevron-right" aria-hidden="true"></i> رجوع</a>

                    <h1 class="page-header">الطلبات</h1>

                    


<br>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            تفاصيل الطلب
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" id="printthis" >
  
    <div class="form-group row">
    <label class="col-xs-2 col-form-label">رقم الطلب</label>
    <div class="col-xs-2">
    <p>{{$detail->id}}<p>
    </div>
    </td>
    <td>
    <label class="col-xs-2 col-form-label">الحالة</label>
    <div class="col-xs-2">
    <p>{{$detail->state->title}}<p>
    </div>
    <label class="col-xs-2 col-form-label">الوقت و التاريخ</label>
    <div class="col-xs-2">
    <p>{{$detail->created_at}}<p>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-xs-2 col-form-label">مقدم الطلب</label>
    <div class="col-xs-2">
    <p>{{$detail->user->name}}<p>
    </div>
    
    </div>
    

    <div class="form-group row">
    <label class="col-xs-2 col-form-label">القسم</label>
    <div class="col-xs-2">
    <p>{{$detail->user->department->department_name}}<p>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-xs-2 col-form-label">نوع الطلب</label>
    <div class="col-xs-2">
    @if(is_null($detail->price))
    
    <p>طلب عادي<p>
    
    @else
    <p>طلب مالي<p>
    </div>

    <label class="col-xs-2 col-form-label">القيمة</label>
    <div class="col-xs-2">
    <p>{{$detail->price}}<p>
    @endif
    </div>

    <label class="col-xs-2 col-form-label">المشفوعات</label>
    <div class="col-xs-2">
    <p>-----------<p>
    </div>
    </div>


<br>
    <div class="form-group row">
    <label class="col-xs-2 col-form-label">العنوان</label>
    <div class="col-xs-10">
    <p>{{$detail->title}}<p>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-xs-2 col-form-label">المحتوى</label>
    <div class="col-xs-10">
    <p>{!! $detail->content !!}<p>
    </div>
    </div>



    </div>

<script language="javascript">

function PrintMe(printthis) {

  var mywindow = window.open('', '', 'height=600,width=700');
  var divElements = document.getElementById(printthis).innerHTML;
            //Get the HTML of whole page
         
            mywindow.document.write('<html><head><meta name="viewport" content="width=device-width, initial-scale=1"><link href="css/bootstrap.css" rel="stylesheet"><link href="css/bootstrap-rtl.min.css" rel="stylesheet"><link href="css/cairo-font.css" rel="stylesheet"><title></title></head><body> <style media="print">  * {font-family: "Cairo", sans-serif; } .borderprint { margin-top:150px; padding: 15px; height: 850px;  border: 2px solid black; border-radius: 5px;} @page {  size: auto;margin: 0px 20px 10px 20px;}</style> <div class="col-xs-12"> <img src="images/header.png" width="100%" > </div><br><br> <div class="borderprint">' + divElements + '</div><div class="col-xs-12" style="position: absolute; left: 0; bottom: 0;" > <img src="images/footer.png" width="100%"></div></body></html>');

            setTimeout(function(){
      //Print Page 
      mywindow.print();
    }, 2000);
            
             
        }


/*
function PrintMe(printthis) {
  var divElements = document.getElementById(printthis).innerHTML;
            var oldPage = document.body.innerHTML;
            document.body.innerHTML =             
            "<style media='print'> .borderprint { margin-top:150px; padding: 15px; height: 850px;  border: 2px solid black; border-radius: 5px;} @page {  size: auto;margin: 0px 20px 10px 20px;}</style><html><head><title></title></head><body> <div class='col-xs-12'> <img src='images/header.png' width='100%' > </div><br><br> <div class='borderprint'> " + 
            divElements + " </div><div class='col-xs-12' style='position: absolute; left: 0; bottom: 0;' > <img src='images/footer.png' width='100%'></div></body>";
            //Print Page
            window.print();
            document.body.innerHTML = oldPage;
            document.title = "الطلبات"; 
        }
/** */
</script>
<form  method="POST" action="{{ url('Add-Comment') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" type="text" name="id" value="{{$detail->id}}">  




<hr>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">التعليق  <p style="color: gray; font-size: 12px;"> (اضف تعليق يظهر لمقدم الطلب)</p></label>
  
    <div class="col-sm-10">
    

		


 <textarea class="summernote" name="comment" ></textarea> 

    
<script>
$(document).ready(function() {
$('.summernote').summernote();
});
</script>


    </div>
    </div>

<center>
</br>
</br>
<button  class="btn btn-success" >أضف التعليق<i class="fa fa-check-square-o" aria-hidden="true"></i></button>
</center>

</form> 
 <div class="form-group row">
    <label class="col-xs-2 col-form-label">التعليقات</label>
    
    </div>
<div class="row">
  

{!! $detail->reason !!}

  
@if($detail->state_id == App\Pointer::$UnderStudy | $detail->state_id == App\Pointer::$UnderStudyFromCouncil | $detail->state_id == App\Pointer::$AcceptedFromFinance | $detail->state_id == App\Pointer::$UnderStudyFromFinance )
@if(Auth::user()->department_id == App\Pointer::$Manager | Auth::user()->department_id == App\Pointer::$Council | Auth::user()->department_id == App\Pointer::$Finance)



<form  method="POST" action="{{ url('request-accept') }}">


<center>

<table>

<tr>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" type="text" name="id" value="{{$detail->id}}">  
<button  class="btn btn-success" > قبول <i class="fa fa-check-square-o" aria-hidden="true"></i></button>
</form> 
</tr>

<tr>
<form  method="POST" action="{{ url('request-reject') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" type="text" name="id" value="{{$detail->id}}">  
<button  class="btn btn-danger" > رفض <i class="fa fa-times-circle" aria-hidden="true"></i></button>
</form> 
</tr>
@endif
@if(Auth::user()->department_id == App\Pointer::$Manager)
<div style="margin-top: 10px;">
<td>
<button type="button"  class="btn btn-success"  data-toggle="modal" data-target="#myModal2"> قبول مع اشعار قسم<i class="fa fa-check-square-o" aria-hidden="true"></i>
</button> 

</td>

<td>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal1">تحويل <i class="fa fa-undo" aria-hidden="true"></i>
</button>
</td>

@endif
@endif
<td>
<button  class="btn btn-info" onclick="javascript:PrintMe('printthis')"/>طباعة <i class="fa fa-print" aria-hidden="true"></i></button>
</td>


</table>
</center>




<!-- start Modal 1-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">تحويل الطلب</h4>
      </div>
      <div class="modal-body">
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">رقم الطلب</label>
    <div class="col-sm-10">
    <p>{{$detail->id}}<p>
    </div>
    </div>
      </div>
    
     <form  method="POST" id="trnsform" action="{{ url('transact') }}">
	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" type="text" name="id" value="{{$detail->id}}">  
    

      <div class="form-group row">
  <label class="col-sm-2 col-form-label">تحويل الى </label>
  <div class="col-sm-10">
<select name="selected" required >
	<option value="{{App\Pointer::$Council}}">مجلس الإدارة</option>
  	<option value="{{App\Pointer::$Jalyat}}">قسم الجاليات</option>
	<option value="{{App\Pointer::$Issued}}">قسم الصادر</option> 
	<option value="{{App\Pointer::$Library}}">قسم المكتبة</option>
	<option value="{{App\Pointer::$Media}}">قسم الإعلام</option>
	<option value="{{App\Pointer::$Services}}">قسم الخدمات</option>
	<option value="{{App\Pointer::$Finance}}">قسم المالية</option>
	
</select>

</div>

    </div>
 
      <div class="modal-footer">
      

      	<button type="submit" class="btn btn-primary">تحويل</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
</form> 
      </div>
    </div>
  </div>
</div>

<!-- end model 1-->   

 


 
 
 
 
 

<!-- start Modal 2-->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">قبول مع اشعار قسم </h4>
      </div>
      <div class="modal-body">
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">رقم الطلب</label>
    <div class="col-sm-10">
    <p>{{$detail->id}}<p>
    </div>
    </div>
      </div>
    
    
<form  method="POST" id="noti" action="{{ url('request-accept-w') }}">
	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" type="text" name="id" value="{{$detail->id}}">  
    
@php
$Departments = App\Department::all();
@endphp
      <div class="form-group row">
  <label class="col-sm-2 col-form-label">اشعار قسم</label>
  <div class="col-sm-10">
@foreach($Departments as $Dep)
  <label class="checkbox-inline">
      <input type="checkbox" name="{{$Dep->id}}" value="{{$Dep->id}}">{{$Dep->department_name}}</label><br>
@endforeach
</div>
    
	
	
      <div class="modal-footer">

      	<button type="submit" class="btn btn-primary">ارسال</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
 
      </div>
      </div>
	  </form>
 
     
    </div>
  </div>
</div>

<!-- end model 2-->   

 
 
 </div>
 </div>
 </div>
 </div>
 </div>
 
 
 
@endforeach
@include('cpac/style/footer')