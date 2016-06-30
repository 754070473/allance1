@foreach($ar as  $k=>$v)
                                            <?php if(($k+1)%3==1){  ?>
                                            <li  style="clear:both;" >
                                                <?php }else{?>
                                            <li>
                                                <?php } ?>
                                                <a href="geren?mes_id={{$v->mes_id}}"  target="_blank">
                                                    <h3 title="CCIC">公司</h3>


                                                    <div class="comLogo">

                                                        <img src="style/images/c5e0d4d3dc9047c89986c9eca2feb277.png" width="190" height="190" alt="CCIC" />
                                                        <ul>
                                                            <li>{{$v->m_name}}</li>

                                                            <li> {{$v->h_name}}</li>

                                                        </ul>
                                                    </div>
                                                </a>
                                                <ul class="reset ctags">
                                                    <li>{{$v->m_course}}</li>
                                                    <li>{{$v->m_welfare}}</li>

                                                </ul>
                                            </li>
                                        @endforeach