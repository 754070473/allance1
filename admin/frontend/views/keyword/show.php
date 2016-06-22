<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>热词列表展示</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link href="css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">

    <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=2.2.0" rel="stylesheet">

</head>

<body style="background-color:white;">

            <div class="wrapper wrapper-content animated fadeInRight">
               
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>热词列表</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="">
                                    <a onclick="fnClickAddRow();" href="index.php?r=keyword/index" class="btn btn-primary ">热词添加</a>
                                </div>
                               <!--  <table class="table table-striped table-bordered table-hover " id="editable"> -->

                             <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>序号</th>
                                            <th>关键字</th>
                                            <th>搜索次数</th>
                                            <th>添加时间</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach($models as $v){?>
										<tr>
											<td><?= $v['key_id']?></td>
											<td><?= $v['k_name']?></td>
											<td id="t_<?= $v['key_id']; ?>" onclick="dian(<?= $v['key_id']?>)">
                                                <input type="text" id="a_<?= $v['key_id'];?>" value="<?= $v['k_num'];?>" style="display:none" onblur="move(<?= $v['key_id']?>)"> 
                                                <span id="c_<?= $v['key_id']?>"><?= $v['k_num']?></span>
                                            </td>
											<td><?= $v['k_addtime']?></td>
											<td><a href="index.php?r=keyword/update&id=<?= $v['key_id']?>"><img class="operation"	src="img/update.png"></a>
										    <a href="index.php?r=keyword/del&id=<?= $v['key_id']?>"><img class="operation delban"	src="img/delete.png"></a></td>
										</tr>
										<?php }?>
                                    </tbody>
                                
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js?v=3.4.0"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/hplus.js?v=2.2.0"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function () {
            $('.dataTables-example').dataTable();

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable('../example_ajax.php', {
                "callback": function (sValue, y) {
                    var aPos = oTable.fnGetPosition(this);
                    oTable.fnUpdate(sValue, aPos[0], aPos[1]);
                },
                "submitdata": function (value, settings) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition(this)[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            });


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData([
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row"]);

        }

        //即点即改
        function dian(id)
        {
            $('#a_'+id).show();
            $('#c_'+id).hide();
            $('#a_'+id).focus();
        }

        //光标
        function move(id)
        {
            var num=$('#a_'+id).val();
            $.ajax({
                type:"post",
                url:"index.php?r=keyword/upone",
                data:"num="+num+"&id="+id,
                success:function(i)
                {
                    if(i==1)
                    {
                        $('#a_'+id).hide();
                        $('#c_'+id).show();
                        $('#c_'+id).html(num);
                    }
                    else
                    {
                        $('#a_'+id).hide();
                        $('#c_'+id).show();
                        exit('失败');
                    }
                }
            })
        }

    </script>
    <script type="text/javascript">
    /**
     * Generate the node required for user display length changing
     *  @param {object} settings dataTables settings object
     *  @returns {node} Display length feature node
     *  @memberof DataTable#oApi
     */
  
    </script>
    
</body>

</html>
