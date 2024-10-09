@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Edit Faq</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                    <form id="add-record-form" action="{{route('admin.savefaq')}}" enctype="multipart/form-data" method="POST" class="main-form mc-b-3">

                            @csrf
                        <div class="row align-items-end">
                       
                     
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Question:</label>
                                    <textarea rows="5" class="form-control" name="question"  required id="editor1"  placeholder="Enter Question">{{$faq->question}}</textarea>
                                    <input type="hidden" name="id" value="{{$faq->id}}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Answer:</label>
                                    <textarea rows="5" class="form-control" name="answer" required id="editor2"  placeholder="Enter Answer">{{$faq->answer}}</textarea>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">
                          
                            <button id="add-record" type="submit" class="primary-btn primary-bg">Save Changes</button>
                        </div>
                    </div>
                    </form>

                </div>
                
            </div>
        </div>
    </section>

@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
  .thumbnail-img {
    max-width: 288px;
    height: 113px;
   
}
.picture {
    max-width: 288px;
    height: 113px;
   
}
</style>
@endsection
@section('js')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
// function thumb(input) {
//         if (input.files && input.files[0]) {
            
//             var reader = new FileReader();
            
//             reader.onload = function (e) {
//                 $('.thumbnail-img')
//                     .attr('src', e.target.result);
                   
//             };

//             reader.readAsDataURL(input.files[0]);
//         }
//     }

//     function mainpic(input) {
//         if (input.files && input.files[0]) {
            
//             var reader = new FileReader();
            
//             reader.onload = function (e) {
//                 $('.picture')
//                     .attr('src', e.target.result);
                   
//             };

//             reader.readAsDataURL(input.files[0]);
//         }
//     }


(()=>{

//   $('#name').change(function(e) {
//     $.get('{{ route('admin.check_slug') }}', 
//       { 'title': $(this).val() }, 
//       function( data ) {
//         $('#slug').val(data.slug);
//       }
//     );
//   });


//     $('#add-record').click(function(e)
//     {
//         e.preventDefault();
//         var value1 = CKEDITOR.instances['editor1'].getData();
//         var val1 = $("#message1").val(value1);
//         var value2 = CKEDITOR.instances['editor2'].getData();
//         var val2 = $("#message2").val(value2);
//                 //console.log(val1.attr('value'));
//                 if(val1.attr('value') == '')
//                 {
//                     $.toast({
// 						heading: 'Error!',
// 						position: 'bottom-right',
// 						text:  'Short Description Field Is Required!',
// 						loaderBg: '#ff6849',
// 						icon: 'error',
// 						hideAfter: 2000,
// 						stack: 6
// 					});
//                 }
//                 if(val1.attr('value') == '')
//                 {
//                     $.toast({
// 						heading: 'Error!',
// 						position: 'bottom-right',
// 						text:  'Long Description Field Is Required!',
// 						loaderBg: '#ff6849',
// 						icon: 'error',
// 						hideAfter: 2000,
// 						stack: 6
// 					});
//                 }

//                 if(val1.attr('value') != '' && val1.attr('value') != '')
//                 {
//                     $('#add-record-form').submit();
//                 }
//     });
    
})()
</script>
@endsection