<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3><?=$name?></h3>
                </div>



                <div class="container">

                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        <?foreach ($category as $key=>$val):?>
                            <li role="presentation" class="<?if($key == $curr_cate) echo 'active'; ?>"><a href="#<?='category_'.$key?>" id="<?='category_'.$key?>-tab" data-category="<?=$key?>" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="<?if($key == 'A') echo 'true'; else echo 'false';?>"><?=$val?></a></li>
                        <?endforeach;?>


                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <?foreach ($category as $sym=>$val):?>

                        <div role="tabpanel" class="tab-pane fade <?if($sym == $curr_cate) echo 'active in'; ?>" id="<?='category_'.$sym?>" aria-labelledby="<?='category_'.$sym?>-tab">

                            <div class="x_title">
                                <?if($insert) {?>
                                    <button type="button" class="btn btn-info" id="addBtn">등록하기</button>
                                <?}?>
                                <button type="button" id="idxs_<?=$sym?>go" class="btn btn-primary" data-url="/admin/activity/order" data-count="/admin/activity/count" data-page="<?=$page?>">순서 저장하기</button></a>
                                <div class="clearfix"></div>
                            </div>


                            <table id="tbl_<?=$sym?>" class="table table-striped table-bordered">
                                <thead>
                                <tr class="headings">
                                    <?foreach($col as $row) {?>
                                        <th class="column-title"> <?=$row?> </th>
                                    <?}?>
                                </tr>
                                </thead>

                                <tbody>
                                <?if(empty($pre_one[$sym])):?>

                                <?else:?>

                                    <?foreach ($pre_one[$sym] as $key => $data):?>
                                        <tr class="even pointer_<?=$sym?>" data-idx="<?=$data->idx?>" style="display: none;">
                                            <?$i=0; foreach ($data as $subkey => $value):?>
                                                <?if($i == 1):?>
                                                    <td> <button type="button" class="btn up"><i class="fa fa-caret-up"></i></button> <button type="button" class="btn down"><i class="fa fa-caret-down"></i></button> </td>
                                                <?endif;?>

                                                <?if(strpos($subkey,'idx') === false):?>
                                                    <?if($subkey == 'category'):?>
                                                        <td class=""><?=$category[$value] ?></td>
                                                    <?elseif($subkey == 'image'):?>
                                                        <td class=""><img width="150" src="<?='/'.DIR_UP_IMAGE.$value?>"></td>
                                                    <?else:?>
                                                        <td class=""><?=$value?></td>
                                                    <?endif;?>
                                                <?endif;?>
                                                <?$i++ ; endforeach;?>
                                            <?=$adminbutton?>
                                        </tr>
                                    <?endforeach;?>

                                <?endif;?>

                                <?if(empty($list[$sym])):?>
                                    <tr class="odd"><td valign="top" colspan="7" class="dataTables_empty">데이터가 없습니다.</td></tr>
                                <?else:?>

                                    <?foreach ($list[$sym] as $key => $data):?>
                                        <tr class="even pointer_<?=$sym?>" data-idx="<?=$data->idx?>">
                                            <?$i=0; foreach ($data as $subkey => $value):?>
                                                <?if($i == 1):?>
                                                    <td> <button type="button" class="btn up"><i class="fa fa-caret-up"></i></button> <button type="button" class="btn down"><i class="fa fa-caret-down"></i></button> </td>
                                                <?endif;?>

                                                <?if(strpos($subkey,'idx') === false):?>
                                                    <?if($subkey == 'category'):?>
                                                        <td class=""><?=$category[$value] ?></td>
                                                    <?elseif($subkey == 'image'):?>
                                                        <td class=""><img width="150" src="<?='/'.DIR_UP_IMAGE.$value?>"></td>
                                                    <?else:?>
                                                        <td class=""><?=$value?></td>
                                                    <?endif;?>
                                                <?endif;?>
                                                <?$i++ ; endforeach;?>
                                            <?=$adminbutton?>
                                        </tr>
                                    <?endforeach;?>

                                <?endif;?>

                                <?if(empty($next_one[$sym])):?>

                                <?else:?>

                                    <?foreach ($next_one[$sym] as $key => $data):?>
                                        <tr class="even pointer_<?=$sym?>" data-idx="<?=$data->idx?>" style="display: none;">
                                            <?$i=0; foreach ($data as $subkey => $value):?>
                                                <?if($i == 1):?>
                                                    <td> <button type="button" class="btn up"><i class="fa fa-caret-up"></i></button> <button type="button" class="btn down"><i class="fa fa-caret-down"></i></button> </td>
                                                <?endif;?>

                                                <?if(strpos($subkey,'idx') === false):?>
                                                    <?if($subkey == 'category'):?>
                                                        <td class=""><?=$category[$value] ?></td>
                                                    <?elseif($subkey == 'image'):?>
                                                        <td class=""><img width="150" src="<?='/'.DIR_UP_IMAGE.$value?>"></td>
                                                    <?else:?>
                                                        <td class=""><?=$value?></td>
                                                    <?endif;?>
                                                <?endif;?>
                                                <?$i++ ; endforeach;?>
                                            <?=$adminbutton?>
                                        </tr>
                                    <?endforeach;?>

                                <?endif;?>
                                </tbody>

                            </table>
                            <div style="margin-top: 20px; text-align: center;" id="page_<?=$sym?>">
                                <?echo $pagination[$sym]?>
                            </div>
                        </div>
                        <?endforeach;?>

                    </div>

                </div>


            </div>
        </div>

    </div>


</div>
<!-- /page content -->


<script>
    $('body').on('click', '.adminedit', function() {
        var idx = $(this).parent().parent().attr('data-idx');
        location.href = '/admin/activity/edit/'+idx;
    });
    $('body').on('click', '.admindel', function() {
        var con = confirm("정말 삭제하시겠습니까?");
        var category = $('#myTab > li.active > a').data('category');
        if(con) {
            var idx = $(this).parent().parent().attr('data-idx');
            var result = jsonreturn('/admin/activity/datadel/'+idx);
            if(result.return == true) {
                alert("삭제되었습니다");
                location.href = '/admin/activity/list?curr_cate='+category;
            }
        }
    });

    function js_page(page,category) {

        var option = {
            url : '/admin/activity/listPage/'+page + '/'+category,
            async:false
        };
        option.type = "post";
        option.contentType = false;
        option.processData = false;

        $.ajax(
            option
        ).done(function(data){
            // console.log(data);

            var html = '';
            var obj = jQuery.parseJSON( data)
            if(obj.pre_one.length > 0 ) {
                $.each(obj.pre_one,function(index, item){
                    html = html+ '<tr class="even pointer_'+category+'" data-idx="' +item.idx + '" style="display: none;">';
                    var i = 0;
                    $.each(item,function(subidx, subitem){

                        if(i == 1) {
                            html = html+'<td> <button type="button" class="btn up"><i class="fa fa-caret-up"></i></button> <button type="button" class="btn down"><i class="fa fa-caret-down"></i></button> </td>';
                        }

                        if(subidx == 'image') {
                            html = html+'<td class=""><img width="150" src="/<?=DIR_UP_IMAGE?>' + subitem + '"></td>';
                        } else if(subidx != 'idx') {
                            html = html+'<td class="">' + subitem +'</td>';
                        }

                        i++;
                    });
                    html = html+'<?=str_replace(array("\r\n","\r","\n"),'',$adminbutton)?>';
                    html = html+'</tr>';


                });
            }

            if(obj.list_data.length > 0 ) {
                $.each(obj.list_data, function (index, item) {
                    html = html + '<tr class="even pointer_'+category+'" data-idx="' + item.idx + '" >';
                    var i = 0;
                    $.each(item, function (subidx, subitem) {

                        if (i == 1) {
                            html = html + '<td> <button type="button" class="btn up"><i class="fa fa-caret-up"></i></button> <button type="button" class="btn down"><i class="fa fa-caret-down"></i></button> </td>';
                        }

                        if (subidx == 'image') {
                            html = html + '<td class=""><img width="150" src="/<?=DIR_UP_IMAGE?>' + subitem + '"></td>';
                        } else if (subidx != 'idx') {
                            html = html + '<td class="">' + subitem + '</td>';
                        }

                        i++;
                    });
                    html = html + '<?=str_replace(array("\r\n", "\r", "\n"), '', $adminbutton)?>';
                    html = html + '</tr>';


                });
            }

            if(obj.next_one.length > 0 ) {
                $.each(obj.next_one,function(index, item){
                    html = html+ '<tr class="even pointer_'+category+'" data-idx="' +item.idx + '" style="display: none;">';
                    var i = 0;
                    $.each(item,function(subidx, subitem){

                        if(i == 1) {
                            html = html+'<td> <button type="button" class="btn up"><i class="fa fa-caret-up"></i></button> <button type="button" class="btn down"><i class="fa fa-caret-down"></i></button> </td>';
                        }

                        if(subidx == 'image') {
                            html = html+'<td class=""><img width="150" src="/<?=DIR_UP_IMAGE?>' + subitem + '"></td>';
                        } else if(subidx != 'idx') {
                            html = html+'<td class="">' + subitem +'</td>';
                        }

                        i++;
                    });
                    html = html+'<?=str_replace(array("\r\n","\r","\n"),'',$adminbutton)?>';
                    html = html+'</tr>';


                });
            }

            console.log(html);
            $('#tbl_'+category + ' > tbody').empty();
            $('#tbl_'+category + ' > tbody').append(html);

            $('#page_' + category).empty();
            $('#page_' + category).append(obj.pagination)

            $('#idxs_'+category+ 'go').attr('data-page',page);
        });

    }

</script>
