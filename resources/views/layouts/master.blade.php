@include("layouts.header")

<div class="wrapper">


 @include("layouts.topbar")

 @include("layouts.sidebar")
  <div class="content-wrapper">
    <div class="content-header">
       
@yield("page")

</div>
</div>

 


     
</div>
@include("layouts.right_slidebar")
@include("layouts.footer")



