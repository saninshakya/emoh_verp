<input type="hidden" id="type" value="<?=$type;?>">
</div>
<div class="container padding-right-clear padding-left-clear">
	<div class="margin-t50 hidden-sm hidden-xs"></div>
	<!--<div class="margin-t20 visible-sm visible-xs"></div>-->

	<aside class="col-lg-2 col-md-2 hidden-xs hidden-sm">
		<ul class="nav">
		    <li>
				<h4>
					 คุณมี <span><?=$this->credit->CreditBanlance();?></span>  เหรียญ
				</h4>
			</li>
			<br>
			<li>
				<h4>
					<a href="/zhome/dashboard/owner" id="owner" class="<?php if($type=='owner'){echo "nav-active";}else{echo "text-grey2";}?>">ประกาศของคุณ </a>
				</h4>
			</li>
			<br>
			<li class="">
				<h4>
					<a href="/zhome/dashboard/favourite" id="favourite" class="<?php if($type=='favourite'){echo "nav-active";}else{echo "text-grey2";}?>">ทรัพย์สินที่สนใจ</a>
				</h4>
			</li>
			<br>
			<li class="">
				<h4>
					<a href="/zhome/dashboard/lastview" id="lastview" class="<?php if($type=='lastview'){echo "nav-active";}else{echo "text-grey2";}?>">รายการล่าสุด</a>
				</h4>
			</li>
			<!--<br>
			<li class=""><h4><a href="#" id="agent" class="<?php if($type=='agent'){echo "nav-active";}else{echo "text-grey2";}?>">งานนายหน้า</a></h4></li>-->
			<br>
			<!--<li class="">
				<h4>
					<a href="/zhome/dashboard/profile" id="profile" class="<?php if($type=='profile'){echo "nav-active";}else{echo "text-grey2";}?>">ข้อมูลส่วนบุคคล</a>
				</h4>
			</li>-->
		</ul>
		<!--<div class="h360 hidden-xs"></div>-->
		<a href="/zhome/ad/"><img src="/img/ZmyHome_BoostPostAds_SideBanner_pc.jpg" class="img-responsive"></a>
	</aside>

	<div class="col-md-10 col-sm-12 col-xs-12 mobile-nopadding">
		<div class="visible-xs visible-sm padding-none3">
			<div class="clearfix"></div>
			<div class="visible-xs visible-sm clear-margin-padding col-md-12 col-sm-12 col-xs-12 bg-grey4 fixed52">
				<div class="col-xs-3 q-dash-favourite text-center <?php if($type=='owner'){echo "q-dash-active";}?>">
					<span>
						<a href="/zhome/dashboard/owner" id="owner_mb" class="small">ประกาศของคุณ</a>
					</span>
				</div>
				<div class="col-xs-3 q-dash-favourite text-center <?php if($type=='favourite'){echo "q-dash-active";}?>">
					<span>
						<a href="/zhome/dashboard/favourite" id="favourite_mb" class="small">ทรัพย์สินที่สนใจ</a>
					</span>
				</div>
				<div class="col-xs-3 q-dash-favourite text-center <?php if($type=='lastview'){echo "q-dash-active";}?>">
					<span>
						<a href="/zhome/dashboard/lastview" id="lastview_mb" class="small">รายการล่าสุด</a>
					</span>
				</div>
				<div class="col-xs-3 q-dash-favourite display-none text-center <?php if($type=='profile'){echo "q-dash-active";}?>">
					<span>
						<a href="/zhome/dashboard/profile" id="profile_mb" class="small">ข้อมูลส่วนบุคคล</a>
					</span>
				</div>
			<!--<div class="col-xs-3 clear-margin-padding"><span><a href="#" id="agent_mb" class="padding-l7 small <?php if($type=='agent'){echo "text-blue";}else{echo "text-grey2";}?>">งานนายหน้า</a></span></div>-->
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="padding-t30 visible-xs visible-sm"></div>
		<div class="col-md-12 padding-none border-grey2 visible-xs visible-sm" onclick="location.href='/zhome/ad/'">
                       <img src="/img/ZmyHome_BoostPostAds_CoverBanner_pc.jpg" class="img-responsive cursor">
        </div>
