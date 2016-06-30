	<div id="sidebar">
			<div class="mainNavs">
                    @foreach($arr as $key=>$val)
                    <div class="menu_box">
						<div class="menu_main">
                                <h2>{{$val['i_name']}}<span></span></h2>
                                        @foreach($val['son'] as $ke=>$va)
                                        @if($va['num'] == 1)
                                        <a href="{{url('/list')}}?i_name={{$va['i_name']}}">{{$va['i_name']}}</a>
                                        @endif
                                            @foreach($va['son'] as $k=>$v)
                                                @if($v['num'] == 1)
                                        <a href="{{url('/list')}}?i_name={{$v['i_name']}}">{{$v['i_name']}}</a>
                                            @endif
                                            @endforeach
                                            @endforeach
			            </div>
					   	<div class="menu_sub dn">
                            @foreach($val['son'] as $ke=>$va)
					   		<dl class="reset">
					        		<dt>
					        			<a href="{{url('/list')}}?i_name={{$va['i_name']}}">
					        				{{$va['i_name']}}
					        			</a>
					        		</dt>
						        	<dd>
                                        @foreach($va['son'] as $k=>$v)
                                            @if($v['num'] == 1)
                                         <a href="{{url('/list')}}?i_name={{$v['i_name']}}" class="curr" >{{$v['i_name']}}</a>
                                        @else
                                         <a href="{{url('/list')}}?i_name={{$v['i_name']}}" >{{$v['i_name']}}</a>
                                            @endif
                                        @endforeach
							         </dd>
					        	</dl>
                            @endforeach
                            </div>
					</div>
                        @endforeach
            </div>
			<a class="subscribe" href="subscribe" target="_blank">订阅职位</a>
		</div>
