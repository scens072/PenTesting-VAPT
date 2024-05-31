<style>
.bs-example{
	margin: 20px;
}
.accordion .fa{
	margin-right: 0.5rem;
}
.card {
	position: relative;
	display: -ms-flexbox;
	display: flex;
	-ms-flex-direction: column;
	flex-direction: column;
	min-width: 0;
	word-wrap: break-word;
	background-color: #fff;
	background-clip: border-box;
	border: 1px solid rgb(9 71 185 / 89%);
	border-radius: .25rem;
}

.accordion>.card {
	overflow: hidden;
}
.accordion>.card:not(:last-of-type) {
	border-bottom: 0;
	border-bottom-right-radius: 0;
	border-bottom-left-radius: 0;
}
.accordion>.card>.card-header {
	border-radius: 0;
	margin-bottom: -1px;
}
.card-header:first-child {
	border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
}
.card-header {
	padding: .75rem 1.25rem;
	margin-bottom: 0;
	background-color: rgba(0,0,0,.03);
	border-bottom: 1px solid rgb(41 91 193);
}
.card-body {
	-ms-flex: 1 1 auto;
	flex: 1 1 auto;
	min-height: 1px;
	padding: 1.25rem;
	border-bottom: 1px solid rgb(41 91 193);
}
</style>
<script>
	$(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
</script>

<section class="about-area" id="about">
	<div class="container">
		<center>
			<div class="menu-jdl"><h2>FAQ RSMU</h2></div>
			<p></p>
			<br/>
		</center>
		<div class="row">
			<div class="row">
				<div class="col-lg-11 col-md-11">
					<div class="row list_faq_rs">
						<div class="bs-example">
							<div class="accordion" id="accordionExample">								
								<?php
								foreach ($list_data as $key => $value) {
									?>
									<div class="card">
										<div class="card-header" id="heading<?=$value->kd_faq?>">
											<h2 class="mb-0">
												<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapse<?=$value->kd_faq?>"><i class="fa fa-plus"></i> <?=$value->tanya_faq?></button>									
											</h2>
										</div>
										<div id="collapse<?=$value->kd_faq?>" class="collapse show" aria-labelledby="heading<?=$value->kd_faq?>" data-parent="#accordionExample" style="border-top: 1px solid rgb(41, 91, 193);">
											<div class="card-body">
												<?=$value->isi_faq?>
											</div>
										</div>
									</div>
									<br/>
								<?php } ?>
								
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>
