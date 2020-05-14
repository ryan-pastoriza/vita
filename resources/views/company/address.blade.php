@extends('company.master')


@section('main')

<div class="row">
	<div class="col-xs-4 s-pad bg-white">
		<div class="profile-nav">
			<h5 class="c-bright-green f-13 border-bot pb-15 mb-10" style="padding-left:40px;padding-top:5px;">Profile</h5>
			<company-leftnav url="{{asset('')}}" nav="{{$subnav}}"></company-leftnav>
			<div class="profile-social" style="padding-left:40px;">
				<img src="../images/facebook-ico.png">
				<img src="../images/twitter-ico.png">
			</div>
		</div>
	</div>
	<div class="col-xs-8 s-pad">
        <div class="job-posted bg-white">
            <div class="business-info p-15">
                <h4 class="mt-0 c-bright-green border-bot pb-10 mb-10">Address</h4>
                <div class="business-info-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione rem dolorem ipsum natus quae, molestias labore expedita, eligendi nemo aliquid aperiam doloribus recusandae nulla cum perspiciatis repudiandae asperiores, maiores omnis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro id neque, quibusdam beatae ipsam. Excepturi, accusantium repellat inventore sint similique id magni porro officiis nesciunt illo. Alias, expedita. Quod, adipisci! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores impedit eligendi, iusto iste nesciunt, pariatur quisquam nemo consequuntur, odit repellat ex dolores quam nostrum architecto fugiat id voluptates. Facere, maxime.</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione rem dolorem ipsum natus quae, molestias labore expedita, eligendi nemo aliquid aperiam doloribus recusandae nulla cum perspiciatis repudiandae asperiores, maiores omnis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro id neque, quibusdam beatae ipsam. Excepturi, accusantium repellat inventore sint similique id magni porro officiis nesciunt illo. Alias, expedita. Quod, adipisci! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores impedit eligendi, iusto iste nesciunt, pariatur quisquam nemo consequuntur, odit repellat ex dolores quam nostrum architecto fugiat id voluptates. Facere, maxime.</p>

                    <div id="googleMap" style="width:100%;height:400px;" class="mb-15">
                        
                    </div>
                    
                    <a href="" class="c-bright-green f-12 mr-15">Fernandez Village, Butuan City Agusan del Norte 8600</a>
                    <a href="" class="c-bright-green f-12">Philippines</a>
                </div>	
            </div>
        </div>
    </div>
</div>			

@stop