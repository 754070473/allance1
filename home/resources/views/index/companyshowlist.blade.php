  @foreach ($users as $v=>$user)
	               	                	<?php  if(($v+1)%3==1){ ?> 
                                                                     <li  style="clear:both;  "  >
                                                                     	<?php }else{?>
                                                                     	<li>
                                                                     	<?php } ?>
			                        <a href="gerenlist?id={{$user->res_id}}" target="_blank">
			                        	<h3 title="CCIC">简历</h3>
			                        	<div class="comLogo">
				                        	<img src="style/images/logo_default.png" width="190" height="190" alt="CCIC" />
				                        	<ul>
				                        		<li>{{ $user->p_name}}</li>
				                        		<li>{{ $user->i_name }}</li>
				                        	</ul>
			                        	</div>
			                        </a>
			                   </li>
			          @endforeach    	
			          	  