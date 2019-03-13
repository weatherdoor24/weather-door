@if (Session::has('message'))
<div class="row">
    <div class="col-sm-12 alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p style="text-align: center;">{{ Session::get('message') }}</p>
	</div> 
</div>
    
@endif 