@extends('layouts.home.app')
@section('content')
<link rel="stylesheet" media="screen" href="//cdnjs.cloudflare.com/ajax/libs/jc-formueryui/1.12.1/themes/smoothness/jc-formuery-ui.min.css" />


<section class="modal-form-section model-new">
           
            <form method="post" action="{{url('modelpost')}}" enctype="multipart/form-data">
                @csrf
         <!-- BEGIN_ITEMS -->
         <div class="form_table row">
            <div class="full_width col-md-12">
                  <a class="item_anchor" name="ItemAnchor0"></a>
                  <div class="segment_header" style="background:#f7017d;width:auto;text-align:Center;">
                     <h1 style="font-size:24px;padding:10px 1em ;">Models or Actors Information Request</h1>
                  </div>
               </div>
            
            <div class="c-form rec-formuired col-md-4">
               <a class="item_anchor" name="ItemAnchor1"></a>
               <label class="c-formuestion top_c-formuestion" for="RESULT_TextField-1">Stage Name&nbsp;<b class="icon_rec-formuired" style="color:#F00">*</b></label>
               <input type="text" name="stage_name" class="text_field" id="stage_name"  size="30" value="{{ old('stage_name', '') }}" />
               <span style="color: red; margin-left: 10px">{{ $errors->first('stage_name') }}</span>
            </div>
            
            <div id="c-form32" class="c-form rec-formuired col-md-4">
               <a class="item_anchor" name="ItemAnchor2"></a>
               <label class="c-formuestion top_c-formuestion" for="RESULT_TextField-2">Legal First name&nbsp;<b class="icon_rec-formuired" style="color:#F00">*</b></label>
               <input type="text" name="name" class="text_field" id="name"  size="30" value="{{ old('name', '') }}" />
               <span style="color: red; margin-left: 10px">{{ $errors->first('name') }}</span>
            </div>
            <div id="c-form27" class="c-form rec-formuired col-md-4">
               <a class="item_anchor" name="ItemAnchor3"></a>
               <label class="c-formuestion top_c-formuestion" for="RESULT_TextField-3">Legal Last name&nbsp;<b class="icon_rec-formuired" style="color:#F00">*</b></label>
               <input type="text" name="last_name" class="text_field" id="last_name"  size="30" value="{{ old('last_name', '') }}" />
               <span style="color: red; margin-left: 10px">{{ $errors->first('last_name') }}</span>
            </div>
            
            <div id="c-form23" class="c-form rec-formuired col-md-4">
               <a class="item_anchor" name="ItemAnchor4"></a>
               <label class="c-formuestion top_c-formuestion" for="RESULT_TextField-4">Email address&nbsp;<b class="icon_rec-formuired" style="color:#F00">*</b></label>
               <input type="email" name="modelemail" class="text_field" id="modelemail"  size="68" value="{{ old('modelemail', '') }}" />
               <span style="color: red; margin-left: 10px">{{ $errors->first('modelemail') }}</span>
            </div>
            
            <div id="c-form30" class="c-form rec-formuired col-md-4">
               <a class="item_anchor" name="ItemAnchor5"></a>
               <label class="c-formuestion top_c-formuestion" for="RESULT_TextField-5">City&nbsp;<b class="icon_rec-formuired" style="color:#F00">*</b></label>
               <input type="text" name="city" class="text_field" id="city"  size="30" value="{{ old('city', '') }}" />
               <span style="color: red; margin-left: 10px">{{ $errors->first('city') }}</span>
            </div>
            <div id="c-form33" class="c-form rec-formuired col-md-4">
               <a class="item_anchor" name="ItemAnchor6"></a>
               <label class="c-formuestion top_c-formuestion" for="RESULT_TextField-6">Country&nbsp;<b class="icon_rec-formuired" style="color:#F00">*</b></label>
               <input type="text" name="country" class="text_field" id="country"  size="30" value="{{ old('country', '') }}" />
               <span style="color: red; margin-left: 10px">{{ $errors->first('country') }}</span>
            </div>
            <div id="c-form34" class="c-form rec-formuired col-md-4">
               <a class="item_anchor" name="ItemAnchor7"></a>
               <label class="c-formuestion top_c-formuestion" for="RESULT_TextField-7">Age&nbsp;<b class="icon_rec-formuired" style="color:#F00">*</b></label>
               <input type="text" name="age" class="text_field" id="age"  placeholder="18"  size="5" value="{{ old('age', '') }}" />
               <span style="color: red; margin-left: 10px">{{ $errors->first('age') }}</span>
            </div>
            
            <div id="c-form43" class="c-form rec-formuired col-md-4">
               <a class="item_anchor" name="ItemAnchor8"></a>
               <label class="c-formuestion top_c-formuestion" for="RESULT_TextField-8">Birthday&nbsp;<b class="icon_rec-formuired" style="color:#F00">*</b></label>
               <input type="date" name="dob" class="text_field calendar_field" id="dob" size="10" maxlength="10" datemax="" datemin="" value="{{ old('dob', '') }}" date="yy-mm-dd" />
                <span style="color: red; margin-left: 10px">{{ $errors->first('dob') }}</span>
            </div>
            <div id="c-form35" class="c-form col-md-4">
               <a class="item_anchor" name="ItemAnchor10"></a>
               <label class="c-formuestion top_c-formuestion" for="RESULT_RadioButton-10">Gender&nbsp;<b class="icon_rec-formuired" style="color:#F00">*</b></label>
               <select id="gender" name="gender" class="drop_down">
                  <option value="">--Select Gender--</option>
                  <option value="female">Female</option>
                  <option value="male">Male</option>
               </select>
                <span style="color: red; margin-left: 10px">{{ $errors->first('gender') }}</span>
              
            </div>
            <div id="c-form36" class="c-form col-md-4">
               <a class="item_anchor" name="ItemAnchor11"></a>
               <label class="c-formuestion" for="RESULT_TextField-11">Ethnicity</label>
               <input type="text" name="ethnicity" class="text_field" id="ethnicity"  size="30" value="{{ old('ethnicity', '') }}" />
            </div>
            
            
            
            <div id="c-form38" class="c-form col-md-4">
               <a class="item_anchor" name="ItemAnchor12"></a>
               <label class="c-formuestion top_c-formuestion" for="RESULT_TextField-12">OnlyFans Link</label>
               <input type="text" name="fan_link" class="text_field" id="fan_link" value="{{ old('fan_link', '') }}" />
            </div>
            <div id="c-form39" class="c-form col-md-4">
               <a class="item_anchor" name="ItemAnchor13"></a>
               <label class="c-formuestion top_c-formuestion" for="RESULT_TextField-13">Instagram Name</label>
               <input type="text" name="insta_name" class="text_field" id="insta_name"  value="{{ old('insta_name', '') }}" />
            </div>
            
            <div id="c-form40" class="c-form col-md-12">
               <a class="item_anchor" name="ItemAnchor14"></a>
               <label class="c-formuestion top_c-formuestion about-emial-section" for="RESULT_TextArea-14">Tell us a little about yourself ...</label>
               <textarea name="overview" class="text_field count_chars" id="the-textarea" maxlength="100" rows="7" cols="50" >{{ old('overview', '') }}</textarea>
               <div id="the-count">
                <span id="current">0</span>
                <span id="maximum">/ 100</span>
              </div>
               <!--<div class="counter">0/100 characters</div>-->
            </div>
            
            <div id="c-form41" class="c-form col-md-12">
               <a class="item_anchor" name="ItemAnchor15"></a>
               <label class="c-formuestion top_c-formuestion about-emial-section" for="RESULT_TextArea-15">Describe your experience in the industry ...</label>
               <textarea name="biography" class="text_field" id="the-textarea2" maxlength="100" rows="7" cols="50">{{ old('biography', '') }}</textarea>
               <div id="the-count1">
                <span id="current1">0</span>
                <span id="maximum1">/ 100</span>
              </div>
               <!--<div class="counter">0/100 characters</div>-->
            </div>
            
            <div id="c-form47" class="c-form read_only col-md-6">
               <a class="item_anchor" name="ItemAnchor16"></a>
               <label class="c-formuestion top_c-formuestion about-emial-section" for="RESULT_TextField-16">EMAIL RECENT PHOTO TO</label>
               <input type="text" name="email_photo" class="text_field read_only" id="email_photo"  placeholder="supersweetclubllc@gmail.com"  size="25" disabled value="supersweetclubllc@gmail.com" />
            </div>
            
            <div id="c-form42" class="c-form rec-formuired col-md-6">
               <a class="item_anchor" name="ItemAnchor17"></a>
               <table class="inline_grid inline_answer choices">
                  <tr>
                     <td><input type="checkbox" name="checked_age" class="multiple_choice" id="checked_age" value="1" /><label class="modal-result" for="RESULT_CheckBox-17_0">Yes</label>
                     <span style="color: red; margin-left: 10px">{{ $errors->first('checked_age') }}</span>
                  </tr>
               </table>
               <span class="c-formuestion right_c-formuestion about-emial-section">I AM OVER THE AGE OF 18&nbsp;<b class="icon_rec-formuired" style="color:#F00">*</b></span>
            </div>

            <!--<div id="c-form46" class="c-form rec-formuired">-->
            <!--   <a class="item_anchor" name="ItemAnchor18"></a>-->
            <!--   <span class="c-formuestion top_c-formuestion">&nbsp;<b class="icon_rec-formuired" style="color:#F00">*</b></span>-->
            <!--   <input type="hidden" name="RESULT_TextField-18_30" id="RESULT_TextField-18_30" value="image/jsignature;base30,4H104bd56644478cghfi9859adjhZgb_1c-form861Zb30Y1b8410032100Z6401674100" />-->
            <!--   <input type="hidden" name="RESULT_TextField-18_SVG" id="RESULT_TextField-18_SVG" value="" />-->
            <!--   <div class="signature text_field"></div>-->
            <!--   <div class="signature_clear"><span>clear</span></div>-->
            <!--</div>-->
            
            <!--<div style="position:relative;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;line-height:36px;text-align:left;background-color:#FAFAFA;height:35px;margin-top:10px;overflow:hidden;">-->
            <!--   <a target="_top" tabindex="-1" style="position:absolute;color:#266CAE;text-decoration:none;outline:none;min-width:210px;text-align:right;right:0;" onmouseover="this.style.backgroundColor='#F1F1F1'" onmouseout="this.style.backgroundColor='transparent'" href="https://www.formsite.com/?utm_source=footer">Powered by<img class="svg" src="/images/layout/external/formsite_logo.svg" alt="Formsite" style="height:16px;margin:-3px 20px 0 8px;vertical-align:middle;" /></a><a style="position:absolute;padding:0 12px;color:#266CAE;outline:none;text-decoration:none;" tabindex="-1" target="_blank" onmouseover="this.style.backgroundColor='#F1F1F1'" onmouseout="this.style.backgroundColor='transparent'" href="https://www.formsite.com/form_app/FormSite?EParam=Dwsnv4c-formzZPc-formB66fs8gZt46LUUzh9HC4IG6dvSNxFOr_HjJ5R1r_ov8bXoygwKNSPfR7VNc-form6KpIDG16MoMCjUj81WK9Tyr3G4DAsnrKuN1uwINwSXc-formNIWiH0VKc-formtjIwUJzzR0vPpE_1Mc-formA7yJuwkPjdhC0UmJ_1RATxVcBihcir6c-formc-formEXPB-AEfg" rel="nofollow">Report abuse</a>-->
            <!--</div>-->
         </div>
         <!-- END_ITEMS -->
         <div class="outside_container">
            <div class="buttons_reverse"><input type="submit" name="Submit" value="Submit" class="submit_button" id="FSsubmit" style="background-color: #f7017d;" /></div>
         </div>
      </form>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="{{asset('/public/web_files/js/jquery.js')}}"></script>
<script>
                $('#the-textarea').keyup(function() {
                  
                  var characterCount = $(this).val().length,
                      current = $('#current'),
                      maximum = $('#maximum'),
                      theCount = $('#the-count');
                    
                  current.text(characterCount);
                 
                  
                  /*This isn't entirely necessary, just playin around*/
                  if (characterCount < 70) {
                    current.css('color', '#666');
                  }
                  if (characterCount > 70 && characterCount < 90) {
                    current.css('color', '#6d5555');
                  }
                  if (characterCount > 90 && characterCount < 100) {
                    current.css('color', '#793535');
                  }
                  if (characterCount > 100 && characterCount < 120) {
                    current.css('color', '#841c1c');
                  }
                  if (characterCount > 120 && characterCount < 139) {
                    current.css('color', '#8f0001');
                  }
                  
                  if (characterCount >= 140) {
                    maximum.css('color', '#8f0001');
                    current.css('color', '#8f0001');
                    theCount.css('font-weight','bold');
                  } else {
                    maximum.css('color','#666');
                    theCount.css('font-weight','normal');
                  }
                  
                      
                });
                
        </script>
        <script>
                $('#the-textarea2').keyup(function() {
                  var characterCount1 = $(this).val().length,
                      current1 = $('#current1'),
                      maximum1 = $('#maximum1'),
                      theCount1 = $('#the-count1');
                    
                  current1.text(characterCount1);
                  
                  /*This isn't entirely necessary, just playin around*/
                  if (characterCount1 < 70) {
                    current1.css('color', '#666');
                  }
                  if (characterCount1 > 70 && characterCount1 < 90) {
                    current1.css('color', '#6d5555');
                  }
                  if (characterCount1 > 90 && characterCount1 < 100) {
                    current1.css('color', '#793535');
                  }
                  if (characterCount1 > 100 && characterCount1 < 120) {
                    current1.css('color', '#841c1c');
                  }
                  if (characterCount1 > 120 && characterCount1 < 139) {
                    current1.css('color', '#8f0001');
                  }
                  
                  if (characterCount1 >= 140) {
                    maximum1.css('color', '#8f0001');
                    current1.css('color', '#8f0001');
                    theCount1.css('font-weight','bold');
                  } else {
                    maximum1.css('color','#666');
                    theCount1.css('font-weight','normal');
                  }
                      
            });
        
        </script>
@endsection

